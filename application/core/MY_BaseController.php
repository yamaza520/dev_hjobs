<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * BaseController
 */
class MY_BaseController extends CI_Controller
{
    /** var array $login_user Array of he logged-in user information */
    protected $login_user;
    /** var integer $role User group ID */
    protected $role;
    /** var string $site_title The site title */
    protected $site_title;
    /** var string $page_title The page title */
    protected $page_title;
    /** var string $header_message The header message */
    protected $header_message;
    /** var string $meta_keywords Meta keywords */
    protected $meta_keywords;
    /** var string $meta_desc Meta description */
    protected $meta_desc;
    /** var string $path The base path */
    protected $path = '';
    /** var string $role_name User group name */
    protected $role_name;
    /** var string $auth The current controller is behind authorization or not  */
    protected $authorized = false;
    /** var boolean $by_pass Allow for anonymous */
    protected $bypass = false;
    /** var array $bypassUri The path where authentication is not necessary */
    protected $bypassUri = array(
        'ajax\/get_industry_m',
        'ajax\/get_jobcategory_m',
        'ajax\/get_jobcategory_s',
        'ajax\/job_update',
    );
    /** var array $device The path where authentication is not necessary */
    protected $device;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Permission_ip_model');
        $this->load->model('Site_setting_model');
        $this->load->model('Job_model');
        $this->load->model('User_model');
        $this->load->model('Page_setting_model');
        $this->load->model('Hotel_type_model');
        $this->load->model('Job_flags_model');

        $this->device = ab_device();

        $mail_config = $this->config->item('mail');
        $mail_setting = array();
        if(is_array($mail_config)){
            foreach ($mail_config as $key => $value) {
                if ($value !== null) {
                    $mail_setting[$key] = $value;
                }
            }
        }
        $this->email->initialize($mail_setting);

        if ($this->role == GROUP_ADMIN) {
            $this->path = ab_role_name(GROUP_ADMIN).'/';

            $ipIsAllowed = $this->Permission_ip_model->check_allowed_ip($_SERVER['REMOTE_ADDR']);

            if (!$ipIsAllowed){
                show_error('Forbidden', 403);
            }
        }

        $this->role_name = ab_role_name($this->role);
        $this->load->config('ion_auth', true);
        $this->login_user = $this->session->userdata();
        if ($this->ion_auth->logged_in()) {
            if (ab_is_admin() && !$this->bypass() && $this->uri->segment(1) != 'admin' && $this->authorized == true) {
                // when admin user is accessing the front-end pages
                $this->ion_auth->logout();
                redirect(uri_string());
            } else {
                $this->login_user['name'] = $this->login_user['last_name'].' '.$this->login_user['first_name'];
                $this->login_user['role'] = ab_role_name($this->login_user['group_id']);

                 if ($this->uri->segment(1) == 'signup') {
                     redirect($this->path, 'refresh');
                 }

            }
        }

        if ($this->uri->segment(1) != 'facebook_login') {
            $this->session->unset_userdata('facebook_login');
        }

        if (!uri_check_contain('login', 'logout', 'auth/forgot_password', 'auth/reset_password', 'auth/activate', 'ajax', 'subscribe', 'signup', 'favicon.ico')) {
            $this->session->set_userdata('last_url', uri_string());
        }

