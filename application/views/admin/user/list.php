<!-- Content Header (Page header) -->
<section class="content-header">
    <h1><?php echo ab_role_desc($group) ; ?>一覧 (<?php echo $total_count; ?>)</h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
            <?php if (in_array($group, array(GROUP_ADMIN, GROUP_EDITOR))): ?>
                <div class="box-header">
                    <?php echo anchor($base_path.'user/'.$group.'/create', ab_role_desc($group).'登録', array('class' => 'btn btn-success btn-flat')); ?>
                </div>
            <?php endif ?>
                <div class="box-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th><?php echo lang('index_lname_th');?></th>
                                <th><?php echo lang('index_fname_th');?></th>
                                <th><?php echo lang('index_email_th');?></th>
                                <th><?php echo lang('index_created');?></th>
                                <th><?php echo lang('index_last_active');?></th>
                                <th><?php echo lang('index_status_th');?></th>
                                <th><?php echo lang('index_action_th');?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if (count($users)) : ?>
                            <?php foreach ($users as $index => $user):?>
                                <tr role="row">
                                    <td><?php echo $user->last_name; ?></td>
                                    <td><?php echo $user->first_name; ?></td>
                                    <td><?php echo $user->email; ?></td>
                                    <td><?php echo date($this->config->item('datetime_format'), $user->created_on); ?></td>
                                    <td><?php echo $user->last_login ? date($this->config->item('datetime_format'), $user->last_login) : '-'; ?></td>
                                    <td>
                                        <?php if ($user->active) { ?>
                                        <i class="fa fa-circle text-green"></i> <?php echo lang('index_active_link'); ?>
                                        <?php } else { ?>
                                        <i class="fa fa-circle text-gray"></i> <?php echo lang('index_inactive_link'); ?>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php echo anchor($base_path.'auth/edit_user/'.$user->id, '変更', array('class' => 'btn bg-orange btn-flat btn-sm')); ?>
                                        <?php echo anchor('#', '削除', array('class' => 'btn btn-danger btn-flat btn-sm btn-delete', 'data-toggle' => 'modal', 'data-target' => '#confirm-delete-model', 'rel' => $user->id)); ?>
                                        <?php
                                        if ($user->active) {
                                            echo anchor("#", '無効にする', array('class' => 'btn btn-default btn-flat btn-sm btn-deactivate', 'data-toggle' => 'modal', 'data-target' => '#confirm-modal', 'rel' => $user->id));
                                        } else {
                                            echo anchor(sprintf('%sadmin_auth/activate/%d/%d', $base_path, $user->id, $group), '有効にする', array('class' => 'btn btn-success btn-flat btn-sm'));
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        <?php else: ?>
                            <tr role="row">
                                <td colspan="7">結果はありません。</td>
                            </tr>
                        <?php endif ?>
                        </tbody>
                    </table>
                    <div class="clearfix">
                        <div class="pull-right"><?php echo $pagination; ?></div>
                    </div>
                </div> <!-- /.box-body -->
            </div> <!-- /.box -->
        </div> <!-- /.col -->
    </div> <!-- /.row -->
</section>

<!-- confirm modal -->
<div class="modal fade" id="confirm-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php echo form_open($base_path.'admin_auth/deactivate/0');?>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">確認</h4>
                </div>
                <div class="modal-body">
                    <p>本当に無効にしてよろしいでしょうか？</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">キャンセル</button>
                    <button type="submit" class="btn btn-danger">はい、無効にします</button>
                </div>
                <?php echo form_hidden($csrf); ?>
                <?php echo form_hidden('group', $group); ?>
                <?php echo form_hidden('id', 0); ?>
                <?php echo form_hidden('confirm', 'yes'); ?>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<!-- confirm delete modal -->
<div class="modal fade" id="confirm-delete-model">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php echo form_open('admin/user/'.$group.'/delete');?>
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
                <?php echo form_hidden($csrf); ?>
                <?php echo form_hidden('id', 0); ?>
                <?php echo form_hidden('action', 'delete'); ?>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        $('.btn-deactivate').click(function() {
            var id = $(this).attr('rel');
            var url = $('#confirm-modal form').attr('action').replace(/<?php echo trim($base_path, '/'); ?>\/admin_auth\/deactivate\/[0-9]/, '<?php echo $base_path; ?>admin_auth/deactivate/' + id);
            $('#confirm-modal form').attr('action', url);
            $('#confirm-modal input[name=id]').val(id);
        });

        $('.btn-delete').click(function() {
            var id = $(this).attr('rel');
            var url = $('#confirm-delete-model form').attr('action');
            $('#confirm-delete-model form').attr('action', url);
            $('#confirm-delete-model input[name=id]').val(id);
        });
    });
</script>
