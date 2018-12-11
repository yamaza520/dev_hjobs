<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mail_setting extends MY_AuthController
{
    private $base_dir = 'jobseeker/mypage/';

    /**
     * Constructor
     */
    public function __construct()
    {
        parent:: __construct();

        $this->load->model('Job_seeker_model');
    }

    /**
     * @route /mypage/mail-setting
     */
    public function form()
    {
        $this->page_title = 'メール配信';

        $id = $this->login_user['child']->id;
        $data['result'] = $this->login_user['child'];

        if (count($_POST)) {
            $mail_data = array (
                'mail_magazine_flag' => $this->input->post('mail_magazine'),
                'alert_mail_flag'    => $this->input->post('alert_mail'),
                'updated_at'         => date('Y-m-d H:i:s'),
            );

            if ($this->Job_seeker_model->update($id, $mail_data)) {
                $this->login_user['child'] = $this->Job_seeker_model->find_by_id($id);
                $this->session->set_userdata($this->login_user);

                redirect('mypage/mail-setting/complete');
            }
        }

        $this->_render($this->base_dir . 'mail_setting_form', $data);
    }

    /**
     * @route /mypage/mail-setting/complete
     */
    public function complete()
    {
        $this->page_title = 'メール配信設定完了';

        $this->_render($this->base_dir . 'mail_setting_complete');
    }
}
