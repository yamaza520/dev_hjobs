<?php defined('BASEPATH') OR exit('No derect script access allowed');

class Login_history extends MY_AdminController
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('pagination');
        $this->load->model('Login_history_model');
    }

    /**
     * Login History page for Admin
     * @route /admin/login_history
     */
    public function index()
    {
        $this->page_title = 'Login History';

        // For pagination configuration
        $pager_config = $this->getPagerConfig();
        $result = $this->Login_history_model->search($pager_config);
        $data['result'] = $result['data'];

        $pager_config['total_rows'] = $result['meta']['total'];
        $this->pagination->initialize($pager_config);
        $data['pagination'] = $this->pagination->create_links();

        $this->_render('login_history', $data);
    }
}
