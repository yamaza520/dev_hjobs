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
                <div class="box-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <?php if ($type === 'company'): ?>
                                    <th>会社名</th>
                                <?php endif ?>
                                <th><?php echo $type === "company" ? "ご担当者名" : "お名前" ;?></th>
                                <?php if ($type === 'company'): ?>
                                    <th>ご住所</th>
                                <?php endif ?>
                                <th>メールアドレス</th>
                                <th>電話番号</th>
                                <th>お問い合わせ内容</th>
                                <th>登録日</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody class="sortable ui-sortable">
                            <?php if (count($result)): ?>
                                <?php foreach ($result as $row): ?>
                                    <tr role="row">
                                        <?php if ($type === 'company'): ?>
                                            <td><?php echo $row->company;?></td>
                                        <?php endif ?>
                                        <td><?php echo $row->last_name . " " . $row->first_name;?></td>
                                        <?php if ($type === 'company'): ?>
                                            <td>〒<?php echo $row->zip_code;?> <?php echo $row->pref_name;?> <?php echo $row->city;?> <?php echo $row->address;?></td>
                                        <?php endif ?>
                                        <td><?php echo $row->email;?></td>
                                        <td><?php echo $row->phone;?></td>
                                        <td><?php echo nl2br($row->content);?></td>
                                        <td><?php echo date($this->config->item('datetime_format'), strtotime($row->created_at)); ?></td>
                                        <td><?php echo anchor("#", '削除 ', array('class' => 'btn btn-danger btn-flat btn-sm btn-delete', 'data-toggle' => 'modal', 'data-target' => '#confirm-modal', 'rel' => $row->id)); ?></td>
                                    </tr>
                                <?php endforeach;?>
                            <?php else: ?>
                                <tr role="row">
                                    <td colspan="7" class="text-center">結果はありません。</td>
                                </tr>
                            <?php endif ?>
                        </tbody>
                    </table>
                    <?php echo $pagination ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- confirm modal -->
<div class="modal fade" id="confirm-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php echo form_open($base_path . 'contact/delete/' . $type, array('method' => 'post'));?>
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
