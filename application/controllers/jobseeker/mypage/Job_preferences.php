<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job_preferences extends MY_AuthController
{
    private $base_dir = 'jobseeker/mypage/';
    private $sess_name = 'mypage_job_preferences';

    /**
     * Constructor
     */
    public function __construct()
    {
        parent:: __construct();

        $this->load->model('User_job_preferences_model');
        $this->load->model('Prefecture_model');
    }

    /**
     * @route /mypage/job-preferences
     */
    public function form()
    {
        $this->page_title = '希望条件の確認・編集';

        $preferences = $this->User_job_preferences_model->find_one_by(array('job_seeker_id'=> $this->login_user['child']->id));

        if ($preferences) {
            $preferences =  unserialize($preferences->conditions);
        } else {
            $preferences = array (
                'work_place'        => array(),
                'job_category_s_id' => array(),
                'address'           => '',
                'employ_type_class' => array(),
                'salary'            => '',
                'company_name'      => '',
                'keyword'           => '',
                'flag'              => array(),
                'qualification'     => '',
            );
        }

        $data['preferences']           = $preferences;
        $data['employee_type_classes'] = $this->config->item('employee_type_class');
        $data['salaries']              = array_merge(array('' => '選択してください'), $this->config->item('salary'));

        if (count($_POST)) {
            $job_preferences = array (
                'work_place'          => $this->input->post('work_place') ? $this->input->post('work_place') : array(),
                'job_category_s_id'   => $this->input->post('job_category_s_id') ? $this->input->post('job_category_s_id') : array(),
                'address'             => $this->input->post('address'),
                'employ_type_class'   => $this->input->post('employ_type_class') ? $this->input->post('employ_type_class') : array(),
                'salary'              => $this->input->post('salary'),
                'company_name'        => $this->input->post('company_name'),
                'keyword'             => $this->input->post('keyword'),
                'flag'                => $this->input->post('flag') ? $this->input->post('flag') : array(),
                'qualification'       => $this->input->post('qualification'),
            );

            $this->session->set_userdata($this->sess_name, $job_preferences);

            redirect('mypage/job-preferences/confirm');
        }

        $this->_render($this->base_dir . 'job_preferences_form', $data);
    }

    /**
     * @route /mypage/job-preferences/confirm
     */
    public function confirm()
    {
        $this->page_title = '希望条件の確認・編集 確認';

        if (!$this->session->has_userdata($this->sess_name)) {
            redirect('mypage/job-preferences');
        }

        $job_preferences = $this->session->userdata($this->sess_name);
        $job_seeker_id   = $this->login_user['child']->id;

        $data['job_preferences']        = $job_preferences;
        $data['prefecture']             = $this->Prefecture_model->find_all_for_dropdown();
        $data['employee_type_classes']  = $this->config->item('employee_type_class');
        $data['salaries']               = $this->config->item('salary');
        $data['flag']                   = $this->config->item('flag');

        if (count($_POST)) {
            $job_preferences_data = array(
                'job_seeker_id' => $job_seeker_id,
                'conditions'    => serialize($job_preferences)
            );

            $result = $this->User_job_preferences_model->find_one_by(array('job_seeker_id'=> $job_seeker_id));
            if ($result) {
                $this->User_job_preferences_model->update($result->id, $job_preferences_data);
            } else {
                $this->User_job_preferences_model->insert($job_preferences_data);
            }

            redirect('mypage/job-preferences/complete');
        }

        $this->_render($this->base_dir . 'job_preferences_confirm', $data);
    }

    /**
     * @route /mypage/job-preferences/complete
     */
    public function complete()
    {
        $this->page_title = '希望条件の確認・編集 完了';

        if ($this->session->has_userdata($this->sess_name)) {
            // unset session
            $this->session->unset_userdata($this->sess_name);
        } else {
            redirect('mypage/job-preferences');
        }

        $this->_render($this->base_dir . 'job_preferences_complete');
    }
}
