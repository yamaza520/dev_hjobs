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
                                <div class="form-group">
                                    <?php echo form_label('雇用主名', 'name'); ?>
                                    <span class="text-red">*</span>
                                    <?php
                                    echo form_input(array(
                                        'type'  => 'text',
                                        'class' => 'form-control',
                                        'id'    => 'name',
                                        'name'  => 'name',
                                        'required' => 'required',
                                        'value' => set_value('name', $result->name),
                                    ));
                                    ?>
                                </div>
                                <div class="form-group">
                                    <?php echo form_label('メールアドレス', 'email'); ?>
                                    <span class="text-red">*</span>
                                    <?php
                                    echo form_input(array(
                                        'type'  => 'text',
                                        'class' => 'form-control',
                                        'id'    => 'email',
                                        'name'  => 'email',
                                        'required' => 'required',
                                        'value' => set_value('email', $result->email),
                                    ));
                                    ?>
                                </div>
                                <div class="form-group">
                                    <?php if ($result->id ): ?>
                                        <?php echo form_submit('submit', '変更', array('class' => 'btn btn-warning btn-lg')); ?>
                                    <?php else: ?>
                                        <?php echo form_submit('submit', '登録', array('class' => 'btn btn-success btn-lg')); ?>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php echo form_close(); ?>
                <!-- form end -->
            </div>
        </div>
</section>
