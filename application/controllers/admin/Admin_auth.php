<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/Auth.php';

class Admin_auth extends Auth {

    protected $role = GROUP_ADMIN;
    protected $group_id = GROUP_ADMIN;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    // activate the user
    public function activate($id, $group = null)
    {
        if ($this->ion_auth->activate($id)) {
            $user_data = $this->User_model->find(array('users.id' => $id));

            if ($user_data->email) {
                $this->send_mail($user_data->email, 'Welcome to '. $this->config->item('site_title'), 'welcome');
            }

            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect($this->path.'user/'.$group.'/list', 'refresh');
        }
    }
}
