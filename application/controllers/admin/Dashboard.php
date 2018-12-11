<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_AdminController
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Job_application_model');
        $this->load->model('Job_seeker_model');
    }
    /**
     * Home page for Admin
     */
    public function index()
    {
        $this->page_title = 'KPI表示';

        // Get counts
        $count = new stdClass();

        // Total application count and total jobs
        $count->job_total = $this->Job_model->get_active_job_count();
        $count->job_application_total = $this->Job_application_model->get_job_application_count();
        $count->member_total = $this->Job_seeker_model->get_member_count();

        $data['count'] = $count;

        $this->_render('dashboard', $data);

    }
}
