<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_BaseController {

    protected $group_id = GROUP_JOBSEEKER;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Login_history_model');
        $this->load->helper(array('language'));

        $this->lang->load('auth');
    }

    // redirect if needed, otherwise display the user list
    public function index()
    {

        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            $this->redirect_login();
        }
        elseif (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
        {
            // redirect them to the home page because they must be an administrator to view this
            return show_error('You must be an administrator to view this page.');
        }
        else
        {
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            //list the users
            $this->data['users'] = $this->ion_auth->users()->result();
            foreach ($this->data['users'] as $k => $user)
            {
                $this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
            }

            $this->_render_page('auth/index', $this->data);
        }
    }

    // log the user in
    public function login()
    {
        if ($this->ion_auth->logged_in())
        {
            redirect('/', 'refresh');
        }

        $this->page_title = 'ログイン';
        $this->meta_desc  = 'HOTELIERJOBS(ホテリエジョブズ)は宿泊施設専門の求人サービスです。正社員、アルバイトの求職情報はもちろんのこと、主婦からシニアの方々も働けるホテル・民泊・旅館求人を多数掲載しています。';
        $this->header_message = $this->page_title;

        $this->data['title'] = $this->lang->line('login_heading');

        //validate form input
        $this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
        $this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');

        if ($this->form_validation->run() == true)
        {
            // check to see if the user is logging in
            // check for "remember me"
            $remember = (bool) $this->input->post('remember');
            $groups = $this->group_id == GROUP_JOBSEEKER ? GROUP_JOBSEEKER : array(GROUP_ADMIN, GROUP_EDITOR);

            if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember, $groups))
            {
                //if the login is successful
                //redirect them back to the home page
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                $user_id = $this->session->userdata('user_id');

                if (in_array($this->group_id, array(GROUP_ADMIN, GROUP_EDITOR))) {
                    $this->Login_history_model->insert(array('user_id' => $user_id));

                    redirect($this->path, 'refresh');
                } else {
                    $url = $this->session->userdata('last_url');

                    $this->User_model->cookies_to_db($user_id);

                    redirect($url ? $url : $this->path);
                }
            }
            else
            {
                // if the login was un-successful
                // redirect them back to the login page
                $this->session->set_flashdata('error', $this->ion_auth->errors());
                $this->redirect_login();
            }
        }
        else
        {
            // the user is not logging in so display the login page
            // set the flash data error message if there is one
            $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
            $this->data['message'] = $this->session->flashdata('message');

            $this->data['fb_error'] = '';
            if (empty($this->data['error']) && $this->input->get('err')) {
                $this->data['fb_error'] = $this->session->flashdata('fb_error');
            }

            $this->data['identity'] = array('name' => 'identity',
                'id'    => 'identity',
                'type'  => 'mail',
                'value' => $this->form_validation->set_value('identity'),
                'class' => 'form-control',
                'autofocus' => 'autofocus',
            );
            $this->data['password'] = array('name' => 'password',
                'id'   => 'password',
                'type' => 'password',
                'class' => 'form-control',
            );

            $this->data['group_id'] = $this->group_id;

            if ($this->role == GROUP_ADMIN) {
                $this->_render_page($this->path.'auth/login', $this->data);
            } else {
                $this->_render('auth/login', $this->data);
            }
        }
    }

    // log the user out
    public function logout()
    {
        $this->data['title'] = "Logout";

        // log the user out
        $logout = $this->ion_auth->logout();

        // redirect them to the login page
        $this->session->set_flashdata('message', $this->ion_auth->messages());
        $this->redirect_login();
    }

    // change password
    public function change_password()
    {
        $this->page_title = lang('change_password_heading');

        $this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');
        $this->form_validation->set_rules('new', $this->lang->line('change_password_validation_new_password_label'), 'required|password_checker[email]|matches[new_confirm]');
        $this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');

        if (!$this->ion_auth->logged_in())
        {
            $this->redirect_login();
        }

        $user = $this->ion_auth->user()->row();

        if ($this->form_validation->run() == false)
        {
            // display the form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : '';

            $this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
            $this->data['old_password'] = array(
                'name' => 'old',
                'id'   => 'old',
                'type' => 'password',
                'class' => 'form-control',
            );
            $this->data['new_password'] = array(
                'name'    => 'new',
                'id'      => 'new',
                'type'    => 'password',
                'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
                'class' => 'form-control',
            );
            $this->data['new_password_confirm'] = array(
                'name'    => 'new_confirm',
                'id'      => 'new_confirm',
                'type'    => 'password',
                'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
                'class' => 'form-control',
            );
            $this->data['user_id'] = array(
                'name'  => 'user_id',
                'id'    => 'user_id',
                'type'  => 'hidden',
                'value' => $user->id,
            );
            $this->data['email'] = array(
                'name'  => 'email',
                'id'    => 'email',
                'type'  => 'hidden',
                'value' => $user->email,
            );

            // render
            $this->_render('auth/change_password', $this->data);
        }
        else
        {
            $identity = $this->session->userdata('identity');

            $change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

            if ($change)
            {
                //if the password was successfully changed
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                if ($this->role == GROUP_ADMIN) {
                    $this->logout();
                } else {
                    redirect('mypage/change-password/complete', 'refresh');
                }
            }
            else
            {
                $this->session->set_flashdata('message', $this->ion_auth->errors());

                if ($this->role == GROUP_ADMIN) {
                    redirect($this->path.'auth/change_password', 'refresh');
                } else {
                    redirect('auth/change_password', 'refresh');
                }
            }
        }
    }

    // forgot password
    public function forgot_password()
    {
        $this->page_title = lang('forgot_password_heading');

        // setting validation rules by checking whether identity is username or email
        if($this->config->item('identity', 'ion_auth') != 'email' )
        {
           $this->form_validation->set_rules('identity', $this->lang->line('forgot_password_identity_label'), 'required');
        }
        else
        {
           $this->form_validation->set_rules('identity', $this->lang->line('forgot_password_validation_email_label'), 'required|valid_email');
        }


        if ($this->form_validation->run() == false)
        {
            $this->data['type'] = $this->config->item('identity','ion_auth');
            // setup the input
            $this->data['identity'] = array(
                'type'      => 'email',
                'name'      => 'identity',
                'id'        => 'identity',
                'class'     => 'form-control',
                'required'  => 'required',
            );

            if ( $this->config->item('identity', 'ion_auth') != 'email' ){
                $this->data['identity_label'] = $this->lang->line('forgot_password_identity_label');
            }
            else
            {
                $this->data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
            }

            // set any errors and display the form
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            if ($this->role == GROUP_ADMIN) {
                $this->_render_page($this->path.'auth/forgot_password', $this->data);
            } else {
                $this->_render('auth/forgot_password', $this->data);
            }
        }
        else
        {
            $identity_column = $this->config->item('identity','ion_auth');
            $identity = $this->ion_auth
                ->where($identity_column, $this->input->post('identity'))
                ->where('deleted_at IS NULL')
                ->users()->row();

            if (empty($identity)) {
                if ($this->config->item('identity', 'ion_auth') != 'email')
                {
                    $this->ion_auth->set_error('forgot_password_identity_not_found');
                }
                else
                {
                    $this->ion_auth->set_error('forgot_password_email_not_found');
                }

                $this->session->set_flashdata('message', $this->ion_auth->errors());
                $this->redirect_forgot_password();
            } else {
                // Check for user group
                $user_groups = $this->ion_auth->get_users_groups($identity->id);
                $user_group = current($user_groups->result());

                if ((empty($this->path) && $user_group->id != GROUP_JOBSEEKER)
                    || ($this->path && !in_array($user_group->id, array(GROUP_ADMIN)))) {
                    $this->ion_auth->set_error('forgot_password_email_not_found');
                    $this->session->set_flashdata('message', $this->ion_auth->errors());
                    $this->redirect_forgot_password();
                }
            }

            // run the forgotten password method to email an activation code to the user
            $forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

            if ($forgotten)
            {
                // if there were no errors, send mail
                $this->email->from($this->config->item('send_mail_from'), $this->config->item('site_title'));
                $this->email->to($forgotten['identity']);
                $this->email->subject('Reset your password at '.$this->config->item('site_title'));

                $email_data = (array) $forgotten;
                $email_data['name'] = trim($identity->last_name.' '.$identity->first_name);
                $email_data['site_title'] = $this->config->item('site_title');
                $email_data['reset_password_url'] = sprintf('auth/reset_password/%s', $forgotten['forgotten_password_code']);

                $this->email->message($this->_render_page('auth/email/'.$this->config->item('email_forgot_password', 'ion_auth'), $email_data, true));
                $this->email->send();

                $this->session->set_flashdata('message', $this->ion_auth->messages());
                $this->redirect_login(); //we should display a confirmation page here instead of the login page
            }
            else
            {
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                $this->redirect_forgot_password();
            }
        }
    }

    // reset password - final step for forgotten password
    public function reset_password($code = NULL)
    {
        $this->page_title = lang('reset_password_heading');

        if (!$code)
        {
            show_404();
        }

        $user = $this->ion_auth->forgotten_password_check($code);

        if ($user)
        {
            // if the code is valid then display the password reset form

            $this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|password_checker[email]|matches[new_confirm]');
            $this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');

            if ($this->form_validation->run() == false)
            {
                // display the form

                // set the flash data error message if there is one
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

                $this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
                $this->data['new_password'] = array(
                    'name'      => 'new',
                    'id'        => 'new',
                    'type'      => 'password',
                    'pattern'   => '^.{'.$this->data['min_password_length'].'}.*$',
                    'class'     => 'form-control',
                    'required'  => 'required',
                );
                $this->data['new_password_confirm'] = array(
                    'name'      => 'new_confirm',
                    'id'        => 'new_confirm',
                    'type'      => 'password',
                    'pattern'   => '^.{'.$this->data['min_password_length'].'}.*$',
                    'class'     => 'form-control',
                    'required'  => 'required',
                );
                $this->data['user_id'] = array(
                    'name'      => 'user_id',
                    'id'        => 'user_id',
                    'type'      => 'hidden',
                    'value'     => $user->id,
                    'class'     => 'form-control',
                    'required'  => 'required',
                );
                $this->data['email'] = array(
                    'name'      => 'email',
                    'type'      => 'hidden',
                    'value'     => $user->email,
                );
                $this->data['csrf'] = $this->_get_csrf_nonce();
                $this->data['code'] = $code;

                // render
                if ($this->role == GROUP_ADMIN) {
                    $this->_render_page($this->path.'auth/reset_password', $this->data);
                } else {
                    $this->_render('auth/reset_password', $this->data);
                }
            }
            else
            {
                // do we have a valid request?
                if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id'))
                {

                    // something fishy might be up
                    $this->ion_auth->clear_forgotten_password_code($code);

                    show_error($this->lang->line('error_csrf'));

                }
                else
                {
                    // finally change the password
                    $identity = $user->{$this->config->item('identity', 'ion_auth')};

                    $change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

                    if ($change)
                    {
                        // if the password was successfully changed
                        $this->session->set_flashdata('message', $this->ion_auth->messages());
                        $this->redirect_login();
                    }
                    else
                    {
                        $this->session->set_flashdata('message', $this->ion_auth->errors());
                        $this->redirect_reset_password($code);
                    }
                }
            }
        }
        else
        {
            // if the code is invalid then send them back to the forgot password page
            $this->session->set_flashdata('message', $this->ion_auth->errors());
            $this->redirect_forgot_password();
        }
    }

    // activate the user
    public function activate($id, $code = false)
    {
        if ($code !== false)
        {
            $activation = $this->ion_auth->activate($id, $code);
        }
        else if ($this->ion_auth->is_admin())
        {
            $activation = $this->ion_auth->activate($id);
        }

        if ($activation)
        {
            // redirect them to the auth page
            $this->session->set_flashdata('message', $this->ion_auth->messages());

            $redirect = $this->input->get('redirect');
            if ($redirect) {
                redirect($redirect, 'refresh');
            } else {
                redirect('auth', 'refresh');
            }
        }
        else
        {
            // redirect them to the forgot password page
            $this->session->set_flashdata('message', $this->ion_auth->errors());
            redirect("auth/forgot_password", 'refresh');
        }
    }

    // deactivate the user
    public function deactivate($id = NULL)
    {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
        {
            // redirect them to the home page because they must be an administrator to view this
            return show_error('You must be an administrator to view this page.');
        }

        $id = (int) $id;

        $this->load->library('form_validation');
        $this->form_validation->set_rules('confirm', $this->lang->line('deactivate_validation_confirm_label'), 'required');
        $this->form_validation->set_rules('id', $this->lang->line('deactivate_validation_user_id_label'), 'required|alpha_numeric');

        if ($this->form_validation->run() == FALSE)
        {
            // insert csrf check
            $this->data['csrf'] = $this->_get_csrf_nonce();
            $this->data['user'] = $this->ion_auth->user($id)->row();

            $this->_render_page('auth/deactivate_user', $this->data);
        }
        else
        {
            // do we really want to deactivate?
            if ($this->input->post('confirm') == 'yes')
            {
                // do we have a valid request?
                if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
                {
                    show_error($this->lang->line('error_csrf'));
                }

                // do we have the right userlevel?
                if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin())
                {
                    $this->ion_auth->deactivate($id);
                }
            }

            // redirect them back to the auth page
            if ($this->role == GROUP_ADMIN) {
                redirect($this->path.'user/'.$this->input->post('group').'/list', 'refresh');
            } else {
                redirect('auth', 'refresh');
            }
        }
    }

    // create a new user
    public function create_user($group_id = null)
    {
        $this->data['title'] = $this->lang->line('create_user_heading');

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
        {
            redirect('admin/auth', 'refresh');
        }

        if ($group_id !== null) {
            $this->group_id = $group_id;
        }

        if (count($_POST) && $this->input->post('groups')) {
            $this->group_id = $this->input->post('groups');
        }

        $groups = array(
            'id' => $this->group_id,
        );

        $this->ion_auth->where(sprintf('(id = %d OR id = %d)', GROUP_ADMIN, GROUP_EDITOR));
        $group_users = $this->ion_auth->groups()->result_array();

        $tables = $this->config->item('tables','ion_auth');
        $identity_column = $this->config->item('identity','ion_auth');
        $this->data['identity_column'] = $identity_column;

        // validate form input
        $this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required');
        $this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required');
        if($identity_column!=='email')
        {
            $this->form_validation->set_rules('identity',$this->lang->line('create_user_validation_identity_label'),'required|unique['.$tables['users'].'.'.$identity_column.']');
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email');
        }
        else
        {
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|unique[' . $tables['users'] . '.'.$identity_column.']');
        }
        $this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'trim');
        $this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), 'trim');
        $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|password_checker[email]|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

        if ($this->form_validation->run() == true)
        {
            $email    = strtolower($this->input->post('email'));
            $identity = ($identity_column==='email') ? $email : $this->input->post('identity');
            $password = $this->input->post('password');

            $additional_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name'  => $this->input->post('last_name'),
                'company'    => $this->input->post('company'),
                'phone'      => $this->input->post('phone'),
            );
        }

        if ($this->form_validation->run() == true && $user_id = $this->ion_auth->register($identity, $password, $email, $additional_data, $groups))
        {
            if (is_array($user_id)) {
                $user_id = $user_id['id'];
            }

            redirect('admin/user/'.$this->group_id.'/list', 'refresh');

            // check to see if we are creating the user
            // redirect them back to the admin page
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            $this->redirect_login();
        }
        else
        {
            // display the create user form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $this->data['first_name'] = array(
                'name'  => 'first_name',
                'id'    => 'first_name',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('first_name'),
                'class' => 'form-control',
                'required' => 'required',
            );
            $this->data['last_name'] = array(
                'name'  => 'last_name',
                'id'    => 'last_name',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('last_name'),
                'class' => 'form-control',
                'required' => 'required',
            );
            $this->data['identity'] = array(
                'name'  => 'identity',
                'id'    => 'identity',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('identity'),
                'class' => 'form-control',
                'required' => 'required',
            );
            $this->data['email'] = array(
                'name'  => 'email',
                'id'    => 'email',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('email'),
                'class' => 'form-control',
                'required' => 'required',
            );
            $this->data['company'] = array(
                'name'  => 'company',
                'id'    => 'company',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('company'),
                'class' => 'form-control',
                'required' => 'required',
            );
            $this->data['phone'] = array(
                'name'  => 'phone',
                'id'    => 'phone',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('phone'),
                'class' => 'form-control',
                'required' => 'required',
            );
            $this->data['password'] = array(
                'name'  => 'password',
                'id'    => 'password',
                'type'  => 'password',
                'value' => $this->form_validation->set_value('password'),
                'class' => 'form-control',
                'required' => 'required',
            );
            $this->data['password_confirm'] = array(
                'name'  => 'password_confirm',
                'id'    => 'password_confirm',
                'type'  => 'password',
                'value' => $this->form_validation->set_value('password_confirm'),
                'class' => 'form-control',
                'required' => 'required',
            );

            $this->data['groups'] = $group_users;
            $this->data['group_id'] = $this->group_id;

            $this->_render('auth/create_user', $this->data);
        }
    }

    // edit a user
    public function edit_user($id)
    {
        $tables = $this->config->item('tables', 'ion_auth');

        $this->page_title = lang('edit_user_heading');
        $this->data['title'] = $this->lang->line('edit_user_heading');

        if (!$this->ion_auth->logged_in())
        {
            redirect('auth', 'refresh');
        }

        if (!$this->ion_auth->is_admin() && $id != $this->login_user['user_id']) {
            show_404();
        }

        $user = $this->ion_auth->user($id)->row();
        $groups=$this->ion_auth->groups()->result_array();
        $currentGroups = $this->ion_auth->get_users_groups($id)->result();

        // validate form input
        $this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'required');
        $this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'required');
        $this->form_validation->set_rules('email', $this->lang->line('edit_user_validation_email_label'),
                                          'required|valid_email|unique[' . $tables['users'] . '.email.'.$id.']');
        if ($this->group_id == GROUP_JOBSEEKER) {
            $this->form_validation->set_rules('company', $this->lang->line('edit_user_validation_company_label'), 'required');
        }
        if (isset($_POST) && !empty($_POST))
        {
            // do we have a valid request?
            if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
            {
                show_error($this->lang->line('error_csrf'));
            }

            // update the password if it was posted
            if ($this->input->post('password'))
            {
                $this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|password_checker[email]|matches[password_confirm]');
                $this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');
            }

            if ($this->form_validation->run() === TRUE)
            {
                $data = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name'  => $this->input->post('last_name'),
                    'email'      => $this->input->post('email'),
                    'company'    => $this->input->post('company'),
                    'phone'      => $this->input->post('phone'),
                );

                // update the password if it was posted
                if ($this->input->post('password'))
                {
                    $data['password'] = $this->input->post('password');
                }



                // Only allow updating groups if user is admin
                if ($this->ion_auth->is_admin())
                {
                    //Update the groups user belongs to
                    $groupData = $this->input->post('groups');

                    if (isset($groupData) && !empty($groupData)) {

                        $this->ion_auth->remove_from_group('', $id);

                        foreach ($groupData as $grp) {
                            $this->ion_auth->add_to_group($grp, $id);
                        }

                    }
                }

            // check to see if we are updating the user
               if($this->ion_auth->update($user->id, $data))
                {
                    // redirect them back to the admin page if admin, or to the base url if non admin
                    $this->session->set_flashdata('message', $this->ion_auth->messages() );
                    if ($this->role == GROUP_ADMIN) {
                        redirect($this->path.'user/'. $currentGroups[0]->id. '/list', 'refresh');
                    } else {
                        redirect('/', 'refresh');
                    }

                }
                else
                {
                    // redirect them back to the admin page if admin, or to the base url if non admin
                    $this->session->set_flashdata('message', $this->ion_auth->errors() );

                    if ($this->role == GROUP_ADMIN) {
                        redirect($this->path.'user/'. $currentGroups[0]->id. '/list', 'refresh');
                    } else {
                        redirect('/', 'refresh');
                    }

                }

            }
        }

        // display the edit user form
        $this->data['csrf'] = $this->_get_csrf_nonce();

        // set the flash data error message if there is one
        $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

        // pass the user to the view
        $this->data['user'] = $user;
        $this->data['groups'] = $groups;
        $this->data['currentGroups'] = $currentGroups;

        $this->data['first_name'] = array(
            'name'  => 'first_name',
            'id'    => 'first_name',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('first_name', $user->first_name),
            'class' => 'form-control',
        );

        $this->data['last_name'] = array(
            'name'  => 'last_name',
            'id'    => 'last_name',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('last_name', $user->last_name),
            'class' => 'form-control',
        );

        $this->data['email'] = array(
            'name'  => 'email',
            'id'    => 'email',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('email', $user->email),
            'class' => 'form-control',
        );

        $this->data['company'] = null;
        if ($currentGroups[0]->id == GROUP_JOBSEEKER) {
            $this->data['company'] = array(
                'name'  => 'company',
                'id'    => 'company',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('company', $user->company),
                'class' => 'form-control',
            );
        }

        $this->data['phone'] = array(
            'name'  => 'phone',
            'id'    => 'phone',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('phone', $user->phone),
            'class' => 'form-control',
        );
        $this->data['password'] = array(
            'name' => 'password',
            'id'   => 'password',
            'type' => 'password',
            'class' => 'form-control',
        );
        $this->data['password_confirm'] = array(
            'name' => 'password_confirm',
            'id'   => 'password_confirm',
            'type' => 'password',
            'class' => 'form-control',
        );

        $this->_render('auth/edit_user', $this->data);
    }

    // create a new group
    public function create_group()
    {
        $this->data['title'] = $this->lang->line('create_group_title');

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
        {
            redirect('auth', 'refresh');
        }

        // validate form input
        $this->form_validation->set_rules('group_name', $this->lang->line('create_group_validation_name_label'), 'required|alpha_dash');

        if ($this->form_validation->run() == TRUE)
        {
            $new_group_id = $this->ion_auth->create_group($this->input->post('group_name'), $this->input->post('description'));
            if($new_group_id)
            {
                // check to see if we are creating the group
                // redirect them back to the admin page
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect("auth", 'refresh');
            }
        }
        else
        {
            // display the create group form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $this->data['group_name'] = array(
                'name'  => 'group_name',
                'id'    => 'group_name',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('group_name'),
            );
            $this->data['description'] = array(
                'name'  => 'description',
                'id'    => 'description',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('description'),
            );

            $this->_render_page('auth/create_group', $this->data);
        }
    }

    // edit a group
    public function edit_group($id)
    {
        // bail if no group id given
        if(!$id || empty($id))
        {
            redirect('auth', 'refresh');
        }

        $this->data['title'] = $this->lang->line('edit_group_title');

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
        {
            redirect('auth', 'refresh');
        }

        $group = $this->ion_auth->group($id)->row();

        // validate form input
        $this->form_validation->set_rules('group_name', $this->lang->line('edit_group_validation_name_label'), 'required|alpha_dash');

        if (isset($_POST) && !empty($_POST))
        {
            if ($this->form_validation->run() === TRUE)
            {
                $group_update = $this->ion_auth->update_group($id, $_POST['group_name'], $_POST['group_description']);

                if($group_update)
                {
                    $this->session->set_flashdata('message', $this->lang->line('edit_group_saved'));
                }
                else
                {
                    $this->session->set_flashdata('message', $this->ion_auth->errors());
                }
                redirect("auth", 'refresh');
            }
        }

        // set the flash data error message if there is one
        $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

        // pass the user to the view
        $this->data['group'] = $group;

        $readonly = $this->config->item('admin_group', 'ion_auth') === $group->name ? 'readonly' : '';

        $this->data['group_name'] = array(
            'name'    => 'group_name',
            'id'      => 'group_name',
            'type'    => 'text',
            'value'   => $this->form_validation->set_value('group_name', $group->name),
            $readonly => $readonly,
        );
        $this->data['group_description'] = array(
            'name'  => 'group_description',
            'id'    => 'group_description',
            'type'  => 'text',
            'value' => $this->form_validation->set_value('group_description', $group->description),
        );

        $this->_render_page('auth/edit_group', $this->data);
    }


    public function _get_csrf_nonce()
    {
        $this->load->helper('string');
        $key   = random_string('alnum', 8);
        $value = random_string('alnum', 20);
        $this->session->set_flashdata('csrfkey', $key);
        $this->session->set_flashdata('csrfvalue', $value);

        return array($key => $value);
    }

    public function _valid_csrf_nonce()
    {
        if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
            $this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue'))
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function _render_page($view, $data=null, $returnhtml=false)//I think this makes more sense
    {
        $this->viewdata = (empty($data)) ? $this->data: $data;

        $view_html = $this->load->view($view, $this->viewdata, $returnhtml);

        if ($returnhtml) return $view_html;//This will return html on 3rd argument being true
    }

    /**
     * Redirect to login page by group
     */
    protected function redirect_login()
    {
        switch ($this->group_id) {
            case GROUP_ADMIN:
                $uri = $this->path.'auth/login';
                break;

            default:
                $uri = 'login';
                break;
        }

        redirect($uri, 'refresh');
    }

    /**
     * Redirect to forgot password page by group
     */
    protected function redirect_forgot_password()
    {
        switch ($this->group_id) {
            case GROUP_ADMIN:
                $uri = $this->path.'auth/forgot_password';
                break;

            default:
                $uri = 'auth/forgot_password';
                break;
        }

        redirect($uri, 'refresh');
    }

    /**
     * Redirect to reset password page by group
     */
    protected function redirect_reset_password($code)
    {
        switch ($this->group_id) {
            case GROUP_ADMIN:
                $uri = $this->path.'auth/reset_password/';
                break;

            default:
                $uri = 'auth/reset_password/';
                break;
        }

        redirect($uri.$code, 'refresh');
    }
}
