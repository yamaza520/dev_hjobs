<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends MY_BaseController
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->library('pagination');
        $this->load->model('Article_model');
        $this->load->model('Article_type_model');
        $this->load->model('Prefecture_model');
    }

    /**
    * @route /articles
    */
    public function index($category = null)
    {
        $this->page_title = 'コラム・記事一覧';
        $this->header_message = $this->page_title;
        $data['search_article_type'] = $category;

        // For pagination configuration
        $pager_config = $this->getPagerConfig(array('page_name' => 'article-listing'));

        $result = $this->Article_model->search(
            array(
                'is_public' => 1,
                'article_type_id' => $category,
            ), array(), $pager_config);
        $total = $result['meta']['total'];

        $data['paging_info'] = $this->calulate_paging_info($total, $pager_config['cur_page'], $pager_config['per_page']);

        $data['articles'] = $result['data'];
        $pager_config['total_rows'] = $total;
        $this->pagination->initialize($pager_config);
        $data['pagination'] = $this->pagination->create_links();

        // get master data
        $data['article_type'] = array('0' => 'ALL') + $this->Article_type_model->find_all_for_dropdown(false);
        $data['prefectures'] = $this->Prefecture_model->find_all_for_dropdown();

        $this->_render('article/index', $data);
    }

    /**
    * @route /article/detail/{id}
    */
    public function detail($id)
    {
        $data['latest_articles'] = $this->Article_model->search(array('t.is_public' => 1), array('created_at' => 'desc'), 6);
        $article = $this->Article_model->search(array('t.id' => $id, 't.is_public' => 1), array(), 1);
        if (count($article) === 0) {
            show_404();
        }
        $data['article'] = $article[0];
        $data['article_type'] = array('0' => 'ALL') + $this->Article_type_model->find_all_for_dropdown(false);
        $data['prefectures'] = $this->Prefecture_model->find_all_for_dropdown();

        $this->page_title = $data['article']->title;
        $this->meta_desc  = $data['article']->description;
        $this->header_message = $this->page_title;

        $this->_render('article/detail', $data);
    }
}
