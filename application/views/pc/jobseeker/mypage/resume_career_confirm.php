<div id="contents" class="mypage signup confirm">
    <?php $this->load->view('pc/blocks/mypage_breadcrumb'); ?>
    <div class="inner cf">
        <div id="main">
            <div class="sec_in">
                <?php $this->load->view('pc/blocks/mypage_userinfo'); ?>
            </div>
            <h2 class="tit mgn20">職務経歴書入力・編集</h2>
                <div class="sec_in form_tbl">
                    <div class="tit_bar"><h3>経歴要約</h3></div>
                    <div class="resume_tbl">
                        <dl class="nobdr">
                            <dt>経歴要約<span class="must">必須</span></dt>
                            <dd>
                                <span class="input_text"><?php echo nl2br($resume['summary']); ?></span>
                            </dd>
                        </dl>
                    </div><!--/.resume_tbl-->
                </div>

                <div class="sec_in">
                    <div class="tit_bar"><h3>職務経歴</h3></div>
                    <div class="info_tbl">
                        <?php foreach ($result as $row) : ?>
                        <div class="resume_form_tit"><span class="input_text"><?php echo $row->company_name; ?></span></div>
                        <table>
                            <tr>
                                <th>期間</th>
                                <td>
                                    <span class="input_text"><?php echo $row->from_year; ?>年<?php echo $row->from_month; ?>月〜<?php echo $row->to_year; ?>年<?php echo $row->to_month; ?>月</span>
                                </td>
                            </tr>
                            <tr>
                                <th>業種・経験職種</th>
                                <td>
                                    <dl>
                                        <dt>［業種］</dt>
                                        <dd><span class="input_text"><?php echo $row->industory_l; ?></span></dd>
                                        <dd><span class="input_text"><?php echo $row->industory_m; ?></span></dd>
                                    </dl>
                                    <dl>
                                        <dt>［経験職種］</dt>
                                        <dd><span class="input_text"><?php echo $row->jcat_l; ?></span></dd>
                                        <dd><span class="input_text"><?php echo $row->jcat_m; ?></span></dd>
                                        <dd><span class="input_text"><?php echo $row->jcat_s; ?></span></dd>
                                    </dl>
                                </td>
                            </tr>
                            <tr>
                                <th>職務内容</th>
                                <td>
                                    <span class="input_text">
                                        <dl>
                                            <dt>【職務内容】</dt>
                                            <dd><?php echo nl2br($row->job_description); ?></dd>
                                        </dl>
                                    </span>
                                </td>
                            </tr>
                        </table>
                        <?php endforeach ?>
                        <p class="memo">※こちらの情報の編集は、マイページの経歴情報から編集できます。</p>
                    </div>
                </div>

                <div class="sec_in form_tbl">
                    <div class="tit_bar"><h3>自己PR・転職理由</h3></div>
                    <div class="info_tbl">
                        <table>
                            <tr>
                                <th>転職理由</th>
                                <td>
                                    <span class="input_text"><?php echo $job_seeker->reason_for_change_work ? nl2br($job_seeker->reason_for_change_work) : '-'; ?> </span>
                                </td>
                            </tr>
                            <tr>
                                <th class="bk">活かせる経験・知識<span class="must">必須</span></th>
                                <td>
                                    <span class="input_text"><?php echo nl2br($resume['useful_knowledge']); ?></span>
                                </td>
                            </tr>
                            <tr>
                                <th>自己PR</th>
                                <td>
                                    <span class="input_text"><?php echo $job_seeker->pr ? nl2br($job_seeker->pr) : '-'; ?></span>
                                </td>
                            </tr>
                        </table>
                        <p class="memo">※こちらの情報の編集は、マイページの経歴情報から編集できます。</p>
                    </div>
                </div>
                <div class="btn_box2 cf">
                <?php echo form_open();?>
                    <input type="hidden" name="id" value="<?php echo $job_seeker->id; ?>" />
                    <div class="back_btn"><input type="button" value="編集画面に戻る" onclick="location.href='<?php echo site_url('mypage/resume/career/form?edit=1'); ?>';"/></div>
                    <div class="resume_form_btn"><input type="submit" value="職務経歴書を更新する" /></div>
                <?php echo form_close();?>
                </div>
        </div><!--/#main-->
        <?php $this->load->view('pc/blocks/mypage_sidebar'); ?>
    </div>
</div><!--/#contents-->
