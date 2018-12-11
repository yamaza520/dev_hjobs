<section class="content-header">
    <h1><?php echo $page_title ?></h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">コラム情報</h3>
                </div>
                <!-- form start -->
                <?php echo form_open_multipart(); ?>
                    <div class="box-body">
                        <div class="col-md-6">
                            <?php if (isset($message) && $message) { ?>
                                <div class="alert alert-danger" role="alert"><?php echo $message;?></div>
                            <?php } ?>
                            <div class="form-group">
                                <?php echo form_label('タイトル', 'title'); ?>
                                <?php
                                echo form_input(array(
                                    'type'  => 'text',
                                    'class' => 'form-control',
                                    'id'    => 'title',
                                    'name'  => 'title',
                                    'value' => set_value('title', $article->title),
                                    'required' => 'required'
                                ));
                                ?>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('カテゴリー', 'category'); ?>
                                <?php echo form_dropdown('category', $article_type, set_value('category', $article->article_type_id), array('class' => 'form-control', 'id' => 'category')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('Description', 'description'); ?>
                                <?php
                                echo form_textarea(array(
                                    'class' => 'form-control',
                                    'id'    => 'description',
                                    'name'  => 'description',
                                    'rows'  => '4',
                                    'value' => set_value('description', $article->description),
                                    'required' => 'required'
                                ));
                                ?>
                            </div>

                            <div class="form-group">
                                <?php echo form_label('アイキャッチ画像', 'category'); ?>
                                <?php echo form_hidden('heading-image-name', $article->heading_image); ?>
                                <?php
                                $file = $this->config->item('upload_article_img_path');
                                $file_path = $file . $article->heading_image ;
                                if (is_file($file_path) && file_exists($file_path)): ?>
                                <div class="image"><img src="<?php echo base_url($file_path ); ?>" alt="" width="200"></div>
                                <?php endif ?>
                                <input type="file" name="heading-image" class="form-control" accept="image/png,image/jpg/,image/jpeg,image/gif" <?php echo (empty($article->heading_image)) ? 'required' : ''; ?>/>
                            </div>

                            <div class="form-group">
                                <?php echo form_label('公開', 'is_published'); ?>
                                <?php
                                    echo form_checkbox(array(
                                        'name'      => 'is_public',
                                        'value'     => 1,
                                        'checked'   => $article->is_public,
                                    ));
                                ?>
                            </div>

                            <div class="form-group">
                                <a href="#" class="btn btn-primary" id="btn-title">見出し</a>
                                <a href="#" class="btn btn-warning" id="btn-image">画像</a>
                                <a href="#" class="btn btn-default" id="btn-text">文章</a>
                            </div>
                            <div class="form-group">
                                <div id="article-content" class="div-scroll">
                                    <?php $content_count = 0; ?>
                                    <?php if (!empty($article->contents)): ?>
                                        <?php foreach($article->contents as $content_count => $content): ?>
                                            <div class="form-group" id="row<?php echo $content_count?>">
                                                <div class="row">
                                                    <div class="col-sm-10">
                                                        <?php if ($content->type === 'title'): ?>
                                                            <input type="text" name="content[][title]" class="article-content form-control" value="<?php echo $content->content; ?>" required>
                                                        <?php elseif ($content->type === 'image') : ?>
                                                            <?php
                                                            $file_path = $file . $content->content ;
                                                            if (is_file($file_path) && file_exists($file_path)): ?>
                                                                <div class="image">
                                                                    <img src="<?php echo base_url($file_path ); ?>" alt="" width="200">
                                                                </div>
                                                            <?php endif ?>
                                                            <input type="file" name=content-image[] class="article-content form-control article-image" accept="image/png,image/jpg/,image/jpeg,image/gif">
                                                            <input type="hidden" name="content[][image]" value="<?php echo $content->content;?>">
                                                        <?php else : ?>
                                                            <textarea name="content[][text]" rows="5" cols="80" class="article-content form-control" placeholder="文章を追加" required><?php echo $content->content; ?></textarea>
                                                        <?php endif ?>
                                                    </div>
                                                    <div class="col-sm-2"><button type="button" name="delete" class="btn btn-block btn-danger btn-sm" data-id="row<?php echo $content_count?>">削除</button></div>
                                                </div>
                                            </div>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </div>
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
<script type="text/javascript">
    $(document).ready(function(){
        var row = <?php echo $content_count; ?>;

        $('#btn-title, #btn-image, #btn-text').on('click', function (e) {
            e.preventDefault();
            var text = '<div class="form-group" id="row'+row+'"><div class="row"><div class="col-sm-10">';
            var $this = $(this);

            if ($this.attr('id') === 'btn-title') { // add title
                text += '<input type="text" name="content[][title]" class="article-content form-control" placeholder="見出しを追加" required>';
            } else if ($this.attr('id') === 'btn-image') { // add image
                text += '<input type="file" name=content-image[] class="article-content form-control article-image" accept="image/png,image/jpg/,image/jpeg,image/gif" required>';
                text += '<input type="hidden" name="content[][image]">';
            } else if ($this.attr('id') === 'btn-text') { // add text
                text += '<textarea name="content[][text]" rows="5" cols="80" class="article-content form-control" placeholder="文章を追加" required></textarea>';
            }

            text += '</div>';
            text += '<div class="col-sm-2"><button type="button" name="delete" class="btn btn-block btn-danger btn-sm" data-id="row'+row+'">削除</button></div>';
            text += '</div></div>';
            row = row + 1;

            $('#article-content').append(text);
        });
    });

    $(document).on('click','button[name="delete"]', function() {
        var divId = $(this).data("id");
        $('#' + divId).remove();
    });

    $(document).on('change','.article-image', function() {
        var fileName = $(this).val().split('\\').pop();
        $(this).next('input').val(fileName);
    });
</script>