        if (!uri_check_contain('admin')) {
            $this->form_validation->set_error_delimiters('<dd>■', '</dd>');
        }
    }

    /**
     * Get site title
     * @return string
     */
    protected function get_site_title()
    {
        return preg_replace('/([a-z])([A-Z])/', '$1 $2', $this->config->item('site_title'));
    }

    /**
     * Get page title
     * @return string
     */
    protected function get_page_title()
    {
        return $this->page_title;
    }

    /**
     * Get page title for SEO purpose
     * @return string
     */
    protected function get_seo_title()
    {
        if ($this->page_title) {
            return $this->page_title . ' | ホテル求人転職専門−HOTELIERJOBS(ホテリエジョブズ)';
        } else {
            return 'ホテル・民泊・旅館求人転職なら業界専門のHOTELIERJOBS(ホテリエジョブズ)へ';
        }
    }

    /**
     * Get header message
     * @return string
     */
    protected function get_header_message()
    {
        if ($this->header_message) {
            return $this->header_message . ' | ホテル求人転職専門サイト';
        } else {
            return 'ホテル・民泊・旅館求人転職';
        }
    }

    /**
     * Render view with header and footer
     */
    public function _render($template, $data = array())
    {
        if ($this->meta_desc) {
            $this->meta_desc = str_replace(array("\n", "\r\n", "\r"), ' ', $this->meta_desc);
            $this->meta_desc = preg_replace('/\s+/', ' ', $this->meta_desc);
            $this->meta_desc = ab_shorten($this->meta_desc, 310, null);
        }

        $data['site_title']     = $this->get_site_title();
        $data['seo_title']      = $this->get_seo_title();
        $data['page_title']     = $this->get_page_title();
        $data['header_message'] = $this->get_header_message();
        $data['login_user']     = $this->login_user;
        $data['meta_keywords']  = $this->meta_keywords ? $this->meta_keywords : $this->config->item('default_meta_keywords');
        $data['meta_desc']      = $this->meta_desc ? $this->meta_desc : $this->config->item('default_meta_desc');
        $data['base_path']      = $this->path;
        $data['device']         = $this->device;
        $data['job_count']      = $this->Job_model->get_active_job_count();

        $user_id = (ab_is_jobseeker()) ? $this->login_user['user_id'] : null;
        $data['fav_count']      = $this->User_model->get_favorite_job_count($user_id);
        $data['browsing_count'] = $this->User_model->get_browsing_job_count($user_id);
        $data['hotel_types']    = $this->get_hotel_types();
        $data['job_flags']      = $this->get_job_flags();
        $data['page_class']     = $this->get_page_class();
        $data['employee_type_classes'] = $this->config->item('employee_type_class');

        $dir = ($this->role == GROUP_ADMIN) ? $this->path . '/' : $this->path . '/' . $this->device . '/';

        if ($this->role != GROUP_ADMIN) {
            if ($this->Site_setting_model->check_maintenance_on()) {
                ab_show_error('error_maintenance');
            }
        }

        $this->load->view($dir . 'header', $data);
        $this->load->view($dir . $template, $data);
        $this->load->view($dir . 'footer', $data);
    }

    /**
     * Get page classes
     */
    protected function get_page_class()
    {

        if (uri_check_contain('mypage/job-preferences')) {
            return 'mypage recruit';
        }

        if (uri_check_contain('mypage')) {
            return 'mypage signup';
        }

        if (uri_check_contain('signup', 'subscribe', 'contact', 'company-contact')) {
            return 'signup';
        }

        if (uri_check_contain('jobs', 'job')) {
            return 'recruit';
        }

        return '';
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
            'num_links'             => 3,
            'cur_page'              => $page,
            'per_page'              => $per_page,
            'base_url'              => site_url(uri_string()),
            'full_tag_open'         => '<div class="pager">',
            'full_tag_close'        => '</div>',
            'cur_tag_open'          => '<a href="javascript:" class="page-numbers current">',
            'cur_tag_close'         => '</a>',
            'attributes'            => array('class' => 'page-numbers'),
            'first_link'            => '最初',
            'prev_link'             => '前',
            'next_link'             => '次',
            'last_link'             => '最後',
        );

        return array_merge($pager_config, $config);
    }

    protected function get_upload_options($path_name, $subdir = null)
    {
        $options = $this->config->item('upload_options');

        $path = $this->config->item($path_name) . ($subdir ? $subdir.'/' : '');
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }

        $options['upload_path'] = $path;

        return $options;
    }

    /**
     * Remove uploaded file
     * @param string $file_name The uploaded file name
     * @param string $dir The uploaded directory
     * @param string $subdir The uploaded sub-directory
     * @return string
     */
    protected function remove_file($file_name, $dir, $subdir = null)
    {
        if (!empty($file_name)) {
            if ($subdir) {
                $dir .= $subdir.'/';
            }

            $file = $dir . $file_name;

            if (is_file($file) && file_exists($file)) {
                unlink($file);

                return true;
            }
        }

        return false;
    }

    /**
     * Send mail
     * @param string $to Comma-delimited string or an array of e-mail addresses
     * @param string $subject The mail subject
     * @param string $template The messsage template
     * @param array $data Array of data to be replaced in the template
     * @param string|array $cc Comma-delimited string or an array of e-mail addresses
     * @param string|array $bcc Comma-delimited string or an array of e-mail addresses
     * @param string $from The sender e-mail address
     * @return boolean
     */
    protected function send_mail($to, $subject, $template, $data = array(), $cc = null, $bcc = null, $from = null)
    {
        $mail_template = 'email_templates/'.$template.'.tpl.php';

        if ($from) {
            $this->email->from($from);
        } else {
            $this->email->from($this->config->item('send_mail_from'), $this->config->item('site_title'));
        }

        $this->email->to($to);
        $this->email->subject($subject);

        if ($cc) {
            $this->email->cc($cc);
        }

        if ($bcc) {
            $this->email->bcc($bcc);
        }

        $data['site_title'] = $this->config->item('site_title');

        if (is_file(APPPATH . 'views/' . $mail_template) && file_exists(APPPATH . 'views/' . $mail_template)) {
            $this->email->message($this->load->view($mail_template, $data, true));
        } else {
            $this->email->message(nl2br($template));
        }

        return $this->email->send();
    }

    /**
     * Check if the page is bypassed
     */
    protected function bypass()
    {
        if (in_array(uri_string(), $this->bypassUri)) {
            $this->bypass = true;
            return $this->bypass;
        }

        foreach ($this->bypassUri as $uri) {
            if (preg_match('/'.$uri.'/', uri_string())) {
                $this->bypass = true;
                return $this->bypass;
            }
        }

        return false;
    }

    /**
     * get paging information
     */
    public function calulate_paging_info($total, $cur_page, $per_page)
    {
        if ($total > $per_page) {
            $start = ($cur_page == 1) ? $cur_page : (($cur_page - 1) * $per_page) + 1;
            $end = ($cur_page * $per_page > $total) ? $total : $cur_page * $per_page;

            return $total . '件中 ' . $start .' ～ '. $end . '件目を表示中';
        } else {

            return $total . '件中 ' . $cur_page .' ～ '. $total . '件目を表示中';
        }
    }

    /**
     * Check if logged in
     * @return bool
     */
    public function is_logged_in()
    {
        return $this->ion_auth->logged_in();
    }

    /**
     * Get job flags from db or session
     * @return array
     */
    protected function get_job_flags()
    {
        return load_job_flags();
    }

    /**
     * Get hotel types from db or session
     * @return array
     */
    protected function get_hotel_types()
    {
        if ($this->session->has_userdata('hotel_types')) {
            $hotel_types = $this->session->hotel_types;
        } else {
            $hotel_types = $this->Hotel_type_model->find_all(array('sort_order' => 'asc'));
            $this->session->set_userdata('hotel_types', $hotel_types);
        }

        return $hotel_types;
    }
}
