<?php defined('BASEPATH') OR exit('No derect script access allowed');

class Job_application extends MY_AdminController {
    /**
     * Constructor
     */
    public function __construct()
    {
        parent:: __construct();

        $this->load->library('pagination');
        $this->load->model('Job_application_model');

    }

    public function index()
    {
        $this->page_title = '求人応募';

        $pager_config = $this->getPagerConfig();

        $result = $this->Job_application_model->search(array(), array(), $pager_config); 
        $data['result'] = $result['data'];

        $pager_config['total_rows'] = $result['meta']['total'];
        $this->pagination->initialize($pager_config);
        $data['pagination'] = $this->pagination->create_links();
        $data['total_count'] = $result['meta']['total'];

        $this->_render('job_application/index', $data);
    }
}
