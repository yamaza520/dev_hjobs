<div id="mv">
    <div class="inner">
        <div class="rec_num">
            <!--全国のホテル業務求人数
            <span><?php //echo number_format($job_count) ; ?></span>
            件掲載-->
            全国のホテル・旅館・民泊業務の求人を掲載中！！
        </div>
        <?php echo form_open('jobs', array('method' => 'get')); ?>
            <div class="search_wrap cf">
                <div class="search_box">
                    <div class="search">
                        <select name="q[work_place]">
                        <?php foreach ($prefectures as $pref_cd => $name): ?>
                            <option value="<?php echo $pref_cd;?>"><?php echo $name;?></option>
                        <?php endforeach;?>
                        </select>
                    </div>
                    <div class="search">
                        <select name="q[job_category_s_id]">
                            <option value="">職種を選択</option>
                            <option value="346">宿泊</option>
                            <option value="342">婚礼</option>
                            <option value="341">受付</option>
                            <option value="347">葬祭</option>
                            <option value="343">調理</option>
                            <option value="344">レストランマネジメント</option>
                            <option value="345">ウェイター／ウェイトレス</option>
                            <option value="340">管理</option>
                        </select>
                    </div>
                    <div class="search">
                        <select name="q[employ_type_class]">
                            <option value="">雇用形態を選択</option>
                            <?php foreach ($employ_type_class as $value => $employ): ?>
                                <option value="<?php echo $value;?>"><?php echo $employ;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <input type="submit" value="検索" />
                </div>
            </div>
        <?php echo form_close(); ?>
        <img src="<?php echo base_url('assets/pc/img/mv_text02.png'); ?>" alt="気になるキーワードをクリック！" class="mgn18">
        <div class="cf keyword">
            <ul class="w700">
                <?php foreach ($top_job_flags as $top_job_flag): ?>
                    <li><a href="<?php echo site_url(sprintf('jobs/?q[%s]=1', $top_job_flag->code)); ?>"><?php echo $top_job_flag->name; ?></a></li>
                <?php endforeach ?>
            </ul>
            <a data-target="con1" class="modal-open btn_more"><img src="<?php echo base_url('assets/pc/img/btn_more.png'); ?>" alt="詳しく探す"></a>
        </div>
        <div id="con1" class="modal-content">
            <a class="modal-close"><img src="<?php echo base_url('assets/pc/img/close.png'); ?>" alt=""></a>
            <div class="btn_box">
                <div class="cf keyword">
                    <ul>
                        <?php foreach ($other_job_flags as $other_job_flag): ?>
                            <li><a href="<?php echo site_url(sprintf('jobs/?q[%s]=1', $other_job_flag->code)); ?>"><?php echo $other_job_flag->name; ?></a></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div><!--/#mv-->
