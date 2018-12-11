<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends MY_BaseController
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('Article_type_model');
        $this->load->model('Prefecture_model');
    }

    /**
     * @route /company
     */
    public function company()
    {
        $this->page_title = '企業概要';
        $this->header_message = $this->page_title;

        $data['prefectures'] = $this->Prefecture_model->find_all_for_dropdown();

        $this->_render('page/company', $data);
    }

    /**
     * @route /privacy
     */
    public function privacy()
    {
        $this->page_title = 'プライバシーポリシー';
        $this->header_message = $this->page_title;

        $this->_render('page/privacy');
    }

    /**
     * @route /sitemap
     */
    public function sitemap()
    {
        $this->page_title = 'サイトマップ';
        $this->header_message = $this->page_title;
        $data['article_type'] = array('0' => 'ALL') + $this->Article_type_model->find_all_for_dropdown(false);

        $this->_render('page/sitemap', $data);
    }

    /**
     * @route /tos
     */
    public function tos()
    {
        $this->page_title = '利用規約';
        $this->header_message = $this->page_title;

        $this->_render('page/tos');
    }

    /**
     * error 404 page
     */
    public function error_404()
    {
        $this->page_title = '404エラー';

        $this->_render('page/error_404');
    }
}
