<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Unsubscribe extends MY_AuthController
{
    private $base_dir = 'jobseeker/mypage/';

    /**
     * Constructor
     */
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('User_model');
        $this->load->library('ion_auth');
    }

    /**
     * @route /mypage/unsubscribe
     */
    public function form()
    {
        $this->page_title = '退会手続き';

        if ($this->input->get('edit')) {
            $data['unsubscribe'] = $this->session->unsubscribe;
        } else {
            $data['unsubscribe'] = array(
                'email'     => '',
                'password'  => '',
            );
        }

        if (count($_POST)) {
            $this->form_validation->set_rules('email', 'メールアドレス', 'required');
            $this->form_validation->set_rules('password', 'パスワード', 'required|callback_validate_user');

            if ($this->form_validation->run()) {
                $unsubscribe = array(
                    'email'     => $this->input->post('email'),
                    'password'  => $this->input->post('password'),
                );
                $this->session->set_userdata('unsubscribe', $unsubscribe);

                redirect($this->path . 'mypage/unsubscribe/confirm');
            } else {
                $data['message'] = validation_errors();
            }
        }

        $this->_render($this->base_dir . 'unsubscribe_form', $data);
    }

    /**
     * @route /mypage/unsubscribe/confirm
     */
    public function confirm()
    {
        $this->page_title = '退会手続き';

        if (!$this->session->has_userdata('unsubscribe')) {
            redirect($this->path . 'mypage/unsubscribe');
        }

        $unsubscribe = $this->session->unsubscribe;
        $user = $this->User_model->find_one_by(array('email' => $unsubscribe['email']));
        if (!$user) {
            show_404();
        }

        if (count($_POST) && $this->input->post('id')) {
            $this->User_model->delete($this->input->post('id'));

            redirect($this->path . 'mypage/unsubscribe/complete');
        }

        $this->_render($this->base_dir . 'unsubscribe_confirm', array('user' => $user));
    }

    /**
     * @route /mypage/unsubscribe/complete
     */
    public function complete()
    {
        $this->page_title = '退会手続き完了';

        if ($this->session->has_userdata('unsubscribe')) {
            // unset session to force logout
            $this->session->sess_destroy();
        } else {
            redirect($this->path . 'mypage/unsubscribe');
        }

        $this->_render($this->base_dir . 'unsubscribe_complete');
    }

    /**
     * Validation callback
     * @return boolean
     */
    public function validate_user()
    {
        $email = $this->input->post('email');
        $pw = $this->input->post('password');

        $user = $this->User_model->find_one_by(array('email' => $email));

        if (!$user) {
            $this->form_validation->set_message('validate_user', 'その電子メールアドレスの記録はありません。');
            return false;
        }

        if ($this->ion_auth->hash_password_db($user->id, $pw) == false) {
            $this->form_validation->set_message('validate_user', 'パスワードが間違っています。');

            return false;
        }

        return true;
    }
}
