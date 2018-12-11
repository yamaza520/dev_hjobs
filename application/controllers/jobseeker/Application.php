<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Application extends MY_AuthController
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('Job_application_model');
        $this->load->model('Job_seeker_model');
        $this->load->model('Working_history_model');
        $this->load->model('Job_model');
        $this->load->model('Employer_model');
    }

    /**
     * @route /jobseeker/application_confirm/{job_id}
     */
    public function confirm($job_id)
    {
        if ($this->login_user['profile_status'] == 1) {
            // if career history is not complete yet, force to update it
            $this->session->set_flashdata('incomplete_profile', '応法する前に経歴情報を入力してください。');
            redirect($this->path . 'mypage/career-history/?redirect='.urlencode('job/application/'.$job_id));
        } elseif ($this->login_user['profile_status'] == 0) {
            // if basic information is not complete yet, force to update it
            $this->session->set_flashdata('incomplete_profile', '応法する前に基本情報を入力してください。');
            redirect($this->path . 'mypage/basic/?redirect='.urlencode('job/application/'.$job_id));
        }

        $this->page_title = '求人応募フォーム';

        $job = $this->Job_model->search(array('t.id' => $job_id), null, 1);
        if (empty($job)) {
            show_404();
        }

        $data['job'] = $job[0];
        $id = $this->login_user['child']->id;

        $job_seeker = $this->Job_seeker_model->find_by_id($id);
        $job_seeker->graduate_year  = empty($job_seeker->graduate_ym) ? '' : substr($job_seeker->graduate_ym, 0, 4);
        $job_seeker->graduate_month = empty($job_seeker->graduate_ym) ? '' : substr($job_seeker->graduate_ym, 4);

        $working_history = $this->Working_history_model->search(array('job_seeker_id' => $id));
        $job_seeker->working_history = $working_history;
        $data['similar_jobs'] = $this->Job_model->find_similar_jobs($job[0]);

        $data['job_seeker'] = $job_seeker;
        if (count($_POST)) {
            $jobs = $this->input->post('jobs');
            $success = false;
            // add to job_application table
            foreach ($jobs as $applied_job) {
                $job_application_data = array(
                    'job_id'        => $applied_job,
                    'job_seeker_id' => $id,
                    'user_id'       => $this->login_user['user_id'],
                );

                if ($this->Job_application_model->insert($job_application_data)) {
                    $success = true;
                }
            }

            if ($success){
                if ($data['job']->product_name == MEDIA_HOTELIER) {
                    $this->send_mail($job_seeker->email, '【HOTELIER JOBS】求人応募完了', 'application', $data, null, $this->config->item('admin_email'));
                    if ($data['job']->employer_id) {
                        $employer = $this->Employer_model->find_by_id($data['job']->employer_id);
                        $data['employer'] = $employer;
                        $this->send_mail($employer->email, '【HOTELIER JOBS】求人応募', 'employer_application', $data, null, $this->config->item('admin_email'));
                    }

                    redirect('job/application/complete/' .$job_id);
                } else {
                    redirect(sprintf($data['job']->link_url, $data['job']->job_code));
                }
            }
         }

        $this->_render('jobseeker/application_confirm', $data);
    }

    /**
     * @route /jobseeker/application_complete
     */
    public function complete($job_id)
    {
        $this->page_title = '求人応募フォーム';

        $this->_render('jobseeker/application_complete');
    }
}
