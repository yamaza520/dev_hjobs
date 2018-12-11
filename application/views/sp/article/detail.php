<div id="container" class="column">
    <a href="<?php echo site_url('subscribe'); ?>" class="btn_ezine"><img src="<?php echo base_url('assets/sp/img/btn_ezine.png'); ?>" alt="無料メルマガ登録"></a>
    <div class="sec_in">
        <span class="ymd"><?php echo date('Y.m.d', strtotime($article->created_at)); ?></span>
        <div class="main_img">
            <?php
            $file = $this->config->item('upload_article_img_path');
            $file_path = $file . $article->heading_image ;
            if (is_file($file_path) && file_exists($file_path)):
            ?>
                <div class="image"><img src="<?php echo base_url($file_path ); ?>" alt="" width="200"></div>
            <?php endif ?>
            <span class="cat_tit"><?php echo nl2br($article->article_type); ?></span>
        </div>
        <div class="inner">
            <h2 class="tit2"><?php echo nl2br($article->title); ?></h2>
            <?php if (!empty($article->contents)): ?>
                <?php $content_count = 0; ?>
                <?php foreach($article->contents as $content_count => $content): ?>
                    <?php if ($content->type === 'title'): ?>
                        <?php if ($content_count !== 0): ?>
                            </dd></dl>
                        <?php endif ?>
                        <dl>
                           <dt>
                               <div class="tit_bar"><h3><?php echo nl2br($content->content); ?></h3></div>
                           </dt>
                            <dd class="cf">
                    <?php elseif ($content->type === 'image') : ?>
                        <?php
                        $file_path = $file . $content->content ;
                        if (is_file($file_path) && file_exists($file_path)): ?>
                            <div class="sub_img"><img src="<?php echo base_url($file_path ); ?>" alt=""></div>
                        <?php endif ?>
                    <?php else : ?>
                        <?php echo nl2br($content->content);?>
                    <?php endif ?>
                <?php endforeach ?>
                            </dd>
                        </dl>
            <?php endif ?>
            <div class="new_arrivals">
                <span class="tit">新着コラム</span>
                <dl>
                    <?php foreach($latest_articles as $row) : ?>
                        <dt><?php echo date('Y.m.d', strtotime($row->created_at)); ?></dt>
                        <dd><a href="<?php echo base_url($base_path.'article/detail/'.$row->id); ?>"><?php echo ab_shorten($row->title, 90); ?></a></dd>
                    <?php endforeach ?>
                </dl>
                <a href="<?php echo base_url($base_path.'articles'); ?>" class="btn_more">一覧へ</a>
            </div>
        </div>
    </div>

    <?php $this->load->view('sp/blocks/subscribe_form'); ?>
    <a href="#container" class="top_btn"><img src="<?php echo base_url('assets/sp/img/totop.png'); ?>" alt="" class="totop"></a>
</div>
