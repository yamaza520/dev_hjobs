<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link href="<?php echo base_url('assets/common/css/jquery-ui.min.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/common/css/select2.min.css'); ?>" rel="stylesheet">

<section class="content-header">
    <h1><?php echo $page_title ?></h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="box box-primary">
        <?php if (!empty($this->uri->segment(4))): ?>
            <?php $this->load->view('admin/blocks/job_edit_nav.php'); ?>
        <?php endif ?>
        <!-- form start -->
        <?php echo form_open('', array('id'=>'form', 'name'=>'form', 'method' => 'post')); ?>
        <div class="box-body">
            <div class="clearfix">
                <div class="col-md-12 text-right">
                    <div class="form-group">
                    <?php if ($result->id): ?>
                        <?php echo form_submit('submit', '変更', array('class' => 'btn btn-warning')); ?>
                    <?php else: ?>
                        <?php echo form_submit('submit', '登録', array('class' => 'btn btn-success')); ?>
                    <?php endif ?>
                    </div>
                </div>
            </div>
            <div class="clearfix">
            <?php if (isset($message) && $message) { ?>
                <div class="col-md-12">
                    <div class="alert alert-danger" role="alert"><?php echo $message;?></div>
                </div>
            <?php } ?>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <?php echo form_label('オーダーID', 'order_id'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'order_id',
                        'name'  => 'order_id',
                        'value' => set_value('order_id', $result->order_id),
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('施設種類', 'hotel_type_id'); ?>
                    <?php echo form_dropdown('hotel_type_id', $hotel_type, set_value('hotel_type_id', $result->hotel_type_id), array('class' => 'form-control', 'id' => 'hotel_type_id')); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('実名求人掲載ID', 'real_name_job_id'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'real_name_job_id',
                        'name'  => 'real_name_job_id',
                        'value' => $result->real_name_job_id
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('外部公開区分（企業）', 'public_cd'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'public_cd',
                        'name'  => 'public_cd',
                        'value' => $result->public_cd
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('会社名', 'company_name'); ?>
                    <span class="text-red">*</span>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'company_name',
                        'name'  => 'company_name',
                        'value' => set_value('company_name', $result->company_name),
                        'required' => 'required'
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('代表者', 'representative'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'representative',
                        'name'  => 'representative',
                        'value' => $result->representative
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('資本金', 'capital'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'capital',
                        'name'  => 'capital',
                        'value' => $result->capital
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('都道府県(本社)', 'pref_cd'); ?>
                    <?php echo form_dropdown('pref_cd', $prefecture, set_value('pref_cd', $result->pref_cd), array('class' => 'form-control', 'id' => 'pref_cd')); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('住所2(本社)', 'address2'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'address2',
                        'name'  => 'address2',
                        'value' => $result->address2
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('会社ホームページURL', 'company_url'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'company_url',
                        'name'  => 'company_url',
                        'value' => $result->company_url
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('業種大分類ID', 'industory_l_id'); ?>
                    <?php echo form_dropdown('industory_l_id', $industory_l, set_value('industory_l_id', $result->industory_l_id), array('class' => 'form-control', 'id' => 'industory_l_id')); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('業種中分類ID', 'industory_m_id'); ?>

                    <?php echo form_dropdown('industory_m_id', array('' => '--'), set_value('industory_m_id', $result->industory_m_id), array('class' => 'form-control', 'id' => 'industory_m_id')); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('職種大分類ID', 'job_category_l_id'); ?>
                    <?php echo form_dropdown('job_category_l_id', $job_category_l, set_value('job_category_l_id', $result->job_category_l_id), array('class' => 'form-control', 'id' => 'job_category_l_id')); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('職種中分類ID', 'job_category_m_id'); ?>

                    <?php echo form_dropdown('job_category_m_id', array('' => '--'), set_value('job_category_m_id', $result->job_category_m_id), array('class' => 'form-control', 'id' => 'job_category_m_id')); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('職種小分類ID', 'job_category_s_id'); ?>
                    <?php echo form_dropdown('job_category_s_id', array('' => '--'), set_value('job_category_s_id', $result->job_category_s_id), array('class' => 'form-control', 'id' => 'job_category_s_id')); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('平均年齢', 'average_age'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'average_age',
                        'name'  => 'average_age',
                        'value' => $result->average_age
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('仕事内容', 'job_description'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'job_description',
                        'name'  => 'job_description',
                        'value' => set_value('job_description', $result->job_description),
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('金額下限', 'min_salary'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'min_salary',
                        'name'  => 'min_salary',
                        'value' => $result->min_salary
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('給与(一覧画面表示用)', 'salary'); ?>
                    <?php
                    echo form_textarea(array(
                        'class' => 'form-control',
                        'id'    => 'salary',
                        'name'  => 'salary',
                        'rows'  => '2',
                        'value' => $result->salary
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('給与(詳細画面表示用)', 'salary2'); ?>
                    <?php
                    echo form_textarea(array(
                        'class' => 'form-control',
                        'id'    => 'salary2',
                        'name'  => 'salary2',
                        'rows'  => '2',
                        'value' => $result->salary2
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('応募資格', 'requirement'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'requirement',
                        'name'  => 'requirement',
                        'value' => set_value('requirement', $result->requirement),
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('年齢制限表示区分', 'age_restriction'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'age_restriction',
                        'name'  => 'age_restriction',
                        'value' => $result->age_restriction
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('募集年齢上限', 'max_age'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'max_age',
                        'name'  => 'max_age',
                        'value' => $result->max_age
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('フレックス勤務フラグ', 'flex_flag');?><br>
                    <label><?php echo '有'; ?>
                    <?php echo form_radio('flex_flag', 1, isset($result->flex_flag) && $result->flex_flag == 1 ? 'checked' : ''); ?>
                    <label><?php echo '無'; ?>
                    <?php echo form_radio('flex_flag', 0, isset($result->flex_flag) && $result->flex_flag == 0 ? 'checked' : ''); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('待遇', 'treatment'); ?>
                    <?php
                    echo form_textarea(array(
                        'class' => 'form-control',
                        'id'    => 'treatment',
                        'name'  => 'treatment',
                        'rows'  => '2',
                        'value' => $result->treatment,
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('応募方法', 'application_method'); ?>
                    <?php
                    echo form_textarea(array(
                        'class' => 'form-control',
                        'id'    => 'application_method',
                        'name'  => 'application_method',
                        'rows'  => '2',
                        'value' => set_value('application_method', $result->application_method),
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('未経験者歓迎フラグ', 'inexperienced_flag');?><br>
                    <label><?php echo '有'; ?>
                    <?php echo form_radio('inexperienced_flag', 1, isset($result->inexperienced_flag) && $result->inexperienced_flag == 1 ? 'checked' : ''); ?>
                    <label><?php echo '無'; ?>
                    <?php echo form_radio('inexperienced_flag', 0, isset($result->inexperienced_flag) && $result->inexperienced_flag == 0 ? 'checked' : ''); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('外資系企業フラグ', 'foreign_company_flag');?><br>
                    <label><?php echo '有'; ?>
                    <?php echo form_radio('foreign_company_flag', 1, isset($result->foreign_company_flag) && $result->foreign_company_flag == 1 ? 'checked' : ''); ?>
                    <label><?php echo '無'; ?>
                    <?php echo form_radio('foreign_company_flag', 0, isset($result->foreign_company_flag) && $result->foreign_company_flag == 0 ? 'checked' : ''); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('企画名', 'plan_name'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'plan_name',
                        'name'  => 'plan_name',
                        'value' => $result->plan_name
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('新着区分', 'new_class');?><br>
                    <label><?php echo '有'; ?>
                    <?php echo form_radio('new_class', 1, isset($result->new_class) && $result->new_class == 1 ? 'checked' : ''); ?>
                    <label><?php echo '無'; ?>
                    <?php echo form_radio('new_class', 0, isset($result->new_class) && $result->new_class == 0 ? 'checked' : ''); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('検索用社名1', 'search_company_name1'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'search_company_name1',
                        'name'  => 'search_company_name1',
                        'value' => $result->search_company_name1
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('検索用社名3', 'search_company_name3'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'search_company_name3',
                        'name'  => 'search_company_name3',
                        'value' => $result->search_company_name3
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('検索用社名5', 'search_company_name5'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'search_company_name5',
                        'name'  => 'search_company_name5',
                        'value' => $result->search_company_name5
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('海外勤務区分', 'work_abroad');?><br>
                    <label><?php echo '有'; ?>
                    <?php echo form_radio('work_abroad', 1, isset($result->work_abroad) && $result->work_abroad == 1 ? 'checked' : ''); ?>
                    <label><?php echo '無'; ?>
                    <?php echo form_radio('work_abroad', 0, isset($result->work_abroad) && $result->work_abroad == 0 ? 'checked' : ''); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('雇用形態区分', 'employ_type_class'); ?>
                    <?php echo form_dropdown('employ_type_class', $employee_type_class, set_value('employ_type_class', $result->employ_type_class), array('class' => 'form-control', 'id' => 'employ_type_class')); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('語学1', 'language1');?><br>
                    <?php echo form_checkbox('language1', 1, isset($result->language1) && $result->language1 == 1 ? 'checked' : ''); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('郵便番号', 'zip_code'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'zip_code',
                        'name'  => 'zip_code',
                        'value' => $result->zip_code
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('補足内容', 'supplement'); ?>
                    <?php
                    echo form_textarea(array(
                        'class' => 'form-control',
                        'id'    => 'supplement',
                        'name'  => 'supplement',
                        'rows'  => '2',
                        'value' => $result->supplement,
                    ));
                    ?>
                </div>
                <!--<div class="form-group">
                    <?php echo form_label('検索用勤務地(地域)', 'search_work_place'); ?>
                    <?php echo form_dropdown('search_work_place', $prefecture, set_value('pref_cd', $result->search_work_place), array('class' => 'form-control', 'id' => 'search_work_place')); ?>
                </div>-->
                <div class="form-group">
                    <?php echo form_label('実働標準労働時間', 'standard_working_hours'); ?>
                    <?php
                    echo form_textarea(array(
                        'class' => 'form-control',
                        'id'    => 'standard_working_hours',
                        'name'  => 'standard_working_hours',
                        'rows'  => '2',
                        'value' => $result->standard_working_hours,
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('売上高', 'earnings'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'earnings',
                        'name'  => 'earnings',
                        'value' => $result->earnings
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('職種詳細ID1', 'job_details_id1'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'job_details_id1',
                        'name'  => 'job_details_id1',
                        'value' => $result->job_details_id1
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('年収例2', 'annual_income_example2'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'annual_income_example2',
                        'name'  => 'annual_income_example2',
                        'value' => $result->annual_income_example2
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('年収例4', 'annual_income_example4'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'annual_income_example4',
                        'name'  => 'annual_income_example4',
                        'value' => $result->annual_income_example4
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('経常利益', 'profit'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'profit',
                        'name'  => 'profit',
                        'value' => $result->profit
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('学歴不問フラグ', 'any_education_flag');?><br>
                    <label><?php echo '有'; ?>
                    <?php echo form_radio('any_education_flag', 1, isset($result->any_education_flag) && $result->any_education_flag == 1 ? 'checked' : ''); ?>
                    <label><?php echo '無'; ?>
                    <?php echo form_radio('any_education_flag', 0, isset($result->any_education_flag) && $result->any_education_flag == 0 ? 'checked' : ''); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('平均年齢20代フラグ', 'average_age_flag');?><br>
                    <label><?php echo '有'; ?>
                    <?php echo form_radio('average_age_flag', 1, isset($result->average_age_flag) && $result->average_age_flag == 1 ? 'checked' : ''); ?>
                    <label><?php echo '無'; ?>
                    <?php echo form_radio('average_age_flag', 0, isset($result->average_age_flag) && $result->average_age_flag == 0 ? 'checked' : ''); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('ストックオプションフラグ', 'stock_option_flag');?><br>
                    <label><?php echo '有'; ?>
                    <?php echo form_radio('stock_option_flag', 1, isset($result->stock_option_flag) && $result->stock_option_flag == 1 ? 'checked' : ''); ?>
                    <label><?php echo '無'; ?>
                    <?php echo form_radio('stock_option_flag', 0, isset($result->stock_option_flag) && $result->stock_option_flag == 0 ? 'checked' : ''); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('従業員数1000名以上フラグ', 'employ1000');?><br>
                    <label><?php echo '有'; ?>
                    <?php echo form_radio('employ1000', 1, isset($result->employ1000) && $result->employ1000 == 1 ? 'checked' : ''); ?>
                    <label><?php echo '無'; ?>
                    <?php echo form_radio('employ1000', 0, isset($result->employ1000) && $result->employ1000 == 0 ? 'checked' : ''); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('服装自由フラグ', 'cloth_free_flag');?><br>
                    <label><?php echo '有'; ?>
                    <?php echo form_radio('cloth_free_flag', 1, isset($result->cloth_free_flag) && $result->cloth_free_flag == 1 ? 'checked' : ''); ?>
                    <label><?php echo '無'; ?>
                    <?php echo form_radio('cloth_free_flag', 0, isset($result->cloth_free_flag) && $result->cloth_free_flag == 0 ? 'checked' : ''); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('歩合給制フラグ', 'commission_flag');?><br>
                    <label><?php echo '有'; ?>
                    <?php echo form_radio('commission_flag', 1, isset($result->commission_flag) && $result->commission_flag == 1 ? 'checked' : ''); ?>
                    <label><?php echo '無'; ?>
                    <?php echo form_radio('commission_flag', 0, isset($result->commission_flag) && $result->commission_flag == 0 ? 'checked' : ''); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('社内ベンチャー制度フラグ', 'internal_venture_flag');?><br>
                    <label><?php echo '有'; ?>
                    <?php echo form_radio('internal_venture_flag', 1, isset($result->internal_venture_flag) && $result->internal_venture_flag == 1 ? 'checked' : ''); ?>
                    <label><?php echo '無'; ?>
                    <?php echo form_radio('internal_venture_flag', 0, isset($result->internal_venture_flag) && $result->internal_venture_flag == 0 ? 'checked' : ''); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('カフェテリアプランフラグ', 'cafeteria_plan_flag');?><br>
                    <label><?php echo '有'; ?>
                    <?php echo form_radio('cafeteria_plan_flag', 1, isset($result->cafeteria_plan_flag) && $result->cafeteria_plan_flag == 1 ? 'checked' : ''); ?>
                    <label><?php echo '無'; ?>
                    <?php echo form_radio('cafeteria_plan_flag', 0, isset($result->cafeteria_plan_flag) && $result->cafeteria_plan_flag == 0 ? 'checked' : ''); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('独立支援制度フラグ', 'independent_support_flag');?><br>
                    <label><?php echo '有'; ?>
                    <?php echo form_radio('independent_support_flag', 1, isset($result->independent_support_flag) && $result->independent_support_flag == 1 ? 'checked' : ''); ?>
                    <label><?php echo '無'; ?>
                    <?php echo form_radio('independent_support_flag', 0, isset($result->independent_support_flag) && $result->independent_support_flag == 0 ? 'checked' : ''); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('育児休暇・介護休暇フラグ', 'child_care_flag');?><br>
                    <label><?php echo '有'; ?>
                    <?php echo form_radio('child_care_flag', 1, isset($result->child_care_flag) && $result->child_care_flag == 1 ? 'checked' : ''); ?>
                    <label><?php echo '無'; ?>
                    <?php echo form_radio('child_care_flag', 0, isset($result->child_care_flag) && $result->child_care_flag == 0 ? 'checked' : ''); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('社宅・家賃補助制度フラグ', 'company_house_flag');?><br>
                    <label><?php echo '有'; ?>
                    <?php echo form_radio('company_house_flag', 1, isset($result->company_house_flag) && $result->company_house_flag == 1 ? 'checked' : ''); ?>
                    <label><?php echo '無'; ?>
                    <?php echo form_radio('company_house_flag', 0, isset($result->company_house_flag) && $result->company_house_flag == 0 ? 'checked' : ''); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('研修制度充実フラグ', 'training_flag');?><br>
                    <label><?php echo '有'; ?>
                    <?php echo form_radio('training_flag', 1, isset($result->training_flag) && $result->training_flag == 1 ? 'checked' : ''); ?>
                    <label><?php echo '無'; ?>
                    <?php echo form_radio('training_flag', 0, isset($result->training_flag) && $result->training_flag == 0 ? 'checked' : ''); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('掲載完了区分', 'post_complete');?><br>
                    <label><?php echo '有'; ?>
                    <?php echo form_radio('post_complete', 1, isset($result->post_complete) && $result->post_complete == 1 ? 'checked' : ''); ?>
                    <label><?php echo '無'; ?>
                    <?php echo form_radio('post_complete', 0, isset($result->post_complete) && $result->post_complete == 0 ? 'checked' : ''); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('セミナータイトルID', 'seminar_title_id'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'seminar_title_id',
                        'name'  => 'seminar_title_id',
                        'value' => $result->seminar_title_id,
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('リンク先案件ID', 'link_job_id'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'link_job_id',
                        'name'  => 'link_job_id',
                        'value' => $result->link_job_id,
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('求人種類', 'job_type'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'job_type',
                        'name'  => 'job_type',
                        'value' => $result->job_type,
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('昇給', 'pay_rise'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'pay_rise',
                        'name'  => 'pay_rise',
                        'value' => $result->pay_rise
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('賞与', 'bonus'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'bonus',
                        'name'  => 'bonus',
                        'value' => $result->bonus
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('雇用主', 'employer_id'); ?>
                    <?php echo form_dropdown('employer_id', $employers, set_value('employer_id', $result->employer_id), array('class' => 'form-control', 'id' => 'employer_id')); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <?php echo form_label('オーダーNO', 'order_no'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'order_no',
                        'name'  => 'order_no',
                        'value' => set_value('order_no', $result->order_no),
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('案件ID', 'job_code'); ?>
                    <span class="text-red">*</span>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'job_code',
                        'name'  => 'job_code',
                        'value' => set_value('job_code', $result->job_code),
                        'required' => 'required'
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('匿名求人掲載ID', 'anonymous_job_id'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'anonymous_job_id',
                        'name'  => 'anonymous_job_id',
                        'value' => $result->anonymous_job_id
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4">
                            <?php echo form_label('掲載開始日', 'publish_start_date'); ?>
                            <span class="text-red">*</span>
                            <?php
                            echo form_input(array(
                                'type'  => 'text',
                                'class' => 'form-control datepicker',
                                'id'    => 'publish_start_date',
                                'name'  => 'publish_start_date',
                                'value' => set_value('publish_start_date', $result->publish_start_date),
                                'placeholder' => 'yyyy-mm-dd',
                                'required' => 'required',
                                'readonly' => 'readonly'
                            ));
                            ?>
                        </div>
                        <div class="col-sm-4">
                            <?php echo form_label('掲載終了日', 'publish_end_date'); ?>
                            <span class="text-red">*</span>
                            <?php
                            echo form_input(array(
                                'type'  => 'text',
                                'class' => 'form-control datepicker',
                                'id'    => 'publish_end_date',
                                'name'  => 'publish_end_date',
                                'value' => set_value('publish_end_date', $result->publish_end_date),
                                'placeholder' => 'yyyy-mm-dd',
                                'required' => 'required',
                                'readonly' => 'readonly'
                            ));
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo form_label('設立日', 'establish_date'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'establish_date',
                        'name'  => 'establish_date',
                        'value' => $result->establish_date,
                        'placeholder' => 'yyyy-mm-dd',
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('従業員数', 'employee_count'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'employee_count',
                        'name'  => 'employee_count',
                        'value' => $result->employee_count,
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('求人タイトル', 'job_title'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'job_title',
                        'name'  => 'job_title',
                        'value' => set_value('job_title', $result->job_title),
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('住所1(本社)', 'address1'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'address1',
                        'name'  => 'address1',
                        'value' => set_value('address1', $result->address1),
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('事業内容', 'company_description'); ?>
                    <?php
                    echo form_textarea(array(
                        'class' => 'form-control',
                        'id'    => 'company_description',
                        'name'  => 'company_description',
                        'rows'  => '2',
                        'value' => set_value('company_description', $result->company_description),
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('株式公開フラグ', 'market_id'); ?>
                    <?php echo form_dropdown('market_id', $market, set_value('market_id', $result->market_id), array('class' => 'form-control', 'id' => 'market_id')); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('職種大分類ID2', 'job_category_l_id2'); ?>
                    <?php echo form_dropdown('job_category_l_id2', $job_category_l, set_value('job_category_l_id2', $result->job_category_l_id2), array('class' => 'form-control', 'id' => 'job_category_l_id2')); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('職種中分類ID2', 'job_category_m_id2'); ?>

                    <?php echo form_dropdown('job_category_m_id2', array('' => '--'), set_value('job_category_m_id2', $result->job_category_m_id2), array('class' => 'form-control', 'id' => 'job_category_m_id2')); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('職種小分類ID2', 'job_category_s_id2'); ?>

                    <?php echo form_dropdown('job_category_s_id2', array('' => '--'), set_value('job_category_s_id2', $result->job_category_s_id2), array('class' => 'form-control', 'id' => 'job_category_s_id2')); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('仕事内容（詳細）', 'job_detail'); ?>
                    <?php
                    echo form_textarea(array(
                        'class' => 'form-control',
                        'id'    => 'job_detail',
                        'name'  => 'job_detail',
                        'rows'  => '2',
                        'value' => set_value('job_detail', $result->job_detail),
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('金額上限', 'max_salary'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'max_salary',
                        'name'  => 'max_salary',
                        'value' => $result->max_salary,
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('勤務地', 'work_place'); ?>
                    <?php echo form_multiselect('work_place[]', $prefecture, set_value('work_place[]', $result->work_place), array('class' => 'form-control multi-select', 'id' => 'work_place')); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('勤務地(詳細)', 'work_place2'); ?>
                    <?php
                    echo form_textarea(array(
                        'class' => 'form-control',
                        'id'    => 'work_place2',
                        'name'  => 'work_place2',
                        'rows'  => '2',
                        'value' => set_value('work_place2', $result->work_place2),
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('応募資格（詳細）', 'requirement_detail'); ?>
                    <?php
                    echo form_textarea(array(
                        'class' => 'form-control',
                        'id'    => 'requirement_detail',
                        'name'  => 'requirement_detail',
                        'rows'  => '2',
                        'value' => set_value('requirement_detail', $result->requirement_detail),
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('募集年齢下限', 'min_age'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'min_age',
                        'name'  => 'min_age',
                        'value' => $result->min_age,
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('勤務時間', 'work_time'); ?>
                    <?php
                    echo form_textarea(array(
                        'class' => 'form-control',
                        'id'    => 'work_time',
                        'name'  => 'work_time',
                        'rows'  => '2',
                        'value' => $result->work_time,
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('休日・休暇', 'holiday'); ?>
                    <?php
                    echo form_textarea(array(
                        'class' => 'form-control',
                        'id'    => 'holiday',
                        'name'  => 'holiday',
                        'rows'  => '2',
                        'value' => $result->holiday,
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('選考プロセス', 'selection_process'); ?>
                    <?php
                    echo form_textarea(array(
                        'class' => 'form-control',
                        'id'    => 'selection_process',
                        'name'  => 'selection_process',
                        'rows'  => '2',
                        'value' => $result->selection_process,
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('第2新卒可フラグ', 'second_graduate_flag');?><br>
                    <label><?php echo '有'; ?>
                    <?php echo form_radio('second_graduate_flag', 1, isset($result->second_graduate_flag) && $result->second_graduate_flag == 1 ? 'checked' : ''); ?>
                    <label><?php echo '無'; ?>
                    <?php echo form_radio('second_graduate_flag', 0, isset($result->second_graduate_flag) && $result->second_graduate_flag == 0 ? 'checked' : ''); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('企画タイプID', 'plan_type_id'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'plan_type_id',
                        'name'  => 'plan_type_id',
                        'value' => $result->plan_type_id
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('掲載期間', 'publish_period'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'publish_period',
                        'name'  => 'publish_period',
                        'value' => $result->publish_period
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('原稿ID', 'manuscript_id'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'manuscript_id',
                        'name'  => 'manuscript_id',
                        'value' => $result->manuscript_id
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('検索用社名2', 'search_company_name2'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'search_company_name2',
                        'name'  => 'search_company_name2',
                        'value' => $result->search_company_name2
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('検索用社名4', 'search_company_name4'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'search_company_name4',
                        'name'  => 'search_company_name4',
                        'value' => $result->search_company_name4
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('年間休日120日以上区分', 'holiday_120');?><br>
                    <label><?php echo '有'; ?>
                    <?php echo form_radio('holiday_120', 1, isset($result->holiday_120) && $result->holiday_120 == 1 ? 'checked' : ''); ?>
                    <label><?php echo '無'; ?>
                    <?php echo form_radio('holiday_120', 0, isset($result->holiday_120) && $result->holiday_120 == 0 ? 'checked' : ''); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('管理職区分', 'manager');?><br>
                    <label><?php echo '有'; ?>
                    <?php echo form_radio('manager', 1, isset($result->manager) && $result->manager == 1 ? 'checked' : ''); ?>
                    <label><?php echo '無'; ?>
                    <?php echo form_radio('manager', 0, isset($result->manager) && $result->manager == 0 ? 'checked' : ''); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('募集の背景', 'recruit_background'); ?>
                    <?php
                    echo form_textarea(array(
                        'class' => 'form-control',
                        'id'    => 'recruit_background',
                        'name'  => 'recruit_background',
                        'rows'  => '2',
                        'value' => $result->recruit_background,
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('語学2', 'language2');?><br>
                    <?php echo form_checkbox('language2', 1, isset($result->language2) && $result->language2 == 1 ? 'checked' : ''); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('指針理由', 'guidance_reason'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'guidance_reason',
                        'name'  => 'guidance_reason',
                        'value' => $result->guidance_reason
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('連絡先', 'contact_info'); ?>
                    <?php
                    echo form_textarea(array(
                        'class' => 'form-control',
                        'id'    => 'contact_info',
                        'name'  => 'contact_info',
                        'rows'  => '2',
                        'value' => $result->contact_info,
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('交通', 'traffic'); ?>
                    <?php
                    echo form_textarea(array(
                        'class' => 'form-control',
                        'id'    => 'traffic',
                        'name'  => 'traffic',
                        'rows'  => '2',
                        'value' => $result->traffic,
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('雇用期間', 'employ_period'); ?>
                    <?php
                    echo form_textarea(array(
                        'class' => 'form-control',
                        'id'    => 'employ_period',
                        'name'  => 'employ_period',
                        'rows'  => '2',
                        'value' => $result->employ_period,
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('代表者役職', 'representative_position'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'representative_position',
                        'name'  => 'representative_position',
                        'value' => $result->representative_position
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('論理削除区分', 'logical_deletion');?><br>
                    <label><?php echo '有'; ?>
                    <?php echo form_radio('logical_deletion', 1, isset($result->logical_deletion) && $result->logical_deletion == 1 ? 'checked' : ''); ?>
                    <label><?php echo '無'; ?>
                    <?php echo form_radio('logical_deletion', 0, isset($result->logical_deletion) && $result->logical_deletion == 0 ? 'checked' : ''); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('職種詳細ID2', 'job_details_id2'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'job_details_id2',
                        'name'  => 'job_details_id2',
                        'value' => $result->job_details_id2
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('年収例3', 'annual_income_example3'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'annual_income_example3',
                        'name'  => 'annual_income_example3',
                        'value' => $result->annual_income_example3
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('年収例5', 'annual_income_example5'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'annual_income_example5',
                        'name'  => 'annual_income_example5',
                        'value' => $result->annual_income_example5
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('一覧専用ﾒｯｾｰｼﾞ', 'list_message'); ?>
                    <?php
                    echo form_textarea(array(
                        'class' => 'form-control',
                        'id'    => 'list_message',
                        'name'  => 'list_message',
                        'rows'  => '2',
                        'value' => $result->list_message,
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('中途入社50%以上フラグ', 'mid_career_flag');?><br>
                    <label><?php echo '有'; ?>
                    <?php echo form_radio('mid_career_flag', 1, isset($result->mid_career_flag) && $result->mid_career_flag == 1 ? 'checked' : ''); ?>
                    <label><?php echo '無'; ?>
                    <?php echo form_radio('mid_career_flag', 0, isset($result->mid_career_flag) && $result->mid_career_flag == 0 ? 'checked' : ''); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('転勤なしフラグ', 'no_relocation_flag');?><br>
                    <label><?php echo '有'; ?>
                    <?php echo form_radio('no_relocation_flag', 1, isset($result->no_relocation_flag) && $result->no_relocation_flag == 1 ? 'checked' : ''); ?>
                    <label><?php echo '無'; ?>
                    <?php echo form_radio('no_relocation_flag', 0, isset($result->no_relocation_flag) && $result->no_relocation_flag == 0 ? 'checked' : ''); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('従業員数500名以上フラグ', 'employ500');?><br>
                    <label><?php echo '有'; ?>
                    <?php echo form_radio('employ500', 1, isset($result->employ500) && $result->employ500 == 1 ? 'checked' : ''); ?>
                    <label><?php echo '無'; ?>
                    <?php echo form_radio('employ500', 0, isset($result->employ500) && $result->employ500 == 0 ? 'checked' : ''); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('2年連続成長フラグ', 'continuous_growth_flag');?><br>
                    <label><?php echo '有'; ?>
                    <?php echo form_radio('continuous_growth_flag', 1, isset($result->continuous_growth_flag) && $result->continuous_growth_flag == 1 ? 'checked' : ''); ?>
                    <label><?php echo '無'; ?>
                    <?php echo form_radio('continuous_growth_flag', 0, isset($result->continuous_growth_flag) && $result->continuous_growth_flag == 0 ? 'checked' : ''); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('女性が活躍（女性50％以上フラグ）', 'female_flag');?><br>
                    <label><?php echo '有'; ?>
                    <?php echo form_radio('female_flag', 1, isset($result->female_flag) && $result->female_flag == 1 ? 'checked' : ''); ?>
                    <label><?php echo '無'; ?>
                    <?php echo form_radio('female_flag', 0, isset($result->female_flag) && $result->female_flag == 0 ? 'checked' : ''); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('年俸制フラグ', 'annual_salary_flag');?><br>
                    <label><?php echo '有'; ?>
                    <?php echo form_radio('annual_salary_flag', 1, isset($result->annual_salary_flag) && $result->annual_salary_flag == 1 ? 'checked' : ''); ?>
                    <label><?php echo '無'; ?>
                    <?php echo form_radio('annual_salary_flag', 0, isset($result->annual_salary_flag) && $result->annual_salary_flag == 0 ? 'checked' : ''); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('U・Iターン歓迎フラグ', 'uturn_flag');?><br>
                    <label><?php echo '有'; ?>
                    <?php echo form_radio('uturn_flag', 1, isset($result->uturn_flag) && $result->uturn_flag == 1 ? 'checked' : ''); ?>
                    <label><?php echo '無'; ?>
                    <?php echo form_radio('uturn_flag', 0, isset($result->uturn_flag) && $result->uturn_flag == 0 ? 'checked' : ''); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('持ち株会制度フラグ', 'stock_holding_flag');?><br>
                    <label><?php echo '有'; ?>
                    <?php echo form_radio('stock_holding_flag', 1, isset($result->stock_holding_flag) && $result->stock_holding_flag == 1 ? 'checked' : ''); ?>
                    <label><?php echo '無'; ?>
                    <?php echo form_radio('stock_holding_flag', 0, isset($result->stock_holding_flag) && $result->stock_holding_flag == 0 ? 'checked' : ''); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('長期休暇制度フラグ', 'long_vacation_flag');?><br>
                    <label><?php echo '有'; ?>
                    <?php echo form_radio('long_vacation_flag', 1, isset($result->long_vacation_flag) && $result->long_vacation_flag == 1 ? 'checked' : ''); ?>
                    <label><?php echo '無'; ?>
                    <?php echo form_radio('long_vacation_flag', 0, isset($result->long_vacation_flag) && $result->long_vacation_flag == 0 ? 'checked' : ''); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('完全週休2日制フラグ', 'two_day_off_flag');?><br>
                    <label><?php echo '有'; ?>
                    <?php echo form_radio('two_day_off_flag', 1, isset($result->two_day_off_flag) && $result->two_day_off_flag == 1 ? 'checked' : ''); ?>
                    <label><?php echo '無'; ?>
                    <?php echo form_radio('two_day_off_flag', 0, isset($result->two_day_off_flag) && $result->two_day_off_flag == 0 ? 'checked' : ''); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('資格取得制支援度フラグ', 'qualification_flag');?><br>
                    <label><?php echo '有'; ?>
                    <?php echo form_radio('qualification_flag', 1, isset($result->qualification_flag) && $result->qualification_flag == 1 ? 'checked' : ''); ?>
                    <label><?php echo '無'; ?>
                    <?php echo form_radio('qualification_flag', 0, isset($result->qualification_flag) && $result->qualification_flag == 0 ? 'checked' : ''); ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('商品名', 'product_name'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'product_name',
                        'name'  => 'product_name',
                        'value' => $result->product_name
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('その他募集職種表示区分', 'other_job');?><br>
                    <label><?php echo '有'; ?>
                    <?php echo form_radio('other_job', 1, isset($result->other_job) && $result->other_job == 1 ? 'checked' : ''); ?>
                    <label><?php echo '無'; ?>
                    <?php echo form_radio('other_job', 0, isset($result->other_job) && $result->other_job == 0 ? 'checked' : ''); ?>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4">
                            <?php echo form_label('掲載号From', 'issue_no_from'); ?>
                            <?php
                            echo form_input(array(
                                'type'  => 'text',
                                'class' => 'form-control',
                                'id'    => 'issue_no_from',
                                'name'  => 'issue_no_from',
                                'value' => $result->issue_no_from,
                            ));
                            ?>
                        </div>
                        <div class="col-sm-4">
                            <?php echo form_label('掲載号To', 'issue_no_to'); ?>
                            <?php
                            echo form_input(array(
                                'type'  => 'text',
                                'class' => 'form-control',
                                'id'    => 'issue_no_to',
                                'name'  => 'issue_no_to',
                                'value' => $result->issue_no_to,
                            ));
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo form_label('検索用社名（ﾌﾘｶﾞﾅ）', 'search_comp_name_kana'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'search_comp_name_kana',
                        'name'  => 'search_comp_name_kana',
                        'value' => $result->search_comp_name_kana,
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('選考のポイント', 'selection_point'); ?>
                    <?php
                    echo form_textarea(array(
                        'class' => 'form-control',
                        'id'    => 'selection_point',
                        'name'  => 'selection_point',
                        'rows'  => '2',
                        'value' => $result->selection_point,
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('見出し', 'job_detail_title'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'job_detail_title',
                        'name'  => 'job_detail_title',
                        'value' => $result->job_detail_title,
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('本文', 'job_text'); ?>
                    <?php
                    echo form_textarea(array(
                        'class' => 'form-control',
                        'id'    => 'job_text',
                        'name'  => 'job_text',
                        'rows'  => '2',
                        'value' => $result->job_text,
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('フリースペース見出し', 'free_space_title'); ?>
                    <?php
                    echo form_input(array(
                        'type'  => 'text',
                        'class' => 'form-control',
                        'id'    => 'free_space_title',
                        'name'  => 'free_space_title',
                        'value' => $result->free_space_title,
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('フリースペース本文', 'free_space_detail'); ?>
                    <?php
                    echo form_textarea(array(
                        'class' => 'form-control',
                        'id'    => 'free_space_detail',
                        'name'  => 'free_space_detail',
                        'rows'  => '2',
                        'value' => $result->free_space_detail,
                    ));
                    ?>
                </div>
            </div>
            <div class="clearfix">
                <div class="col-md-12">
                    <div class="form-group">
                    <?php if ($result->id): ?>
                        <?php echo form_submit('submit', '変更', array('class' => 'btn btn-warning btn-lg')); ?>
                    <?php else: ?>
                        <?php echo form_submit('submit', '登録', array('class' => 'btn btn-success btn-lg')); ?>
                    <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
        <?php echo form_close();?>
        <!-- /.box-body -->
        <!-- form end -->
    </div>
</section>
<script src="<?php echo base_url('assets/common/js/select2.full.js'); ?>"></script>
<script src="<?php echo base_url('assets/common/js/jquery-ui.min.js'); ?>"></script>
<script>
    $(function () {
        $('.datepicker').datepicker({ dateFormat: 'yy-mm-dd' });
        $('.multi-select').select2({
            tags: false,
            placeholder: 'エリアを選択',
            createTag: function (tag) {
                // Check if the option is already there
                var found = false;
                this.$element.find('option').each(function() {
                    if ($.trim(tag.term).toUpperCase() === $.trim($(this).text()).toUpperCase()) {
                        found = true;
                    }
                });
                // Show the suggestion only if a match was not found
                if (!found) {
                    return {
                        id: tag.term,
                        text: tag.term,
                    };
                }
            }
        });

        $('#industory_l_id').change(function () {
            Application.ChildSelectUpdater($(this), 'ajax/get_industry_m');
        });

        $('#job_category_l_id, #job_category_l_id2').change(function () {
            Application.ChildSelectUpdater($(this), 'ajax/get_jobcategory_m');
        });

        $('#job_category_m_id, #job_category_m_id2').change(function () {
            Application.ChildSelectUpdater($(this), 'ajax/get_jobcategory_s');
        });

        <?php if ($result->industory_l_id): ?>
            $('#industory_l_id').change();
            $('#industory_m_id').val('<?php echo $result->industory_m_id; ?>');
        <?php endif ?>

        <?php if ($result->job_category_l_id): ?>
            $('#job_category_l_id').change();
            $('#job_category_m_id').val('<?php echo $result->job_category_m_id; ?>');
        <?php endif ?>

        <?php if ($result->job_category_m_id): ?>
            $('#job_category_m_id').change();
            $('#job_category_s_id').val('<?php echo $result->job_category_s_id; ?>');
        <?php endif ?>

        <?php if ($result->job_category_l_id2): ?>
            $('#job_category_l_id2').change();
            $('#job_category_m_id2').val('<?php echo $result->job_category_m_id2; ?>');
        <?php endif ?>

        <?php if ($result->job_category_m_id2): ?>
            $('#job_category_m_id2').change();
            $('#job_category_s_id2').val('<?php echo $result->job_category_s_id2; ?>');
        <?php endif ?>
    });
</script>
