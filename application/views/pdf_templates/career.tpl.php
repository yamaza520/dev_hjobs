<style>
    .working-history {
        padding: 10px 20px;
    }
</style>
<h1 align="center">職務経歴書</h1>
<div align="right">
    <?php echo date('Y') . '年　'. date('m') . '月　' . date('d') ; ?>　現在 <br>
    氏名：<?php echo $jobseeker->last_name .' '. $jobseeker->first_name; ?>
</div>
<div>経歴要約<br>
    <?php echo $jobseeker->summary; ?>
</div>

<!-- for working history -->
<?php if (!empty($working_history)) : ?>
    <div>職務経歴<br>
        <table class="working-history">
        <?php foreach ($working_history as $work) : ?>
            <tr>
                <td>
                    <span><?php echo $work->from_year . '年 '. $work->from_month ; ?> 月　～ </span>
                    <span><?php echo $work->to_year . '年 '.  $work->to_month . '月 '. $work->company_name ; ?></span><br>
                    ［業種］<?php echo $work->industory_l . '　.　' . $work->industory_m ; ?><br>
                    ［経験職種］<?php echo $work->jcat_l . '　.　' . $work->jcat_m . '　.　' . $work->jcat_s ; ?><br>
                    ［雇用形態］<?php echo display_config_item($work->employ_type, 'employee_type_class') ; ?><br>
                    ［年収］<?php echo $work->annual_income ; ?><br>
                    ［マネジメント経験］<?php echo ($work->management_exp === 1 ? 'あり' . $work->manage_person_count . '人': 'なし'); ?><br>
                    ［経験年月］
                    <span><?php echo $work->exp_from_year . '年 '.  $work->exp_from_month ; ?> 月　～ </span>
                    <span><?php echo $work->exp_to_year . '年 '.  $work->exp_to_month ; ?> 月 </span><br>
                    ［職務内容］<?php echo $work->job_description ; ?><br>
                </td>
            </tr>
        <?php endforeach ?>
        </table>
    </div>
<?php endif ?>

<div>転職理由<br>
    <?php echo $jobseeker->reason_for_change_work; ?>
</div>
<div>活かせる経験・知識<br>
    <?php echo $jobseeker->useful_knowledge; ?>
</div>
<div>自己PR<br>
    <?php echo $jobseeker->pr; ?>
</div>
