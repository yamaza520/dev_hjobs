<?php defined('BASEPATH') OR exit('No derect script access allowed');

class Contact extends MY_AdminController {
    /**
     * Constructor
     */
    public function __construct()
    {
        parent:: __construct();

        $this->load->library('pagination');
        $this->load->model('Enquiry_model');
    }

    /**
     * @route /admin/contact/{type}
     */
    public function index($type = null)
    {
        // For pagination configuration
        $pager_config = $this->getPagerConfig(array('page_name' => 'admin-contact-listing'));

        $this->page_title = $type == 'company' ? '提携をご希望の企業様へ' : 'お問い合わせ';
        $result = $this->Enquiry_model->search(array('type' => $type), array('created_at' => 'ASC'), $pager_config);

        $data['result'] = $result['data'];

        $pager_config['total_rows'] = $result['meta']['total'];
        $this->pagination->initialize($pager_config);
        $data['pagination'] = $this->pagination->create_links();
        $data['total_count'] = $result['meta']['total'];

        $data['type'] = $type;

        $this->_render('contact/index', $data);
    }

    /**
     * @route POST /admin/contact/delete/{type}
     */
    public function delete($type)
    {
        $id = $this->input->post('id');
        if ($id) {
            $this->Enquiry_model->delete($this->input->post('id'));
            redirect($this->path . 'contact/' . $type);
        } else {
            show_error('Invalid argument.', 400);
        }
    }
}
