<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resume extends MY_AuthController
{
    private $base_dir = 'jobseeker/mypage/';

    /**
     * Constructor
     */
    public function __construct()
    {
        parent:: __construct();

        $this->load->library('upload');
        $this->load->model('Job_seeker_model');
        $this->load->model('Working_history_model');
        $this->load->model('Education_history_model');
        $this->load->model('Prefecture_model');
        $this->load->model('Work_summary_history_model');
        $this->load->model('Certification_history_model');
    }

    /**
     * @route /mypage/resume
     */
    public function index()
    {
        $this->page_title = '履歴書・職務経歴書印刷';

        $this->_render($this->base_dir . 'resume');
    }

    /**
     * @route /mypage/resume/career/form
     */
    public function career_form()
    {
        $this->page_title = '職務経歴書入力・編集';

        $id = $this->login_user['child']->id;
        $jobseeker = $this->Job_seeker_model->find_by_id($id);
        if (empty($jobseeker)) {
            show_404();
        }

        if ($this->input->get('edit')) {
            $data['resume'] = $this->session->resume_career_history;
        } else {
            $data['resume'] = array (
                'summary'          => $jobseeker->summary,
                'useful_knowledge' => $jobseeker->useful_knowledge,
            );
        }

        if (count($_POST)) {
            $this->form_validation->set_rules('summary', '姓', 'required');
            $this->form_validation->set_rules('useful_knowledge', '名', 'required');

            if ($this->form_validation->run()) {
                $resume = array (
                    'summary'           => $this->input->post('summary'),
                    'useful_knowledge'  => $this->input->post('useful_knowledge'),
                );

                $this->session->set_userdata('resume_career_history', $resume);

                redirect('mypage/resume/career/confirm');
            } else {
                $data['message'] = validation_errors();
            }
        }

        $data['job_seeker'] = $jobseeker;
        $data['result'] = $this->Working_history_model->search(array('job_seeker_id' => $id), array('created_at' => 'DESC'), null);

        $this->_render($this->base_dir . 'resume_career_form', $data);
    }

    /**
     * @route /mypage/resume/career/confirm
     */
    public function career_confirm()
    {
        $this->page_title = '職務経歴書入力・編集 確認';

        if (!$this->session->has_userdata('resume_career_history')) {
            redirect($this->path . 'mypage/resume/career/form');
        }

        $id = $this->login_user['child']->id;
        $jobseeker = $this->Job_seeker_model->find_by_id($id);
        if (empty($jobseeker)) {
            show_404();
        }

        $resume = $this->session->resume_career_history;

        if (count($_POST)) {
            $jobseeker_data = array(
                'summary'           => $resume['summary'],
                'useful_knowledge'  => $resume['useful_knowledge'],
                'updated_at'        => date('Y-m-d H:i:s'),

            );

            // update jobseeker with login user id
            $this->Job_seeker_model->update($id, $jobseeker_data);

            redirect('mypage/resume/career/complete');
        }

        $data['resume'] = $resume;
        $data['job_seeker'] = $jobseeker;
        $data['result'] = $this->Working_history_model->search(array('job_seeker_id' => $id), array('created_at' => 'DESC'));

        $this->_render($this->base_dir . 'resume_career_confirm', $data);
    }

    /**
     * @route /mypage/resume/career/complete
     */
    public function career_complete()
    {
        $this->page_title = '職務経歴書入力・編集 完了';

        if ($this->session->has_userdata('resume_career_history')) {
            // unset session
            $this->session->unset_userdata('resume_career_history');
        } else {
            redirect($this->path . 'mypage/resume/career/form');
        }

        $this->_render($this->base_dir . 'resume_career_complete');
    }

    /**
     * @route /mypage/resume/personal/form
     */
    public function personal_form()
    {
        $this->page_title = '履歴書入力・編集';
        $id = $this->login_user['child']->id;
        $jobseeker = $this->Job_seeker_model->find_by_id($id);
        if (empty($jobseeker)) {
            show_404();
        }

        list($years, $months, $days) = get_years_months_days(1970, 0);
        $data['years']       = $years;
        $data['months']      = $months;
        $data['prefectures'] = $this->Prefecture_model->find_all_for_dropdown('--');
        $data['job_seeker']  = $jobseeker;

        if ($this->input->get('edit')) {
            $data['resume_personal'] = $this->session->resume_personal;
        } else {
            $empty_array = array(
                    'from_year'     => '',
                    'from_month'    => '',
                    'description'   => '',
                );

            $data['resume_personal'] = (array) $jobseeker;
            // for education history
            $education_history = $this->Education_history_model->find_by(array('job_seeker_id' => $id));
            if (count($education_history)) {
                foreach ($education_history as $value) {
                    $data['resume_personal'] ['education_history'][] = (array) $value;
                }
            } else {
                $data['resume_personal'] ['education_history'][] = $empty_array;
            }

            // for working_history
            $work_summary_history = $this->Work_summary_history_model->find_by(array('job_seeker_id' => $id));
            if (count($work_summary_history)) {
                foreach ($work_summary_history as $value) {
                    $data['resume_personal'] ['work_summary_history'][] = (array) $value;
                }
            } else {
                $data['resume_personal'] ['work_summary_history'][] = $empty_array;
            }

            // for certification
            $certification_history = $this->Certification_history_model->find_by(array('job_seeker_id' => $id));
            if (count($certification_history)) {
                foreach ($certification_history as $value) {
                    $data['resume_personal'] ['certification_history'][] = (array) $value;
                }
            } else {
                $data['resume_personal'] ['certification_history'][] = $empty_array;
            }
        }

        $this->_render($this->base_dir . 'resume_personal_form', $data);
    }

    /**
     * @route /mypage/resume/personal_set_session
     */
    public function personal_set_session()
    {
        $id = $this->login_user['child']->id;
        // $jobseeker = $this->Job_seeker_model->find_by_id($id);

        $this->form_validation->set_rules('motivation', '志望動機', 'required');
        $this->form_validation->set_rules('hobby', '趣味・特技', 'required');
        $this->form_validation->set_rules('request', '本人希望欄', 'required');
        $this->form_validation->set_rules('nearest_station', '最寄駅', 'required');
        $this->form_validation->set_rules('dependents', '扶養家族の人数', 'required');
        $this->form_validation->set_rules('spouse_support', '配偶者の扶養義務', 'required');
        $file_upload_flag = false;
        $upload_success_flag = true;

        if ($this->form_validation->run()) {
            // for image upload process
            $this->upload->initialize($this->get_upload_options('photo_upload_path', 'tmp'));
            if (!empty($_FILES['face_photo']['name'])){
                if ($this->upload->do_upload('face_photo')) {
                    $upload_info = $this->upload->data();
                    $file_upload_flag = true;
                } else {
                    $upload_success_flag = false;
                    $file_upload_msg = $this->upload->display_errors();
                }
            }

            $file_name = $this->input->post('photo');
            $photo_url = $this->config->item('photo_upload_path'). $id .'/'.$file_name;
            if ($upload_success_flag == true) {
                if ($file_upload_flag) {
                    //set new uploaded file name
                    $file_name = $upload_info['file_name'];
                    $photo_url = $this->config->item('photo_upload_path').'tmp/'.$file_name;
                }
            }

            $resume_personal = array (
                'rel_zip_code'      => $this->input->post('rel_zip_code'),
                'rel_pref_cd'       => $this->input->post('rel_pref_cd'),
                'rel_city'          => $this->input->post('rel_city'),
                'rel_address'       => $this->input->post('rel_address'),
                'motivation'        => $this->input->post('motivation'),
                'hobby'             => $this->input->post('hobby'),
                'request'           => $this->input->post('request'),
                'nearest_station'   => $this->input->post('nearest_station'),
                'dependents'        => $this->input->post('dependents'),
                'spouse_support'    => $this->input->post('spouse_support'),
                'photo'             => $file_name,
                'photo_url'         => $photo_url,
            );

            // set education history
            $edu_id        = $this->input->post('edu_id');
            $from_year     = $this->input->post('edu_year');
            $from_month    = $this->input->post('edu_month');
            $description   = $this->input->post('edu_description');
            $edu_history = array();
            foreach ($description as $i => $value) {
                $edu_history[] = array(
                    'id'                    => $edu_id[$i],
                    'job_seeker_id'         => $id,
                    'from_year'             => $from_year[$i],
                    'from_month'            => $from_month[$i],
                    'description'           => $description[$i],
                );
            }
            $resume_personal['education_history'] = $edu_history;

            // set working history
            $work_id        = $this->input->post('work_id');
            $from_year      = $this->input->post('work_year');
            $from_month     = $this->input->post('work_month');
            $description    = $this->input->post('work_description');
            $working_history = array();
            foreach ($description as $i => $value) {
                $working_history[] = array(
                    'id'                    => $work_id[$i],
                    'job_seeker_id'         => $id,
                    'from_year'             => $from_year[$i],
                    'from_month'            => $from_month[$i],
                    'description'           => $description[$i],
                );
            }
            $resume_personal['work_summary_history'] = $working_history;

            // set certification history
            $certi_id       = $this->input->post('certi_id');
            $from_year      = $this->input->post('certi_year');
            $from_month     = $this->input->post('certi_month');
            $description    = $this->input->post('certi_description');
            $certi_history = array();
            foreach ($description as $i => $value) {
                $certi_history[] = array(
                    'id'                    => $certi_id[$i],
                    'job_seeker_id'         => $id,
                    'from_year'             => $from_year[$i],
                    'from_month'            => $from_month[$i],
                    'description'           => $description[$i],
                );
            }
            $resume_personal['certification_history'] = $certi_history;
            $this->session->set_userdata('resume_personal', $resume_personal);

            echo json_encode(array(
                'success' => true,
                'url' => base_url($this->path . 'mypage/resume/personal/confirm'),
            ));
        } else {
            echo json_encode(array(
                'success' => false,
                'msg' => validation_errors(),
            ));
        }
    }

    /**
     * @route /mypage/resume/personal/confirm
     */
    public function personal_confirm()
    {
        $this->page_title = '履歴書入力・編集 確認';
        if (!$this->session->has_userdata('resume_personal')) {
            redirect($this->path . 'mypage/resume/personal/form');
        }

        $resume_personal = $this->session->resume_personal;
        $id = $this->login_user['child']->id;

        $data['job_seeker'] = $this->Job_seeker_model->find_by_id($id);
        $data['resume_personal'] = $resume_personal;

        if (count($_POST)) {
            $education_history      = $resume_personal['education_history'];
            $working_history        = $resume_personal['work_summary_history'];
            $certification_history  = $resume_personal['certification_history'];
            $upload_path = $this->config->item('photo_upload_path'). $id;

            if (!is_dir($upload_path)) {
                mkdir($upload_path, 0777, true);
            }
            // move image to $image_fileupload folder
            rename($resume_personal['photo_url'], $upload_path. '/' .$resume_personal['photo']);

            unset($resume_personal['education_history']);
            unset($resume_personal['work_summary_history']);
            unset($resume_personal['certification_history']);
            unset($resume_personal['photo_url']);

            $this->Job_seeker_model->update($id, $resume_personal);

            // Create/Update education_history
            $this->Education_history_model->remove_and_insert($id, $education_history);

            // Create/Update work_summary_history
            $this->Work_summary_history_model->remove_and_insert($id, $working_history);

            // Create/Update certification
            $this->Certification_history_model->remove_and_insert($id, $certification_history);

            redirect('mypage/resume/personal/complete');
        }

        $this->_render($this->base_dir . 'resume_personal_confirm', $data);
    }

    /**
     * @route /mypage/resume/personal/complete
     */
    public function personal_complete()
    {
        $this->page_title = '履歴書入力・編集 完了';

        $this->_render($this->base_dir . 'resume_personal_complete');
    }

    /**
     * @route /mypage/resume/personal_pdf
     */
    public function personal_pdf()
    {
        $this->load->library('Pdf');

        $id = $this->login_user['child']->id;
        $jobseeker = $this->Job_seeker_model->find_by_id($id);
        if ($jobseeker->profile_status != 0) {
            $education_history = $this->Education_history_model->find_by(array('job_seeker_id' => $id));
            $work_summary_history = $this->Work_summary_history_model->find_by(array('job_seeker_id' => $id));
            $certification_history = $this->Certification_history_model->find_by(array('job_seeker_id' => $id));

            $data['jobseeker'] = $jobseeker;
            $data['education_history'] = $education_history;
            $data['work_summary_history'] = $work_summary_history;
            $data['certification_history'] = $certification_history;

            // create new PDF document
            $this->pdf->setHtml($this->load->view('pdf_templates/personal.tpl.php', $data, true));
            $this->pdf->download('psersonal_resume');
        } else {
            show_404();
        }
    }

    /**
     * @route /mypage/resume/career_pdf
     */
    public function career_pdf()
    {
        $this->load->library('Pdf');

        $id = $this->login_user['child']->id;
        $jobseeker = $this->Job_seeker_model->find_by_id($id);
        if ($jobseeker->profile_status > 1) {
            $working_history = $this->Working_history_model->search(array('job_seeker_id' => $id));
            $data['jobseeker'] = $jobseeker;
            $data['working_history'] = $working_history;

            // create new PDF document
            $this->pdf->setHtml($this->load->view('pdf_templates/career.tpl.php', $data, true));
            $this->pdf->download('carrer_resume');
        } else {
            show_404();
        }
    }
}
