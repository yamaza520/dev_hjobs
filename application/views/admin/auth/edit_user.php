<section class="content-header">
    <h1><?php echo lang('edit_user_heading'); ?></h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
            <!-- /.box-header -->
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo lang('edit_user_subheading'); ?></h3>
                </div>
                <!-- form start -->
                <?php echo form_open();?>
                <div class="box-body">
                    <div class="col-md-6">
                        <?php if (isset($message) && $message) { ?>
                            <div class="alert alert-danger" role="alert"><?php echo $message;?></div>
                        <?php } ?>
                        <div class="form-group">
                                <?php echo lang('edit_user_lname_label', 'last_name');?>
                                <?php echo form_input($last_name, '', array('class' => "form-control")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo lang('edit_user_fname_label', 'first_name');?>
                            <?php echo form_input($first_name);?>
                        </div>
                        <div class="form-group">
                            <?php echo lang('edit_user_email_label', 'email');?>
                            <?php echo form_input($email);?>
                        </div>
                        <div class="form-group">
                            <?php echo lang('edit_user_password_label', 'password');?>
                            <?php echo form_input($password);?>
                        </div>
                        <div class="form-group">
                            <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?>
                            <?php echo form_input($password_confirm);?>
                        </div>
                        <?php if (!empty ($company)) {?>
                            <div class="form-group">
                                <?php echo lang('edit_user_company_label', 'company');?>
                                <?php echo form_input($company);?>
                            </div>
                        <?php } ?>

                    </div>
                    <?php echo form_hidden('id', $user->id);?>
                    <?php echo form_hidden($csrf); ?>
                </div>
                <div class="box-footer">
                    <div class="col-md-6">
                        <?php echo form_submit('submit', lang('edit_user_submit_btn'), array('class' => 'btn btn-lg btn-success'));?></p>
                    </div>
                </div>
                <?php echo form_close();?>
                <!-- form end -->
            </div>
        </div>
    </div>
</section>
