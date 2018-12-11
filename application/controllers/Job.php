<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job extends MY_BaseController
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent:: __construct();

        $this->load->library('pagination');
        $this->load->model('Faq_model');
        $this->load->model('Prefecture_model');
    }

    /**
     * @route /jobs/{pref}
     */
    public function index($pref = null)
    {
        $this->page_title = '求人一覧';
        $this->meta_desc  = 'ホテル求人転職一覧ページ｜HOTELIERJOBS(ホテリエジョブズ)は宿泊施設専門の求人サービスです。正社員、アルバイトの求職情報はもちろんのこと、主婦からシニアの方々も働ける求人を多数掲載しています。';
        $this->header_message = "求人一覧";

        // For pagination configuration
        $pager_config = $this->getPagerConfig(array('page_name' => 'job-listing'));

        $data['search'] = (int) $this->input->get('sh');
        $filter = $this->input->get('q');
        if (empty($filter)) {
            $filter = array();
        }

        if ($pref) {
            $prefecture = $this->Prefecture_model->find_one_by(array('slug' => $pref));
            if (empty($prefecture)) {
                show_404();
            }
            $filter['work_place'] = $prefecture->pref_cd;
        }

        $filter[] = 't.publish_start_date <= CURDATE()';
        $filter[] = 't.publish_end_date >= CURDATE()';

        if (isset($filter['work_place']) && !is_array($filter['work_place'])) {
            $filter['work_place'] = !empty($filter['work_place']) ? array($filter['work_place']) : [];
        }

        if (isset($filter['job_category_s_id']) && !is_array($filter['job_category_s_id'])) {
            $filter['job_category_s_id'] = !empty($filter['job_category_s_id']) ? array($filter['job_category_s_id']) : [];
        }

        if (isset($filter['employ_type_class']) && !is_array($filter['employ_type_class'])) {
            $filter['employ_type_class'] = !empty($filter['employ_type_class']) ? array($filter['employ_type_class']) : [];
        }

        $result = $this->Job_model->search($filter, array('publish_start_date' => 'desc'), $pager_config);

        $total = $result['meta']['total'];

        $data['paging_info'] = $this->calulate_paging_info($total, $pager_config['cur_page'], $pager_config['per_page']);

        $data['jobs']               = $result['data'];
        $data['total_jobs']         = $total;
        $pager_config['total_rows'] = $total;

        $this->pagination->initialize($pager_config);
        $data['pagination'] = $this->pagination->create_links();

        $data['prefectures']            = $this->Prefecture_model->find_all_for_dropdown();
        $data['employee_type_classes']  = $this->config->item('employee_type_class');
        $data['salaries']               = array_merge(array('' => '選択してください'), $this->config->item('salary'));
        $data['q']                      = $filter;

        if (!empty($filter['work_place'])) {
            if ($pref) {
                $this->page_title = $prefecture->name . 'の' . $this->page_title;
                $this->header_message = $this->page_title;
            } else {
                $prefectures = $this->Prefecture_model->find_by(['pref_cd' => $filter['work_place']]);
                $prefArray = [];
                foreach ($prefectures as $pref) {
                    $prefArray[] = $pref->name;
                }
                $this->page_title = implode('、', $prefArray) . 'の' . $this->page_title;
            }
        }

        $this->_render('job/index', $data);
    }

    /**
     * @route /favorite-jobs
     */
    public function favorite_list()
    {
        $this->page_title = 'チェックリスト';
        $this->header_message = $this->page_title;

        $pager_config = $this->getPagerConfig();

        $result = $this->Job_model->get_all_favorties_by_user($this->is_logged_in() ? $this->login_user['user_id'] : null, $pager_config);

        $total = $result['meta']['total'];
        $data['paging_info'] = $this->calulate_paging_info($total, $pager_config['cur_page'], $pager_config['per_page']);

        $data['result'] = $result['data'];
        $pager_config['total_rows'] = $total;
        $this->pagination->initialize($pager_config);
        $data['pagination'] = $this->pagination->create_links();
        $data['prefectures'] = $this->Prefecture_model->find_all_for_dropdown();

        $this->_render('job/favorite_list', $data);
    }

    /**
     * @route /browsing-jobs
     */
    public function browsing_list()
    {
        $this->page_title = '閲覧履歴';
        $this->header_message = $this->page_title;

        $pager_config = $this->getPagerConfig();

        if (count($_POST)) {
            $id = $this->input->post('id');
            $this->User_model->remove_browsing_jobs($user_id = $this->is_logged_in() ? $this->login_user['user_id'] : null, array($id));

            redirect('job/browsing_list');
        }

        $result = $this->Job_model->get_all_browsing_by_user($this->is_logged_in() ? $this->login_user['user_id'] : null, $pager_config);

        $total = $result['meta']['total'];
        $data['paging_info'] = $this->calulate_paging_info($total, $pager_config['cur_page'], $pager_config['per_page']);

        $data['result'] = $result['data'];
        $pager_config['total_rows'] = $total;
        $this->pagination->initialize($pager_config);
        $data['pagination'] = $this->pagination->create_links();
        $data['prefectures'] = $this->Prefecture_model->find_all_for_dropdown();

        $this->_render('job/browsing_list', $data);
    }

    /**
     * @route /detail/(:num)
     */
    public function detail($id)
    {
        $job = $this->Job_model->search(array('t.id' => $id), array(), 1);
        if (count($job) === 0) {
            show_404();
        }
        $job = $job[0];

        if ($job->work_place) {
            $workplaces = explode(';', $job->work_place);
            $pref = $this->Prefecture_model->find_one_by(array('pref_cd' => $workplaces[0]));
        }

        if (empty($pref)) {
            $pref = new stdClass();
            $pref->slug = $job->pref_slug;
            $pref->name = $job->pref_name;
        }

        $data['job']  = $job;
        $data['pref'] = $pref;
        $data['faqs'] = $this->Faq_model->search(array('t.job_detail_flag' => 1, 't.is_public' => 1), array('sort_order' => 'asc'));
        $data['prefectures'] = $this->Prefecture_model->find_all_for_dropdown();
        $data['similar_jobs'] = $this->Job_model->find_similar_jobs($job);

        // Save browsing history
        $this->User_model->save_browsing_jobs($user_id = $this->is_logged_in() ? $this->login_user['user_id'] : null, array($id));

        $this->page_title = $job->job_title;
        $this->meta_desc  = 'ホテル求人転職詳細｜HOTELIERJOBS(ホテリエジョブズ)は宿泊施設専門の求人サービスです。正社員、アルバイトの求職情報はもちろんのこと、主婦からシニアの方々も働ける求人を多数掲載しています。';
        $this->header_message = $this->page_title;

        $this->_render('job/detail', $data);
    }

    /**
     * @route /job/agent
     */
    public function agent()
    {
        $this->page_title = '紹介会社説明';
        $data['prefectures'] = $this->Prefecture_model->find_all_for_dropdown();
        // @TODO: query agent

        $this->_render('job/agent', $data);
    }
}
