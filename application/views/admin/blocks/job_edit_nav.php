<ul class="nav nav-tabs custom-tabs">
    <li class="nav-item<?php echo empty($this->uri->segment(5)) ? ' active' : ''; ?>">
        <a href="<?php echo site_url(sprintf('admin/job/setup/%d', $result->id)); ?>">求人情報変更</a>
    </li>
    <li class="nav-item<?php echo $this->uri->segment(5) == 'job_photo' ? ' active' : ''; ?>">
        <a href="<?php echo site_url(sprintf('admin/job/setup/%d/job_photo', $result->id)); ?>">求人画像</a>
    </li>
</ul>
