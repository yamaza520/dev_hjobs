<div class="member cf">
    <span class="name"><?php echo empty(trim($login_user['name'])) ? $login_user['email'] : $login_user['name'] .'様';?><span>マイページ</span></span>
    <span class="numbers">会員ID:<?php echo $login_user['child']->id;?></span>
</div>
