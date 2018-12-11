<div id="contents" class="column">
    <div class="inner">
        <div id="bread" class="cf">
            <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="<?php echo site_url(); ?>" itemprop="url"><span itemprop="title">HOME</span></a></div>
            <div itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><span itemprop="title">コラム一覧</span></div>
        </div>
        <h2 class="tit">コラム一覧</h2>
        <div class="page-numbers_wrap cf">
            <?php if (count($articles)): ?>
                <span class="current_page"><?php echo $paging_info ; ?></span>
                <div class="pager">
                    <?php echo $pagination; ?>
                </div>
            <?php endif ?>
        </div>

        <div class="cf">
            <div id="main">
                <div class="cf">
                    <?php if (count($articles)): ?>
                        <?php foreach ($articles as $article): ?>
                            <a href="<?php echo site_url('article/detail/'.$article->id); ?>" class="cont">
                                <dl>
                                    <?php
                                        $file = $this->config->item('upload_article_img_path');
                                        $file_path = $file.''.$article->heading_image ;
                                        if (file_exists($file_path)): ?>
                                            <dt>
                                                <div class="main_img">
                                                    <img src="<?php echo base_url($file_path ); ?>" alt="">
                                                    <span><?php echo nl2br($article->article_type); ?></span>
                                                </div>
                                            </dt>
                                    <?php endif ?>
                                    <dd>
                                        <span class="ymd"><?php echo (empty($article->updated_at)) ? date('Y.m.d', strtotime($article->created_at)) : date('Y-m-d', strtotime($article->updated_at)); ?></span>
                                        <span class="tit"><?php echo nl2br($article->title); ?></span>
                                        <span class="text"><?php echo nl2br($article->description); ?></span>
                                    </dd>
                                </dl>
                            </a>
                        <?php endforeach ?>
                        <div class="page-numbers_wrap cf">
                            <span class="current_page"><?php echo $paging_info ; ?></span>
                            <?php echo $pagination; ?>
                        </div>
                    <?php else: ?>
                        データはありません。
                    <?php endif ?>
                </div>
            </div><!--/#main-->

            <div id="side">
                <ul id="side_menu">
                    <?php foreach ($article_type as $key => $value): ?>
                        <li>
                            <a href="<?php echo site_url('articles/category/'.$key ) ?>" class=<?php echo ($search_article_type ==$key) ? 'active' : '' ;?>>
                                <?php echo $value;?>
                            </a>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div><!--/#side-->
        </div>
    </div>
    <?php $this->load->view('pc/blocks/subscribe_form'); ?>
</div><!--/#contents-->
