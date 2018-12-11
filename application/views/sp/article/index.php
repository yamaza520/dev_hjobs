<a href="<?php echo site_url('subscribe'); ?>" class="btn_ezine"><img src="<?php echo base_url('assets/sp/img/btn_ezine.png'); ?>" alt="無料メルマガ登録"></a>
<h2 class="tit">コラム一覧</h2>
<div id="sec07" class="sec">
    <div class="tab_box cf">
        <?php foreach ($article_type as $key => $value): ?>
            <a href="<?php echo site_url('articles/category/'.$key ) ?>" class=<?php echo ($search_article_type ==$key) ? 'active' : '' ;?>>
                <?php echo $value;?>
            </a>
        <?php endforeach ?>
    </div>
         <?php if (count($articles)): ?>
            <?php foreach ($articles as $article): ?>
                <a href="<?php echo site_url('article/detail/' . $article->id); ?>" id="support" class="cont">
                    <div class="tab_in cf">
                        <dl>
                            <dt>
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
                            </dt>
                            <dd>
                                <span class="catch"><?php echo $article->title; ?></span>
                            </dd>
                        </dl>
                    </div>
                </a>
            <?php endforeach ?>
        <?php endif ?>
        <div class="page-numbers_wrap cf">
            <span class="current_page"><?php echo $paging_info ; ?></span>
            <?php echo $pagination; ?>
        </div>
</div><!--/#sec07-->
<?php $this->load->view('sp/blocks/subscribe_form'); ?>
<a href="#container" class="top_btn"><img src="<?php echo base_url('assets/sp/img/totop.png'); ?>" alt="" class="totop"></a>
