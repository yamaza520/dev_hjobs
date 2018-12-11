<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
   .w-80 {
       width: 80px;
       display: inline;
   }
</style>
<section class="content-header">
    <h1><?php echo $page_title ?></h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <!-- header tabs -->
                <?php $this->load->view('admin/blocks/jobseeker_edit_nav.php'); ?>
                <div class="box-body">
                    <p><a href="#" id="form-modal-add" class="btn btn-success btn-flat">職務経歴登録</a></p>
                    <?php $this->load->view('admin/blocks/job_seeker_info'); ?>
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>会社名</th>
                                <th>在籍年月</th>
                                <th>雇用形態</th>
                                <th>年収</th>
                                <th>マネジメント経験</th>
                                <th>業種</th>
                                <th>経験職種</th>
                                <th>職務内容</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($career_history)): ?>
                                <?php foreach ($career_history as $index => $row): ?>
                                    <tr role="row">
                                        <td><?php echo $row->company_name; ?></td>
                                        <td>
                                            <span>入社<?php echo $row->from_year; ?>年</span>
                                            <span><?php echo $row->from_month; ?>月</span>
                                            <span>&emsp;～&emsp;</span>
                                            <?php if (!empty($row->to_year)) : ?>
                                                <span>退社<?php echo $row->to_year; ?>年</span>
                                                <span><?php echo $row->to_month; ?>月</span>
                                            <?php else : ?>
                                                現在就業中
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo display_config_item($row->employ_type, 'employee_type_class'); ?></td>
                                        <td><?php echo $row->annual_income; ?>万円</td>
                                        <td><?php echo $row->management_exp == 1 ? 'あり' . $row->manage_person_count . '人': 'なし'; ?></td>
                                        <td>
                                            <div>
                                                <span>大分類&emsp;-&emsp;<?php echo $row->industory_l ?></span></br>
                                                <span>小分類&emsp;-&emsp;<?php echo $row->industory_m ?></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span>大分類&emsp;-&emsp;<?php echo $row->jcat_l ?></span></br>
                                                <span>中分類&emsp;-&emsp;<?php echo $row->jcat_m ?></span></br>
                                                <span>小分類&emsp;-&emsp;<?php echo $row->jcat_s ?></span>
                                            </div>
                                        </td>
                                        <td><?php echo nl2br($row->job_description); ?></td>
                                        <td class="col-sm-2">
                                            <a href="#" class='form-modal-edit btn bg-orange btn-flat btn-sm' rel="<?php echo $index; ?>">更新</a>
                                            <?php echo anchor("#", '削除 ', array('class' => 'btn btn-danger btn-flat btn-sm btn-delete', 'data-toggle' => 'modal', 'data-target' => '#confirm-modal', 'rel' => $row->id)); ?>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                            <?php else: ?>
                                <tr role="row">
                                    <td colspan="9" class="text-center">結果はありません。</td>
                                 </tr>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- form modal -->
