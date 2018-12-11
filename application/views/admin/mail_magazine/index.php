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
                                <th>To (メールアドレス)</th>
                                <th>To (お名前)</th>
                                <th>件名</th>
                                <th class="col-sm-7">文章</th>
                                <th>送信日時</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($result)): ?>
                                <?php foreach ($result as $row): ?>
                                    <tr role="row">
                                        <td><?php echo $row->email;?></td>
                                        <td><?php echo $row->last_name . " " . $row->first_name;?></td>
                                        <td><?php echo $row->subject;?></td>
                                        <td><?php echo nl2br($row->message);?></td>
                                        <td><?php echo date($this->config->item('datetime_format'), strtotime($row->sent_at)); ?></td>
                                    </tr>
                                <?php endforeach;?>
                            <?php else: ?>
                                <tr role="row">
                                    <td colspan="5" class="text-center">結果はありません。</td>
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
