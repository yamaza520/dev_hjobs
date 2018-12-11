<div id="container" class="recruit checklist signup">
    <h2 class="tit mgn10"><?php echo $page_title; ?></h2>
    <div class="inner">
        <div class="app_box">
            <table>
                <tr>
                    <th>会社名</th>
                    <td><?php echo $job->company_name; ?></td>
                    <?php if ($job->media_logo_file): ?>
                        <td rowspan="2" class="img_box">
                            <img src="<?php echo base_url('assets/common/img/' . $job->media_logo_file); ?>" alt="">
                        </td>
                    <?php endif ?>
                </tr>
                <tr>
                    <th>職種</th>
                    <td><?php echo $job->job_title; ?></td>
                </tr>
            </table>
        </div>

        <p class="app_memo">
        入力情報は、この求人情報の提供元サイトを経由して応募企業に連絡されます。<br>
        連絡される情報の項目は提供元サイトによって異なりますので、<a href="<?php echo site_url('tos'); ?>" target="_blank">こちら</a>の詳細をご確認の上、応募を完了して下さい。<br>
        ※複数の求人に一括応募の場合、すでに応募されている「応募済」求人には再度応募はできませんので予めご了承ください。
        </p>

        <?php echo form_open('');?>
            <?php if ($job->product_name != MEDIA_DODA): ?>
                <ul class="form_flow cf app">
                    <li class="current">応募内容の確認</li>
                    <li>応募完了</li>
                </ul>
                <div class="change_bar cf">
                    <span class="tit">基本情報</span>
                    <a href="<?php echo site_url('mypage/basic?redirect=job/application/'.$job->id); ?>">この項目を修正する</a>
                </div>
                <div class="form_tbl sec_in app">
                    <dl>
                        <dt>お名前<span class="must">必須</span></dt>
                        <dd class="w1 cf">
                            <?php echo $job_seeker->last_name . ' ' . $job_seeker->first_name ; ?>
                        </dd>
                    </dl>
                    <dl>
                        <dt>フリガナ<span class="must">必須</span></dt>
                        <dd class="w1 cf">
                             <span class="input_text"><?php echo $job_seeker->last_name_kana . ' ' . $job_seeker->first_name_kana ; ?></span>
                        </dd>
                    </dl>
                    <dl>
                        <dt>性別<span class="must">必須</span></dt>
                        <dd>
                            <span class="input_text"><?php echo $job_seeker->gender === 'm' ? '男性' : '女性' ; ?></span>
                        </dd>
                    </dl>
                    <dl>
                        <dt>生年月日<span class="must">必須</span></dt>
                        <dd class="w1">
                            <span class="input_text"><?php echo $job_seeker->birth_year; ?></span>
                            <span class="right bb">年</span>
                            <span class="input_text"><?php echo $job_seeker->birth_month; ?></span>
                            <span class="right bb">月</span>
                            <span class="2"><?php echo $job_seeker->birth_day; ?></span>
                            <span class="right bb">日</span>
                        </dd>
                    </dl>
                    <dl>
                        <dt>メールアドレス<span class="must">必須</span></dt>
                        <dd class="w3"><span class="input_text"><?php echo $job_seeker->email; ?></span></dd>
                    </dl>
                    <dl>
                        <dt>電話番号<span class="must">必須</span></dt>
                        <dd class="w2">
                            <span class="input_text"><?php echo $job_seeker->phone; ?></span>
                        </dd>
                    </dl>
                    <dl>
                        <dt>住所<span class="must">必須</span></dt>
                        <dd class="add">
                            <span class="left">〒</span><span class="input_text"><?php echo $job_seeker->zip_code; ?></span>
                            <span class="input_text"><?php echo $job_seeker->pref_name; ?></span>
                            <span class="input_text"><?php echo $job_seeker->city; ?></span>
                            <span class="input_text"><?php echo $job_seeker->address; ?></span>
                        </dd>
                    </dl>
                    <dl class="mgn30">
                        <dt>既婚 / 未婚<span class="must">必須</span></dt>
                        <dd>
                            <span class="input_text"><?php echo $job_seeker->marital_status === 'm' ? '既婚' : '未婚' ; ?></span>
                        </dd>
                    </dl>
                </div>

                <div class="change_bar cf">
                    <span class="tit">学歴情報</span>
                    <a href="<?php echo site_url('mypage/career-history?redirect=job/application/'.$job->id); ?>">この項目を修正する</a>
                </div>
                <div class="form_tbl sec_in app">
                    <dl>
                        <dt>最終学歴</dt>
                        <dd class="w4">
                            <span class="input_text"><?php echo display_config_item($job_seeker->last_education_cd, 'school_type'); ?></span><br>
                            <span class="left">卒業区分</span>
                            <span class="input_text"><?php echo $job_seeker->graduate_year; ?></span>
                            <span class="right">年</span>
                            <span class="input_text"><?php echo $job_seeker->graduate_month; ?></span>
                            <span class="right">月</span>
                            <span class="input_text"><?php echo display_config_item($job_seeker->graduate_cd, 'degree_status'); ?></span><br>
                            <span class="left">文理区分</span>
                            <span class="input_text"><?php echo display_config_item($job_seeker->literature_type, 'literature_type'); ?></span><br>
                            <span class="left">学校名</span>
                            <span class="input_text"><?php echo $job_seeker->school_name; ?></span>
                        </dd>
                    </dl>
                </div>

                <div class="change_bar cf">
                    <span class="tit">語学力</span>
                    <a href="<?php echo site_url('mypage/career-history?redirect=job/application/'.$job->id); ?>">この項目を修正する</a>
                </div>
                <div class="form_tbl sec_in app">
                    <dl>
                        <dt>語学英語レベル</dt>
                        <dd>
                            <span class="input_text"><?php echo display_config_item($job_seeker->english_level, 'english_level'); ?></span>
                        </dd>
                    </dl>
                    <dl>
                        <dt>TOEIC</dt>
                        <dd class="income">
                            <span class="input_text"><?php echo $job_seeker->toeic; ?></span><span class="right">点</span>
                        </dd>
                    </dl>
                    <dl>
                        <dt>その他外国語</dt>
                        <dd class="w365">
                            <span class="input_text"><?php echo $job_seeker->other_language; ?></span>
                        </dd>
                    </dl>
                </div>

                <div class="change_bar cf">
                    <span class="tit">職歴情報</span>
                    <a href="<?php echo site_url('mypage/career-history?redirect=job/application/'.$job->id); ?>">この項目を修正する</a>
                </div>
                <div class="form_tbl sec_in app">
                    <dl>
                        <dt>現在の勤務状況</dt>
                        <dd>
                            <span class="input_text"><?php echo (int)$job_seeker->is_working === 0 ? '就業中' : '離職中' ; ?></span>
                        </dd>
                    </dl>
                    <dl>
                        <dt>転職回数</dt>
                        <dd class="select_wrap">
                            <span class="input_text"><?php echo $job_seeker->change_work_count; ?></span>
                            <span class="right">回</span>
                        </dd>
                    </dl>
                    <?php if (!empty($job_seeker->working_history)): ?>
                        <?php foreach($job_seeker->working_history as $work_i => $work): ?>
                            <div class="career_box">
                                <div class="tit_bg">職務経歴-<?php echo $work_i + 1; ?></div>
                                <dl>
                                    <dt>会社名</dt>
                                    <dd>
                                        <span class="input_text"><?php echo $work->company_name; ?></span>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>在籍年月</dt>
                                    <dd>
                                        <span class="left">入社</span>
                                        <span class="input_text"><?php echo $work->from_year; ?></span>
                                        <span class="right">年</span>
                                        <span class="input_text"><?php echo $work->from_month; ?></span>
                                        <span class="right">月</span>
                                        <span class="right">&emsp;～&emsp;</span>
                                        <?php if (!empty($work->to_year)) : ?>
                                            <span class="left">退社</span>
                                            <span class="input_text"><?php echo $work->to_year; ?></span>
                                            <span class="right">年</span>
                                            <span class="input_text"><?php echo $work->to_month; ?></span>
                                            <span class="right">月</span>
                                        <?php else : ?>
                                            <span class="right">現在就業中</span>
                                        <?php endif; ?>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>雇用形態</dt>
                                    <dd>
                                        <span class="input_text"><?php echo display_config_item($work->employ_type, 'employee_type_class'); ?></span>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>年収</dt>
                                    <dd>
                                        <span class="input_text"><?php echo $work->annual_income; ?></span></span><span class="right">万円</span>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>マネジメント経験</dt>
                                    <dd>
                                        <span class="input_text"><?php echo $work->management_exp === 1 ? 'あり' . $work->manage_person_count . '人': 'なし'; ?></span>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>業種</dt>
                                    <dd>
                                        <div>
                                            <span class="left">大分類</span>
                                            <span class="input_text"><?php echo $work->industory_l ?></span>
                                        </div>
                                        <div>
                                            <span class="left">小分類</span>
                                            <span class="input_text"><?php echo $work->industory_m ?></span>
                                        </div>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>経験職種</dt>
                                    <dd>
                                        <div>
                                            <span class="left">大分類</span>
                                            <span class="input_text"><?php echo $work->jcat_l ?></span>
                                        </div>
                                        <div>
                                            <span class="left">中分類</span>
                                            <span class="input_text"><?php echo $work->jcat_m ?></span>
                                        </div>
                                        <div>
                                            <span class="left">小分類</span>
                                            <span class="input_text"><?php echo $work->jcat_s ?></span>
                                        </div>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>職務内容</dt>
                                    <dd>
                                        <span class="input_text"><?php echo nl2br($work->job_description); ?></span>
                                    </dd>
                                </dl>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>
                </div>

                <div class="change_bar cf">
                    <span class="tit">転職理由・自己PR</span>
                    <a href="<?php echo site_url('mypage/career-history?redirect=job/application/'.$job->id); ?>">この項目を修正する</a>
                </div>
                <div class="form_tbl sec_in app">
                    <dl>
                        <dt>転職理由</dt>
                        <dd>
                            <span class="input_text"><?php echo nl2br($job_seeker->reason_for_change_work); ?></span>
                        </dd>
                    </dl>
                    <dl class="nobdr">
                        <dt>自己PR</dt>
                        <dd>
                            <span class="input_text"><?php echo nl2br($job_seeker->pr); ?></span>
                        </dd>
                    </dl>
                </div>

                <?php if (count($similar_jobs)): ?>
                    <p class="reccomend_title">同じ経歴書で下記の求人にも応募することができます。</p>
                    <div class="sec_in">
                        <ul class="list_favorite">
                            <?php foreach ($similar_jobs as $row): ?>
                                <li class="list">
                                    <label class="list<?php if ($row->media_type == 'link') echo ' no-left-pad'; ?>">
                                        <?php if ($row->media_type != 'link'): ?>
                                            <span class="checkbox">
                                                <input name="jobs[]" type="checkbox" value="<?php echo $row->id; ?>" />
                                            </span>
                                        <?php endif ?>
                                    </label>
                                    <span class="id">求人ID：<?php echo $row->job_code; ?></span>
                                    <div class="rec_box bg_w">
                                        <div class="cf">
                                            <div class="img_box"><img src="<?php echo get_job_image_src($row); ?>" alt=""></div>
                                            <div class="right_box">
                                                <span class="name"><?php echo $row->company_name; ?></span>
                                                <a href="<?php echo site_url($base_path.'job/detail/'.$row->id); ?>" target="_blank" class="chach"><?php echo $row->job_title; ?></a>
                                                <div class="publish cf">
                                                    <?php if ($row->media_logo_file): ?>
                                                        <img src="<?php echo base_url('assets/common/img/' . $row->media_logo_file); ?>" alt="">
                                                    <?php endif ?>
                                                </div>
                                            </div>
                                        </div>
                                        <dl class="rec_cont">
                                            <dt class="ta_c">給与</dt>
                                            <dd>
                                            <?php echo display_job_salary($row); ?>
                                            </dd>
                                            <!--<dt class="ta_c">勤務地</dt>
                                            <dd>
                                            <?php echo $row->address1; ?> <?php echo $row->address2; ?>
                                            </dd>-->
                                        </dl>
                                        <div class="btn_box w100p cf">
                                            <a href="<?php echo site_url($base_path.'job/detail/'.$row->id); ?>" target="_blank">詳細</a>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php endif ?>

                <div class="app_memo">
                ※入力情報は、各求人情報の情報提供元サイトを経由して応募企業に連絡されます。<br>
                ※一部データについては企業に渡らないものがあります。
                </div>
            <?php endif ?>
            <div class="app_form_btn">
                <input type="hidden" name="jobs[]" value="<?php echo $job->id; ?>">
                <input type="submit" value="この内容で応募する" />
            </div></br>
            <?php if ($job->product_name == MEDIA_DODA): ?>
                <div class="red">※この先はDODA様の求人サイトに遷移をします</div>
            <?php endif ?>
        <?php echo form_close(); ?>
    </div><!--.inner-->
    <a href="#container" class="top_btn"><img src="<?php echo base_url('assets/sp/img/totop.png'); ?>" alt="" class="totop"></a>
</div><!--.container-->