<div class="modal fade" id="form-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <?php echo form_open('', array('class' => 'form-horizontal'));?>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">職務経歴</h4>
                </div>
                <div class="modal-body">
                    <div class="dialog-msg" role="alert"></div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-sm-2">
                                <?php echo form_label('会社名', 'company_name'); ?>
                            </div>
                            <div class="col-sm-9">
                                <?php
                                echo form_input(array(
                                    'type'  => 'text',
                                    'class' => 'form-control',
                                    'id'    => 'company_name',
                                    'name'  => 'company_name',
                                    'value' => set_value('company_name'),
                                    'required' => 'required'
                                ));
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3">
                                <?php echo form_label('在籍年月'); ?>
                            </div>
                            <div class="col-sm-9 clearfix">
                                <div class="row">
                                    <div class="col-sm-12">
                                        開始
                                        <?php echo form_dropdown('from_year', $years, set_value('from_year'), array('required' => 'required', 'class' => 'form-control w-80')); ?>年 &nbsp;&nbsp;
                                        <?php echo form_dropdown('from_month', $months, set_value('from_month'), array('required' => 'required', 'class' => 'form-control w-80')); ?>月
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        退社
                                        <?php echo form_dropdown('to_year', $years, set_value('to_year'), array('class' => 'form-control w-80')); ?>年 &nbsp;&nbsp;
                                        <?php echo form_dropdown('to_month', $months, set_value('to_month'), array('class' => 'form-control w-80')); ?>月
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <?php echo form_label('雇用形態', 'employ_type'); ?>
                            </div>
                            <div class="col-sm-9">
                                <?php echo form_dropdown('employ_type', $employee_type_class, set_value('employ_type'), array('required' => 'required', 'class' => 'form-control')); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <?php echo form_label('年収', 'income'); ?>
                            </div>
                            <div class="col-sm-9">
                                <?php
                                    echo form_input(array(
                                        'type'  => 'text',
                                        'class' => 'form-control',
                                        'name'  => 'annual_income',
                                        'value' => set_value('annual_income'),
                                        'placeholder' => 'こちらに入力してください。',
                                        'required' => 'required'
                                    ));
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10">
                                <?php echo form_label('マネジメント経験', 'management_exp'); ?><br>
                                <label>
                                    <input type="radio" name="management_exp", value="0" <?php echo set_radio('management_exp');?>/>なし
                                </label><br>
                                <label>
                                    <input type="radio" name="management_exp" value="1" <?php echo set_radio('management_exp');?>/>あり
                                    （マネジメントした人数
                                    <?php
                                        echo form_input(array(
                                            'class' => 'form-control w-80',
                                            'type'  => 'text',
                                            'name'  => 'manage_person_count',
                                            'value' => set_value('manage_person_count'),
                                        ));
                                    ?>
                                    人）
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3">
                                <?php echo form_label('経験年月'); ?>
                            </div>
                            <div class="col-sm-9 clearfix">
                                <div class="row">
                                    <div class="col-sm-12">
                                        開始
                                        <?php echo form_dropdown('exp_from_year', $years, set_value('exp_from_year'), array('required' => 'required', 'class' => 'form-control w-80')); ?>年 &nbsp;&nbsp;
                                        <?php echo form_dropdown('exp_from_month', $months, set_value('exp_from_month'), array('required' => 'required', 'class' => 'form-control w-80')); ?>月
                                    </div>
                                </div></br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        退社
                                        <?php echo form_dropdown('exp_to_year', $years, set_value('exp_to_year'), array('class' => 'form-control w-80')); ?>年 &nbsp;&nbsp;
                                        <?php echo form_dropdown('exp_to_month', $months, set_value('exp_to_month'), array('class' => 'form-control w-80')); ?>月
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-sm-2">
                                <?php echo form_label('業種', 'industory_l'); ?>
                            </div>
                            <div class="col-sm-9">
                                <div>
                                    <span class="left">大分類</span>
                                    <?php echo form_dropdown('industory_l_id', $industory_l, set_value('industory_l_id'), array('required' => 'required', 'id' => 'industory_l_id_', 'class' => 'industory_l_id form-control')); ?>
                                </div>
                                <div>
                                    <span class="left">小分類</span>
                                    <?php echo form_dropdown('industory_m_id', '', set_value('industory_m_id'), array('required' => 'required', 'id' => 'industory_m_id_', 'class' => 'industory_m_id form-control')); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <?php echo form_label('経験職種', 'job_category'); ?>
                            </div>
                            <div class="col-sm-9">
                                <div>
                                    <span class="left">大分類</span>
                                    <?php echo form_dropdown('job_category_l_id', $job_category_l, set_value('job_category_l_id'), array('required' => 'required','id' => 'job_category_l_id_', 'class' => 'job_category_l_id form-control')); ?>
                                </div>
                                <div>
                                    <span class="left">中分類</span>
                                    <?php echo form_dropdown('job_category_m_id', '', set_value('job_category_m_id'), array('required' => 'required','id' => 'job_category_m_id_', 'class' => 'job_category_m_id form-control')); ?>
                                    </div>
                                <div>
                                    <span class="left">小分類</span>
                                    <?php echo form_dropdown('job_category_s_id', '', set_value('job_category_s_id'), array('required' => 'required','id' => 'job_category_s_id_', 'class' => 'job_category_s_id form-control')); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <?php echo form_label('職務内容', 'description'); ?>
                            </div>
                            <div class="col-sm-9">
                                <?php
                                    echo form_textarea(array(
                                        'name'        => 'job_description',
                                        'class'       => 'form-control',
                                        'rows'        => '5',
                                        'value'       => set_value('job_description'),
                                        'minlength'   => 100,
                                        'placeholder' => 'こちらに入力してください。',
                                        'data-length' => 950,
                                    ));
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">キャンセル</button>
                                <button type="submit" class="btn btn-success">登録</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo form_hidden(array('id' => 0)); ?>
                <?php echo form_hidden(array('job_seeker_id' => $job_seeker_id)); ?>
                <?php echo form_hidden(array('confirm' => 'yes')); ?>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<!-- confirm modal -->
<div class="modal fade" id="confirm-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php echo form_open($base_path . 'job_seeker/delete_career_history', array('method' => 'post'));?>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">確認</h4>
                </div>
                <div class="modal-body">
                    <p>本当に削除してよろしいでしょうか？</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">キャンセル</button>
                    <button type="submit" class="btn btn-danger">はい、削除します</button>
                </div>
                <?php echo form_hidden(array('id' => 0)); ?>
                <?php echo form_hidden(array('job_seeker_id' => $job_seeker_id)); ?>
                <?php echo form_hidden(array('confirm' => 'yes')); ?>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<script src="<?php echo base_url('assets/admin/js/modal-form.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">
    $(function() {
        AjaxFormModal.init('<?php echo base_url('admin/job_seeker/add_career_history/'.$job_seeker_id); ?>');
        AjaxFormModal.data = <?php echo json_encode($career_history, true); ?>;

        AjaxFormModal.callbacks.load_edit_data = function($form, data) {
             console.log(data);
           if (parseInt(data.current)) {
                $form.find('.to_date').hide();
            } else {
                $('.industory_l_id').change();
                $('.industory_m_id').val(data['industory_m_id']);

                $('.job_category_l_id').change();
                $('.job_category_m_id').val(data['job_category_m_id']);

                $('.job_category_m_id').change();
                $('.job_category_s_id').val(data['job_category_s_id']);
                $form.find('.to_date').show();
            }
        };

        AjaxFormModal.callbacks.reset_form_fields = function($form) {
            $form.find('.to_date').show();
        }

        $('body').on('click', 'input[name="current"]', function() {
            if ($(this).prop('checked')) {
                $('#form-modal .to_date').hide();
            } else {
                $('#form-modal .to_date').show();
            }
        });

        $('.btn-delete').click(function() {
            var id = $(this).attr('rel');
            var url = $('#confirm-modal form').attr('action');
            $('#confirm-modal form').attr('action', url);
            $('#confirm-modal input[name=id]').val(id);
        });

        $('.job_category_l_id').on('change', function() {
            Application.ChildSelectUpdater($(this), 'ajax/get_jobcategory_m');
         });

        $('.job_category_m_id').on('change', function() {
        Application.ChildSelectUpdater($(this), 'ajax/get_jobcategory_s');
        });

        $('.industory_l_id').on('change', function() {
        Application.ChildSelectUpdater($(this), 'ajax/get_industry_m');
        });
    });
</script>
