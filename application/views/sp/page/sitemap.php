<h2 class="tit mgn10">サイトマップ</h2>
<div class="inner">
    <div class="sitemap">
        <ul class="link_box cf">
            <li><a href="<?php echo site_url(); ?>">トップページ</a></li>
            <li><a href="<?php echo site_url('subscribe'); ?>">メルマガ登録</a></li>
            <li><a href="<?php echo site_url('login'); ?>">ログイン</a></li>
            <li><a href="<?php echo site_url('contact'); ?>">お問い合わせ</a></li>
        </ul>
        <ul class="link_box cf">
            <li class="w100p"><a href="<?php echo site_url('company-contact'); ?>">提携をご希望の企業様へ</a></li>
            <li class="w100p"><a href="<?php echo site_url('privacy'); ?>">プライバシーポリシー</a></li>
            <li><a href="<?php echo site_url('company'); ?>">会社概要</a></li>
            <li><a href="<?php echo site_url('help'); ?>">ヘルプ</a></li>
            <li><a href="<?php echo site_url('sitemap'); ?>">サイトマップ</a></li>
            <li><a href="<?php echo site_url('tos'); ?>">利用規約</a></li>
        </ul>
        <ul class="link_box cf">
            <?php foreach ($article_type as $key => $value): ?>
                <li class="w100p">
                    <a href="<?php echo site_url('articles/category/'.$key ) ?>">
                        転職サポート特集：<?php echo $value;?>
                    </a>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</div>

<a href="#container" class="top_btn"><img src="<?php echo base_url('assets/sp/img/totop.png'); ?>" alt="" class="totop"></a>
