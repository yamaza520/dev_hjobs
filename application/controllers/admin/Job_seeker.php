<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job_seeker extends MY_AdminController
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent:: __construct();

        $this->load->library('upload');
        $this->load->library('pagination');
        $this->load->model('Prefecture_model');
        $this->load->model('Education_history_model');
        $this->load->model('Work_summary_history_model');
        $this->load->model('Certification_history_model');
        $this->load->model('Job_seeker_model');
        $this->load->model('Working_history_model');
        $this->load->model('Industory_l_model');
        $this->load->model('Industory_m_model');
        $this->load->model('Job_category_l_model');
        $this->load->model('Job_category_m_model');
        $this->load->model('Job_category_s_model');
    }

    /**
     * @route /admin/job_seeker
     */
    public function index()
    {
        $this->page_title = '会員一覧';

        // For pagination configuration
        $pager_config = $this->getPagerConfig();

        $result = $this->Job_seeker_model->find_all(array(), $pager_config);
        $data['result'] = $result['data'];

        $pager_config['total_rows'] = $result['meta']['total'];
        $this->pagination->initialize($pager_config);
        $data['pagination'] = $this->pagination->create_links();
        $data['total_count'] = $result['meta']['total'];

        $this->_render('job_seeker/index', $data);
    }

    /**
     * @route /admin/job_seeker/setup/(:num)
     */
    public function setup($id = 0)
    {
        $this->page_title    = '会員変更';

        list($data['byears'], $data['bmonths'], $data['bdays']) = get_years_months_days(1970);
        list($data['years'], $data['months'], $data['days'])    = get_years_months_days(1970, 0);

        $data['last_education_cd']        = array('' => '--') + $this->config->item('school_type');
        $data['degree_status']            = array('' => '--') + $this->config->item('degree_status');
        $data['literature_type']          = array('' => '--') + $this->config->item('literature_type');
        $data['change_work_count']        = array('' => '--') + array_combine($c = range(1, 10), $c);
        $career_history                   = (array) $this->Job_seeker_model->find_by_id($id);
        $career_history['graduate_year']  = empty($career_history['graduate_ym']) ? '' : substr($career_history['graduate_ym'], 0, 4);
        $career_history['graduate_month'] = empty($career_history['graduate_ym']) ? '' : substr($career_history['graduate_ym'], 4);
        $data['career_history']           = $career_history;
        $data['prefectures']              = $this->Prefecture_model->find_all_for_dropdown('--');
        $data['english_level']            = $this->config->item('english_level');
        $data['result']                   = $this->Job_seeker_model->find_by_id($id);

        if (!$data['result']) {
            show_404();
        }

        $tables = $this->config->item('tables','ion_auth');

        if (count($_POST)) {
            $this->form_validation->set_rules('last_name', '名', 'required');
            $this->form_validation->set_rules('first_name', '姓', 'required');
            $this->form_validation->set_rules('last_name_kana', 'メイ', 'required');
            $this->form_validation->set_rules('first_name_kana', 'セイ', 'required');
            $this->form_validation->set_rules('gender', '性別', 'required');
            $this->form_validation->set_rules('birth_year', '生年月日(年)', 'required|numeric');
            $this->form_validation->set_rules('birth_month', '生年月日(月)', 'required|numeric');
            $this->form_validation->set_rules('birth_day', '生年月日(日)', 'required|numeric');
            $this->form_validation->set_rules('email', 'メールアドレス', 'required|valid_email|unique_non_deleted[' . $tables['users'] . '.email.' . $data['result']->user_id.']');
            // $this->form_validation->set_rules('password', 'required|password_checker['.$this->input->post('email').','.$this->input->post('password').']|matches[confirm_password]');
            // $this->form_validation->set_rules('confirm_password', 'パスワード（確認）', 'required');
            $this->form_validation->set_rules('phone', '電話番号', 'required');
            $this->form_validation->set_rules('pref_cd', '都道府県', 'required');
            $this->form_validation->set_rules('is_working', '現在の勤務状況', 'required');
            $this->form_validation->set_rules('marital_status', '既婚 / 未婚', 'required');
            // $this->form_validation->set_rules('rel_zip_code', '連絡先(〒)', 'required');
            // $this->form_validation->set_rules('rel_pref_cd', '連絡先(都道府県)', 'required');
            // $this->form_validation->set_rules('rel_city', '連絡先(市区町村)', 'required');
            // $this->form_validation->set_rules('rel_address', '連絡先(番地・建物名)', 'required');
            // $this->form_validation->set_rules('nearest_station', '最寄駅', 'required');
            // $this->form_validation->set_rules('dependents', '扶養家族の人数', 'required');
            // $this->form_validation->set_rules('spouse_support', '配偶者の扶養義務', 'required');
            // $this->form_validation->set_rules('last_education_cd', '最終学歴', 'required');
            // $this->form_validation->set_rules('graduate_year', '卒業区分(年)', 'required');
            // $this->form_validation->set_rules('graduate_month', '卒業区分(月)', 'required');
            // $this->form_validation->set_rules('graduate_cd', '卒業区分', 'required');
            // $this->form_validation->set_rules('school_name', '学校名', 'required');
            // $this->form_validation->set_rules('literature_type', '文理区分', 'required');
            // $this->form_validation->set_rules('change_work_count', '転職回数', 'required');
            // $this->form_validation->set_rules('summary', '経歴要約', 'required');
            // $this->form_validation->set_rules('useful_knowledge', '活かせる経験・知識', 'required');
            // $this->form_validation->set_rules('motivation', '志望動機', 'required');
            // $this->form_validation->set_rules('hobby', '趣味・特技', 'required');
            // $this->form_validation->set_rules('request', '本人希望欄', 'required');

            if ($this->form_validation->run()) {
                $id         = $this->input->post('id');
                $prefecture = $this->Prefecture_model->find_one_by(array('pref_cd' => $this->input->post('pref_cd')));
                $user = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name'  => $this->input->post('last_name'),
                    'email'      => $this->input->post('email'),
                    // 'password'   => $this->input->post('password'),
                    'phone'      => $this->input->post('phone'),
                );

                $result  = $this->Job_seeker_model->find_one_by(array('id'=> $id));
                $user_id = $this->ion_auth->update($result->user_id, $user);

                if ($user_id) {
                    $job_seeker = array(
                        'user_id'                => $result->user_id,
                        'first_name_kana'        => $this->input->post('first_name_kana'),
                        'last_name_kana'         => $this->input->post('last_name_kana'),
                        'gender'                 => $this->input->post('gender'),
                        'mail_address'           => $this->input->post('email'),
                        'birthdate'              => $this->input->post('birth_year') . '-' . $this->input->post('birth_month') . '-' . $this->input->post('birth_day'),
                        'phone_number'           => $this->input->post('phone'),
                        'zip_code'               => $this->input->post('zip_code'),
                        'pref_cd'                => $this->input->post('pref_cd'),
                        'city'                   => $this->input->post('city'),
                        'marital_status'         => $this->input->post('marital_status'),
                        'mail_magazine_flag'     => $this->input->post('mail_magazine_flag'),
                        'alert_mail_flag'        => $this->input->post('alert_mail_flag'),
                        'rel_zip_code'           => $this->input->post('rel_zip_code'),
                        'rel_pref_cd'            => $this->input->post('rel_pref_cd'),
                        'rel_city'               => $this->input->post('rel_city'),
                        'rel_address'            => $this->input->post('rel_address'),
                        'nearest_station'        => $this->input->post('nearest_station'),
                        'dependents'             => $this->input->post('dependents'),
                        'spouse_support'         => $this->input->post('spouse_support'),
                        'reason_for_change_work' => $this->input->post('reason_for_change_work'),
                        'pr'                     => $this->input->post('pr'),
                        'last_education_cd'      => $this->input->post('last_education_cd'),
                        'graduate_ym'            => $this->input->post('graduate_year') . $this->input->post('graduate_month'),
                        'graduate_cd'            => $this->input->post('graduate_cd'),
                        'literature_type'        => $this->input->post('literature_type'),
                        'school_name'            => $this->input->post('school_name'),
                        'is_working'             => $this->input->post('is_working'),
                        'current_job'            => $this->input->post('current_job'),
                        'change_work_count'      => $this->input->post('change_work_count'),
                        'summary'                => $this->input->post('summary'),
                        'useful_knowledge'       => $this->input->post('useful_knowledge'),
                        'english_level'          => $this->input->post('english_level'),
                        'toeic'                  => $this->input->post('toeic'),
                        'other_language'         => $this->input->post('other_language'),
                        'motivation'             => $this->input->post('motivation'),
                        'hobby'                  => $this->input->post('hobby'),
                        'request'                => $this->input->post('request'),
                        'updated_at'             => date('Y-m-d H:i:s'),
                    );

                    $this->Job_seeker_model->update($id, $job_seeker);
                }

                redirect($this->path . 'job_seeker');
            }
        }

        $this->_render('job_seeker/setup', $data);
    }

    /**
     * @route POST /admin/job_seeker/delete
     */
    public function delete()
    {
        $id = $this->input->post('id');
        if ($id) {
            $result = $this->Job_seeker_model->find_by_id($id);
            if ($result) {
                if ($this->Job_seeker_model->delete($id) && $this->User_model->delete($result->user_id)) {
                    redirect($this->path . 'job_seeker');
                } else {
                    show_error('Failed to delete', 500);
                }
            }
        }

        show_error('Invalid argument.', 400);
    }

    /**
     * Education listing by job_seeker_id
     * @route /admin/job_seeker/setup/{job_seeker_id}/education
     */
    public function education($job_seeker_id)
    {
        $this->page_title = '学歴';

        $data['result']        = $this->Job_seeker_model->find_by_id($job_seeker_id);
        $data['months']        = array('' => '--') + array_combine($m = range(1, 12), $m);
        $data['education']     = $this->Education_history_model->find_by(array('job_seeker_id' => $job_seeker_id));
        $data['job_seeker_id'] = $job_seeker_id;

        $this->_render('job_seeker/education', $data);
    }

    /**
     * Add education by $job_seeker_id
     * @param int $job_seeker_id The job seeker ID
     */
    public function add_education($job_seeker_id)
    {
        header('Content-Type: application/json');

        $this->form_validation->set_rules('from_year', '期間 年', 'required|numeric|min_length[4]');
        $this->form_validation->set_rules('from_month', '期間 月', 'required');
        $this->form_validation->set_rules('description', '学歴・職歴', 'required');

        if ($this->form_validation->run()) {
            $education_id = $this->input->post('id');
            $education = array(
                'job_seeker_id' => $job_seeker_id,
                'from_year'     => $this->input->post('from_year'),
                'from_month'    => $this->input->post('from_month'),
                'description'   => $this->input->post('description'),
            );

            if (!empty($education_id)) {
                $this->Education_history_model->update($education_id, $education);
            } else {
                $this->Education_history_model->insert($education);
            }

            $data = array('success' => true, 'msg' => '');
        } else {
            $data = array('success' => false, 'msg' => validation_errors());
        }

        echo json_encode($data);
    }

    /**
     * POST delete education
     * @param int $job_seeker_id The job seeker ID
     */
    public function delete_education($job_seeker_id)
    {
        if ($this->input->post('id') && $this->input->post('confirm') == 'yes') {
            if ($this->Education_history_model->delete($this->input->post('id'), $job_seeker_id)) {
                // redirect them back to the education list page
                redirect(sprintf('admin/job_seeker/setup/'.$job_seeker_id.'/education'));
            }
        } else {
            show_error('Invalid arguments', 400);
        }
    }
    /**
     * work-summary listing by job_seeker_id
     * @route /admin/job_seeker/setup/{job_seeker_id}/work_summary
     */
    public function work_summary($job_seeker_id)
    {
        $this->page_title = '職歴';

        $data['result']    = $this->Job_seeker_model->find_by_id($job_seeker_id);
        $data['months']    = array('' => '--') + array_combine($m = range(1, 12), $m);
        $data['works']     = $this->Work_summary_history_model->find_by(array('job_seeker_id' => $job_seeker_id));
        $data['job_seeker_id'] = $job_seeker_id;

        $this->_render('job_seeker/work_summary', $data);
    }

    /**
     * Add education by $job_seeker_id
     * @param int $job_seeker_id The job seeker ID
     */
    public function add_work_summary($job_seeker_id)
    {
        header('Content-Type: application/json');

        $this->form_validation->set_rules('from_year', '期間 年', 'required|numeric|min_length[4]');
        $this->form_validation->set_rules('from_month', '期間 月', 'required');
        $this->form_validation->set_rules('description', '学歴・職歴', 'required');

        if ($this->form_validation->run()) {
            $work_id = $this->input->post('id');
            $work = array(
                'job_seeker_id' => $job_seeker_id,
                'from_year'     => $this->input->post('from_year'),
                'from_month'    => $this->input->post('from_month'),
                'description'   => $this->input->post('description'),
            );

            if (!empty($work_id)) {
                $this->Work_summary_history_model->update($work_id, $work);
            } else {
                $this->Work_summary_history_model->insert($work);
            }

            $data = array('success' => true, 'msg' => '');
        } else {
            $data = array('success' => false, 'msg' => validation_errors());
        }

        echo json_encode($data);
    }

    /**
     * POST delete work_summary
     * @param int $job_seeker_id The job seeker ID
     */
    public function delete_work_summary($job_seeker_id)
    {
        if ($this->input->post('id') && $this->input->post('confirm') == 'yes') {
            if ($this->Work_summary_history_model->delete($this->input->post('id'), $job_seeker_id)) {
                // redirect them back to the working_summary list page
                redirect(sprintf('admin/job_seeker/setup/'.$job_seeker_id.'/work_summary'));
            }
        } else {
            show_error('Invalid arguments', 400);
        }
    }

    /**
     * License or certification listing by job_seeker_id
     * @route /admin/job_seeker/setup/{job_seeker_id}/certification
     */
    public function certification($job_seeker_id)
    {
        $this->page_title = '免許・資格';

        $data['result']        = $this->Job_seeker_model->find_by_id($job_seeker_id);
        $data['months']        = array('' => '--') + array_combine($m = range(1, 12), $m);
        $data['certification'] = $this->Certification_history_model->find_by(array('job_seeker_id' => $job_seeker_id));
        $data['job_seeker_id'] = $job_seeker_id;

        $this->_render('job_seeker/certification', $data);
    }

    /**
     * Add license or certification by $job_seeker_id
     * @param int $job_seeker_id The job seeker ID
     */
    public function add_certification($job_seeker_id)
    {
        header('Content-Type: application/json');

        $this->form_validation->set_rules('from_year', '期間 年', 'required|numeric|min_length[4]');
        $this->form_validation->set_rules('from_month', '期間 月', 'required');
        $this->form_validation->set_rules('description', '免許・資格', 'required');

        if ($this->form_validation->run()) {
            $certification_id = $this->input->post('id');
            $certifications = array(
                'job_seeker_id' => $job_seeker_id,
                'from_year'     => $this->input->post('from_year'),
                'from_month'    => $this->input->post('from_month'),
                'description'   => $this->input->post('description')
            );

            if (!empty($certification_id)) {
                $this->Certification_history_model->update($certification_id, $certifications);
            } else {
                $this->Certification_history_model->insert($certifications);
            }

            $data = array('success' => true, 'msg' => '');
        } else {
            $data = array('success' => false, 'msg' => validation_errors());
        }

        echo json_encode($data);
    }

    /**
     * POST delete certification
     * @param int $job_seeker_id The job seeker ID
     */
    public function delete_certification($job_seeker_id)
    {
        if ($this->input->post('id') && $this->input->post('confirm') == 'yes') {
            if ($this->Certification_history_model->delete($this->input->post('id'), $job_seeker_id)) {
                // redirect them back to the certification list page
                redirect(sprintf('admin/job_seeker/setup/'.$job_seeker_id.'/certification'));
            }
        } else {
            show_error('Invalid arguments', 400);
        }
    }

    /**
     * Face photo upload
     * @route /admin/job_seeker/setup/{job_seeker_id}/face_photo
     */
    public function face_photo($job_seeker_id)
    {
        $this->page_title = '写真の登録';

        $data['result'] = $this->Job_seeker_model->find_by_id($job_seeker_id);

        $file_upload_flag = false;
        $upload_success_flag = true;
        $file_upload_msg = '';

        if (count($_POST)) {
            // for image upload process
            $this->upload->initialize($this->get_upload_options('photo_upload_path', $job_seeker_id));
            if (!empty($_FILES['face_photo']['name'])){
                if ($this->upload->do_upload('face_photo')) {
                    $upload_info = $this->upload->data();
                    $file_upload_flag = true;
                } else {
                    $upload_success_flag = false;
                    $file_upload_msg = $this->upload->display_errors();
                }
            }

            if ($upload_success_flag == true) {
                if ($file_upload_flag) {
                    $file_name = $upload_info['file_name'];
                    $this->Job_seeker_model->update($job_seeker_id, array('photo' => $file_name));

                    redirect($this->path . 'job_seeker/setup/' . $job_seeker_id . '/face_photo');
                }
            }
        }

        $data['msg'] = $file_upload_msg;

        $this->_render('job_seeker/face_photo', $data);
    }

    /**
     * POST delete face photo
     * @param int $job_seeker_id The job seeker ID
     */
    public function delete_face_photo($job_seeker_id)
    {
        if (count($_POST) && $this->input->post('name') && $this->input->post('confirm') == 'yes') {
            $this->remove_file($this->input->post('name'), $this->config->item('photo_upload_path'), $job_seeker_id);
            $this->Job_seeker_model->update($job_seeker_id, array('photo' => ''));

            redirect($this->path . 'job_seeker/setup/' . $job_seeker_id . '/face_photo');
        }
    }

    /**
     * Career History listing by job_seeker_id
     * @route /admin/job_seeker/setup/{id}/career_history
     */
    public function career_history($job_seeker_id)
    {
        $this->page_title = '職務経歴';

        list($years, $months, $days) = get_years_months_days(1944, 0);
        $data['years']              = $years;
        $data['months']             = $months;
        $data['employee_type_class'] = array('' => '--') + $this->config->item('employee_type_class');

        $data['industory_l'] = array('' => '--') + $this->Industory_l_model->find_all_for_dropdown();
        $data['industory_m'] = array('' => '--') + $this->Industory_m_model->find_all_for_dropdown();

        $data['job_category_l'] = array('' => '--') + $this->Job_category_l_model->find_all_for_dropdown();
        $data['job_category_m'] = array('' => '--') + $this->Job_category_m_model->find_all_for_dropdown();
        $data['job_category_s'] = array('' => '--') + $this->Job_category_s_model->find_all_for_dropdown();

        $data['result'] = $this->Job_seeker_model->find_by_id($job_seeker_id);
        $result = $this->Working_history_model->search(array('job_seeker_id' => $job_seeker_id));
        $data['career_history'] = $result;
        $data['job_seeker_id'] = $job_seeker_id;

        $this->_render('job_seeker/career_history', $data);
    }

    /**
     * Create/update career_history by job_seeker_id
     * @route /admin/job_seeker/setup/{id}/career_history
     */
    public function add_career_history($job_seeker_id)
    {
        $this->form_validation->set_rules('company_name', '会社名', 'required');
        $this->form_validation->set_rules('from_year', '入社(年)', 'required');
        $this->form_validation->set_rules('from_month', '入社(月)', 'required');
        $this->form_validation->set_rules('employ_type', '雇用形態', 'required');
        $this->form_validation->set_rules('annual_income', '年収', 'required');
        $this->form_validation->set_rules('industory_l_id', '業種(大分類)', 'required');
        $this->form_validation->set_rules('industory_m_id', '業種(小分類)', 'required');
        $this->form_validation->set_rules('job_category_l_id', '経験職種(大分類)', 'required');
        $this->form_validation->set_rules('job_category_m_id', '経験職種(中分類)', 'required');
        $this->form_validation->set_rules('job_category_s_id', '経験職種(小分類)', 'required');
        $this->form_validation->set_rules('exp_from_year', '開始(年)', 'required');
        $this->form_validation->set_rules('exp_from_month', '開始(月)', 'required');
        $this->form_validation->set_rules('job_description', '職務内容', 'required');

        if ($this->form_validation->run()) {
            $working_history_id = $this->input->post('id');
            $career_history = array(
                'job_seeker_id'       => $job_seeker_id,
                'company_name'        => $this->input->post('company_name'),
                'from_year'           => $this->input->post('from_year'),
                'from_month'          => $this->input->post('from_month'),
                'to_year'             => $this->input->post('to_year'),
                'to_month'            => $this->input->post('to_month'),
                'employ_type'         => $this->input->post('employ_type'),
                'annual_income'       => $this->input->post('annual_income'),
                'management_exp'      => $this->input->post('management_exp'),
                'manage_person_count' => $this->input->post('manage_person_count'),
                'industory_l_id'      => $this->input->post('industory_l_id'),
                'industory_m_id'      => $this->input->post('industory_m_id'),
                'job_category_l_id'   => $this->input->post('job_category_l_id'),
                'job_category_m_id'   => $this->input->post('job_category_m_id'),
                'job_category_s_id'   => $this->input->post('job_category_s_id'),
                'exp_from_year'       => $this->input->post('exp_from_year'),
                'exp_from_month'      => $this->input->post('exp_from_month'),
                'exp_to_year'         => $this->input->post('exp_to_year'),
                'exp_to_month'        => $this->input->post('exp_to_month'),
                'job_description'     => $this->input->post('job_description'),
            );

            if (!empty($working_history_id)){
                $this->Working_history_model->update($working_history_id, $career_history);
            } else {
                $this->Working_history_model->insert($career_history);
            }
            $data = array('success' => true, 'msg' => '');
        } else {
            $data = array('success' => false, 'msg' => validation_errors());
        }
        echo json_encode($data);
    }

    /**
     *Delete career_history
     */
    public function delete_career_history()
    {
        $id = $this->input->post('id');
        $job_seeker_id = $this->input->post('job_seeker_id');
        if ($id) {
            $result = $this->Working_history_model->search(array('job_seeker_id' => $job_seeker_id));
            if ($result) {
                 if ($this->Working_history_model->delete($id)) {
                    redirect($this->path . 'job_seeker/setup/'.$job_seeker_id.'/career_history');
                } else {
                    show_error('Failed to delete', 500);
                }
            }
        }
    }
}
