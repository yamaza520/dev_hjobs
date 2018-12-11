<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'top';
$route['404_override'] = 'page/error_404';
$route['translate_uri_dashes'] = FALSE;

// Routes for Admin
$route['admin']                 = 'admin/dashboard';
$route['admin/auth/login']      = 'admin/admin_auth/login';
$route['admin/auth/logout']     = 'admin/admin_auth/logout';
$route['admin/auth/user']       = 'admin/admin_auth/index';
$route['admin/auth/change_password']            = 'admin/admin_auth/change_password';
$route['admin/login_history']                   = 'admin/login_history/index';
$route['admin/user/(:num)/create']              = 'admin/admin_auth/create_user/$1';
$route['admin/auth/create_user']                = 'admin/admin_auth/create_user';
$route['admin/auth/edit_user/(:num)']           = 'admin/admin_auth/edit_user/$1';
$route['admin/user/(:num)/list']                = 'admin/user/index/$1';
$route['admin/user/(:num)/list/(:num)']         = 'admin/user/index/$1/$1';
$route['admin/user/(:num)/delete']['post']      = 'admin/user/delete/$1';
$route['admin/ip']                              = 'admin/permission_ip/index';
$route['admin/ip/setup']                        = 'admin/permission_ip/setup';
$route['admin/ip/setup/(:num)']                 = 'admin/permission_ip/setup/$1';
$route['admin/ip/delete']['post']               = 'admin/permission_ip/delete';
$route['admin/articles']                        = 'admin/article/index';
$route['admin/article/setup']                   = 'admin/article/setup';
$route['admin/article/setup/(:num)']            = 'admin/article/setup/$1';
$route['admin/article/delete']['post']          = 'admin/article/delete';
$route['admin/jobs']                            = 'admin/job/index';
$route['admin/job/setup']                       = 'admin/job/setup';
$route['admin/job/setup/(:num)']                = 'admin/job/setup/$1';
$route['admin/job/setup/(:num)/job_photo']      = 'admin/job/job_photo/$1';
$route['admin/job/delete']['post']              = 'admin/job/delete';
$route['admin/job/delete_employer']['post']     = 'admin/job/delete_employer';
$route['admin/faq/setup/(:num)']                = 'admin/faq/setup/$1';
$route['admin/contact/(individual|company)']    = 'admin/contact/index/$1';
$route['admin/page_setting/pagination/([a-z_]*)'] = 'admin/page_setting/pagination/$1';
$route['admin/job_seeker/setup/(:num)']           = 'admin/job_seeker/setup/$1';

$route['admin/job_seeker/setup/(:num)/career_history']                  = 'admin/job_seeker/career_history/$1';
$route['admin/job_seeker/setup/(:num)/add_career_history']['post']      = 'admin/job_seeker/add_career_history/$1';
$route['admin/job_seeker/setup/(:num)/delete_career_history']['post']   = 'admin/job_seeker/delete_career_history/$';
$route['admin/job_seeker/setup/(:num)/education']                       = 'admin/job_seeker/education/$1';
$route['admin/job_seeker/setup/(:num)/add_education']['post']           = 'admin/job_seeker/add_education/$1';
$route['admin/job_seeker/setup/(:num)/delete_education']['post']        = 'admin/job_seeker/delete_education/$1';
$route['admin/job_seeker/setup/(:num)/work_summary']                    = 'admin/job_seeker/work_summary/$1';
$route['admin/job_seeker/setup/(:num)/add_work_summary']['post']        = 'admin/job_seeker/add_work_summary/$1';
$route['admin/job_seeker/setup/(:num)/delete_work_summary']['post']     = 'admin/job_seeker/delete_work_summary/$1';
$route['admin/job_seeker/setup/(:num)/certification']                   = 'admin/job_seeker/certification/$1';
$route['admin/job_seeker/setup/(:num)/add_certification']['post']       = 'admin/job_seeker/add_certification/$1';
$route['admin/job_seeker/setup/(:num)/delete_certification']['post']    = 'admin/job_seeker/delete_certification/$1';
$route['admin/job_seeker/setup/(:num)/face_photo']                      = 'admin/job_seeker/face_photo/$1';

// Routes for User
$route['login']     = 'jobseeker/jobseeker_auth/login';
$route['logout']    = 'jobseeker/jobseeker_auth/logout';
$route['mypage/change-password'] = 'jobseeker/jobseeker_auth/change_password';
$route['mypage/change-password/complete'] = '/jobseeker/Jobseeker_auth/change_password_complete';

