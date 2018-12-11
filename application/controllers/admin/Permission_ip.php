<?php defined('BASEPATH') OR exit('No derect script access allowed');

class Permission_ip extends MY_AdminController
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('pagination');
        $this->load->model('Permission_ip_model');
    }

    public function index()
    {
        $this->page_title = 'アクセス許可IP';

        // For pagination configuration
        $pager_config = $this->getPagerConfig();
        $result = $this->Permission_ip_model->search($pager_config);
        $data['result'] = $result['data'];

        $pager_config['total_rows'] = $result['meta']['total'];
        $this->pagination->initialize($pager_config);
        $data['pagination'] = $this->pagination->create_links();

        $this->_render('permission_ip/index', $data);
    }

    /**
     * Add/New Permission IP data
     */
    public function setup($id = 0)
    {
        if (empty($id)) {
            $this->page_title = 'アクセス許可IP登録';
            $data['record'] = (object) array(
                'id'    => '',
                'ip_address'  => '',
            );
        } else {
            $this->page_title = 'アクセス許可IP変更';
            $data['record'] = $this->Permission_ip_model->find_by_id($id);
        }

        if (count($_POST)) {
            $this->form_validation->set_rules('ip_address', 'IPアドレス', 'required|valid_ip');

            if ($this->form_validation->run()) {
                // register
                $id = $this->input->post('id');
                $data = array (
                    'ip_address' => $this->input->post('ip_address'),
                );

                // if id isn't null, update value
                if ($id) {
                    $this->Permission_ip_model->update($id, $data);
                } else {
                    $this->Permission_ip_model->insert($data);
                }

                redirect($this->path . 'ip');
            }
        }

        $this->_render('permission_ip/setup', $data);
    }

    /**
     * @route POST /admin/ip/delete
     */
    public function delete()
    {
        $id = $this->input->post('id');
        if ($id) {
            $this->Permission_ip_model->delete($this->input->post('id'));
            redirect($this->path . 'permission_ip');
        } else {
            show_error('Invalid argument.', 400);
        }
    }
}
