<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * AdminController
 */
class MY_AdminController extends MY_BaseController
{
    protected $role = GROUP_ADMIN;
    protected $authorized = true;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        if (uri_string() != $this->path.'auth/login') {
            $this->is_login();
        }
    }

    /**
     * Check admin user is logged-in or not
     */
    protected function is_login()
    {
        if (!(ab_is_admin() || ab_is_editor())) {
            redirect($this->path.'auth/login');
        }
    }

    /**
     * Get common pagination configuration
     * @param array $config Array of configuration to Pagination class
     * @return array
     */
    protected function getPagerConfig($config = array())
    {
        $page = $this->input->get('page', true);
        if (!$page) {
            $page = 1;
        }

        $per_page = 15;

        if (!empty($config['page_name'])) {
            $result = $this->Page_setting_model->find_one_by(array('page_name' => $config['page_name']));
            if (!empty($result)) {
                $per_page = $result->pagination_limit;
            }
        }

        $pager_config = array(
            'use_page_numbers'      => true,
            'reuse_query_string'    => true,
            'enable_query_strings'  => true,
            'page_query_string'     => true,
            'query_string_segment'  => 'page',
            'num_links'             => 4,
            'cur_page'              => $page,
            'per_page'              => $per_page,
            'base_url'              => site_url(uri_string()),
            'full_tag_open'         => '<ul class="pagination">',
            'full_tag_close'        => '</ul>',
            'num_tag_open'          => '<li>',
            'num_tag_close'         => '</li>',
            'cur_tag_open'          => '<li class="active"><a href="#">',
            'cur_tag_close'         => '</a></li>',
            'first_tag_open'        => '<li class="first">',
            'first_tag_close'       => '</li>',
            'prev_tag_open'         => '<li class="prev">',
            'prev_tag_close'        => '</li>',
            'next_tag_open'         => '<li class="next">',
            'next_tag_close'        => '</li>',
            'last_tag_open'        => '<li class="last">',
            'last_tag_close'       => '</li>',
            'prev_link'             => '&laquo;',
            'next_link'             => '&raquo;',
        );

        return array_merge($pager_config, $config);
    }

    public function _get_csrf_nonce()
    {
        $this->load->helper('string');
        $key   = random_string('alnum', 8);
        $value = random_string('alnum', 20);
        $this->session->set_flashdata('csrfkey', $key);
        $this->session->set_flashdata('csrfvalue', $value);

        return array($key => $value);
    }
}