<div id="contents" class="top">
    <div class="cf inner">
        <div id="main">
            <div class="sec">
                <h2 class="tit">簡単！エリア検索／都道府県検索</h2>
                <div class="sec_in cf">
                    <img src="<?php echo base_url('assets/pc/img/top_map.jpg'); ?>" alt="" class="map">
                    <dl class="map">
                        <dt>北海道・東北エリア</dt>
                        <dd>
                            <a href="<?php echo site_url('jobs/hokkaido'); ?>">北海道</a>
                            <a href="<?php echo site_url('jobs/aomori'); ?>">青森</a>
                            <a href="<?php echo site_url('jobs/iwate'); ?>">岩手</a>
                            <a href="<?php echo site_url('jobs/miyagi'); ?>">宮城</a>
                            <a href="<?php echo site_url('jobs/akita'); ?>">秋田</a>
                            <a href="<?php echo site_url('jobs/yamagata'); ?>">山形</a>
                            <a href="<?php echo site_url('jobs/fukushima'); ?>">福島</a>
                        </dd>
                        <dt>関東エリア</dt>
                        <dd>
                            <a href="<?php echo site_url('jobs/tokyo'); ?>">東京</a>
                            <a href="<?php echo site_url('jobs/kanagawa'); ?>">神奈川</a>
                            <a href="<?php echo site_url('jobs/chiba'); ?>">千葉</a>
                            <a href="<?php echo site_url('jobs/saitama'); ?>">埼玉</a>
                            <a href="<?php echo site_url('jobs/ibaraki'); ?>">茨城</a>
                            <a href="<?php echo site_url('jobs/tochigi'); ?>">栃木</a>
                            <a href="<?php echo site_url('jobs/gunma'); ?>">群馬</a>
                        </dd>
                        <dt>北陸・北信越エリア</dt>
                        <dd>
                            <a href="<?php echo site_url('jobs/niigata'); ?>">新潟</a>
                            <a href="<?php echo site_url('jobs/toyama'); ?>">富山</a>
                            <a href="<?php echo site_url('jobs/ishikawa'); ?>">石川</a>
                            <a href="<?php echo site_url('jobs/fukui'); ?>">福井</a>
                            <a href="<?php echo site_url('jobs/yamanashi'); ?>">山梨</a>
                            <a href="<?php echo site_url('jobs/nagano'); ?>">長野</a>
                            <a href="<?php echo site_url('jobs/shizuoka'); ?>">静岡</a>
                            <a href="<?php echo site_url('jobs/aichi'); ?>">愛知</a>
                            <a href="<?php echo site_url('jobs/gifu'); ?>">岐阜</a>
                        </dd>
                        <dt>関西エリア</dt>
                        <dd>
                            <a href="<?php echo site_url('jobs/osaka'); ?>">大阪</a>
                            <a href="<?php echo site_url('jobs/hyogo'); ?>">兵庫</a>
                            <a href="<?php echo site_url('jobs/kyoto'); ?>">京都</a>
                            <a href="<?php echo site_url('jobs/shiga'); ?>">滋賀</a>
                            <a href="<?php echo site_url('jobs/nara'); ?>">奈良</a>
                            <a href="<?php echo site_url('jobs/wakayama'); ?>">和歌山</a>
                            <a href="<?php echo site_url('jobs/mie'); ?>">三重</a>
                        </dd>
                        <dt>中国・四国エリア</dt>
                        <dd>
                            <a href="<?php echo site_url('jobs/tottori'); ?>">鳥取</a>
                            <a href="<?php echo site_url('jobs/shimane'); ?>">島根</a>
                            <a href="<?php echo site_url('jobs/okayama'); ?>">岡山</a>
                            <a href="<?php echo site_url('jobs/hiroshima'); ?>">広島</a>
                            <a href="<?php echo site_url('jobs/yamaguchi'); ?>">山口</a>
                            <a href="<?php echo site_url('jobs/tokushima'); ?>">徳島</a>
                            <a href="<?php echo site_url('jobs/kagawa'); ?>">香川</a>
                            <a href="<?php echo site_url('jobs/ehime'); ?>">愛媛</a>
                            <a href="<?php echo site_url('jobs/kochi'); ?>">高知</a>
                        </dd>
                        <dt>九州・沖縄エリア</dt>
                        <dd>
                            <a href="<?php echo site_url('jobs/fukuoka'); ?>">福岡</a>
                            <a href="<?php echo site_url('jobs/saga'); ?>">佐賀</a>
                            <a href="<?php echo site_url('jobs/nagasaki'); ?>">長崎</a>
                            <a href="<?php echo site_url('jobs/kumamoto'); ?>">熊本</a>
                            <a href="<?php echo site_url('jobs/oita'); ?>">大分</a>
                            <a href="<?php echo site_url('jobs/miyazaki'); ?>">宮崎</a>
                            <a href="<?php echo site_url('jobs/kagoshima'); ?>">鹿児島</a>
                            <a href="<?php echo site_url('jobs/okinawa'); ?>">沖縄</a>
                        </dd>
                    </dl>
                </div>
            </div>
            <div class="cf">
                <div class="sec">
                    <h2 class="tit">簡単！職種検索</h2>
                    <div class="sec_in">
                        <dl class="cat">
                            <dt>宿泊</dt>
                            <dd>
                                <a href="<?php echo site_url('jobs?q[job_category_s_id]=346'); ?>">宿泊・ホテル・冠婚葬祭関連</a>
                            </dd>
                            <dt>婚礼</dt>
                            <dd>
                                <a href="<?php echo site_url('jobs?q[job_category_s_id]=342'); ?>">ブライダル・イベントコーディネーター</a>
                            </dd>
                            <dt>受付</dt>
                            <dd>
                                <a href="<?php echo site_url('jobs?q[job_category_s_id]=341'); ?>">フロント業務・予約受付</a>
                            </dd>
                            <dt>葬祭</dt>
                            <dd>
                                <a href="<?php echo site_url('jobs?q[job_category_s_id]=347'); ?>">葬儀関連
