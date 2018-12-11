<div id="contents" class="mypage signup">
    <?php $this->load->view('pc/blocks/mypage_breadcrumb'); ?>
    <div class="inner cf">
        <div id="main">
            <div class="sec_in">
                <?php $this->load->view('pc/blocks/mypage_userinfo'); ?>
            </div>
            <h2 class="tit mgn20">職務経歴書入力・編集</h2>
                <?php if (isset($message) && $message) : ?>
                <dl class="validation mgnT">
                    <dt>入力エラー：下記の項目の再入力をお願いします。</dt>
                    <?php echo $message;?>
                </dl>
            <?php endif ?>
            <?php echo form_open(); ?>
                <div class="sec_in form_tbl">
                    <div class="tit_bar"><h3>経歴要約</h3></div>
                    <div class="resume_tbl">
                        <dl class="nobdr">
                            <dt>経歴要約<span class="must">必須</span></dt>
                            <dd>
                                <?php
                                echo form_textarea(array(
                                    'name'  => 'summary',
                                    'id'    => 'summary',
                                    'rows'  => '3',
                                    'cols'  => '10',
                                    'class' => 'type-counter',
                                    'value' => set_value('summary',  $resume['summary']),
                                    'placeholder'   => 'こちらに入力してください。',
                                    'required' => 'required',
                                    'minlength' => '50',
                                    'maxlength' => '300',
                                ));
                                ?>
                                <p class="resume_form_text2">※50文字以上300文字以内で入力してください。（現在：<span class="num">0</span>文字）</p>
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
                                <td><span class="input_text"><?php echo $row->from_year; ?>年<?php echo $row->from_month; ?>月〜<?php echo $row->to_year; ?>年<?php echo $row->to_month; ?>月</span></td>
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
                                    <span class="input_text"><?php echo $job_seeker->reason_for_change_work ? nl2br($job_seeker->reason_for_change_work) : '-'; ?></span>
                                </td>
                            </tr>
                            <tr>
                                <th class="bk">活かせる経験・知識<span class="must">必須</span></th>
                                <td>
                                    <?php echo form_textarea(array(
                                        'name'  => 'useful_knowledge',
                                        'id'    => 'useful_knowledge',
                                        'rows'  => '3',
                                        'cols'  => '10',
                                        'class' => 'type-counter',
                                        'value' => set_value('useful_knowledge', $resume['useful_knowledge']),
                                        'placeholder' => 'こちらに入力してください。',
                                        'required' => 'required',
                                        'minlength' => '50',
                                        'maxlength' => '300',
                                    ));
                                    ?>
                                    <p class="resume_form_text2">※50文字以上300文字以内で入力してください。（現在：<span class="num">0</span>文字）</p>
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
                <div class="resume_form_btn"><?php echo form_submit('submit', '職務経歴書を確認する'); ?></div>
            <?php echo form_close(); ?>
        </div><!--/#main-->
        <?php $this->load->view('pc/blocks/mypage_sidebar'); ?>
    </div>
</div><!--/#contents-->

<!-- /.content -->
