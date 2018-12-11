<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Top extends MY_BaseController
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent:: __construct();

        $this->load->model('Article_type_model');
        $this->load->model('Article_model');
        $this->load->model('Prefecture_model');
        $this->load->model('News_model');
        $this->load->model('User_job_preferences_model');
        $this->load->model('Job_flags_model');
    }

    /**
     * @route /
     */
    public function index()
    {
        $data['new_arrival_jobs'] = $this->Job_model->search(array('t.publish_start_date <= CURDATE()', 't.publish_end_date >= CURDATE()'), array('t.publish_start_date' => 'desc'), 2);

        $data['top_articles'] = $this->Article_model->search(array('t.is_public' => 1), array('t.created_at' => 'desc'), 3);
        $data['article_types'] = array('0' => 'ALL') + $this->Article_type_model->find_all_for_dropdown(false);
        foreach($data['article_types'] as $key => $value){
            $data['articles'][$key] = $this->Article_model->search(array('article_type_id' => $key, 't.is_public' => 1), $order_by = array('created_at' => 'desc'), 3);
        }
        $data['news']               = $this->News_model->search(array('t.is_public' => 1), array('created_at' => 'DESC'), 4);
        $data['prefectures']        = $this->Prefecture_model->find_all_for_dropdown();
        $data['top_jobs']           = $this->Job_model->find_top_jobs(ab_is_jobseeker() ? $this->login_user['child']->id : null, 3);
        $data['employ_type_class']  = $this->config->item('employee_type_class');
        $data['top_job_flags']      = $this->Job_flags_model->find_by(array('show_flag' => 1, 'top_flag' => 1));
        $data['other_job_flags']    = $this->Job_flags_model->find_by(array('show_flag' => 1, 'top_flag' => 0));

//        $this->page_title = 'ホテル・民泊・旅館求人転職なら業界専門のHOTELIERJOBS(ホテリエジョブズ)へ';
        $this->meta_desc  = '全国のホテル・民泊・旅館業界に特化した宿泊施設専門の求人転職サービスHOTELIERJOBS(ホテリエジョブズ)。「人財から宿泊業界の未来を創る」をコンセプトに宿泊業界を人財から活性化させていきたいとの思いで開始した、宿泊施設専門の求人サービスです。正社員、アルバイトの求職情報はもちろんのこと、主婦からシニアの方々も働ける求人を多数掲載しています。';

        $this->_render('top', $data);
    }
}
