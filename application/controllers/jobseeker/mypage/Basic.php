<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Basic extends MY_AuthController
{
    private $base_dir = 'jobseeker/mypage/';

    /**
     * Constructor
     */
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('Job_seeker_model');
        $this->load->model('Prefecture_model');
        $this->load->model('Job_application_model');
        $this->load->model('User_job_preferences_model');
        $this->load->model('Working_history_model');
    }

    /**
     * @route /mypage
     */
    public function index()
    {
        $this->page_title = 'マイページ';

        $data = [];
        if ($this->device == 'pc') {
            $data['employ_type_class']  = $this->config->item('employee_type_class');
            $data['browsing_jobs']      = $this->Job_model->get_all_browsing_by_user($this->login_user['user_id']);
            $data['favorite_lists']     = $this->Job_model->get_all_favorties_by_user($this->login_user['user_id']);
            $data['prefectures']        = $this->Prefecture_model->find_all_for_dropdown();
            $data['top_jobs']           = $this->Job_model->find_top_jobs(ab_logged_in() ? $this->login_user['child']->id : null, 3);
        }

        $this->_render($this->base_dir . 'basic_index', $data);
    }

    /**
     * @route /mypage/basic
     */
    public function form()
    {
        $this->page_title = '基本情報の確認・編集';

        $id = $this->login_user['child']->id;
        list($years, $months, $days) = get_years_months_days();
        $data['years']       = $years;
        $data['months']      = $months;
        $data['days']        = $days;
        $data['prefectures'] = $this->Prefecture_model->find_all_for_dropdown('--');
        $data['incomplete_profile_info'] = $this->session->flashdata('incomplete_profile');

        $tables = $this->config->item('tables','ion_auth');

        if ($this->input->get('edit')) {
            $data['jobseeker'] = (object) $this->session->signup_jobseeker;
            $data['redirect'] = $data['jobseeker']->redirect;
        } else {
            $data['jobseeker'] = $this->Job_seeker_model->find_by_id($id);
            $data['redirect'] = $this->input->get('redirect');

            if ($this->session->has_userdata('signup_jobseeker')) {
                $this->session->unset_userdata('signup_jobseeker');
            }
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
            $this->form_validation->set_rules('email', 'メールアドレス', 'required|valid_email|unique_non_deleted[' . $tables['users'] . '.email.' . $data['jobseeker']->user_id.']');
            $this->form_validation->set_rules('phone', '電話番号', 'required');
            $this->form_validation->set_rules('zipcode', '郵便番号', 'required');
            $this->form_validation->set_rules('pref_cd', '都道府県', 'required');
            $this->form_validation->set_rules('address', '市区町村', 'required');
            $this->form_validation->set_rules('marital_status', '既婚 / 未婚', 'required');

            if ($this->form_validation->run()) {
                $pref = $this->Prefecture_model->find_one_by(array('pref_cd' => $this->input->post('pref_cd')));
                $jobseeker = array (
                    'user_id'           => $this->input->post('user_id'),
                    'first_name'        => $this->input->post('first_name'),
                    'last_name'         => $this->input->post('last_name'),
                    'first_name_kana'   => $this->input->post('first_name_kana'),
                    'last_name_kana'    => $this->input->post('last_name_kana'),
                    'gender'            => $this->input->post('gender'),
                    'birth_year'        => $this->input->post('birth_year'),
                    'birth_month'       => $this->input->post('birth_month'),
                    'birth_day'         => $this->input->post('birth_day'),
                    'email'             => $this->input->post('email'),
                    'phone'             => $this->input->post('phone'),
                    'zip_code'          => $this->input->post('zipcode'),
                    'pref_cd'           => $this->input->post('pref_cd'),
                    'pref_name'         => $pref->name,
                    'city'              => $this->input->post('city'),
                    'address'           => $this->input->post('address'),
                    'marital_status'    => $this->input->post('marital_status'),
                    'redirect'          => $this->input->post('redirect'),
                );

                $this->session->set_userdata('signup_jobseeker', $jobseeker);

                redirect('mypage/basic/confirm');
            } else {
                $data['redirect'] = $this->input->post('redirect');
                $data['message'] = validation_errors();
            }
        }

        $this->_render($this->base_dir . 'basic_form', $data);
    }

    /**
     * @route /mypage/basic/confirm
     */
    public function confirm()
    {
        $this->page_title = '基本情報の確認・編集 確認';
        if (!$this->session->has_userdata('signup_jobseeker')) {
            redirect($this->path . 'mypage/basic');
        }

        $id = $this->login_user['child']->id;
        $jobseeker = $this->session->signup_jobseeker;

        if (count($_POST)) {
            //add to users and user_group table
            $groups = array(
                'id' => GROUP_JOBSEEKER,
            );

            $user_data = array(
                'username'   => strtolower($jobseeker['email']),
                'first_name' => $jobseeker['first_name'],
                'last_name'  => $jobseeker['last_name'],
                'email'      => $jobseeker['email'],
                'phone'      => $jobseeker['phone'],
            );

            if ($this->login_user['profile_status'] < 2) {
                $user_data['profile_status'] = 1;

                if ($this->Working_history_model->find_one_by(array('job_seeker_id'=>$id))) {
                    $user_data['profile_status'] = 2;
                }
            }

            $user_id = $this->ion_auth->update($jobseeker['user_id'], $user_data);
            if ($user_id) {
                // add to job_seeker table
                $birth_date = $jobseeker['birth_year'] . '-' . $jobseeker['birth_month'] . '-' . $jobseeker['birth_day'];
                $jobseeker_data = array(
                    'user_id'           => $jobseeker['user_id'],
                    'pref_cd'           => $jobseeker['pref_cd'],
                    'city'              => $jobseeker['city'],
                    'address'           => $jobseeker['address'],
                    'phone_number'      => $jobseeker['phone'],
                    'zip_code'          => $jobseeker['zip_code'],
                    'birthdate'         => $birth_date,
                    'first_name_kana'   => $jobseeker['first_name_kana'],
                    'last_name_kana'    => $jobseeker['last_name_kana'],
                    'gender'            => $jobseeker['gender'],
                    'marital_status'    => $jobseeker['marital_status'],
                    'updated_at'        => date('Y-m-d H:i:s'),
                );

                $this->Job_seeker_model->update($id, $jobseeker_data);

                // update user session
                $this->login_user = update_user_session($this->login_user, $user_data, $jobseeker_data);

                if ($jobseeker['redirect']) {
                    redirect($jobseeker['redirect']);
                } else {
                    redirect('mypage/basic/complete');
                }
            } else {
                show_error('Failed to update user information', 500);
            }
        }
        $data['jobseeker'] = $jobseeker;

        $this->_render($this->base_dir . 'basic_confirm', $data);
    }

    /**
     * @route /mypage/basic/complete
     */
    public function complete()
    {
        $this->page_title = '基本情報の確認・編集 完了';

        if ($this->session->has_userdata('signup_jobseeker')) {
            // unset session
            $this->session->unset_userdata('signup_jobseeker');
        } else {
            redirect($this->path . 'mypage/basic');
        }

        $this->_render($this->base_dir . 'basic_complete');
    }

    /**
     * @route /mypage/registration-history
     */
    public function registration_history()
    {
        $this->page_title = '登録履歴';

        $this->_render($this->base_dir . 'registration_history');
    }

    /**
     * @route /mypage/application-history
     */
    public function application_history() {
        $this->page_title = '応募履歴';

        $data['hotelier']   = $this->Job_application_model->search(array('product_name' => MEDIA_HOTELIER));
        $data['nohotelier'] = $this->Job_application_model->search(array('product_name !=' => MEDIA_HOTELIER));

        $this->_render($this->base_dir . 'application_history', $data);
    }
}
