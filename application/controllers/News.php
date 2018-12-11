<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends MY_BaseController
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent:: __construct();

        $this->load->library('pagination');
        $this->load->model('News_model');
        $this->load->model('Prefecture_model');
    }

    /**
     * @route /news
     */
    public function index()
    {
        $this->page_title = 'お知らせ一覧';

        // For pagination configuration
        $pager_config = $this->getPagerConfig(array('page_name' => 'news-listing'));

        $result = $this->News_model->search(array('is_public' => 1), array('created_at' => 'DESC'), $pager_config);
        $data['result'] = $result['data'];

        $total = $result['meta']['total'];
        $data['paging_info'] = $this->calulate_paging_info($total, $pager_config['cur_page'], $pager_config['per_page']);
        $pager_config['total_rows'] = $total;
        $this->pagination->initialize($pager_config);
        $data['pagination'] = $this->pagination->create_links();
        $data['prefectures'] = $this->Prefecture_model->find_all_for_dropdown();

        $this->_render('news/news_list', $data);
    }

    /**
     * @route /news/detail/{id}
     */
    public function detail($id)
    {
        $data['news'] = $this->News_model->find_by_id($id);
        $data['prefectures'] = $this->Prefecture_model->find_all_for_dropdown();

        $this->page_title = $data['news']->title;
        $this->meta_desc  = $data['news']->body;

        $this->_render('news/detail', $data);
    }
}
