<ul class="nav nav-tabs custom-tabs">
    <li class="nav-item<?php echo empty($this->uri->segment(5)) ? ' active' : ''; ?>">
        <a href="<?php echo site_url(sprintf('admin/job_seeker/setup/%d', $result->id)); ?>">会員変更</a>
    </li>
    <li class="nav-item<?php echo $this->uri->segment(5) == 'career_history' ? ' active' : ''; ?>">
        <a href="<?php echo site_url(sprintf('admin/job_seeker/setup/%d/career_history', $result->id)); ?>">職務経歴</a>
    </li>
    <li class="nav-item<?php echo $this->uri->segment(5) == 'education' ? ' active' : ''; ?>">
        <a href="<?php echo site_url(sprintf('admin/job_seeker/setup/%d/education', $result->id)); ?>">学歴</a>
    </li>
    <li class="nav-item<?php echo $this->uri->segment(5) == 'work_summary' ? ' active' : ''; ?>">
        <a href="<?php echo site_url(sprintf('admin/job_seeker/setup/%d/work_summary', $result->id)); ?>">職歴</a>
    </li>
    <li class="nav-item<?php echo $this->uri->segment(5) == 'certification' ? ' active' : ''; ?>">
        <a href="<?php echo site_url(sprintf('admin/job_seeker/setup/%d/certification', $result->id)); ?>">免許・資格</a>
    </li>
    <li class="nav-item<?php echo $this->uri->segment(5) == 'face_photo' ? ' active' : ''; ?>">
        <a href="<?php echo site_url(sprintf('admin/job_seeker/setup/%d/face_photo', $result->id)); ?>">写真の登録</a>
    </li>
</ul>
