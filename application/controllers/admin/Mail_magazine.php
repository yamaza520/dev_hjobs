<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mail_magazine extends MY_AdminController
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('pagination');
        $this->load->model('Mail_magazine_model');
    }

    /**
     * @route /admin/mail_magazine
     */
    public function index()
    {
        $this->page_title = 'メール配信履歴一覧';

        // For pagination configuration
        $pager_config = $this->getPagerConfig(array('page_name' => 'admin-mail-magazine-listing'));

        $result = $this->Mail_magazine_model->find_all(array('sent_at' => 'DESC'), $pager_config);
        $data['result'] = $result['data'];

        $pager_config['total_rows'] = $result['meta']['total'];
        $this->pagination->initialize($pager_config);
        $data['pagination'] = $this->pagination->create_links();
        $data['total_count'] = $result['meta']['total'];

        $this->_render('mail_magazine/index', $data);
    }
}
