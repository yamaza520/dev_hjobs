<?php defined('BASEPATH') OR exit('No derect script access allowed');

class Job extends MY_AdminController {
    /**
     * Constructor
     */
    public function __construct()
    {
        parent:: __construct();

        $this->load->library('upload');
        $this->load->library('pagination');
        $this->load->model('Job_model');
        $this->load->model('Hotel_type_model');
        $this->load->model('Industory_l_model');
        $this->load->model('Industory_m_model');
        $this->load->model('Prefecture_model');
        $this->load->model('Market_model');
        $this->load->model('Job_category_l_model');
        $this->load->model('Job_category_s_model');
        $this->load->model('Job_category_m_model');
        $this->load->model('Job_image');
        $this->load->model('Employer_model');
    }

    public function index()
    {
        $this->page_title = 'ジョブリスト';

        // For pagination configuration
        $pager_config = $this->getPagerConfig(array('page_name' => 'admin-job-listing'));

        $result = $this->Job_model->search(array(), array('t.publish_start_date' => 'desc'), $pager_config);
        $data['result'] = $result['data'];

        $pager_config['total_rows'] = $result['meta']['total'];
        $this->pagination->initialize($pager_config);
        $data['pagination'] = $this->pagination->create_links();
        $data['total_count'] = $result['meta']['total'];
        $data['hotel_type'] = $this->Hotel_type_model->find_all_for_dropdown('--');

        $this->_render('job/index', $data);
    }

    public function delete()
    {
        $id = $this->input->post('id');
        if ($id) {
            $this->Job_model->delete($this->input->post('id'));
            redirect($this->path . 'jobs');
        } else {
            show_error('Invalid argument.', 400);
        }
    }

