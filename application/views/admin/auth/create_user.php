<section class="content-header">
    <h1><?php echo ab_role_desc($group_id) ; ?>登録</h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo ab_role_desc($group_id) ; ?>情報</h3>
                </div>
                <?php echo form_open("");?>
                    <div class="box-body">
                        <div class="col-md-6">
                            <?php if (isset($message) && $message) { ?>
                                <div class="alert alert-danger" role="alert"><?php echo $message;?></div>
                            <?php } ?>
                            <div class="form-group">
                                <?php echo lang('create_user_lname_label', 'last_name');?>
                                <?php echo form_input($last_name, '', array('class' => "form-control")); ?>
                            </div>
                            <div class="form-group">
                                <?php echo lang('create_user_fname_label', 'first_name');?>
                                <?php echo form_input($first_name, '', array('class' => "form-control")); ?>
                            </div>
                            <?php
                            if($identity_column !== 'email') {
                                echo '<div class="form-group">';
                                echo lang('create_user_identity_label', 'identity');
                                echo '<br />';
                                echo form_error('identity');
                                echo form_input($identity);
                                echo '</div>';
                            }
                            ?>
                            <div class="form-group">
                                <?php echo lang('create_user_email_label', 'email');?>
                                <?php echo form_input($email); ?>
                            </div>
                            <div class="form-group">
                                <?php echo lang('create_user_password_label', 'password');?>
                                <?php echo form_input($password); ?>
                            </div>
                            <div class="form-group">
                                <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
                                <?php echo form_input($password_confirm); ?>
                            </div>
                            <div class="form-group" style="display:none">
                                <div class="radio">
                                <?php foreach ($groups as $group):?>
                                    <label class="radio">
                                        <?php
                                        $checked = null;
                                        if ($group['id'] == $group_id) {
                                            $checked = ' checked="checked"';
                                        }
                                        ?>
                                        <input type="radio" name="groups" value="<?php echo $group['id'];?>"<?php echo $checked; ?> />
                                        <?php echo htmlspecialchars($group['description'], ENT_QUOTES, 'UTF-8'); ?>
                                    </label>
                                <?php endforeach?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="col-md-6">
                            <?php echo form_submit('submit', lang('create_user_submit_btn'), array('class' => 'btn btn-lg btn-success'));?>
                        </div>
                    </div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
    <!-- /.box -->
</section>
