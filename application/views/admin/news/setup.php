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
                <?php echo form_open('', array('method' => 'post'));?>
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
                                <?php echo form_label('タイトル', 'title');?>
                                <?php
                                echo form_input(array(
                                    'type'      => 'text',
                                    'class'     => 'form-control',
                                    'id'        => 'title',
                                    'name'      => 'title',
                                    'required'  => 'required',
                                    'value'     => set_value('title', $record->title)
                                ));
                                ?>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('本文', 'body');?>
                                <?php
                                echo form_textarea(array(
                                    'class' => 'form-control',
                                    'id'    => 'body',
                                    'name'  => 'body',
                                    'rows'  => '5',
                                    'required' => 'required',
                                    'value' => $record->body,
                                ));
                                ?>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('公開', 'is_public');?><br>
                                <label>
                                    <input type='radio' name='is_public' id='is_public' value="1" <?php echo $record->is_public == 1 ? 'checked' : ''; ?>> はい
                                </label>
                                <label>
                                    <input type='radio' name='is_public' id='is_public' value="0" <?php echo $record->is_public == 0 ? 'checked' : ''; ?>> いいえ
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <div class="col-md-6">
                            <?php if ($record->id ): ?>
                                <?php echo form_submit('submit', '変更', array('class' => 'btn btn-warning btn-lg')); ?>
                            <?php else: ?>
                                <?php echo form_submit('submit', '登録', array('class' => 'btn btn-success btn-lg')); ?>
                            <?php endif ?>
                        </div>
                    </div>
                <?php echo form_close(); ?>
                <!-- form end -->
            </div>
        </div>
    </div>
</section>
