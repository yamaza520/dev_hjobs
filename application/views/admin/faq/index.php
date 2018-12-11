<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo $page_title; ?> (<?php echo $total_count; ?>)</h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <?php echo anchor($base_path . 'faq/setup', 'FAQ登録', array('class' => 'btn btn-success btn-flat')); ?>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>質問</th>
                                <th>回答</th>
                                <th>公開</th>
                                <th>求人詳細画面表示</th>
                                <th>表示</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody class="sortable ui-sortable">
                        <?php if (count($result)): ?>
                            <?php foreach ($result as $row): ?>
                                <tr role="row">
                                    <td><?php echo $row->question;?></td>
                                    <td><?php echo $row->answer;?></td>
                                    <td><?php echo $row->is_public ? 'はい' : 'いいえ'; ?> </td>
                                    <td><?php echo $row->job_detail_flag ? 'はい' : 'いいえ'; ?> </td>
                                    <td><?php echo $row->sort_order;?></td>
                                    <td>
                                        <?php echo anchor($base_path . 'faq/setup/'.$row->id, '変更', array('class' => 'btn bg-orange btn-flat btn-sm')); ?>
                                        <?php echo anchor("#", '削除 ', array('class' => 'btn btn-danger btn-flat btn-sm btn-delete', 'data-toggle' => 'modal', 'data-target' => '#confirm-modal', 'rel' => $row->id)); ?>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        <?php else: ?>
                            <tr role="row">
                                <td colspan="6" class="text-center">結果はありません。</td>
                            </tr>
                        <?php endif ?>
                        </tbody>
                    </table>
                    <?php echo $pagination ?>
                </div> <!-- /.box-body -->
            </div> <!-- /.box -->
        </div> <!-- /.col -->
    </div> <!-- /.row -->
</section>

<!-- confirm modal -->
<div class="modal fade" id="confirm-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php echo form_open($base_path . 'faq/delete', array('method' => 'post'));?>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">確認</h4>
                </div>
                <div class="modal-body">
                    <p>本当に削除してよろしいでしょうか？</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">キャンセル</button>
                    <button type="submit" class="btn btn-danger">はい、削除します</button>
                </div>
                <?php echo form_hidden(array('id' => 0)); ?>
                <?php echo form_hidden(array('confirm' => 'yes')); ?>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<!-- /.content -->
<script type="text/javascript">
    $(function() {
        $('.btn-delete').click(function() {
            var id = $(this).attr('rel');
            var url = $('#confirm-modal form').attr('action');
            $('#confirm-modal form').attr('action', url);
            $('#confirm-modal input[name=id]').val(id);
        });
    });
</script>
