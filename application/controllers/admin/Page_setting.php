<?php defined('BASEPATH') OR exit('No derect script access allowed');

class Page_setting extends MY_AdminController
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Page_setting_model');
    }

    public function pagination($page_name = null)
    {
        $this->page_title = 'ページ件数設定';

        if (!empty($page_name)) {
            $page = $this->Page_setting_model->find_one_by(array('page_name' => $page_name));
            $data['page'] = $page;
        }

        $data['pages'] = array_merge(array('' => '--'), $this->config->item('pages'));;
        $data['page_name'] = $page_name;

        if (count($_POST)) {
            $this->form_validation->set_rules('page_name', 'ページ名', 'required');
            $this->form_validation->set_rules('pagination_limit', 'ページあたり件数', 'required|numeric');

            if ($this->form_validation->run()) {
                $data = array (
                    'page_name' => $this->input->post('page_name'),
                    'pagination_limit' => $this->input->post('pagination_limit'),
                );

                if ($page) {
                    $this->Page_setting_model->update($page->id, $data);
                } else {
                    $this->Page_setting_model->insert($data);
                }

                redirect($this->path . 'page_setting/pagination');
            } else {
                $data['message'] = validation_errors();
            }
        }

        $this->_render('page_setting/pagination', $data);
    }
}
