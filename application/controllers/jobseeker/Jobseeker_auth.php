<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'controllers/Auth.php';

class Jobseeker_auth extends Auth
{
    protected $role = GROUP_JOBSEEKER;
    protected $group_id = GROUP_JOBSEEKER;

    /**
     * @route /mypage/change-password/complete
     */
    public function change_password_complete()
    {
        $this->page_title = 'ログインパスワード設定';

        $this->_render('auth/change_password_complete');
    }

}
