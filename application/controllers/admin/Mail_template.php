<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mail_template extends MY_AdminController
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('pagination');
        $this->load->model('Mail_template_model');
        $this->load->model('Job_seeker_model');
        $this->load->model('Mail_magazine_model');
    }

    /**
     * @route /admin/mail_template
     */
    public function index()
    {
        $this->page_title = 'メールテンプレート一覧';

        // For pagination configuration
        $pager_config = $this->getPagerConfig(array('page_name' => 'admin-mail-template-listing'));

        $result = $this->Mail_template_model->find_all(array('created_at' => 'DESC'), $pager_config);
        $data['result'] = $result['data'];

        $pager_config['total_rows'] = $result['meta']['total'];
        $this->pagination->initialize($pager_config);
        $data['pagination'] = $this->pagination->create_links();
        $data['total_count'] = $result['meta']['total'];

        $this->_render('mail_template/index', $data);
    }

    /**
     * @route /admin/mail_template/setup/(:num)
     */
    public function setup($id = 0)
    {
        if (empty($id)) {
            $this->page_title = 'メールテンプレート登録';
            $data['result']   = (object) array (
                'id'      => '',
                'name'    => '',
                'subject' => '',
                'text'    => '',
            );
        } else {
            $this->page_title = 'メールテンプレート変更';
            $data['result']   = $this->Mail_template_model->find_by_id($id);
            if (!$data['result']) {
                show_404();
            }
        }

        if (count($_POST)) {
            $this->form_validation->set_rules('name', 'テンプレート名', 'required');
            $this->form_validation->set_rules('subject', '件名', 'required');
            $this->form_validation->set_rules('text', '文章', 'required');

            if ($this->form_validation->run()) {
                $id   = $this->input->post('id');
                $data = array(
                    'name'    => $this->input->post('name'),
                    'subject' => $this->input->post('subject'),
                    'text'    => $this->input->post('text')
                );

                if ($id) {
                    $data['updated_at'] = date('Y-m-d H:i:s');
                    $this->Mail_template_model->update($id, $data);
                } else {
                    $this->Mail_template_model->insert($data);
                }
                redirect($this->path . 'mail_template');
            }
        }

        $this->_render('mail_template/setup', $data);
    }

    /**
     * @route POST /admin/mail_template/delete
     */
    public function delete()
    {
        $id = $this->input->post('id');
        if ($id) {
            $this->Mail_template_model->delete($this->input->post('id'));
            redirect($this->path . 'mail_template');
        } else {
            show_error('Invalid argument.', 400);
        }
    }

    /**
     * @route POST /admin/mail_template/send
     */
    public function send()
    {
        $id = $this->input->post('id');

        $mail_template = $this->Mail_template_model->find_by_id($id);
        if (!$mail_template) {
            show_error('Not found mail_template', 400);
        }

        $jobseekers = $this->Job_seeker_model->search(array('mail_magazine_flag' => 1, 'active' => 1));
        if ($id) {
            foreach ($jobseekers as $jobseeker) {
                $name       = $jobseeker->last_name . ' ' . $jobseeker->first_name;
                $greeting   = empty(trim($name)) ? $jobseeker->email : $name .'様';
                $message    = $greeting . "\n\n" . $mail_template->text;

                if ($this->send_mail($jobseeker->email, $mail_template->subject, $message)) {
                    $this->Mail_magazine_model->insert(array(
                        'job_seeker_id' => $jobseeker->id,
                        'mail_template_id' => $id,
                        'email'         => $jobseeker->email,
                        'subject'       => $mail_template->subject,
                        'message'       => $message,
                        'sent_at'       => date('Y-m-d H:i:s'),
                    ));
                }
            }

            redirect($this->path . 'mail_template');
        } else {
            show_error('Invalid argument.', 400);
        }
    }
}
