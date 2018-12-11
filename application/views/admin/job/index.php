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
                    <?php echo anchor($base_path . 'job/setup', '求人登録', array('class' => 'btn btn-success btn-flat')); ?>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>案件ID</th>
                                <th>求人タイトル</th>
                                <th>オーダーNO</th>
                                <th>会社名</th>
                                <th>住所</th>
                                <th style="width:165px">施設種類</th>
                                <th>掲載開始日</th>
                                <th>掲載終了日</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody class="sortable ui-sortable">
                        <?php if (count($result)): ?>
                            <?php foreach ($result as $row): ?>
                                <tr role="row">
                                    <td><?php echo $row->job_code;?></td>
                                    <td><?php echo $row->job_title;?></td>
                                    <td><?php echo $row->order_no;?></td>
                                    <td><?php echo $row->company_name;?></td>
                                    <td><?php echo $row->address1.' '.$row->address2;?></td>
                                    <td><?php echo form_dropdown('hotel_type_id', $hotel_type, set_value('hotel_type_id', $row->hotel_type_id), array('class' => 'form-control hotel_type', 'data-job' => $row->id)); ?></td>
                                    <td><?php echo date($this->config->item('date_format'), strtotime($row->publish_start_date)); ?></td>
                                    <td><?php echo date($this->config->item('date_format'), strtotime($row->publish_end_date)); ?></td>
                                    <td>
                                        <?php echo anchor($base_path . 'job/setup/'.$row->id, '変更', array('class' => 'btn bg-orange btn-flat btn-sm')); ?>
                                        <?php echo anchor("#", '削除 ', array('class' => 'btn btn-danger btn-flat btn-sm btn-delete', 'data-toggle' => 'modal', 'data-target' => '#confirm-modal', 'rel' => $row->id)); ?>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        <?php else: ?>
                            <tr role="row">
                                <td colspan="8" class="text-center">結果はありません。</td>
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
            <?php echo form_open($base_path . 'job/delete', array('method' => 'post'));?>
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

        $('.hotel_type').on('change', function () {
            var $this = $(this);
            $this.prop('disabled', true);
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url('ajax/job_update'); ?>',
                data: {
                    job_id: $this.data('job'),
                    hotel_type_id: $this.val(),
                },
                success: function (response) {
                    $this.prop('disabled', false);
                    if (response.error) {
                        alert(response.error);
                    }
                },
                error: function (request, status, error) {
                    $this.prop('disabled', false);
                    alert(error);
                },
            });
        });
    });
</script>
