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
                                <th>お名前</th>
                                <th>トップ表示</th>
                                <th>表示</th>
                                <th>表示順</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($result)): ?>
                                <?php foreach ($result as $row): ?>
                                    <tr role="row">
                                        <td><?php echo $row->name;?></td>
                                        <td><?php echo $row->top_flag ? 'はい' : 'いいえ'; ?></td>
                                        <td><?php echo $row->show_flag ? 'はい' : 'いいえ'; ?></td>
                                        <td><?php echo $row->sort_order;?></td>
                                        <td><?php echo anchor($base_path . 'job_flags/setup/'.$row->id, '変更', array('class' => 'btn bg-orange btn-flat btn-sm')); ?></td>
                                    </tr>
                                <?php endforeach;?>
                            <?php else: ?>
                                <tr role="row">
                                    <td colspan="3" class="text-center">結果はありません。</td>
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
