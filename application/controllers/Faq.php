<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faq extends MY_BaseController
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent:: __construct();

        $this->load->model('Faq_model');
        $this->load->model('Prefecture_model');
    }

    /**
     * @route /faq
     */
    public function index()
    {
        $this->page_title = 'よくある質問';
        $this->header_message = $this->page_title;

        $data['result'] = $this->Faq_model->search(array('t.is_public' => 1), array('t.sort_order' => 'asc'));
        // get master data
        $data['prefectures'] = array('0' => 'ALL') + $this->Prefecture_model->find_all_for_dropdown();

        $this->_render('faq/index', $data);
    }
}
