<section class="content-header">
    <h1><?php echo $page_title; ?></h1>
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
                                'value' => set_value('id', $record->id)
                            ));
                            ?>
                            <div class="form-group">
                                <?php echo form_label('お名前', 'name');?>
                                <?php
                                echo form_input(array(
                                    'type'      => 'text',
                                    'class'     => 'form-control',
                                    'id'        => 'name',
                                    'name'      => 'name',
                                    'required'  => 'required',
                                    'value'     => set_value('name', $record->name)
                                ));
                                ?>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('表示順', 'sort_order');?>
                                <?php
                                echo form_input(array(
                                    'type'      => 'text',
                                    'class'     => 'form-control',
                                    'id'        => 'sort_order',
                                    'name'      => 'sort_order',
                                    'required'  => 'required',
                                    'value'     => set_value('sort_order', $record->sort_order)
                                ));
                                ?>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('トップ表示', 'top_flag'); ?><br>
                                <label><?php echo form_radio('top_flag', 1, isset($record->top_flag) && $record->top_flag == 1); ?> はい</label>&emsp;
                                <label><?php echo form_radio('top_flag', 0, isset($record->top_flag) && $record->top_flag == 0); ?> いいえ</label>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('表示', 'show_flag'); ?><br>
                                <label><?php echo form_radio('show_flag', 1, isset($record->show_flag) && $record->show_flag == 1); ?> はい</label>&emsp;
                                <label><?php echo form_radio('show_flag', 0, isset($record->show_flag) && $record->show_flag == 0); ?> いいえ</label>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="col-md-6">
                            <?php echo form_submit('submit', '変更', array('class' => 'btn btn-warning btn-lg')); ?>
                        </div>
                    </div>
                <?php echo form_close(); ?>
                <!-- form end -->
            </div>
        </div>
    </div>
</section>
