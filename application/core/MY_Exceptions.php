<?php

class MY_Exceptions extends CI_Exceptions {

    public function show_404($page = '', $log_error = true)
    {
        redirect('page/error_404');
    }
}
