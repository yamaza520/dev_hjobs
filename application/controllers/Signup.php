<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends MY_BaseController
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent:: __construct();

        $this->lang->load('auth');
        $this->load->model('Prefecture_model');
        $this->load->model('Job_seeker_model');
    }

    /**
     * @route /signup
     */
    public function form()
    {
        $this->page_title = '新規会員登録';
        $this->header_message = $this->page_title;

        list($years, $months, $days) = get_years_months_days();
        $data['years']       = $years;
        $data['months']      = $months;
        $data['days']        = $days;
        $data['prefectures'] = $this->Prefecture_model->find_all_for_dropdown('--');

        $tables = $this->config->item('tables','ion_auth');
        $identity_column = $this->config->item('identity','ion_auth');

        if ($this->input->get('edit')) {
            $data['jobseeker'] = $this->session->signup_jobseeker;
        } else {
            $data['jobseeker'] = array (
                'first_name'        => '',
                'last_name'         => '',
                'first_name_kana'   => '',
                'last_name_kana'    => '',
                'gender'            => '',
                'birth_year'        => '',
                'birth_month'       => '',
                'birth_day'         => '',
                'email'             => '',
                'password'          => '',
                'phone'             => '',
                'zipcode'           => '',
                'pref_cd'           => '',
                'city'              => '',
                'is_working'        => '',
                'marital_status'    => '',
            );
        }

        if (count($_POST)) {
            $this->form_validation->set_rules('first_name', '姓', 'required');
            $this->form_validation->set_rules('last_name', '名', 'required');
            $this->form_validation->set_rules('first_name_kana', 'セイ', 'required|katakana');
            $this->form_validation->set_rules('last_name_kana', 'メイ', 'required|katakana');
            $this->form_validation->set_rules('gender', '性別', 'required');
            $this->form_validation->set_rules('birth_year', '生年月日(年)', 'required|numeric');
            $this->form_validation->set_rules('birth_month', '生年月日(月)', 'required|numeric');
            $this->form_validation->set_rules('birth_day', '生年月日(日)', 'required|numeric');
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|unique_non_deleted['.$tables['users'].'.'.$identity_column.']');
            $this->form_validation->set_rules('password', 'パスワード', 'required|password_checker[email]|matches[confirm_password]');
            $this->form_validation->set_rules('confirm_password', 'パスワード（確認）', 'required|matches[password]');
            $this->form_validation->set_rules('phone', '電話番号', 'required');
            $this->form_validation->set_rules('zipcode', '郵便番号', 'required');
            $this->form_validation->set_rules('pref_cd', '都道府県', 'required');
            $this->form_validation->set_rules('city', '市区町村', 'required');
            $this->form_validation->set_rules('is_working', '現在の勤務状況', 'required');
            $this->form_validation->set_rules('marital_status', '既婚 / 未婚', 'required');

            if ($this->form_validation->run()) {
                $pref = $this->Prefecture_model->find_one_by(array('pref_cd' => $this->input->post('pref_cd')));
                $jobseeker = array (
                    'first_name'        => $this->input->post('first_name'),
                    'last_name'         => $this->input->post('last_name'),
                    'first_name_kana'   => $this->input->post('first_name_kana'),
                    'last_name_kana'    => $this->input->post('last_name_kana'),
                    'gender'            => $this->input->post('gender'),
                    'birth_year'        => $this->input->post('birth_year'),
                    'birth_month'       => $this->input->post('birth_month'),
                    'birth_day'         => $this->input->post('birth_day'),
                    'email'             => $this->input->post('email'),
                    'password'          => $this->input->post('password'),
                    'phone'             => $this->input->post('phone'),
                    'zipcode'           => $this->input->post('zipcode'),
                    'pref_cd'           => $this->input->post('pref_cd'),
                    'pref_name'         => $pref->name,
                    'city'              => $this->input->post('city'),
                    'is_working'        => (int) $this->input->post('is_working'),
                    'marital_status'    => $this->input->post('marital_status'),
                );
                $this->session->set_userdata('signup_jobseeker', $jobseeker);

                redirect($this->path . 'signup/confirm');
            } else {
                $data['message'] = validation_errors();
            }
        }

        $this->_render('signup/form', $data);
    }

    /**
     * @route /signup/confirm
     */
    public function confirm()
    {
        $this->page_title = '新規会員登録確認';

        if (!$this->session->has_userdata('signup_jobseeker')) {
            redirect($this->path . 'signup/form');
        }

        $jobseeker = $this->session->signup_jobseeker;

        if (count($_POST)) {
            $username = strtolower($jobseeker['email']);
            $additional_data = array(
                'first_name' => $jobseeker['first_name'],
                'last_name'  => $jobseeker['last_name'],
                'phone'      => $jobseeker['phone'],
                'redirect'   => 'signup/activated',
            );

            $user = $this->ion_auth->register($username, $jobseeker['password'], $jobseeker['email'], $additional_data);
            $user_id = is_array($user) ? $user['id'] : $user;

            if ($user_id) {
                // add to job_seeker table
                $jobseeker_data = array(
                    'user_id'           => $user_id,
                    'pref_cd'           => $jobseeker['pref_cd'],
                    'city'              => $jobseeker['city'],
                    'phone_number'      => $jobseeker['phone'],
                    'zip_code'          => $jobseeker['zipcode'],
                    'birthdate'         => $jobseeker['birth_year'] . '-' . $jobseeker['birth_month'] . '-' . $jobseeker['birth_day'],
                    'first_name_kana'   => $jobseeker['first_name_kana'],
                    'last_name_kana'    => $jobseeker['last_name_kana'],
                    'gender'            => $jobseeker['gender'],
                    'marital_status'    => (int) $jobseeker['marital_status'],
                    'is_working'        => $jobseeker['is_working'],
                );

                $this->Job_seeker_model->insert($jobseeker_data);

                redirect($this->path . 'signup/complete');
            } else {
                show_error('何かが間違っていました。', 500);
            }
        }

        $data['jobseeker'] = $jobseeker;

        $this->_render('signup/confirm', $data);
    }

    /**
     * @route /signup/complete
     */
    public function complete()
    {
        $this->page_title = '新規会員登録完了';

        if ($this->session->has_userdata('signup_jobseeker')) {
            // unset session
            $this->session->unset_userdata('signup_jobseeker');
        } else {
            redirect($this->path . 'signup/form');
        }

        $this->_render('signup/complete');
    }

    /**
     * @route /signup/activated
     */
    public function activated()
    {
        $this->page_title = '新規会員登録完了';

        $this->_render('signup/activated');
    }

    /**
     * @route /subscribe
     */
    public function subscribe_form()
    {
        $this->page_title = 'メルマガ登録';
        $this->header_message = $this->page_title;

        if ($this->session->subscribe_jobseeker && $this->input->get('edit')) {
            $data['result'] = $this->session->subscribe_jobseeker;
        } else {
            $data['result'] = array(
                'mail'          => '',
                'conf_mail'     => '',
                'password'      => '',
                'conf_password' => '',
                'pref'          => '',
            );
        }

        $data['prefectures'] = $this->Prefecture_model->find_all_for_dropdown('--');

        if (count($_POST)) {
            $tables = $this->config->item('tables','ion_auth');
            $identity_column = $this->config->item('identity','ion_auth');

            $this->form_validation->set_rules('mail', 'メールアドレス', 'required|valid_email|unique_non_deleted['.$tables['users'].'.'.$identity_column.']');
            $this->form_validation->set_rules('conf_mail', 'メールアドレス（確認）', 'required|matches[mail]');
            $this->form_validation->set_rules('password', 'パスワード', 'required|password_checker[mail]');
            $this->form_validation->set_rules('conf_password', 'パスワード（確認）', 'required|matches[password]');
            $this->form_validation->set_rules('pref', '都道府県', 'required');

            if ($this->form_validation->run()) {
                $data = array(
                    'mail'          => $this->input->post('mail'),
                    'conf_mail'     => $this->input->post('conf_mail'),
                    'password'      => $this->input->post('password'),
                    'conf_password' => $this->input->post('conf_password'),
                    'pref'          => $this->input->post('pref'),
                );
                $this->session->set_userdata('subscribe_jobseeker', $data);

                redirect($this->path . 'subscribe/confirm');
            } else {
                // validation error
                $data['message'] = validation_errors();
            }
        }

        $this->_render('signup/subscribe_form', $data);
    }

    /**
     * @route /subscribe/confirm
     */
    public function subscribe_confirm()
    {
        $this->page_title = 'メルマガ登録確認';

        if (!$this->session->has_userdata('subscribe_jobseeker')) {
            redirect($this->path . 'subscribe');
        }

        $data['result'] = $this->session->subscribe_jobseeker;

        $pref_cd = $data['result']['pref'];
        $pref = $this->Prefecture_model->find_one_by(array('pref_cd' => $pref_cd));
        $data['result']['pref_name'] = $pref->name;

        if (count($_POST)) {
            $email    = strtolower($data['result']['mail']);
            $username = $email;
            $password = $data['result']['password'];

            $user = $this->ion_auth->register($username, $password, $email, array('redirect' => 'subscribe/activated'));
            $user_id = is_array($user) ? $user['id'] : $user;

            if ($user_id) {
                $jobseeker_data = array(
                    'user_id'              => $user_id,
                    'pref_cd'              => $data['result']['pref'],
                    'mail_magazine_flag '  => 1
                );
                $this->Job_seeker_model->insert($jobseeker_data);

                redirect($this->path . 'subscribe/complete');
            } else {
                show_error('何かが間違っていました。', 500);
            }
        }

        $this->_render('signup/subscribe_confirm', $data);
    }

    /**
     * @route /subscribe/complete
     */
    public function subscribe_complete()
    {
        $this->page_title = 'メルマガ登録完了';

        if ($this->session->subscribe_jobseeker) {
            $this->session->unset_userdata('subscribe_jobseeker');
        } else {
            redirect($this->path . 'subscribe');
        }

        $this->_render('signup/subscribe_complete');
    }

    /**
     * @route /subscribe/activated
     */
    public function subscribe_activated()
    {
        $this->page_title = 'メルマガ登録完了';

        $this->_render('signup/subscribe_activated');
    }
}
