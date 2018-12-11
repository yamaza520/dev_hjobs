<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends MY_BaseController
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('Enquiry_model');
    }

    /**
     * @route /contact/form
     */
    public function form()
    {
        $this->page_title = 'お問い合わせ';
        $this->header_message = $this->page_title;

        if (count($_POST)) {
            $this->form_validation->set_rules('first_name', '姓', 'required');
            $this->form_validation->set_rules('last_name', '名', 'required');
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email');
            $this->form_validation->set_rules('phone', '電話番号', 'required');
            $this->form_validation->set_rules('content', 'お問い合わせ内容', 'required');

            if ($this->form_validation->run()) {
                $enquiry_data = array (
                    'first_name'        => $this->input->post('first_name'),
                    'last_name'         => $this->input->post('last_name'),
                    'email'             => $this->input->post('email'),
                    'phone'             => $this->input->post('phone'),
                    'content'           => $this->input->post('content'),
                );

                $this->session->set_userdata('individual_enquiry', $enquiry_data);

                redirect('contact/confirm');
            }
        }

        $data = array(
            'first_name'    => '',
            'last_name'     => '',
            'email'         => '',
            'phone'         => '',
        );

        if (ab_logged_in()) {
            $data = array(
                'first_name'    => $this->login_user['first_name'],
                'last_name'     => $this->login_user['last_name'],
                'email'         => $this->login_user['email'],
                'phone'         => $this->login_user['phone'],
            );
        }

        $this->_render('contact/form', $data);
    }

    /**
     * @route /contact/confirm
     */
    public function confirm()
    {
        $this->page_title = 'お問い合わせ';

        if (!$this->session->has_userdata('individual_enquiry')) {
            redirect('contact');
        }

        $enquiry = $this->session->individual_enquiry;
        $data['enquiry'] = $enquiry;

        if (count($_POST)) {
            // add to enquiry table
            $enquiry_data = array(
                'type'          => 'individual',
                'first_name'    => $enquiry['first_name'],
                'last_name'     => $enquiry['last_name'],
                'email'         => $enquiry['email'],
                'phone'         => $enquiry['phone'],
                'content'       => $enquiry['content'],
            );

            if ($this->Enquiry_model->insert($enquiry_data)) {
                $to = $this->config->item('admin_email');
                $from =  $enquiry_data['email'];
                $this->send_mail($to, '【HOTELIER JOBS】お問い合わせがありました', 'contact', $enquiry_data, null, null, $from);
            }

            redirect('contact/complete');
        }

        $this->_render('contact/confirm', $data);
    }

    /**
     * @route /contact/complete
     */
    public function complete()
    {
        $this->page_title = 'お問い合わせ';

        if ($this->session->has_userdata('individual_enquiry')) {
            $this->session->unset_userdata('individual_enquiry');
        } else {
            redirect('contact');
        }

        $this->_render('contact/complete');
    }
}
