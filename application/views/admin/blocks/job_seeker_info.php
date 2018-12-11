<div class="box box-default box-solid">
    <div class="box-header with-border">
        <h3 class="box-title"><?php echo $result->last_name . " " . $result->first_name?></h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-xs-4">
                <table class="table table-bordered table-striped text-left">
                    <tbody>
                        <tr>
                            <th>フリガナ</th>
                            <td><?php echo $result->last_name_kana . " " . $result->first_name_kana;?></td>
                        </tr>
                        <tr>
                            <th>性別</th>
                            <td><?php echo $result->gender == 'm' ? '男性' : '女性' ?></td>
                        </tr>
                        <tr>
                            <th>生年月日</th>
                            <td><?php if (!empty($result->birth_year)): ?>
                                    <?php echo $result->birth_year . "年 " . $result->birth_month . "月 " . $result->birth_day . "日";?>
                                <?php endif ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-xs-4">
                <table class="table table-bordered table-striped text-left">
                    <tbody>
                        <tr>
                            <th>メールアドレス</th>
                            <td><?php echo $result->email;?></td>
                        </tr>
                        <tr>
                            <th>電話番号</th>
                            <td><?php echo $result->phone;?></td>
                        </tr>
                        <tr>
                            <th>住所</th>
                            <td>〒<?php echo $result->zip_code . " " . $result->pref_name . " " . $result->address;?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-xs-4">
                <table class="table table-bordered table-striped text-left">
                    <tbody>
                        <tr>
                            <th>現在の勤務状況</th>
                            <td><?php echo $result->is_working == 1 ? "離職中" : "就業中" ;?></td>
                        </tr>
                        <tr>
                            <th>既婚 / 未婚</th>
                            <td><?php echo $result->marital_status == 1 ? "既婚" : "未婚" ;?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
