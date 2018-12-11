<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends MY_AdminController
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('pagination');
        $this->load->model('Faq_model');
    }

    /**
     * @route /admin/faq
     */
    public function index()
    {
        $this->page_title = 'FAQ一覧';

        // For pagination configuration
        $pager_config = $this->getPagerConfig(array('page_name' => 'admin-faq-listing'));

        $result = $this->Faq_model->search(array(), array(), $pager_config);
        $data['result'] = $result['data'];

        $pager_config['total_rows'] = $result['meta']['total'];
        $this->pagination->initialize($pager_config);
        $data['pagination'] = $this->pagination->create_links();
        $data['total_count'] = $result['meta']['total'];

        $this->_render('faq/index', $data);
    }

    /**
     * @route POST /admin/faq/delete
     */
    public function delete()
    {
        $id = $this->input->post('id');
        if ($id) {
            $this->Faq_model->delete($this->input->post('id'));
            redirect($this->path . 'faq');
        } else {
            show_error('Invalid argument.', 400);
        }
    }

    /**
     * @route /admin/faq/setup/(:num)
     */
    public function setup($id = 0)
    {
        if (empty($id)) {
            $this->page_title = 'FAQ更新';
            $data['result'] = (object) array (
                'id'              => '',
                'question'        => '',
                'answer'          => '',
                'is_public'       => 1,
                'job_detail_flag' => 0,
                'sort_order'      => '',
            );
        } else {
            $this->page_title = 'FAQ更新';
            $data['result'] = $this->Faq_model->find_by_id($id);
            if (!$data['result']) {
                show_404();
            }
        }
        if(count($_POST)) {
            $this->form_validation->set_rules('question', '質問', 'required');
            $this->form_validation->set_rules('answer', '回答', 'required');
            $this->form_validation->set_rules('sort_order', '表示順', 'required|numeric');

            if ($this->form_validation->run()) {
                $faq_data = array (
                    'question'        => $this->input->post('question'),
                    'answer'          => $this->input->post('answer'),
                    'is_public'       => $this->input->post('is_public'),
                    'sort_order'      => $this->input->post('sort_order'),
                    'job_detail_flag' => $this->input->post('job_detail_flag'),
                );
                if (empty($id)) {
                    $id = $this->Faq_model->insert($faq_data);
                } else {
                    $faq_data['updated_at'] = date('Y-m-d H:i:s');
                    $id = $this->Faq_model->update($id, $faq_data);
                }
            } else {
                $data['message'] = validation_errors();
            }

            redirect($this->path . 'faq');
        }

        $this->_render('faq/setup', $data);
    }
}
