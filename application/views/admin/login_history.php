<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>ログイン履歴</h1>
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
                                <th>ログインお名前</th>
                                <th>メールアドレス</th>
                                <th>ログイン日時</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($result as $row): ?>
                            <tr>
                                <td><?php echo $row->user_name;?></td>
                                <td><?php echo $row->email;?></td>
                                <td><?php echo $row->created_at;?></td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                    <?php echo $pagination ?>
                </div> <!-- /.box-body -->
            </div> <!-- /.box -->
        </div> <!-- /.col -->
    </div> <!-- /.row -->
</section>
