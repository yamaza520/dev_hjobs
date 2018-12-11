<div id="contents" class="column">
    <div id="bread" class="cf inner">
        <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="<?php echo site_url(); ?>" itemprop="url"><span itemprop="title">HOME</span></a></div>
        <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="<?php echo site_url('articles'); ?>" itemprop="url"><span itemprop="title">コラム一覧</span></a></div>
        <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><span itemprop="title">タイトルタイトルタイトル</span></div>
    </div>
    <div class="inner cf">
        <div id="main">
            <div class="sec_in">
                <div class="cf">
                    <span class="cat_tit"><?php echo nl2br($article->article_type); ?></span>
                    <span class="ymd"><?php echo date('Y.m.d', strtotime($article->created_at)); ?></span>
                </div>
                <h2 class="tit2"><?php echo nl2br($article->title); ?></h2>
                <div class="main_img">
                     <?php
                        $file = $this->config->item('upload_article_img_path');
                        $file_path = $file . $article->heading_image ;
                        if (is_file($file_path) && file_exists($file_path)): ?>
                        <div class="image"><img src="<?php echo base_url($file_path ); ?>" alt="" width="200"></div>
                    <?php endif ?>
                </div>
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
            </div>
        </div><!--/#main-->

        <div id="side">
            <ul id="side_menu">
                <?php foreach ($article_type as $key => $value): ?>
                    <li>
                        <a href="<?php echo site_url('articles/category/'.$key ) ?>" class=<?php echo ($article->article_type_id ==$key) ? 'active' : '' ;?>>
                            <?php echo $value;?>
                        </a>
                    </li>
                <?php endforeach ?>
            </ul>
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
        </div><!--/#side-->
    </div>
    <?php $this->load->view('pc/blocks/subscribe_form'); ?>
</div><!--/#contents-->
