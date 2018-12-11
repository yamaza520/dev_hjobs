<section class="content-header">
    <h1><?php echo $page_title ?></h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body">
                    <?php echo form_open();?>
                    <?php if ($site_setting->value == 0): ?>
                    <?php echo form_label('現在の設定：メンテナンスモードOFF');?>
                        <div class="form-group">
                            <input type="submit" name="submit" value="メンテナンスモードONにする" class="btn btn-lg btn-danger">
                        </div>
                    <?php else: ?>
                        <?php echo form_label('現在の設定：メンテナンスモードON');?>
                        <div class="form-group">
                            <input type="submit" name="submit" value="メンテナンスモードOFFにする" class="btn btn-lg btn-success">
                        </div>
                    <?php endif ?>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
