<?php defined('BASEPATH') OR exit('No derect script access allowed');

class Job_flags extends MY_AdminController {
    /**
     * Constructor
     */
    public function __construct()
    {
        parent:: __construct();

        $this->load->library('pagination');
        $this->load->model('Job_flags_model');
    }

    public function index()
    {
        $this->page_title = '検索キーワード';

        // For pagination configuration
        $pager_config = $this->getPagerConfig();

        $result = $this->Job_flags_model->find_all(array('sort_order' => 'asc'), $pager_config);
        $data['result'] = $result['data'];

        $pager_config['total_rows'] = $result['meta']['total'];
        $this->pagination->initialize($pager_config);
        $data['pagination'] = $this->pagination->create_links();
        $data['total_count'] = $result['meta']['total'];

        $this->_render('job_flags/index', $data);
    }

    public function setup($id)
    {
        $this->page_title = '検索キーワード編集';

        $data['record'] = $this->Job_flags_model->find_by_id($id);
        if (!$data['record']) {
            show_404();
        }

        if (count($_POST)) {
            $this->form_validation->set_rules('name', 'お名前', 'required');
            $this->form_validation->set_rules('sort_order', '表示順', 'required|numeric');
            $this->form_validation->set_rules('top_flag', 'トップ表示', 'required');
            $this->form_validation->set_rules('show_flag', '表示', 'required');

            if ($this->form_validation->run()) {
                // register
                $id = $this->input->post('id');
                $data = array (
                    'name'       => $this->input->post('name'),
                    'sort_order' => $this->input->post('sort_order'),
                    'top_flag'   => $this->input->post('top_flag'),
                    'show_flag'  => $this->input->post('show_flag'),
                );

                if ($this->Job_flags_model->update($id, $data)) {
                    redirect($this->path . 'job_flags');
                }
            }
        }

        $this->_render('job_flags/setup', $data);
    }
}
