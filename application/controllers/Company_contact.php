<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company_contact extends MY_BaseController
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent:: __construct();

        $this->load->model('Prefecture_model');
        $this->load->model('Enquiry_model');
    }

    /**
     * @route /company_contact/form
     */
    public function form()
    {
        $this->page_title = '掲載をご希望の企業様へ';
        $this->header_message = $this->page_title;

        if (count($_POST)) {
            $this->form_validation->set_rules('company', '会社名', 'required');
            $this->form_validation->set_rules('first_name', '姓', 'required');
            $this->form_validation->set_rules('last_name', '名', 'required');
            $this->form_validation->set_rules('zipcode', '郵便番号', 'required');
            $this->form_validation->set_rules('pref_cd', '都道府県', 'required');
            $this->form_validation->set_rules('city', '市区町村', 'required');
            $this->form_validation->set_rules('address', '番地・建物名', 'required');
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email');
            $this->form_validation->set_rules('phone', '電話番号', 'required');
            $this->form_validation->set_rules('content', 'お問い合わせ内容', 'required');

            if ($this->form_validation->run()) {
                $pref = $this->Prefecture_model->find_one_by(array('pref_cd' => $this->input->post('pref_cd')));
                $company_contact = array (
                    'company'           => $this->input->post('company'),
                    'first_name'        => $this->input->post('first_name'),
                    'last_name'         => $this->input->post('last_name'),
                    'zipcode'           => $this->input->post('zipcode'),
                    'pref_cd'           => $this->input->post('pref_cd'),
                    'pref_name'         => $pref->name,
                    'city'              => $this->input->post('city'),
                    'address'           => $this->input->post('address'),
                    'email'             => $this->input->post('email'),
                    'phone'             => $this->input->post('phone'),
                    'content'           => $this->input->post('content'),
                );
                $this->session->set_userdata('company_enquiry', $company_contact);

                redirect($this->path . 'company-contact/confirm');
            } else {
                $data['message'] = validation_errors();
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

        $data['prefectures'] = $this->Prefecture_model->find_all_for_dropdown(' 都道府県を選択 ');

        $this->_render('company_contact/form', $data);
    }

    /**
     * @route /company_contact/confirm
     */
    public function confirm()
    {
        $this->page_title = '掲載をご希望の企業様へ';

        if (!$this->session->has_userdata('company_enquiry')) {
            redirect($this->path . 'company-contact/form');
        }

        $company_contact = $this->session->company_enquiry;
        $data['company_contact'] = $company_contact;

        if (count($_POST)) {
            $company_data = array(
                'type'              => 'company',
                'company'           => $company_contact['company'],
                'first_name'        => $company_contact['first_name'],
                'last_name'         => $company_contact['last_name'],
                'zip_code'          => $company_contact['zipcode'],
                'pref_cd'           => $company_contact['pref_cd'],
                'city'              => $company_contact['city'],
                'address'           => $company_contact['address'],
                'email'             => $company_contact['email'],
                'phone'             => $company_contact['phone'],
                'content'           => $company_contact['content'],
            );

            if ($this->Enquiry_model->insert($company_data)) {
                $pref = $this->Prefecture_model->find_one_by(['pref_cd' => $company_data['pref_cd']]);

                $to = $this->config->item('admin_email');
                $from =  $company_data['email'];
                $company_data = array_merge($company_data, ['pref' => $pref->name]);

                $this->send_mail($to, '【HOTELIER JOBS】掲載をご希望の企業様からお問い合わせがありました', 'company_contact', $company_data, null, null, $from);
            }

            redirect($this->path . 'company-contact/complete');
        }

        $this->_render('company_contact/confirm', $data);
    }

    /**
     * @route /company_contact/complete
     */
    public function complete()
    {
        $this->page_title = '掲載をご希望の企業様へ';

        if ($this->session->has_userdata('company_enquiry')) {
            // unset session
            $this->session->unset_userdata('company_enquiry');
        } else {
            redirect($this->path . 'company-contact');
        }

        $this->_render('company_contact/complete');
    }
}