// Routes for Job
$route['jobs']          = 'Job/index';
$route['jobs/([a-z]*)'] = 'Job/index/$1';
$route['favorite-jobs'] = 'Job/favorite_list';
$route['browsing-jobs'] = 'Job/browsing_list';

//Routes for article_type
$route['articles'] = 'article/index';
$route['articles/category/(:num)'] = 'article/index/$1';

// AJAX routes
$route['favorite/add']['post']       = 'Ajax/add_favorite';
$route['favorite/remove']['post']    = 'Ajax/remove_favorite';
$route['ajax/user_register']['post'] = 'Ajax/user_register';
$route['ajax/job_update']['post']    = 'Ajax/job_update';
$route['ajax/job_count']['post']     = 'Ajax/search_job_count';

// Route for static pages
$route['company'] = 'page/company';
$route['privacy'] = 'page/privacy';
$route['sitemap'] = 'page/sitemap';
$route['tos']     = 'page/tos';

// Route for contact pages
$route['contact']                   = 'contact/form';
$route['company-contact']           = 'company_contact/form';
$route['company-contact/confirm']   = 'company_contact/confirm';
$route['company-contact/complete']  = 'company_contact/complete';

// Routes for Signup
$route['signup']             = 'signup/form';
$route['signup/confirm']     = 'signup/confirm';
$route['signup/complete']    = 'signup/complete';
$route['signup/activated']   = 'signup/activated';

// Routes for Subscribe
$route['subscribe']             = 'signup/subscribe_form';
$route['subscribe/confirm']     = 'signup/subscribe_confirm';
$route['subscribe/complete']    = 'signup/subscribe_complete';
$route['subscribe/activated']   = 'signup/subscribe_activated';

// Routes for jobseeker
$route['job/application/(:num)']           = 'jobseeker/application/confirm/$1';
$route['job/application/complete/(:num)']  = 'jobseeker/application/complete/$1';

// Routes for MyPage
$route['mypage']                          = 'jobseeker/mypage/basic/index';
$route['mypage/basic']                    = 'jobseeker/mypage/basic/form';
$route['mypage/basic/confirm']            = 'jobseeker/mypage/basic/confirm';
$route['mypage/basic/complete']           = 'jobseeker/mypage/basic/complete';
$route['mypage/registration-history']     = 'jobseeker/mypage/basic/registration_history';
$route['mypage/application-history']      = 'jobseeker/mypage/basic/application_history';
$route['mypage/job-preferences']          = 'jobseeker/mypage/job_preferences/form';
$route['mypage/job-preferences/confirm']  = 'jobseeker/mypage/job_preferences/confirm';
$route['mypage/job-preferences/complete'] = 'jobseeker/mypage/job_preferences/complete';
$route['mypage/career-history']           = 'jobseeker/mypage/career_history/form';
$route['mypage/career-history/confirm']   = 'jobseeker/mypage/career_history/confirm';
$route['mypage/career-history/complete']  = 'jobseeker/mypage/career_history/complete';
$route['mypage/mail-setting']             = 'jobseeker/mypage/mail_setting/form';
$route['mypage/mail-setting/complete']    = 'jobseeker/mypage/mail_setting/complete';
$route['mypage/unsubscribe']              = 'jobseeker/mypage/unsubscribe/form';
$route['mypage/unsubscribe/confirm']      = 'jobseeker/mypage/unsubscribe/confirm';
$route['mypage/unsubscribe/complete']     = 'jobseeker/mypage/unsubscribe/complete';
$route['mypage/resume']                   = 'jobseeker/mypage/resume/index';
$route['mypage/resume/career/form']       = 'jobseeker/mypage/resume/career_form';
$route['mypage/resume/career/confirm']    = 'jobseeker/mypage/resume/career_confirm';
$route['mypage/resume/career/complete']   = 'jobseeker/mypage/resume/career_complete';
$route['mypage/resume/personal/form']     = 'jobseeker/mypage/resume/personal_form';
$route['mypage/resume/personal/confirm']  = 'jobseeker/mypage/resume/personal_confirm';
$route['mypage/resume/personal/complete'] = 'jobseeker/mypage/resume/personal_complete';

// Other routes
$route['help'] = 'faq/index';
