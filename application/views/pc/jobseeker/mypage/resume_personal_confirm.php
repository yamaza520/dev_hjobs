<div id="contents" class="mypage setting signup confirm">
    <?php $this->load->view('pc/blocks/mypage_breadcrumb'); ?>
    <div class="inner cf">
        <div id="main">
            <div class="sec_in">
                <?php $this->load->view('pc/blocks/mypage_userinfo'); ?>
            </div>
            <h2 class="tit mgn20">履歴書入力・編集</h2>
                <div class="sec_in">
                    <div class="tit_bar"><h3>写真の登録</h3></div>
                    <div class="cf">
                        <div id="previewer_box" class="img_box2">
                            <?php if ($resume_personal['photo']) : ?>
                                <img src="<?php echo base_url($resume_personal['photo_url']); ?>" alt="">
                            <?php else : ?>
                                <img src="<?php echo base_url('assets/pc/img/img18.jpg'); ?>" alt="">
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <div class="sec_in">
                    <div class="tit_bar"><h3>会員情報</h3></div>
                    <div class="info_tbl">
                        <table>
                            <tr>
                                <th>お名前</th>
                                <td>
                                    <span class="input_text"><?php echo $job_seeker->last_name . ' ' . $job_seeker->first_name ; ?></span>
                                </td>
                            </tr>
                            <tr>
                                <th>フリガナ</th>
                                <td><span class="input_text"><?php echo $job_seeker->last_name_kana . ' ' . $job_seeker->first_name_kana ; ?></span></td>
                            </tr>
                            <tr>
                                <th>性別</th>
                                <td><span class="input_text"><?php echo $job_seeker->gender === 'm' ? '男性' : '女性' ; ?></span></td>
                            </tr>
                            <tr>
                                <th>生年月日</th>
                                <td>
                                    <span class="input_text"><?php echo $job_seeker->birth_year;?></span>
                                    <span class="right bb">年</span>
                                    <span class="input_text"><?php echo $job_seeker->birth_month;?></span>
                                    <span class="right bb">月</span>
                                    <span class="2"><?php echo $job_seeker->birth_day;?></span>
                                    <span class="right bb">日</span>
                                </td>
                            </tr>
                            <tr>
                                <th>メールアドレス</th>
                                <td><span class="input_text"><?php echo $job_seeker->email;?></span></td>
                            </tr>
                            <tr>
                                <th>電話番号</th>
                                <td><span class="input_text"><?php echo $job_seeker->phone;?></span></td>
                            </tr>
                            <tr>
                                <th>住所</th>
                                <td>
                                    <div class="wrap_input">
                                        <span class="left bb">〒</span><span class="input_text"><?php echo $job_seeker->zip_code;?></span>&emsp;
                                        <span class="input_text"><?php echo $job_seeker->pref_name;?></span>
                                        <span class="input_text"><?php echo $job_seeker->city;?></span>
                                    </div>
                                    <span class="input_text"><?php echo $job_seeker->address;?></span>
                                </td>
                            </tr>
                            <tr>
                                <th>未婚/既婚</th>
                                <td><span class="input_text"><?php echo $job_seeker->marital_status === 'm' ? '既婚' : '未婚' ; ?></span></td>
                            </tr>
                        </table>
                        <p class="memo">※こちらの情報の編集は、マイページの基本情報から編集できます。</p>
                    </div>
                </div>

                <div class="sec_in form_tbl">
                    <div class="tit_bar"><h3>連絡先<span class="sub">(現住所以外の連絡を希望する場合のみ記入)</span></h3></div>
                    <dl class="nobdr">
                        <dt>住所<span class="must v2">推奨</span></dt>
                        <dd class="add">
                        <div class="wrap_input">
                            <span class="left">〒</span><span class="input_text"><?php echo $resume_personal['rel_zip_code'];?></span>&emsp;
                            <span class="input_text"><?php echo $resume_personal['rel_pref_cd'];?></span>
                            <span class="input_text"><?php echo $resume_personal['rel_city'];?></span>
                        </div>
                        <span class="input_text"><?php echo $resume_personal['rel_address'];?></span>
                        </dd>
                    </dl>
                </div>
                <div class="sec_in form_tbl">
                    <?php if (!empty($resume_personal['education_history'])): ?>
                        <div class="tit_bar"><h3>学歴・職歴</h3></div>
                        <p class="text">現在または直前の勤務先の職務経歴よりご記入下さい</p>
                        <div class="resume_form_tit">学歴</div>
                        <table class="resume_tbl">
                            <tr>
                                <th>年</th>
                                <th>月</th>
                                <th>学歴</th>
                            </tr>
                            <?php foreach($resume_personal['education_history'] as $edu): ?>
                                <tr>
                                    <td>
                                        <span class="input_text"><?php echo $edu['from_year']; ?></span>
                                    </td>
                                    <td>
                                        <span class="input_text"><?php echo $edu['from_month']; ?></span>
                                    </td>
                                    <td class="w1">
                                        <span class="input_text"><?php echo $edu['description']; ?></span>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </table>
                    <?php endif ?>
                    <?php if (!empty($resume_personal['work_summary_history'])): ?>
                        <div class="resume_form_tit">職歴</div>
                        <table class="resume_tbl">
                            <tr>
                                <th>年</th>
                                <th>月</th>
                                <th>職歴</th>
                            </tr>
                            <?php foreach($resume_personal['work_summary_history'] as $work): ?>
                                <tr>
                                    <td>
                                        <span class="input_text"><?php echo $work['from_year']; ?></span>
                                    </td>
                                    <td>
                                        <span class="input_text"><?php echo $work['from_month']; ?></span>
                                    </td>
                                    <td class="w1">
                                        <span class="input_text"><?php echo $work['description']; ?></span>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </table>
                    <?php endif ?>
                </div>

                <?php if (!empty($resume_personal['certification_history'])): ?>
                    <div class="sec_in form_tbl">
                        <div class="tit_bar"><h3>免許・資格</h3></div>
                        <div class="resume_form_tit">免許・資格</div>
                        <table class="resume_tbl">
                            <tr>
                                <th>年</th>
                                <th>月</th>
                                <th>免許・資格</th>
                            </tr>
                            <?php foreach($resume_personal['certification_history'] as $certi): ?>
                                <tr>
                                    <td>
                                        <span class="input_text"><?php echo $certi['from_year']; ?></span>
                                    </td>
                                    <td>
                                        <span class="input_text"><?php echo $certi['from_month']; ?></span>
                                    </td>
                                    <td class="w1">
                                        <span class="input_text"><?php echo $certi['description']; ?></span>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </table>
                    </div>
                <?php endif ?>

                <div class="sec_in form_tbl">
                    <div class="tit_bar"><h3>志望動機</h3></div>
                    <div class="resume_tbl">
                        <dl>
                            <dt>志望動機<span class="must">必須</span></dt>
                            <dd>
                                <span class="input_text"><?php echo $resume_personal['motivation'];?></span>
                            </dd>
                        </dl>
                        <dl>
                            <dt>趣味・特技<span class="must">必須</span></dt>
                            <dd>
                                <span class="input_text"><?php echo $resume_personal['hobby'];?></span>
                            </dd>
                        </dl>
                        <dl class="nobdr">
                            <dt>本人希望欄<span class="must">必須</span></dt>
                            <dd>
                                <span class="input_text"><?php echo $resume_personal['request'];?></span>
                            </dd>
                        </dl>
                    </div><!--/.resume_tbl-->
                </div>

                <div class="sec_in form_tbl">
                    <div class="tit_bar"><h3>最寄駅・配偶者の有無</h3></div>
                    <div class="resume_tbl">
                        <dl>
                            <dt>最寄駅<span class="must">必須</span></dt>
                            <dd>
                                <span class="input_text"><?php echo $resume_personal['nearest_station'];?></span>
                            </dd>
                        </dl>
                        <dl>
                            <dt>扶養家族の人数<span class="must">必須</span></dt>
                            <dd class="w2">
                                <span class="input_text"><?php echo $resume_personal['dependents'];?></span><span class="right">人</span>
                            </dd>
                        </dl>
                        <dl class="nobdr">
                            <dt>配偶者の扶養義務<span class="must">必須</span></dt>
                            <dd>
                                <span class="input_text"><?php echo $resume_personal['spouse_support'] == 1 ? '扶養義務あり' : '扶養義務なし' ; ?></span>
                            </dd>
                        </dl>
                    </div>
                </div>
                <div class="btn_box2 cf">
                    <?php echo form_open();?>
                        <input type="hidden" name="id" value="123">
                        <div class="back_btn"><input type="button" value="編集画面に戻る" onclick="location.href='<?php echo site_url('mypage/resume/personal/form?edit=1'); ?>';"/></div>
                        <div class="resume_form_btn"><input type="submit" value="履歴書を更新する" /></div>
                    <?php echo form_close(); ?>
                </div>
        </div><!--/#main-->
        <?php $this->load->view('pc/blocks/mypage_sidebar'); ?>
    </div>
</div><!--/#contents-->
