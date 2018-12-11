<?php defined('BASEPATH') OR exit('No derect script access allowed');

class User extends MY_AdminController {
    /**
     * Constructor
     */
    public function __construct()
    {
        parent:: __construct();

        $this->lang->load('auth');
        $this->load->library('pagination');
        $this->load->model('User_model');
    }

    /**
     * @route /admin/user/{group}/list
     */
    public function index($group = null)
    {
        if (!in_array($group, array(GROUP_ADMIN, GROUP_EDITOR))) {
            show_404();
        }

        // set the flash data error message if there is one
        $data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

        // For pagination configuration
        $pager_config = $this->getPagerConfig(array('page_name' => 'admin-user-listing'));

        // list the users
        $result = $this->User_model->search(array('group_id' => $group), $pager_config);
        $data['users'] = $result['data'];
        $pager_config['total_rows'] = $result['meta']['total'];
        $this->pagination->initialize($pager_config);
        $data['pagination'] = $this->pagination->create_links();

        $data['csrf']       = $this->_get_csrf_nonce();
        $data['group']      = $group;
        $data['total_count'] = $result['meta']['total'];

        $this->_render('user/list', $data);
    }

    /**
     * POST
     * Delete user
     */
    public function delete($group)
    {
        $id = $this->input->post('id');
        if ($this->input->post('action') == 'delete' && $id) {
            if ($this->User_model->delete($id, $group)) {
                redirect($this->path.'user/'.$group.'/list');
            }
        }

        die('Something went wrong!');
    }
}