</a>
                            </dd>
                            <dt>レストラン</dt>
                            <dd>
                                <a href="<?php echo site_url('jobs?q[job_category_s_id]=343'); ?>">調理</a>
                                <a href="<?php echo site_url('jobs?q[job_category_s_id]=344'); ?>">レストランマネジメント
</a>
                                <a href="<?php echo site_url('jobs?q[job_category_s_id]=345'); ?>">ウェイター／ウェイトレス</a>
                            </dd>
                            <dt>管理</dt>
                            <dd>
                                <a href="<?php echo site_url('jobs?q[job_category_s_id]=340'); ?>">施設管理・マネジメント</a>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="sec">
                <h2 class="tit">こだわり＆資格検索</h2>
                <?php echo form_open(site_url('jobs'), array('method' => 'get')); ?>
                    <div class="sec_in cf">
                        <h3 class="tit">会社・社風</h3>
                        <ul class="cf check_wrap">
                            <li><input type="checkbox" name="q[average_age_flag]" value="1"><label><?php echo display_job_flag('average_age_flag'); ?></label></li>
                            <li><input type="checkbox" name="q[mid_career_flag]" value="1"><label><?php echo display_job_flag('mid_career_flag'); ?></label></li>
                            <li><input type="checkbox" name="q[female_flag]" value="1"><label><?php echo display_job_flag('female_flag'); ?></label></li>
                            <li><input type="checkbox" name="q[foreign_company_flag]" value="1"><label><?php echo display_job_flag('foreign_company_flag'); ?></label></li>
                            <li><input type="checkbox" name="q[market_id]" value="1"><label><?php echo display_job_flag('market_id'); ?></label></li>
                        </ul>
                        <h3 class="tit">就業環境</h3>
                        <ul class="cf check_wrap">
                            <li><input type="checkbox" name="q[flex_flag]" value="1"><label><?php echo display_job_flag('flex_flag'); ?></label></li>
                            <li><input type="checkbox" name="q[cloth_free_flag]" value="1"><label><?php echo display_job_flag('cloth_free_flag'); ?></label></li>
                            <li><input type="checkbox" name="q[two_day_off_flag]" value="1"><label><?php echo display_job_flag('two_day_off_flag'); ?></label></li>
                            <li><input type="checkbox" name="q[holiday_120]" value="1"><label><?php echo display_job_flag('holiday_120'); ?></label></li>
                        </ul>
                        <h3 class="tit">採用情報</h3>
                        <ul class="cf check_wrap">
                            <li><input type="checkbox" name="q[second_graduate_flag]" value="1"><label><?php echo display_job_flag('second_graduate_flag'); ?></label></li>
                            <li><input type="checkbox" name="q[any_education_flag]" value="1"><label><?php echo display_job_flag('any_education_flag'); ?></label></li>
                            <li><input type="checkbox" name="q[uturn_flag]" value="1"><label><?php echo display_job_flag('uturn_flag'); ?></label></li>
                            <li><input type="checkbox" name="q[inexperienced_flag]" value="1"><label><?php echo display_job_flag('inexperienced_flag'); ?></label></li>
                            <li><input type="checkbox" name="q[no_relocation_flag]" value="1"><label><?php echo display_job_flag('no_relocation_flag'); ?></label></li>
                            <li><input type="checkbox" name="q[work_abroad]" value="1"><label><?php echo display_job_flag('work_abroad'); ?></label></li>
                            <li><input type="checkbox" name="q[manager]" value="1"><label><?php echo display_job_flag('manager'); ?></label></li>
                        </ul>
                        <h3 class="tit">福利厚生</h3>
                        <ul class="cf check_wrap">
                            <li><input type="checkbox" name="q[company_house_flag]" value="1"><label><?php echo display_job_flag('company_house_flag'); ?></label></li>
                            <li><input type="checkbox" name="q[child_care_flag]" value="1"><label><?php echo display_job_flag('child_care_flag'); ?></label></li>
                            <li><input type="checkbox" name="q[stock_holding_flag]" value="1"><label><?php echo display_job_flag('stock_holding_flag'); ?></label></li>
                        </ul>
                        <h3 class="tit">キャリアアップ</h3>
                        <ul class="cf check_wrap">
                            <li><input type="checkbox" name="q[training_flag]" value="1"><label><?php echo display_job_flag('training_flag'); ?></label></li>
                            <li><input type="checkbox" name="q[qualification_flag]" value="1"><label><?php echo display_job_flag('qualification_flag'); ?></label></li>
                            <li><input type="checkbox" name="q[internal_venture_flag]" value="1"><label><?php echo display_job_flag('internal_venture_flag'); ?></label></li>
                            <li><input type="checkbox" name="q[independent_support_flag]" value="1"><label><?php echo display_job_flag('independent_support_flag'); ?></label></li>
                        </ul>
                        <?php /*
                        <h3 class="tit">資格検索</h3>
                        <ul class="cf check_wrap">
                          <li><input type="checkbox" name="資格検索"><label>ホテルビジネス検定</label></li>
                          <li><input type="checkbox" name="資格検索"><label>ホテル実務技能検定</label></li>
                          <li><input type="checkbox" name="資格検索"><label>レストランサービス技能検定</label></li>
                          <li><input type="checkbox" name="資格検索"><label>サービス接遇検定</label></li>
                          <li><input type="checkbox" name="資格検索"><label>TOELC600点以上</label></li>
                          <li><input type="checkbox" name="資格検索"><label>ユニバーサルマナー検定</label></li>
                          <li><input type="checkbox" name="資格検索"><label>実用英語技能検定</label></li>
                          <li><input type="checkbox" name="資格検索"><label>実用フランス語検定</label></li>
                          <li><input type="checkbox" name="資格検索"><label>中国語検定</label></li>
                          <li><input type="checkbox" name="資格検索"><label>秘書技能検定</label></li>
                          <li><input type="checkbox" name="資格検索"><label>情報処理活用能力検定</label></li>
                          <li><input type="checkbox" name="資格検索"><label>パーソナルカラー検定</label></li>
                          <li><input type="checkbox" name="資格検索"><label>フォーマルスペシャリスト検定</label></li>
                        </ul>
                        */ ?>
                        <h3 class="tit">フリーワード検索</h3>
                        <input type="text" name="q[keyword]" placeholder="フリーワード検索　※上記のこだわり・資格検索と掛け合わせでご使用いただけます。" />
                        <div class="form_btn"><input type="submit" value="検索" /></div>
                    </div>
                <?php echo form_close(); ?>
            </div>
            <?php if (count($top_jobs)): ?>
                <div class="sec">
                    <h2 class="tit">注目求人</h2>
                    <div class="sec_in">
                        <?php foreach ($top_jobs as $row): ?>
                            <div class="job">
                                <a href="<?php echo base_url($base_path.'job/detail/'.$row->id); ?>" target="_blank">
                                    <dl>
                                        <dt>
                                            <div class="img_box"><img src="<?php echo get_job_image_src($row); ?>" width="150" /></div>
                                        </dt>
                                        <dd>
                                            <span class="tit"><?php echo $row->company_name; ?></span>
                                            <span class="catch"><?php echo $row->job_title; ?></span>
                                            <span class="salary"><?php echo display_job_salary($row); ?></span>
                                            <!--<span class="add"><?php echo $row->address1; ?> <?php echo $row->address2; ?></span>-->
                                        </dd>
                                    </dl>
                                </a>
                            </div>
                        <?php endforeach ?>
                        <div class="btn"><a href="<?php echo base_url($base_path.'jobs'); ?>">すべて見る</a></div>
                    </div>
                </div>
            <?php endif ?>
            <?php if (count($new_arrival_jobs)): ?>
                <div class="sec">
                    <h2 class="tit">新着求人</h2>
                    <div class="sec_in cf">
                        <?php foreach ($new_arrival_jobs as $row ): ?>
                            <div class="job v2">
                                <a href="<?php echo base_url($base_path.'job/detail/'.$row->id); ?>" target="_blank">
                                    <dl>
                                        <dt>
                                            <div class="img_box"><img src="<?php echo get_job_image_src($row); ?>"  width="150" /></div>
                                        </dt>
                                        <dd>
                                            <span class="catch"><?php echo $row->job_title; ?></span>
                                            <span class="salary"><?php echo display_job_salary($row); ?></span>
                                            <!--<span class="add"><?php echo $row->address1; ?> <?php echo $row->address2; ?></span>-->
                                        </dd>
                                    </dl>
                                </a>
                            </div>
                        <?php endforeach ?>
                        <div class="btn clr"><a href="<?php echo base_url($base_path.'jobs'); ?>">さらに見る</a></div>
                    </div>
                </div>
            <?php endif ?>
            <div class="sec">
                <h2 class="tit">転職サポート特集</h2>
                <div class="sec_in cf">
                    <div class="tab_box2 cf bb">
                        <?php foreach ($article_types as $key => $value): ?>
                            <a href="#support<?php echo $key; ?>">
                                <?php echo $value; ?>
                            </a>
                        <?php endforeach ?>
                    </div>

                    <?php if (count($articles)): ?>
                        <?php foreach ($article_types as $id => $value): ?>
                            <div id="support<?php echo $id; ?>" class="tab_in2 cf">
                            <?php $articlesByType = $articles[$id]; ?>
                            <?php foreach ($articlesByType as $article): ?>
                                <a href="<?php echo site_url('article/detail/' . $article->id); ?>">
                                    <dl>
                                         <?php
                                            $file = $this->config->item('upload_article_img_path');
                                            $file_path = $file.''.$article->heading_image ;
                                            if (file_exists($file_path)): ?>
                                                <dt>
                                                    <div class="img_box gg"><img src="<?php echo base_url($file_path ); ?>" alt=""></div>
                                                </dt>
                                            <?php endif ?>
                                        <dd>
                                            <span class="tit"><?php echo nl2br($article->title); ?></span>
                                            <span class="text"><?php echo nl2br(ab_shorten($article->body, 342)); ?></span>
                                        </dd>
                                    </dl>
                                </a>
                            <?php endforeach ?>
                            <div class="btn"><a href="<?php echo site_url('articles/category/' . $id); ?>">さらに見る</a></div>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>
                </div>
            </div>
        </div><!--/#main-->

        <div id="side">
            <?php if (!ab_is_jobseeker()): ?>
            <img src="<?php echo base_url('assets/pc/img/side_img01.jpg'); ?>" alt="転職に役立つ情報をお届けします。転職に役立つ情報を無料のメルマガで配信中！転職活動をスムーズかつ有利に進めることができます。">
            <img src="<?php echo base_url('assets/pc/img/side_img02.jpg'); ?>" alt="POINT.1希望にあった求人情報をすぐにでもお届け">
            <img src="<?php echo base_url('assets/pc/img/side_img03.jpg'); ?>" alt="POINT.2複数の転職サイトの情報を受け取れるチャンス">
            <img src="<?php echo base_url('assets/pc/img/side_img04.jpg'); ?>" alt="POINT.3転職成功に役立つヒントが満載">
            <img src="<?php echo base_url('assets/pc/img/side_img05.jpg'); ?>" alt="カンタン登録" class="ezine_btn">
            <div class="ezine">
                <?php echo form_open(site_url('ajax/user_register'), array('id' => 'form-user-registration'));?>
                    <dl>
                        <div class="error-msg"></div>
                        <dt>メールアドレス</dt>
                        <dd>
                            <?php
                            echo form_input(array(
                                'type'  => 'email',
                                'class' => 'form-control',
                                'id'    => 'mail',
                                'name'  => 'mail',
                            ));
                            ?>
                        </dd>
                        <dt>メールアドレス（確認）</dt>
                        <dd>
                            <?php
                            echo form_input(array(
                                'type'  => 'email',
                                'class' => 'form-control',
                                'id'    => 'conf_mail',
                                'name'  => 'conf_mail',
                            ));
                            ?>
                        </dd>
                        <dt>パスワード</dt>
                        <dd>
                            <?php
                            echo form_input(array(
                                'type'  => 'password',
                                'class' => 'form-control',
                                'id'    => 'password',
                                'name'  => 'password',
                            ));
                            ?>
                        </dd>
                        <dt>パスワード（確認）</dt>
                        <dd>
                            <?php
                            echo form_input(array(
                                'type'  => 'password',
                                'class' => 'form-control',
                                'id'    => 'conf_password',
                                'name'  => 'conf_password',
                            ));
                            ?>
                        </dd>
                        <dd class="memo"><a href="">パスワードに関する注意点</a></dd>
                        <dt>都道府県</dt>
                        <dd>
                            <?php echo form_dropdown('pref', $prefectures); ?>
                        </dd>
                    </dl>
                    <div class="form_btn">
                        <?php echo form_submit('submit', '送信'); ?>
                    </div>
                <?php echo form_close(); ?>
            </div><!--/.ezine-->
            <?php endif ?>
            <div class="sec">
                <h3>特集記事</h3>
                <?php foreach ($top_articles as $row): ?>
                    <a href="<?php echo base_url($base_path.'article/detail/'.$row->id); ?>">
                        <dl>
                            <?php
                            $file = $this->config->item('upload_article_img_path');
                            $file_path = $file.''.$row->heading_image ;
                            if (file_exists($file_path)): ?>
                                <dt>
                                    <img src="<?php echo base_url($file_path ); ?>" alt="">
                                </dt>
                            <?php endif ?>
                            <dd>
                                <span class="ymd"><?php echo date('Y.m.d', strtotime($row->created_at)); ?></span>
                                <span class="tit"><?php echo $row->title; ?></span>
                                <span class="text"><?php echo ab_shorten($row->body, 90); ?></span>
                            </dd>
                        </dl>
                    </a>
                <?php endforeach ?>
            </div>
            <div class="sec">
                <h3>お知らせ</h3>
                <?php if (count($news)): ?>
                    <?php foreach ($news as $row): ?>
                        <a href="<?php echo base_url($base_path.'news/detail/'.$row->id); ?>">
                            <dl>
                                <dt><span class="ymd"><?php echo date('Y.m.d', strtotime($row->created_at)); ?></span></dt>
                                <dd><span class="tit"><?php echo nl2br($row->title); ?></span></dd>
                            </dl>
                        </a>
                    <?php endforeach ?>
                <?php endif ?>
                <div class="list_btn"><a href="<?php echo base_url($base_path.'news'); ?>">一覧へ</a></div>
            </div>
        </div><!--/#side-->
    </div>
    <div class="modal-overlay"></div>
</div><!--/#contents-->
<script type="text/javascript">
    $(function() {
        Application.quickUserRegistration($('#form-user-registration'));
    });
</script>
