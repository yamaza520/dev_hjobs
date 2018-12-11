<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * AuthController
 * Front-end Auth controller
 */
class MY_AuthController extends MY_BaseController
{
    protected $authorized = true;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();

        if (!$this->bypass()) {
            $this->session->set_userdata('last_url', uri_string());
        }

        if (uri_string() != 'login') {
            $this->_is_login();
        }
    }

    /**
     * Check if user is logged-in
     */
    protected function _is_login()
    {
        $this->bypass();

        if ($this->bypass) {
            return true;
        }

        if (!$this->ion_auth->logged_in()) {
            redirect('login');
        }
    }
}
