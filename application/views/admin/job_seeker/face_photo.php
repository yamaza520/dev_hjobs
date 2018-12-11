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
                <?php $this->load->view('admin/blocks/jobseeker_edit_nav.php'); ?>
                <div class="box-body">
                    <?php $this->load->view('admin/blocks/job_seeker_info'); ?>
                    <?php if ($msg): ?>
                        <div class="alert alert-danger" role="alert"><?php echo $msg; ?></div>
                    <?php endif ?>
                    <?php echo form_open_multipart(); ?>
                        <?php if($result->photo): ?>
                            <p>
                                <img src="<?php echo base_url($result->photo_url); ?>" class="face-photo" width="200" />
                                <?php echo anchor(base_url($result->photo_url), 'ズーム', array('class' => 'btn bg-orange btn-flat btn-sm', 'target' => '_blank')); ?>
                                <?php echo anchor("#", '削除', array('class' => 'btn btn-danger btn-flat btn-sm btn-delete', 'data-toggle' => 'modal', 'data-target' => '#confirm-modal', 'rel' => $result->photo)); ?>
                            </p>
                        <?php endif ?>
                        <div class="form-group">
                            <input type="file" id="upload_cv_avatar" name="face_photo" accept="image/jpg, image/jpeg, image/png"/>
                            <?php
                                echo form_input(array(
                                    'type'  => 'hidden',
                                    'name'  => 'photo',
                                    'value' => set_value('photo', $result->photo),
                                ));
                            ?>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success btn-flat" data-oneclick="true" type="submit">アップロード</button>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Delete confirm modal -->
<div class="modal fade" id="confirm-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php echo form_open($base_path . 'job_seeker/delete_face_photo/'. $result->id, array('method' => 'post'));?>
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
                <?php echo form_hidden(array('name' => 0)); ?>
                <?php echo form_hidden(array('confirm' => 'yes')); ?>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        $('.btn-delete').click(function() {
            var name = $(this).attr('rel');
            var url = $('#confirm-modal form').attr('action');
            $('#confirm-modal form').attr('action', url);
            $('#confirm-modal input[name=name]').val(name);
        });
    });
</script>
