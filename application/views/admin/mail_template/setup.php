<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link href="<?php echo base_url('assets/common/css/jquery-ui.min.css'); ?>" rel="stylesheet">
<section class="content-header">
    <h1><?php echo $page_title ?></h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
            <!-- /.box-header -->
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo $page_title; ?></h3>
                </div>
                <!-- form start -->
                <?php echo form_open();?>
                    <div class="box-body">
                        <div class="col-md-6">
                            <?php if (validation_errors()): ?>
                                <div class="alert alert-danger" role="alert"><?php echo validation_errors(); ?></div>
                            <?php endif ?>
                            <?php
                                echo form_input(array(
                                    'type'  => 'hidden',
                                    'class' => 'form-control',
                                    'id'    => 'id',
                                    'name'  => 'id',
                                    'value' => set_value('id', $result->id)
                                ));
                            ?>
                            <div class="form-group">
                                <?php echo form_label('テンプレート名', 'name'); ?>
                                <span class="text-red">*</span>
                                <?php
                                    echo form_input(array(
                                        'type'     => 'text',
                                        'class'    => 'form-control',
                                        'id'       => 'name',
                                        'name'     => 'name',
                                        'required' => 'required',
                                        'autofocus'=> 'autofocus',
                                        'value'    => set_value('name', $result->name)
                                    ));
                                ?>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('件名', 'subject');?>
                                <span class="text-red">*</span>
                                <?php
                                    echo form_input(array(
                                        'type'     => 'text',
                                        'class'    => 'form-control',
                                        'id'       => 'subject',
                                        'name'     => 'subject',
                                        'required' => 'required',
                                        'value'    => set_value('subject', $result->subject)
                                    ));
                                ?>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('文章', 'text');?>
                                <span class="text-red">*</span>
                                <?php
                                    echo form_textarea(array(
                                        'class'    => 'form-control',
                                        'id'       => 'text',
                                        'name'     => 'text',
                                        'rows'     => '10',
                                        'required' => 'required',
                                        'value'    => set_value('text', $result->text)
                                    ));
                                ?>
                            </div>
                            <div class="form-group">
                                <?php if($result->id): ?>
                                    <?php echo form_submit('submit', '変更', array('class' => 'btn btn-success btn-lg')); ?>
                                <?php else: ?>
                                    <?php echo form_submit('submit', '登録', array('class' => 'btn btn-success btn-lg')); ?>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</section>
