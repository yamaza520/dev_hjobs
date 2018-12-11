<style media="print">
    .resume_pdf {
        padding: 10px 5px;
    }
    .resume_pdf th {
        text-align: center;
    }
    .resume_pdf .w-550 {
        width: 550px;
    }
    .resume_pdf .w-400 {
        width: 400px;
    }
    .resume_pdf .w-200 {
        width: 200px;
    }
    .resume_pdf .w-50 {
        width: 50px;
    }
    div .name {
        height : 50px;
        font-size: 20pt;
    }
</style>
<h1>履歴書</h1>
<div align="right"><?php echo date('Y') . '年　'. date('m') . '月　' . date('d') ; ?>　現在</div>
<table class="resume_pdf" border="1">
    <tr>
        <td class="w-400">フリガナ  <?php echo $jobseeker->last_name_kana .' '. $jobseeker->first_name_kana; ?></td>
        <td class="w-50">性別</td>
        <td rowspan="2" class="w-200">
            <img src="<?php echo !empty($jobseeker->photo) ? base_url($jobseeker->photo_url) :  base_url('assets/pc/img/img18.jpg'); ?>">
        </td>
    </tr>
    <tr>
        <td>氏名 <div class="name"><?php echo $jobseeker->last_name .' '. $jobseeker->first_name; ?></div></td>
        <td>男</td>
    </tr>
    <tr>
        <td colspan="3"><?php echo $jobseeker->birth_year .'年'. $jobseeker->birth_month .'月'. $jobseeker->birth_day; ?>日</td>
    </tr>
    <tr>
        <td colspan="3">現住所<br>
            〒 <?php echo $jobseeker->zip_code .'<br>'. $jobseeker->pref_name .' '. $jobseeker->city .' '. $jobseeker->address; ?>
        </td>
    </tr>
    <tr>
        <td>E-mail <?php echo $jobseeker->email; ?></td>
        <td colspan="2">TEL <?php echo $jobseeker->phone; ?></td>
    </tr>
    <tr>
        <td colspan="3">連絡先（ 現住所以外に連絡を希望する場合のみ記入）<br>
            〒 <?php echo $jobseeker->rel_zip_code .'<br>'. $jobseeker->rel_pref_name .' '. $jobseeker->rel_city .' '. $jobseeker->rel_address; ?>
        </td>
    </tr>
</table>
<div></div>
<!-- for education and working history -->
<?php if (!empty($education_history) || !empty($work_summary_history)) : ?>
    <table class="resume_pdf" border="1">
        <tr>
            <th class="w-50">年</th>
            <th class="w-50">月</th>
            <th class="w-550">学歴・職歴（ 各別にまとめて書く）</th>
        </tr>

    <?php if (!empty($education_history)) : ?>
        <tr><th></th><th></th><th>学歴</th></tr>
        <?php foreach ($education_history as $edu) : ?>
            <tr>
                <td><?php echo $edu->from_year ;?></td>
                <td><?php echo $edu->from_month ;?></td>
                <td><?php echo $edu->description ;?></td>
            </tr>
        <?php endforeach ?>
    <?php endif ?>

    <?php if (!empty($work_summary_history)) : ?>
        <tr>
            <th></th>
            <th></th>
            <th>職歴</th>
        </tr>
        <?php foreach ($work_summary_history as $work) : ?>
            <tr>
                <td><?php echo $work->from_year ;?></td>
                <td><?php echo $work->from_month ;?></td>
                <td><?php echo $work->description ;?></td>
            </tr>
        <?php endforeach ?>
    <?php endif ?>
    </table>
    <div></div>
<?php endif ?>
<!-- for certification -->
<?php if (!empty($certification_history)) : ?>
    <table class="resume_pdf" border="1">
        <tr>
            <th class="w-50">年</th>
            <th class="w-50">月</th>
            <th class="w-550">免許・資格</th>
        </tr>
    <?php foreach ($certification_history as $certi) : ?>
        <tr>
            <td><?php echo $certi->from_year ;?></td>
            <td><?php echo $certi->from_month ;?></td>
            <td><?php echo $certi->description ;?></td>
        </tr>
    <?php endforeach ?>
    </table>
    <div></div>
<?php endif ?>

<table class="resume_pdf" border="1">
    <tr>
        <td colspan="4">志望動機<p><?php echo $jobseeker->motivation;?></p></td>
    </tr>
    <tr>
        <td colspan="4">趣味・特技<p><?php echo $jobseeker->hobby;?></p></td>
    </tr>
    <tr>
        <td colspan="4">本人希望（ 給料、 職種、 通勤時間、 勤務地に希望があれば記入）<p><?php echo $jobseeker->request;?></p></td>
    </tr>
    <tr>
        <td>最寄駅 <br> <?php echo $jobseeker->nearest_station;?></td>
        <td>扶養家族 <br> <?php echo $jobseeker->dependents;?> 人</td>
        <td>配偶者の有無 <br> <?php echo $jobseeker->marital_status == 'm' ? '既婚' : '未婚';?></td>
        <td>配偶者の扶養義務 <br> <?php echo $jobseeker->spouse_support == 1 ? '扶養義務あり' : '扶養義務なし';?></td>
    </tr>
</table>