    /**
     * Job create/edit page
     */
    public function setup($id = 0)
    {
        $this->page_title = '求人登録';

        $data['hotel_type']             = $this->Hotel_type_model->find_all_for_dropdown();
        $data['industory_l']            = $this->Industory_l_model->find_all_for_dropdown();
        $data['industory_m']            = $this->Industory_m_model->find_all_for_dropdown();
        $data['prefecture']             = $this->Prefecture_model->find_all_for_dropdown(false);
        $data['market']                 = $this->Market_model->find_all_for_dropdown();
        $data['job_category_l']         = $this->Job_category_l_model->find_all_for_dropdown();
        $data['job_category_s']         = $this->Job_category_s_model->find_all_for_dropdown();
        $data['job_category_m']         = $this->Job_category_m_model->find_all_for_dropdown();
        $data['employee_type_class']    = $this->config->item('employee_type_class');
        $employer                       = $this->Employer_model->find_all();
        $employers = array('' => '選択してください');
        foreach ($employer as $value) {
            $employers[$value->id] = $value->name;
        }
        $data['employers'] = $employers;

        if (empty($id)) {
            $data['result'] = (object) array (
                'id'                        => '',
                'order_id'                  => '',
                'employer_id'               => '',
                'job_detail_title'          => '',
                'order_no'                  => '',
                'hotel_type_id'             => '',
                'job_code'                  => '',
                'real_name_job_id'          => '',
                'anonymous_job_id'          => '',
                'public_cd'                 => '',
                'publish_start_date'        => date('Y-m-d'),
                'publish_end_date'          => '',
                'company_name'              => '',
                'establish_date'            => '',
                'representative'            => '',
                'employee_count'            => '',
                'capital'                   => '',
                'industory_l_id'            => '',
                'industory_m_id'            => '',
                'job_title'                 => '',
                'pref_cd'                   => '',
                'address1'                  => '',
                'address2'                  => '',
                'company_description'       => '',
                'company_url'               => '',
                'market_id'                 => '',
                'average_age'               => '',
                'job_category_l_id'         => '',
                'job_category_m_id'         => '',
                'job_category_s_id'         => '',
                'job_description'           => '',
                'job_detail'                => '',
                'job_text'                  => '',
                'free_space_title'          => '',
                'free_space_detail'         => '',
                'min_salary'                => '',
                'max_salary'                => '',
                'salary'                    => '',
                'salary2'                   => '',
                'work_place'                => array(),
                'work_place2'               => '',
                'requirement'               => '',
                'requirement_detail'        => '',
                'age_restriction'           => '',
                'min_age'                   => '',
                'max_age'                   => '',
                'work_time'                 => '',
                'flex_flag'                 => 0,
                'holiday'                   => '',
                'treatment'                 => '',
                'selection_process'         => '',
                'application_method'        => '',
                'inexperienced_flag'        => 0,
                'second_graduate_flag'      => 0,
                'foreign_company_flag'      => 0,
                'plan_type_id'              => '',
                'plan_name'                 => '',
                'publish_period'            => '',
                'new_class'                 => '',
                'manuscript_id'             => '',
                'search_company_name1'      => '',
                'search_company_name2'      => '',
                'search_company_name3'      => '',
                'search_company_name4'      => '',
                'search_company_name5'      => '',
                'holiday_120'               => '',
                'work_abroad'               => '',
                'manager'                   => '',
                'employ_type_class'         => '',
                'recruit_background'        => '',
                'language1'                 => '',
                'language2'                 => '',
                'zip_code'                  => '',
                'guidance_reason'           => '',
                'supplement'                => '',
                'contact_info'              => '',
                'search_work_place'         => '',
                'traffic'                   => '',
                'standard_working_hours'    => '',
                'employ_period'             => '',
                'job_category_l_id2'        => '',
                'job_category_m_id2'        => '',
                'job_category_s_id2'        => '',
                'representative_position'   => '',
                'earnings'                  => '',
                'logical_deletion'          => '',
                'job_details_id1'           => '',
                'job_details_id2'           => '',
                'annual_income_example2'    => '',
                'annual_income_example3'    => '',
                'annual_income_example4'    => '',
                'annual_income_example5'    => '',
                'profit'                    => '',
                'list_message'              => '',
                'any_education_flag'        => 0,
                'mid_career_flag'           => 0,
                'average_age_flag'          => 0,
                'no_relocation_flag'        => 0,
                'stock_option_flag'         => 0,
                'employ500'                 => '',
                'employ1000'                => '',
                'continuous_growth_flag'    => 0,
                'cloth_free_flag'           => 0,
                'female_flag'               => 0,
                'commission_flag'           => 0,
                'annual_salary_flag'        => 0,
                'internal_venture_flag'     => 0,
                'uturn_flag'                => 0,
                'cafeteria_plan_flag'       => 0,
                'stock_holding_flag'        => 0,
                'independent_support_flag'  => 0,
                'long_vacation_flag'        => 0,
                'child_care_flag'           => 0,
                'two_day_off_flag'          => 0,
                'company_house_flag'        => 0,
                'qualification_flag'        => 0,
                'training_flag'             => 0,
                'product_name'              => '',
                'post_complete'             => '',
                'other_job'                 => '',
                'seminar_title_id'          => '',
                'issue_no_from'             => '',
                'issue_no_to'               => '',
                'link_job_id'               => '',
                'search_comp_name_kana'     => '',
                'job_type'                  => '',
                'selection_point'           => '',
                'pay_rise'                  => '',
                'bonus'                     => '',
            );
        } else {
            $this->page_title = '求人情報変更';

            $job = $this->Job_model->search(array('t.id' => $id), null, 1);
            if (count($job) === 0) {
                show_404();
            }

            $job = $job[0];
            $job->work_place = explode(';', $job->work_place);
            $job->publish_start_date = date('Y-m-d', strtotime($job->publish_start_date));
            $job->publish_end_date = date('Y-m-d', strtotime($job->publish_end_date));
            $data['result']  = $job;
        }

        if (count($_POST)) {
            $this->form_validation->set_rules('job_code', '案件ID', 'required');
            $this->form_validation->set_rules('publish_start_date', '掲載開始日', 'required');
            $this->form_validation->set_rules('publish_end_date', '掲載終了日', 'required');
            $this->form_validation->set_rules('company_name', '会社名', 'required');

            if ($this->form_validation->run()) {
                $job_data = $this->input->post(null, true);
                unset($job_data['submit']);

                if (!empty($job_data['work_place'])) {
                    $job_data['work_place'] = implode(';', $job_data['work_place']);
                }

                if (empty($id)) {
                    $job_data['product_name'] = MEDIA_HOTELIER;
                    $id = $this->Job_model->insert($job_data);
                    if ($id) {
                        $params = [
                            'hub.mode' => 'publish',
                            'hub.url' => site_url('job/detail/' . $id),
                        ];

                        curl($this->config->item('pubsubhubbub'), $params, 'post', array('Content-Type: application/x-www-form-urlencoded'));
                    }
                } else {
                    $job_data['updated_at'] = date('Y-m-d H:i:s');
                    $id = $this->Job_model->update($id, $job_data);
                }

                redirect($this->path . 'job');
            } else {
                $data['message'] = validation_errors();
            }
        }
        $this->_render('job/setup', $data);
    }

