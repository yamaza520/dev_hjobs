<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Career_history extends MY_AuthController
{
    private $base_dir = 'jobseeker/mypage/';

    /**
     * Constructor
     */
    public function __construct()
    {
        parent:: __construct();

        $this->load->model('Industory_l_model');
        $this->load->model('Industory_m_model');
        $this->load->model('Job_category_l_model');
        $this->load->model('Job_category_m_model');
        $this->load->model('Job_category_s_model');
        $this->load->model('Job_seeker_model');
        $this->load->model('Working_history_model');
    }

    /**
     * @route /mypage/career-history
     */
    public function form()
    {
        $this->page_title = '経歴情報の確認・編集';

        $data['incomplete_profile_info'] = $this->session->flashdata('incomplete_profile');

        list($years, $months, $days) = get_years_months_days(1944, 0);
        $data['years']              = $years;
        $data['months']             = $months;
        $data['change_work_count']  = array('' => '--') + array_combine($c = range(1, 10), $c);
        $data['degree_status']      = array('' => '--') + $this->config->item('degree_status');
        $data['literature_type']    = array('' => '--') + $this->config->item('literature_type');
        $data['last_education_cd']  = array('' => '--') + $this->config->item('school_type');
        $data['english_level']      = $this->config->item('english_level');
        $data['employee_type_class'] = array('' => '--') + $this->config->item('employee_type_class');

        $data['industory_l'] = array('' => '--') + $this->Industory_l_model->find_all_for_dropdown();
        $data['industory_m'] = array('' => '--') + $this->Industory_m_model->find_all_for_dropdown();

        $data['job_category_l'] = array('' => '--') + $this->Job_category_l_model->find_all_for_dropdown();
        $id = $this->login_user['child']->id;

        if ($this->input->get('edit')) {
            $data['career_history'] = $this->session->career_history;
            $data['redirect'] = $data['career_history']['redirect'];
        } else {
            $career_history = (array) $this->Job_seeker_model->find_by_id($id);
            $career_history['graduate_year'] = empty($career_history['graduate_ym']) ? '' : substr($career_history['graduate_ym'], 0, 4);
            $career_history['graduate_month'] = empty($career_history['graduate_ym']) ? '' : substr($career_history['graduate_ym'], 4);
            $data['career_history'] = $career_history;
            $data['redirect'] = $this->input->get('redirect');

            $working_history = $this->Working_history_model->find_by(array('job_seeker_id' => $id));
            if (count($working_history)) {
                foreach ($working_history as $value) {
                    $data['career_history']['working_history'][] = (array) $value;
                }
            } else {
                $data['career_history']['working_history'][] = array(
                        'company_name'      => '',
                        'from_year'         => '',
                        'from_month'        => '',
                        'to_year'           => '',
                        'to_month'          => '',
                        'employ_type'       => '',
                        'annual_income'     => '',
                        'manage_person_count' => '',
                        'management_exp'    => 0,
                        'industory_l_id'    => '',
                        'industory_m_id'    => '',
                        'job_category_l_id' => '',
                        'job_category_m_id' => '',
                        'job_category_s_id' => '',
                        'exp_from_year'     => '',
                        'exp_from_month'    => '',
                        'exp_to_year'       => '',
                        'exp_to_month'      => '',
                        'job_description'   => '',
                        'redirect'          => '',
                    );
            }
        }

        if (count($_POST)) {
            $this->form_validation->set_rules('last_education_cd', '最終学歴', 'required');
            $this->form_validation->set_rules('graduate_year', '卒業区分(年)', 'required');
            $this->form_validation->set_rules('graduate_month', '卒業区分(月)', 'required');
            $this->form_validation->set_rules('graduate_cd', '卒業区分', 'required');
            $this->form_validation->set_rules('literature_type', '文理区分', 'required');
            $this->form_validation->set_rules('school_name', '学校名', 'required');
            $this->form_validation->set_rules('is_working', '現在の勤務状況', 'required');
            $this->form_validation->set_rules('change_work_count', '転職回数', 'required');

            if ($this->form_validation->run()) {
                $career_history = array (
                    'last_education_cd' => $this->input->post('last_education_cd'),
                    'graduate_year'     => $this->input->post('graduate_year'),
                    'graduate_month'    => $this->input->post('graduate_month'),
                    'graduate_cd'       => $this->input->post('graduate_cd'),
                    'literature_type'   => $this->input->post('literature_type'),
                    'school_name'       => $this->input->post('school_name'),
                    'is_working'        => (int) $this->input->post('is_working'),
                    'current_job'       => $this->input->post('current_job'),
                    'change_work_count' => $this->input->post('change_work_count'),
                    'english_level'     => $this->input->post('english_level'),
                    'toeic'             => $this->input->post('toeic'),
                    'other_language'    => $this->input->post('other_language'),
                    'reason_for_change_work' => $this->input->post('reason_for_change_work'),
                    'pr'                => $this->input->post('pr'),
                    'redirect'          => $this->input->post('redirect'),
                );
                // working history
                $work_id        = $this->input->post('work_id');
                $company_name   = $this->input->post('company_name');
                $from_year      = $this->input->post('from_year');
                $from_month     = $this->input->post('from_month');
                $to_year        = $this->input->post('to_year');
                $to_month       = $this->input->post('to_month');
                $employ_type    = $this->input->post('employ_type');
                $annual_income  = $this->input->post('annual_income');
                $manage_person_count = $this->input->post('manage_person_count');
                $management_exp = $this->input->post('management_exp');
                $industory_l_id = $this->input->post('industory_l_id');
                $industory_m_id = $this->input->post('industory_m_id');
                $job_category_l_id = $this->input->post('job_category_l_id');
                $job_category_m_id = $this->input->post('job_category_m_id');
                $job_category_s_id = $this->input->post('job_category_s_id');
                $exp_from_year  = $this->input->post('exp_from_year');
                $exp_from_month = $this->input->post('exp_from_month');
                $exp_to_year  = $this->input->post('exp_to_year');
                $exp_to_month = $this->input->post('exp_to_month');
                $job_description = $this->input->post('job_description');

                $working_history = array();
                foreach ($company_name as $key => $company) {
                    $industory_l = $this->Industory_l_model->find_one_by(array('id' => $industory_l_id[$key]));
                    $industory_m = $this->Industory_m_model->find_one_by(array('id' => $industory_m_id[$key]));

                    $job_category_l = $this->Job_category_l_model->find_one_by(array('id' => $job_category_l_id[$key]));
                    $job_category_m = $this->Job_category_m_model->find_one_by(array('id' => $job_category_m_id[$key]));
                    $job_category_s = $this->Job_category_s_model->find_one_by(array('id' => $job_category_s_id[$key]));

                    $working_history[] = array(
                        'id'                    => $work_id[$key],
                        'job_seeker_id'         => $id,
                        'company_name'          => $company_name[$key],
                        'from_year'             => $from_year[$key],
                        'from_month'            => $from_month[$key],
                        'to_year'               => $to_year[$key],
                        'to_month'              => $to_month[$key],
                        'employ_type'           => $employ_type[$key],
                        'annual_income'         => $annual_income[$key],
                        'manage_person_count'   => $manage_person_count[$key],
                        'management_exp'        => (int) $management_exp[$key],
                        'industory_l_id'        => $industory_l_id[$key],
                        'industory_l_name'      => $industory_l->name, // for confirm page
                        'industory_m_id'        => $industory_m_id[$key],
                        'industory_m_name'      => $industory_m->name,  // for confirm page
                        'job_category_l_id'     => $job_category_l_id[$key],
                        'job_category_l_name'   => $job_category_l->name, // for confirm page
                        'job_category_m_id'     => $job_category_m_id[$key],
                        'job_category_m_name'   => $job_category_m->name, // for confirm page
                        'job_category_s_id'     => $job_category_s_id[$key],
                        'job_category_s_name'   => $job_category_s->name, // for confirm page
                        'exp_from_year'         => $exp_from_year[$key],
                        'exp_from_month'        => $exp_from_month[$key],
                        'exp_to_year'           => $exp_to_year[$key],
                        'exp_to_month'          => $exp_to_month[$key],
                        'job_description'       => $job_description[$key],
                    );
                }

                $career_history['working_history'] = $working_history;
                $this->session->set_userdata('career_history', $career_history);

                redirect($this->path . 'mypage/career-history/confirm');
            } else {
                $data['redirect'] = $this->input->post('redirect');
                $data['message'] = validation_errors();
            }
        }

        $this->_render($this->base_dir . 'career_history_form', $data);
    }

    /**
     * @route /mypage/career-history/confirm
     */
    public function confirm()
    {
        $this->page_title = '経歴情報の確認・編集 確認';

        if (!$this->session->has_userdata('career_history')) {
            redirect($this->path . 'mypage/career-history');
        }

        $career_history = $this->session->career_history;
        $id = $this->login_user['child']->id;
        if (count($_POST)) {
            $jobseeker_data = array(
                'last_education_cd' => $career_history['last_education_cd'],
                'graduate_ym'       => $career_history['graduate_year'] . $career_history['graduate_month'],
                'graduate_cd'       => $career_history['graduate_cd'],
                'literature_type'   => $career_history['literature_type'],
                'school_name'       => $career_history['school_name'],
                'is_working'        => $career_history['is_working'],
                'current_job'       => $career_history['current_job'],
                'change_work_count' => $career_history['change_work_count'],
                'english_level'     => $career_history['english_level'],
                'toeic'             => $career_history['toeic'],
                'other_language'    => $career_history['other_language'],
                'reason_for_change_work' => $career_history['reason_for_change_work'],
                'pr'                => $career_history['pr'],
            );

            $this->Job_seeker_model->update($id, $jobseeker_data);

            // Create/Update working_history
            $working_history = array();
            foreach ($career_history['working_history'] as $work) {
                unset($work['industory_l_name']);
                unset($work['industory_m_name']);
                unset($work['job_category_l_name']);
                unset($work['job_category_m_name']);
                unset($work['job_category_s_name']);
                $working_history[] = $work;
            }

            $this->Working_history_model->remove_and_insert($id, $working_history);

            // Update profile status
            if ($this->login_user['profile_status'] == 1) {
                // Only if basic information has been updated
                $this->User_model->update($this->login_user['user_id'], ['profile_status' => 2]);
                $this->login_user['profile_status'] = 2;
                $this->session->set_userdata($this->login_user);
            }

            if ($career_history['redirect']) {
                redirect($career_history['redirect']);
            } else {
                redirect('mypage/career-history/complete');
            }
        }

        $data['career_history'] = $career_history;

        $this->_render($this->base_dir . 'career_history_confirm', $data);
    }

    /**
     * @route /mypage/career-history/complete
     */
    public function complete()
    {
        $this->page_title = '経歴情報の確認・編集 完了';

        if ($this->session->has_userdata('career_history')) {
            // unset session
            $this->session->unset_userdata('career_history');
        } else {
            redirect($this->path . 'mypage/career-history');
        }

        $this->_render($this->base_dir . 'career_history_complete');
    }
}
