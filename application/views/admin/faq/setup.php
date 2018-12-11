<section class="content-header">
    <h1><?php echo $page_title ?></h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <?php echo form_open("");?>
                    <div class="box-body">
                        <div class="col-md-6">
                            <?php if (isset($message) && $message) { ?>
                               <div class="alert alert-danger" role="alert"><?php echo $message;?></div>
                           <?php } ?>
                            <div class="form-group">
                                <?php echo form_label('質問', 'question'); ?>
                                <?php
                                    echo form_input(array(
                                        'type'  => 'text',
                                        'class' => 'form-control',
                                        'name'  => 'question',
                                        'value' => set_value('question', $result->question),
                                        'required' => 'required'
                                    ));
                                ?>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('回答', 'answer'); ?>
                                <?php
                                    echo form_textarea(array(
                                        'class' => 'form-control',
                                        'name'  => 'answer',
                                        'rows'   => '4',
                                        'value' => set_value('answer', $result->answer),
                                        'required' => 'required'
                                   ));
                               ?>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('公開', 'is_public');?><br>
                                <label><?php echo form_radio('is_public', 1, isset($result->is_public) && $result->is_public == 1); ?> はい</label>
                                <label><?php echo form_radio('is_public', 0, isset($result->is_public) && $result->is_public == 0); ?> いいえ</label>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('求人詳細画面表示', 'job_detail_flag');?><br>
                                <label><?php echo form_radio('job_detail_flag', 1, isset($result->job_detail_flag) && $result->job_detail_flag == 1); ?> はい</label>
                                <label><?php echo form_radio('job_detail_flag', 0, isset($result->job_detail_flag) && $result->job_detail_flag == 0); ?> いいえ</label>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('表示順', 'sort_order'); ?>
                                <?php
                                    echo form_input(array(
                                        'type'  => 'text',
                                        'class' => 'form-control',
                                        'name'  => 'sort_order',
                                        'value' => set_value('sort_order', $result->sort_order),
                                        'required' => 'required'
                                    ));
                                ?>
                            </div>
                            <div class="form-group">
                                <?php if ($result->id): ?>
                                    <input type="submit" name="submit" value="変更" class="btn btn-lg btn-warning">
                                <?php else: ?>
                                    <input type="submit" name="submit" value="登録" class="btn btn-lg btn-success">
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</section>
