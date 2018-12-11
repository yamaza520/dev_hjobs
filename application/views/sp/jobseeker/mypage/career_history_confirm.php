<div class="inner">
    <?php $this->load->view('sp/blocks/mypage_userinfo'); ?>
</div>
<h2 class="tit mgn10">経歴情報の確認・編集</h2>
<div class="form_tbl sec_in">
    <div class="tit_bar v2">
        <h3>学歴情報</h3></div>
    <dl class="nobdr">
        <dt>最終学歴<span class="must">必須</span></dt>
        <dd class="select_wrap">
            <span class="input_text"><?php echo display_config_item($career_history['last_education_cd'], 'school_type'); ?></span>
            <br>
            <span class="left">卒業区分</span>
            <span class="input_text"><?php echo $career_history['graduate_year']; ?></span>
            <span class="right">年</span>
            <span class="input_text"><?php echo $career_history['graduate_month']; ?></span>
            <span class="right">月</span>
            <span class="input_text"><?php echo display_config_item($career_history['graduate_cd'], 'degree_status'); ?></span>
            <span class="left">文理区分</span>
            <span class="input_text"><?php echo display_config_item($career_history['literature_type'], 'literature_type'); ?></span>
            <br>
            <span class="left">学校名</span>
            <span class="input_text"><?php echo $career_history['school_name']; ?></span>
        </dd>
    </dl>
    <div class="tit_bar v2">
        <h3>職務情報</h3></div>
    <dl>
        <dt>現在の勤務状況<span class="must">必須</span></dt>
        <dd>
            <span class="input_text"><?php echo (int)$career_history['is_working'] === 0 ? '就業中' : '離職中' ; ?></span>
        </dd>
    </dl>
    <dl>
        <dt>現在の職業</dt>
        <dd>
            <span class="input_text"><?php echo $career_history['current_job']; ?></span>
        </dd>
    </dl>
    <dl>
        <dt>転職回数<span class="must">必須</span></dt>
        <dd>
            <span class="input_text"><?php echo $career_history['change_work_count']; ?></span>
            <span class="right">回</span>&emsp;
        </dd>
    </dl>
    <div class="career_box">
        <?php if (!empty($career_history['working_history'])): ?>
            <?php foreach($career_history['working_history'] as $work_i => $work): ?>
                <div class="tit_bg">職務経歴-<?php echo $work_i + 1; ?></div>
                <dl>
                    <dt>会社名<span class="must">必須</span></dt>
                    <dd>
                        <span class="input_text"><?php echo $work['company_name']; ?></span>
                    </dd>
                </dl>
                <dl>
                    <dt>在籍年月<span class="must">必須</span></dt>
                    <dd>
                        <span class="left">入社</span>
                        <span class="input_text"><?php echo $work['from_year']; ?></span>
                        <span class="right">年</span>
                        <span class="input_text"><?php echo $work['from_month']; ?></span>
                        <span class="right">月</span>
                        <?php if (!empty($work['to_year'])) : ?>
                            <span class="left">&nbsp;～&nbsp;退社</span>
                            <span class="input_text"><?php echo $work['to_year']; ?></span>
                            <span class="right">年</span>
                            <span class="input_text"><?php echo $work['to_month']; ?></span>
                            <span class="right">月</span>
                        <?php else : ?>
                            <span class="right">&nbsp;～&nbsp;現在就業中</span>
                        <?php endif; ?>
                    </dd>
                </dl>
                <dl>
                    <dt>雇用形態<span class="must">必須</span></dt>
                    <dd>
                        <span class="input_text"><?php echo display_config_item($work['employ_type'], 'employee_type_class'); ?></span>
                    </dd>
                </dl>
                <dl>
                    <dt>年収<span class="must">必須</span></dt>
                    <dd class="income">
                        <span class="input_text"><?php echo $work['annual_income']; ?></span>
                        <span class="right">万円</span>
                    </dd>
                </dl>
                <dl>
                    <dt>マネジメント経験<span class="must v2">推奨</span></dt>
                    <dd class="num mgn10">
                        <span class="input_text"><?php echo $work['management_exp'] === 1 ? 'あり' . $work['manage_person_count'] . '人': 'なし'; ?>
                    </dd>
                </dl>
                <dl>
                    <dt>業種<span class="must">必須</span></dt>
                    <dd class="job_cat">
                        <div>
                            <span class="left">大分類</span>
                            <span class="input_text"><?php echo $work['industory_l_name'] ?></span>
                        </div>
                        <div>
                            <span class="left">小分類</span>
                            <span class="input_text"><?php echo $work['industory_m_name'] ?></span>
                        </div>
                    </dd>
                </dl>
                <dl>
                    <dt>経験職種<span class="must">必須</span></dt>
                    <dd class="job_cat">
                        <div>
                            <span class="left">大分類</span>
                            <span class="input_text"><?php echo $work['job_category_l_name'] ?></span>
                        </div>
                        <div>
                            <span class="left">中分類</span>
                            <span class="input_text"><?php echo $work['job_category_m_name'] ?></span>
                        </div>
                        <div>
                            <span class="left">小分類</span>
                            <span class="input_text"><?php echo $work['job_category_s_name'] ?></span>
                        </div>
                    </dd>
                </dl>
                <dl>
                    <dt>経験年月<span class="must">必須</span></dt>
                    <dd>
                        <span class="left">開始</span>
                        <span class="input_text"><?php echo $work['exp_from_year']; ?></span>
                        <span class="right">年</span>
                        <span class="input_text"><?php echo $work['exp_from_month']; ?></span>
                        <span class="right">月</span>
                        <?php if (!empty($work['exp_to_year'])) : ?>
                            <span class="left">&nbsp;～&nbsp;終了</span>
                            <span class="input_text"><?php echo $work['exp_to_year']; ?></span>
                            <span class="right">年</span>
                            <span class="input_text"><?php echo $work['exp_to_month']; ?></span>
                            <span class="right">月</span>
                        <?php else : ?>
                            <span class="right">&nbsp;～&nbsp;現在</span>
                        <?php endif ?>
                    </dd>
                </dl>
                <dl>
                    <dt>職務内容<span class="must">必須</span></dt>
                    <dd class="motive">
                        <span class="input_text"><?php echo nl2br($work['job_description']); ?></span>
                    </dd>
                </dl>
            <?php endforeach ?>
        <?php endif ?>
    </div>
    <!--/.career_box-->

    <div class="tit_bar v2">
        <h3>語学力</h3></div>
    <dl>
        <dt>語学英語レベル<span class="must">必須</span></dt>
        <dd class="select_wrap">
            <span class="input_text"><?php echo display_config_item($career_history['english_level'], 'english_level'); ?></span>
        </dd>
    </dl>
    <dl>
        <dt>TOEIC<span class="must v2">推奨</span></dt>
        <dd class="income">
            <span class="input_text"><?php echo $career_history['toeic']; ?></span>
            <span class="right">点</span>
        </dd>
    </dl>
    <dl class="mgn10">
        <dt>その他外国語<span class="must v2">推奨</span></dt>
        <dd class="w365">
            <span class="input_text"><?php echo $career_history['other_language']; ?></span>
        </dd>
    </dl>
    <div class="tit_bar v2">
        <h3>転職理由・自己PR</h3></div>
    <dl>
        <dt>転職理由<span class="must v2">推奨</span></dt>
        <dd class="motive2">
            <span class="input_text"><?php echo $career_history['reason_for_change_work']; ?></span>
        </dd>
    </dl>
    <dl class="mgn30">
        <dt>自己PR<span class="must v2">推奨</span></dt>
        <dd class="motive2">
            <span class="input_text"><?php echo $career_history['pr']; ?></span>
        </dd>
    </dl>
    <div class="btn_box2 cf">
        <?php echo form_open(); ?>
            <input type="hidden" name="id" value="123">
            <div class="back_btn">
                <input type="button" value="編集画面に戻る"  onclick="location.href='<?php echo site_url('mypage/career-history?edit=1'); ?>';"/>
            </div>
            <div class="form_btn">
                <input type="submit" value="この内容で更新する" />
            </div>
        <?php echo form_close(); ?>
    </div>
</div>

<a href="#container" class="top_btn"><img src="<?php echo base_url('assets/sp/img/totop.png'); ?>" alt="" class="totop"></a>
