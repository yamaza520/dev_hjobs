<section class="content-header">
    <h1><?php echo lang('change_password_heading');?></h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
        <!-- general form elements -->
            <div class="box box-primary">
            <?php echo form_open();?>
                <div class="box-body">
                    <div class="col-md-6">
                        <?php if ($message) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $message;?>
                            </div>
                        <?php } ?>
                        <div class="form-group">
                            <?php echo lang('change_password_old_password_label', 'old_password');?>
                            <?php echo form_input($old_password);?>
                        </div>
                        <div class="form-group">
                            <label for="new_password"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length);?></label>
                            <?php echo form_input($new_password);?>
                        </div>
                        <div class="form-group">
                            <?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm');?>
                            <?php echo form_input($new_password_confirm);?>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="col-md-6">
                        <?php echo form_input($user_id);?>
                        <?php echo form_submit('submit', lang('change_password_submit_btn'), array('class' => 'btn btn-success')); ?>
                    </div>
                </div>
            <?php echo form_close();?>
            </div>
        </div>
    </div>
<!-- /.box -->
</section>
