<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="content-header">
    <h1><?php echo $page_title ?></h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <!-- header tabs -->
                <?php echo form_open(); ?>
                    <?php $this->load->view('admin/blocks/jobseeker_edit_nav.php'); ?>
                    <div class="box-body">
                        <p><a href="#" id="form-modal-add" class="btn btn-success btn-flat">職歴登録</a></p>
                        <?php $this->load->view('admin/blocks/job_seeker_info'); ?>
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr role="row">
                                    <th>年</th>
                                    <th>月</th>
                                    <th>内容</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (count($works)) : ?>
                                    <?php foreach ($works as $index => $row): ?>
                                        <tr role="row">
                                            <td><?php echo $row->from_year ;?></td>
                                            <td><?php echo $row->from_month ;?></td>
                                            <td><?php echo $row->description ;?></td>
                                            <td class="col-sm-2">
                                                <a href="#" class='form-modal-edit btn bg-orange btn-flat btn-sm' rel="<?php echo $index; ?>">更新</a>
                                                <?php echo anchor("#", '削除', array('class' => 'btn btn-danger btn-flat btn-sm btn-delete', 'data-toggle' => 'modal', 'data-target' => '#confirm-modal', 'rel' => $row->id)); ?>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php else: ?>
                                <tr role="row">
                                    <td colspan="5" class="text-center">該当する職歴がありません。</td>
                                </tr>
                                <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="form-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php echo form_open('', array('class' => 'form-horizontal'));?>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">職歴</h4>
                </div>
                <div class="modal-body">
                    <div class="dialog-msg" role="alert"></div>
                    <?php echo form_hidden(array('job_seeker_id' => $job_seeker_id, 'id' => 0)); ?>
                    <div class="form-group">
                        <label class="col-sm-2 nopadr">期間（から）</label>
                        <div class="col-sm-9 clearfix">
                            <div class="row">
                                <div class="col-sm-3">
                                    <input id="from_year" class="form-control" name="from_year" maxlength="4" type="text" value="<?php echo set_value("from_year"); ?>" required />
                                </div>
                                <div class="col-sm-1 col-label padt-5">年</div>
                                <div class="col-sm-3">
                                    <?php echo form_dropdown('from_month', $months, '', array('id' => 'from_month', 'class' => 'form-control', 'required' => 'required')); ?>
                                </div>
                                <div class="col-sm-2 col-label padt-5">月</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">職歴</label>
                        <div class="col-sm-9">
                            <input id="" class="form-control" name="description" type="text" value="<?php echo set_value('description'); ?>" required />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">キャンセル</button>
                    <button type="submit" class="btn btn-success">登録</button>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<!-- confirm modal -->
<div class="modal fade" id="confirm-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php echo form_open($base_path.'job_seeker/delete_work_summary/'.$job_seeker_id); ?>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Confirm</h4>
                </div>
                <div class="modal-body">
                    <p>本当に削除してよろしいでしょうか？</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">キャンセル</button>
                    <button type="submit" class="btn btn-danger">はい、削除します</button>
                </div>
              <?php echo form_hidden(array('id' => 0, 'confirm' => 'yes')); ?>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<!-- /.content -->

<script src="<?php echo base_url('assets/admin/js/modal-form.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">
    $(function() {
        AjaxFormModal.init('<?php echo base_url($base_path.'job_seeker/add_work_summary/'.$job_seeker_id); ?>');
        AjaxFormModal.data = <?php echo json_encode($works, true); ?>;

        $('.btn-delete').click(function() {
            var id = $(this).attr('rel');
            var url = $('#confirm-modal form').attr('action');
            $('#confirm-modal form').attr('action', url);
            $('#confirm-modal input[name=id]').val(id);
        });
    });
</script>
