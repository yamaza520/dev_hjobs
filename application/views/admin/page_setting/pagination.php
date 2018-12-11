<section class="content-header">
    <h1><?php echo $page_title ?></h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo $page_title ?></h3>
                </div>
                <!-- form start -->
                <?php echo form_open(); ?>
                    <div class="box-body">
                        <div class="col-md-6">
                            <?php if (isset($message) && $message) { ?>
                                <div class="alert alert-danger" role="alert"><?php echo $message;?></div>
                            <?php } ?>
                            <div class="form-group">
                                <?php echo form_label('ページ名', 'page_name'); ?>
                                <?php echo form_dropdown('page_name', $pages, $page_name, array('class' => 'form-control', 'id' => 'page_name', 'required' => 'required')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('ページあたり件数', 'pagination_limit'); ?>
                                <?php
                                echo form_input(array(
                                    'type'  => 'text',
                                    'class' => 'form-control',
                                    'id'    => 'pagination_limit',
                                    'name'  => 'pagination_limit',
                                    'required' => 'required',
                                    'value' => set_value('pagination_limit', !empty($page) ? $page->pagination_limit : '')
                                ));
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="col-md-6">
                            <?php echo form_submit('submit', '登録', array('class' => 'btn btn-lg btn-success'));?>
                        </div>
                    </div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
    <!-- /.box -->
</section>
<script>
    $(function(){
      $('#page_name').on('change', function () {
          var value = $(this).val();

          if (value) {
              window.location = '<?php echo site_url($base_path . 'page_setting/pagination/'); ?>' + value;
          } else {
              window.location = '<?php echo site_url($base_path . 'page_setting/pagination'); ?>';
          }
      });
    });
</script>
