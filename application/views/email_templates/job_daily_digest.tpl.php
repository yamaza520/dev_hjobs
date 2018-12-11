<?php echo $name ; ?><br>
<br>
HOTELIER JOBS編集部です。<br>
<br>
━━━━━━━━━━<br>
<?php echo $name ; ?>の希望条件にマッチした最新求人をお届けします！！<br>
━━━━━━━━☆彡<br>
<p>
<?php foreach ($jobs as $job): ?>
<?php $job_url = site_url('job/detail/' . $job->id); ?>
[求人タイトル] <a href="<?php echo $job_url; ?>" style="text-decoration:none"><?php echo $job->job_title; ?></a><br>
￣￣￣￣￣￣￣￣￣￣
<br>
[給 与] <?php echo display_job_salary($job); ?><br>
[勤務地] <?php echo $job->address1; ?><br>
[求人URL] <a href="<?php echo $job_url; ?>"><?php echo $job_url ?></a>
<br><br>
<?php endforeach ?>
</p>

<br>
━━━━━━━━━━<br>
▽メール配信の停止<br>
https://hotelier-jobs.com/mypage/mail-setting<br>
<br>
※パスワードを忘れた方は…<br>
https://hotelier-jobs.com/auth/forgot_password<br>
━━━━━━━━━━<br>
お問い合わせ・ご意見はこちらへ（10～18時／月～金 ※祝日を除く）<br>
⇒https://hotelier-jobs.com/contact<br>
<br>
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━<br>
株式会社オックスコンサルティング<br>
HOTELIER JOBS 事務局<br>
E-Mail: contact@hotelier-jobs.com<br>
URL: http://ox-consulting.jp/<br>
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━<br>