<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="content-header">
    <h1><?php echo $page_title; ?> (<?php echo $total_count; ?>)</h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <?php $this->load->view('admin/blocks/job_edit_nav.php'); ?>
                <div class="box-body">
                    <div class="box-body">
                    <?php if ($msg): ?>
                        <div class="alert alert-danger" role="alert"><?php echo $msg; ?></div>
                    <?php endif ?>
                    <?php echo form_open_multipart(); ?>
                        <div class="form-group">
                            <input type="file" id="job_photo" name="job_photo" accept="image/jpg, image/jpeg, image/png"/>
                            <?php
                                echo form_input(array(
                                    'type'  => 'hidden',
                                    'name'  => 'photo',
                                ));
                            ?>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success btn-flat" data-oneclick="true" type="submit">アップロード</button>
                        </div>
                    <?php echo form_close(); ?>
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>画像</th>
                            </tr>
                        </thead>
                        <tbody class="sortable ui-sortable">
                        <?php if (count($job_image)): ?>
                            <?php foreach ($job_image as $row): ?>
                                <tr role="row">
                                    <td><a href="<?php echo base_url('uploads/job_image/' . $row->url); ?>" target="_blank"><img src="<?php echo base_url('uploads/job_image/' . $row->url); ?>" width="150"></a>
                                    <?php echo anchor("#", '削除', array('class' => 'btn btn-danger btn-flat btn-sm btn-delete', 'data-toggle' => 'modal', 'data-target' => '#confirm-modal', 'rel' => $row->id, 'data-name' => $row->url, 'data-id' => $row->id)); ?>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        <?php else: ?>
                            <tr role="row">
                                <td colspan="1" class="text-center">結果はありません。</td>
                            </tr>
                        <?php endif ?>
                        </tbody>
                    </table>
                    <?php echo $pagination ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Delete confirm modal -->
<div class="modal fade" id="confirm-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php echo form_open($base_path . 'job/delete_job_photo/'. $result->id, array('method' => 'post'));?>
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
                <?php echo form_hidden(array('name' => '')); ?>
                <?php echo form_hidden(array('confirm' => 'yes')); ?>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        $('.btn-delete').click(function() {
            var id = $(this).attr('data-id');
            var name = $(this).attr('data-name');
            var url = $('#confirm-modal form').attr('action');
            $('#confirm-modal form').attr('action', url);
            $('#confirm-modal input[name=id]').val(id);
            $('#confirm-modal input[name=name]').val(name);
        });
    });
</script>