    /**
     * Job photo upload
     * @route /admin/job/setup/{id}/job_photo
     */
    public function job_photo($id)
    {
        $this->page_title = '求人画像';

        $data['result'] = $this->Job_model->find_by_id($id);
        if (!$data['result']) {
            show_404();
        }

        // For pagination configuration
        $pager_config = $this->getPagerConfig();

        $result = $this->Job_image->find_by(array('job_id' => $id), array('created_at' => 'ASC'), $pager_config);
        $data['job_image'] = $result['data'];

        $pager_config['total_rows'] = $result['meta']['total'];
        $this->pagination->initialize($pager_config);
        $data['pagination'] = $this->pagination->create_links();
        $data['total_count'] = $result['meta']['total'];

        $file_upload_flag = false;
        $upload_success_flag = true;
        $file_upload_msg = '';

        if (count($_POST)) {
            // for image upload process
            $this->upload->initialize($this->get_upload_options('upload_img_path'));
            if (!empty($_FILES['job_photo']['name'])){
                if ($this->upload->do_upload('job_photo')) {
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
                    $this->Job_image->insert(array(
                        'job_id'    => $id,
                        'url'       => $file_name,
                    ));

                    redirect($this->path . 'job/setup/' . $id . '/job_photo');
                }
            }
        }

        $data['msg'] = $file_upload_msg;

        $this->_render('job/job_photo', $data);
    }

    /**
     * POST delete job photo
     * @route /admin/job/setup/{id}/delete_job_photo
     */
    public function delete_job_photo($id)
    {
        if ($this->input->post('id') && $this->input->post('name') && $this->input->post('confirm') == 'yes') {
            if ($this->Job_image->delete($this->input->post('id'), true)) {
                $this->remove_file($this->input->post('name'), $this->config->item('upload_img_path'));
                redirect($this->path . 'job/setup/' . $id . '/job_photo');
            }
        }

        show_error("Can't delete image.", 500);
    }

    /**
     * @route /admin/job/employer
     */
    public function employer()
    {
        $this->page_title = '雇用主';

        // For pagination configuration
        $pager_config = $this->getPagerConfig(array('page_name' => 'admin-job-listing'));

        $result = $this->Employer_model->find_all(array(), $pager_config);
        $data['result'] = $result['data'];

        $pager_config['total_rows'] = $result['meta']['total'];
        $this->pagination->initialize($pager_config);
        $data['pagination'] = $this->pagination->create_links();
        $data['total_count'] = $result['meta']['total'];

        $this->_render('job/employer', $data);
    }

    public function delete_employer()
    {
        $id = $this->input->post('id');
        if ($id) {
            $this->Employer_model->delete($this->input->post('id'));
            redirect($this->path . 'job/employer');
        } else {
            show_error('Invalid argument.', 400);
        }
    }

    public function employer_setup($id = 0)
    {
        if (empty($id)) {
            $this->page_title = '雇用主登録';
            $data['result'] = (object) array (
                'id'              => '',
                'name'            => '',
                'email'           => '',
            );
        } else {
            $this->page_title = '詳細';
            $data['result'] = $this->Employer_model->find_by_id($id);
            if (!$data['result']) {
                show_404();
            }
        }

        if(count($_POST)) {
            $this->form_validation->set_rules('name', '名', 'required');
            $this->form_validation->set_rules('email', 'メール', 'required');

            if ($this->form_validation->run()) {
                $job_data = array (
                    'name'      => $this->input->post('name'),
                    'email'     => $this->input->post('email'),
                );
                if (empty($id)) {
                    $this->Employer_model->insert($job_data);
                }
                $this->Employer_model->update($id, $job_data);
            } else {
                $data['message'] = validation_errors();
            }

            redirect($this->path . 'job/employer');
        }

        $this->_render('job/employer_setup', $data);
    }
}
