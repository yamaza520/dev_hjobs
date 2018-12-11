<div class="member">
    <span class="name"><?php echo empty(trim($login_user['name'])) ? $login_user['email'] : $login_user['name'] .'様';?><span>マイページ</span></span>
    <div class="ta_r"><span class="numbers">会員ID:<?php echo $login_user['child']->id;?></span></div>
</div>
