<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends MY_BaseController
{
    public function __construct()
    {
        parent:: __construct();

        $this->load->library('encrypt');
        $this->load->model('User_model');
        $this->load->model('Job_seeker_model');
        $this->load->model('Job_category_m_model');
        $this->load->model('Job_category_s_model');
        $this->load->model('Job_model');
        $this->load->model('Industory_m_model');
    }

    /**
     * POST
     * @route /favorite/add
     */
    public function add_favorite()
    {
        header('Content-Type: application/json');

        $job_ids = $this->input->post('job_id');
        if (empty($job_ids)) {
            die(json_encode(array(
                'success' => false,
                'error' => 'Invalid parameter.'
            )));
        }

        if (!is_array($job_ids)) {
            $job_ids = array($job_ids);
        }

        if ($this->is_logged_in()) {
            $this->User_model->insert_favorite_jobs($this->login_user['user_id'], $job_ids);
        } else {
            $cookie_name = $this->config->item('favjob_cookie_name');
            $items = $this->encrypt->decode(get_cookie($cookie_name));
            $items = $items ? unserialize($items) : array();

            foreach ($job_ids as $id) {
                array_push($items, $id);
            }
            $items = array_unique($items);

            $cookieExpiry = time() + $this->config->item('favorites_duration');
            set_cookie($cookie_name, $this->encrypt->encode(serialize($items)), $cookieExpiry);
        }

        echo json_encode(array(
            'success' => true,
            'error' => '',
        ));
    }

    /**
     * POST
     * @route /favorite/remove
     */
    public function remove_favorite()
    {
        header('Content-Type: application/json');

        $job_ids = $this->input->post('job_id');
        if (empty($job_ids)) {
            die(json_encode(array(
                'success' => false,
                'error' => 'Invalid parameter.'
            )));
        }

        if (!is_array($job_ids)) {
            $job_ids = array($job_ids);
        }

        if ($this->is_logged_in()) {
            $this->User_model->remove_favorite_jobs($this->login_user['user_id'], $job_ids);
        } else {
            $cookie_name = $this->config->item('favjob_cookie_name');
            $items = $this->encrypt->decode(get_cookie($cookie_name));
            $items = $items ? unserialize($items) : array();

            foreach ($job_ids as $id) {
                if (in_array($id, $items)) {
                    // only if it have been favorited
                    unset($items[array_search($id, $items)]);
                }
            }

            if (count($items)) {
                $cookieExpiry = time() + $this->config->item('favorites_duration');
                set_cookie($cookie_name, $this->encrypt->encode(serialize($items)), $cookieExpiry);
            } else {
                delete_cookie($cookie_name);
            }
        }

        echo json_encode(array(
            'success' => true,
            'error' => '',
        ));
    }

    /**
     * POST
     * @route /ajax/user_register
     */
    public function user_register()
    {
        header('Content-Type: application/json');

        $tables = $this->config->item('tables','ion_auth');
        $identity_column = $this->config->item('identity','ion_auth');

        $this->form_validation->set_rules('mail', 'メールアドレス', 'required|valid_email|unique_non_deleted['.$tables['users'].'.'.$identity_column.']');
        $this->form_validation->set_rules('conf_mail', 'メールアドレス（確認）', 'required|matches[mail]');
        $this->form_validation->set_rules('password', 'パスワード', 'required|password_checker[mail]');
        $this->form_validation->set_rules('conf_password', 'パスワード（確認）', 'required|matches[password]');
        $this->form_validation->set_rules('pref', '都道府県', 'required');

        $error = '';
        if ($this->form_validation->run()) {
            $email    = strtolower($this->input->post('mail'));
            $username = $email;
            $password = $this->input->post('password');

            $user = $this->ion_auth->register($username, $password, $email, array('redirect' => 'subscribe/activated'));
            $user_id = is_array($user) ? $user['id'] : $user;
            if ($user_id) {
                $jobseeker_data = array(
                    'user_id'               => $user_id,
                    'pref_cd '              => $this->input->post('pref'),
                    'mail_magazine_flag '   => 1
                );

                if (!$this->Job_seeker_model->insert($jobseeker_data)) {
                    $error = '何かが間違っていました。';
                } else {
                    $this->session->set_flashdata('message', 'メールがあなたのメールアドレスに送信されました。');
                }
            } else {
                $error = '何かが間違っていました。';
            }
        } else {
            $error = validation_errors();
        }

        echo json_encode(array(
            'error'     => $error,
            'success'   => $error ? false : true,
        ));
    }

    /**
     * POST
     * @route /ajax/get_industry_m
     */
    public function get_industry_m()
    {
        header('Content-Type: application/json');

        $industory_l_id = $this->input->post('parent_id');

        if (empty($industory_l_id)) {
            die(json_encode(array(
                'success' => false,
                'error' => 'Invalid parameter.'
            )));
        }
        $result = array();
        $data = $this->Industory_m_model->find_by(array('industory_l_id' => $industory_l_id));
        foreach ($data as $row) {
            $result[$row->id] = $row->name;
        }

        echo json_encode($result);
    }

    /**
     * POST
     * @route /ajax/get_jobcategory_m
     */
    public function get_jobcategory_m()
    {
        header('Content-Type: application/json');

        $job_category_l_id = $this->input->post('parent_id');

        if (empty($job_category_l_id)) {
            die(json_encode(array(
                'success' => false,
                'error' => 'Invalid parameter.'
            )));
        }
        $result = array();
        $data = $this->Job_category_m_model->find_by(array('job_category_l_id' => $job_category_l_id));
        foreach ($data as $row) {
            $result[$row->id] = $row->name;
        }

        echo json_encode($result);
    }

    /**
     * POST
     * @route /ajax/get_jobcategory_s
     */
    public function get_jobcategory_s()
    {
        header('Content-Type: application/json');

        $job_category_m_id = $this->input->post('parent_id');

        if (empty($job_category_m_id)) {
            die(json_encode(array(
                'success' => false,
                'error' => 'Invalid parameter.'
            )));
        }
        $result = array();
        $data = $this->Job_category_s_model->find_by(array('job_category_m_id' => $job_category_m_id));
        foreach ($data as $row) {
            $result[$row->id] = $row->name;
        }

        echo json_encode($result);
    }

    /**
     * POST
     * @route /ajax/job_update
     */
    public function job_update()
    {
        header('Content-Type: application/json');

        $job_id = $this->input->post('job_id');

        if ($this->Job_model->update($job_id, array ('hotel_type_id' => $this->input->post('hotel_type_id')))) {
            $error = '';
        } else {
            $error = '何かが間違っていました';
        }

        echo json_encode(array(
            'error'     => $error,
            'success'   => $error ? false : true,
        ));
    }

    /**
     * POST
     * @route /ajax/job_count
     */
    public function search_job_count()
    {
        $filter = $this->input->post('q');
        $count = $this->Job_model->countJobs($filter);

        echo json_encode(array(
            'count'     => $count
        ));
    }
}
