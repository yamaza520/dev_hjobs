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
                                <th>従業員タイプクラス</th>
                                <th>職名</th>
                                <th>会社名</th>
                                <th>求職者名</th>
                                <th>登録時間</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($result)): ?>
                                <?php foreach ($result as $row):?>
                                    <tr role="row">
                                        <td><?php echo  display_employee_type($row->employ_type_class); ?></td>
                                        <td>
                                            <?php echo anchor($base_path . 'job/setup/'.$row->job_id, $row->job_title); ?>
                                        </td>
                                        <td><?php echo $row->company_name;?></td>
                                        <td>
                                            <?php echo anchor($base_path . 'job_seeker', $row->last_name . " " . $row->first_name); ?>
                                        </td>
                                        <td><?php echo date($this->config->item('datetime_format'), strtotime($row->created_at)); ?></td>
                                    </tr>
                                <?php endforeach;?>
                            <?php else: ?>
                                <tr role="row">
                                    <td colspan="9" class="text-center">結果はありません。</td>
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
