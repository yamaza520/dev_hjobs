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
                            <?php if(validation_errors()) { ?>
                            <div class="alert alert-danger" role="alert"><?php echo validation_errors(); ?></div>
                            <?php } ?>
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
                                <?php echo form_label('IPアドレス', 'ip_address');?>
                                <?php
                                echo form_input(array(
                                    'type'      => 'text',
                                    'class'     => 'form-control',
                                    'id'        => 'ip_address',
                                    'name'      => 'ip_address',
                                    'required'  => 'required',
                                    'value'     => set_value('ip_address', $record->ip_address)
                                ));
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <div class="col-md-6">
                            <?php echo form_submit('submit', 'Save', array('class' => 'btn btn-success btn-lg')); ?>
                        </div>
                    </div>
                <?php echo form_close(); ?>
                <!-- form end -->
            </div>
        </div>
    </div>
</section>
