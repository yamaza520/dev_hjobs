以下のお問い合わせがありました。<br><br>
<table border="0" cellpadding="3" cellspacing="0">
    <tr><td>会社名</td><td>： </td><td><?php echo $company; ?></td></tr>
    <tr><td>ご担当者名</td><td>： </td><td><?php echo $last_name; ?> <?php echo $first_name; ?></td></tr>
    <tr valign="top"><td>ご住所</td><td>： </td><td>〒<?php echo $zip_code; ?> <?php echo $pref; ?> <?php echo $city; ?><br><?php echo $address; ?></td></tr>
    <tr><td>メールアドレス</td><td>： </td><td><?php echo $email; ?></td></tr>
    <tr><td>電話番号</td><td>： </td><td><?php echo $phone; ?></td></tr>
    <tr valign="top"><td>お問い合わせ内容</td><td>： </td><td><?php echo nl2br($content); ?></td></tr>
</table>
