<section class="content-header">
    <h1>データベースのバックアップ</h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">ボタンをクリックしてバックアップデータファイルをダウンロードします</h3>
                </div>
                <div class="box-body">
                    <?php echo form_open($base_path . 'site_setting/db_backup');?>
                        <input type="submit" name="submit" value="バックアップする" class="btn btn-success btn-lg">
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
