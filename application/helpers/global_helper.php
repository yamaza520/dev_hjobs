<?php
/**
 * Extract Zipfile
 * @param string $zip_source
 * @param string  $zip_destination
 * @return boolean
 */
if (!function_exists('extractZip')) {
    function extractZip($zip_source, $zip_destination) {
        if (!is_dir($zip_destination)) {
            mkdir($zip_destination, 0777, true);
        }

        $zip = new ZipArchive();
        $res = $zip->open($zip_source);
        if ($res === true) {
            $zip->extractTo($zip_destination);
            $zip->close();
            return true;
        } else {
            return false;
        }
    }
}

/**
 * remove diectory
 * @param string $dir
 */
if (!function_exists('removeDir')) {
    function removeDir($dir) {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != '.' && $object != '..') {
                    if (filetype($dir . '/' . $object) == 'dir') {
                        $this->removeDir($dir."/".$object);
                    } else {
                        unlink($dir . '/' . $object);
                    }
                }
            }

            reset($objects);
            rmdir($dir);

            return true;
        }

        return false;
    }
}

if (!function_exists('uri_check')) {
    /**
     * Check if any URI string EXACTLY same as the current URI string
     * @param  string $segment[, $segment2, $segment3] Any part of URI string
     * @return boolean TRUE if $segment exists in the current URI string, otherwise FALSE
     */
    function uri_check($segment)
    {
        // check if there are multiple arguments
        if (func_num_args() > 1 && in_array(uri_string(), func_get_args())) {
            return true;
        }

        return uri_string() == $segment;
    }
}

if (!function_exists('uri_check_contain')) {
    /**
     * Check if any URI string CONTAINS in the current URI string
     * @param  string $segment[, $segment2, $segment3] Any part of URI string
     * @return boolean TRUE if the current URI string contains $segment, otherwise FALSE
     */
    function uri_check_contain($segment)
    {
        // check if there are multiple arguments
        if (func_num_args() > 1) {
            $segments = func_get_args();
            foreach ($segments as $segment) {
                if (stristr(uri_string(), $segment) !== false) {
                    return true;
                }
            }

            return false;
        }

        return stristr(uri_string(), $segment) !== false ? true : false;
    }
}

if (!function_exists('uri_segment')) {
    /**
     * Get a segment from URI string
     * @param  integer $index Segment index number
     * @return mixed The segment at the position $index
     */
    function uri_segment($index)
    {
        return get_instance()->uri->segment($index);
    }
}

if (!function_exists('ab_random_code')) {
    /**
     * Generate a random string from the given array of letters.
     * @param  int    $length   The length of required random string
     * @param  array  $letters  Array of letters from which randomized string is derived from.
     *   Default is a to z and 0 to 9.
     * @return string The random string of requried length
     */
    function ab_random_code($length = 6, $letters = array())
    {
        # Letters & Numbers for default
        if (sizeof($letters) == 0) {
            $letters = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));
        }
        shuffle($letters); # Shuffle letters
        $randArr = array_splice($letters, 0, $length);
        return implode('', $randArr);
    }
}

if (!function_exists('ab_role_name')) {
    /**
     * Return group name by group id
     * @param  integer $group_id
     * @return string  The group name
     */
    function ab_role_name($group_id)
    {
        switch ($group_id) {
            case GROUP_ADMIN:
                return 'admin';

            case GROUP_EDITOR:
                return 'members';

            case GROUP_JOBSEEKER:
                return 'jobseeker';

            default:
                return '';
        }
    }
}

if (!function_exists('ab_role_desc')) {
    /**
     * Return group description by group id
     * @param  integer $group_id
     * @param  boolean $plural
     * @return string  The group description
     */
    function ab_role_desc($group_id, $plural = false)
    {
        switch ($group_id) {
            case GROUP_ADMIN:
                return '管理者';

            case GROUP_EDITOR:
                return '編集者';

            case GROUP_JOBSEEKER:
                return '求職者';

            default:
                return '';
        }
    }
}

if (!function_exists('ab_slugify')) {
    /**
     * Generate a slug from string
     * @param  string $text The string to slugify
     * @return string
     */
    function ab_slugify($text)
    {
      // replace non letter or digits by -
      $text = preg_replace('~[^\pL\d]+~u', '-', $text);

      // transliterate
      $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

      // remove unwanted characters
      $text = preg_replace('~[^-\w]+~', '', $text);

      // trim
      $text = trim($text, '-');

      // remove duplicate -
      $text = preg_replace('~-+~', '-', $text);

      // lowercase
      $text = strtolower($text);

      if (empty($text)) {
        return 'n-a';
      }

      return $text;
    }
}

if (!function_exists('ab_shorten')) {
    /**
     * Shorten text
     * @param  string $text The string to be shorten
     * @param  integer $len The string count limit
     * @param  string $tail The string to be appended at the end
     * @return string
     */
    function ab_shorten($text, $len = 400, $tail = '...')
    {
        $text       = trim(strip_tags($text));
        $output     = substr($text, 0, $len);
        $lastSpace  = strrpos($output, ' ');

        if (strlen($text) > $len && $lastSpace !== false) {
            $output = substr($output, 0, $lastSpace);
        }

        if (strlen($text) > strlen($output) && $tail) {
            $output .= $tail;
        }

        return $output;
    }
}

/**
 * Check if the current logged-in user is admin
 * @return boolean
 */
function ab_is_admin($user_id = null)
{
    // get Codeigniter instance
    $CI =& get_instance();
    $login_user = $CI->session->userdata();

    if ($CI->ion_auth->logged_in() && $login_user['group_id'] == GROUP_ADMIN) {
        if ($user_id !== null && $login_user['user_id'] != $user_id) {
            return false;
        } else {
            return true;
        }
    } else {
        return false;
    }
}

/**
 * Check if the current logged-in user is editor
 * @return boolean
 */
function ab_is_editor($user_id = null)
{
    // get Codeigniter instance
    $CI =& get_instance();
    $login_user = $CI->session->userdata();

    if ($CI->ion_auth->logged_in() && $login_user['group_id'] == GROUP_EDITOR) {
        if ($user_id !== null && $login_user['user_id'] != $user_id) {
            return false;
        } else {
            return true;
        }
    } else {
        return false;
    }
}

/**
* Check if the current logged-in user is user
* @return boolean
*/
function ab_is_jobseeker($user_id = null)
{
    // get Codeigniter instance
    $CI =& get_instance();
    $login_user = $CI->session->userdata();

    if ($CI->ion_auth->logged_in() && $login_user['group_id'] == GROUP_JOBSEEKER) {
        if ($user_id !== null && $login_user['user_id'] != $user_id) {
            return false;
        } else {
            return true;
        }
    } else {
        return false;
    }
}

/**
 * Check if the current user is logged in or not
 * @return boolean
 */
function ab_logged_in()
{
    // get Codeigniter instance
    $CI =& get_instance();

    return $CI->ion_auth->logged_in();
}

/**
 * Linkify URLs in the content
 */
function ab_linkify($string)
{
    return preg_replace('~[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]~', '<a href="\\0" target="_blank">\\0</a>', $string);
}

/**
 * Get asset version number from config
 * @return string
 */
function ab_asset_version()
{
    $CI =& get_instance();
    $version = $CI->config->item('asset_version');

    return $version ? '?' . $version : '';
}

/**
 * Get current device type pc or sp
 * @return string pc or sp
 */
function ab_device()
{
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $devices = array(
        'tablet' => array(
            'androidtablet' => 'android(?!.*(?:mobile|opera mobi|opera mini))',
            'blackberrytablet' => 'rim tablet os',
            'ipad' => '(ipad)',
        ),
        'plain' => array(
            'kindle' => '(kindle)',
            'IE6' => 'MSIE 6.0',
        ),
        'phone' => array(
            'android' => 'android.*mobile|android.*opera mobi|android.*opera mini',
            'blackberry' => 'blackberry',
            'iphone' => '(iphone|ipod)',
            'palm' => '(avantgo|blazer|elaine|hiptop|palm|plucker|xiino|webOS)',
            'windows' => 'windows ce; (iemobile|ppc|smartphone)',
            'windowsphone' => 'windows phone',
            'generic' => '(mobile|mmp|midp|o2|pda|pocket|psp|symbian|smartphone|treo|up.browser|up.link|vodafone|wap|opera mini|opera mobi|opera mini)',
        ),
        'desktop' => array(
            'osx' => 'Mac OS X',
            'linux' => 'Linux',
            'windows' => 'Windows',
            'generic' => '',
        ),
    );

    foreach ($devices as $type => $devices) {
        foreach ($devices as $device => $regexp) {
            if ((bool) preg_match('/'.$regexp.'/i', $userAgent)) {
                return $type == 'desktop' ? 'pc' : 'sp';
            }
        }
    }

    return 'pc';
}

/**
 * Get job status
 * @param mixed date
 * @return string
 */
function ab_is_new_job($date)
{
    $CI =& get_instance();
    $noOfDays = $CI->config->item('new_item_interval_day');
    $dateCompare = strtotime('-'. $noOfDays.'day');

    return strtotime($date) >= $dateCompare ? true : false;
}

/**
 * Check if job is favorited or not
 * @param mixed date
 * @return string
 */
function ab_is_favorite_job($job)
{
    $CI =& get_instance();

    if ($CI->ion_auth->logged_in()) {
        $CI->load->model('User_model');
        $login_user = $CI->session->userdata();

        return $CI->User_model->is_favorite_job($login_user['user_id'], $job->id);
    } else {
        $CI->load->library('encrypt');
        $items = $CI->encrypt->decode(get_cookie($CI->config->item('favjob_cookie_name')));
        $items = $items ? unserialize($items) : array();

        return in_array($job->id, $items);
    }
}

/**
 * Display custom error page
 * @param string  $template        The template file name
 * @param string [$heading = null] Page heading
 * @param string [$message = null] Error message
 * @param int [$status_code = 200] (default: 200)
 * @return void
 */
function ab_show_error($template, $heading = null, $message = null, $status_code = 200)
{
    $_error =& load_class('Exceptions', 'core');
    echo $_error->show_error($heading, $message, $template, $status_code);
    exit();
}

/**
 * Get employee_type_class
 * @param int $id
 * @return string
 */
function display_employee_type($id)
{
    $CI =& get_instance();

    $employee_types = $CI->config->item('employee_type_class');
    if (!isset($employee_types[$id])) {
        return '';
    }

    return $employee_types[$id];
}

/**
 * Get job salary information
 * @param  object $job
 * @return string
 */
function display_job_salary($job)
{
    if (!is_object($job)) {
        return '-';
    }

    if ($job->salary) {
        return $job->salary;        
    } elseif ($job->min_salary == 0 && $job->max_salary == 0 && $job->salary2) {
        return $job->salary2;        
    } elseif ($job->min_salary == 0 && $job->max_salary == 0) {
        return "-"; 
    } elseif ($job->min_salary == 0) {
        return "～" . $job->max_salary . "万円";
    } elseif ($job->max_salary == 0) {
        return $job->min_salary . "万円～";
    } else {
        return $job->min_salary . "万円～" . $job->max_salary . "万円";
    }
}

/**
 * Get job flags related information
 * @param  object $job
 * @return array
 */
function get_job_flags($job)
{
    if (!is_object($job)) {
        return array();
    }

    $fields = load_job_flags();
    $flags = array();
    foreach ($fields as $field => $label) {
        if (!empty($job->{$field})) {
            $flags[] = $label;
        }
    }

    return $flags;
}

/**
 * Get all job flags from db or session
 * @return array
 */
function load_job_flags()
{
    $CI =& get_instance();

    if ($CI->session->has_userdata('job_flags')) {
        $job_flags = $CI->session->job_flags;
    } else {
        $CI->load->model('Job_flags_model');
        $job_flags = $CI->Job_flags_model->find_all_for_dropdown();
        $CI->session->set_userdata('job_flags', $job_flags);
    }

    return $job_flags;
}

/**
 * Get the label for the job flag by name
 * @return array
 */
function display_job_flag($name)
{
    $job_flags = load_job_flags();

    return !empty($job_flags[$name]) ? $job_flags[$name] : '';
}

/**
 * Get config data
 * @param int $id, string $item_name
 * @return string
 */
function display_config_item($id, $item_name)
{
    $CI =& get_instance();

    $config_data = $CI->config->item($item_name);
    if (!isset($config_data[$id])) {
        return '';
    }

    return $config_data[$id];
}

/**
 * Get predefined job categories (small)
 * @return array
 */
function get_job_categories()
{
    return array(
        '宿泊' => array(
            346 => '宿泊・ホテル・冠婚葬祭関連',
        ),
        '婚礼' => array(
            342 => 'ブライダル・イベントコーディネーター',
        ),
        '受付' => array(
            341 => 'フロント業務・予約受付',
        ),
        '葬祭' => array(
            347 => '葬儀関連',
        ),
        'レストラン' => array(
            343 => '調理',
            344 => 'レストランマネジメント',
            345 => 'ウェイター／ウェイトレス'
        ),
        '管理' => array(
            340 => '施設管理・マネジメント',
        ),
    );
}

/**
 * Get predefined job category name by id
 * @return string
 */
function get_job_category_name($id)
{
    $categories = get_job_categories();

    foreach ($categories as $key => $cat) {
        if (array_key_exists($id, $cat)) {
            return $cat[$id];
        }
    }

    return '';
}

/**
 * Get predefined prefectures
 * @return array
 */
function get_prefectures()
{
    return array(
        '関東' => array(
            13  => '東京都',
            14  => '神奈川県',
            12  => '千葉県',
            11  => '埼玉県',
            8   => '茨城県',
            9   => '栃木県',
            10  => '群馬県',
        ),
        '北海道・東北' => array(
            1 => '北海道',
            2 => '青森県',
            3 => '岩手県',
            4 => '宮城県',
            5 => '秋田県',
            6 => '山形県',
            7 => '福島県',
        ),
        '北陸・北信越' => array(
            15 => '新潟県',
            16 => '富山県',
            17 => '石川県',
            18 => '福井県',
            19 => '山梨県',
            20 => '長野県',
            22 => '静岡県',
            23 => '愛知県',
            21 => '岐阜県',
        ),
        '関西' => array(
            27 => '大阪府',
            28 => '兵庫県',
            26 => '京都府',
            25 => '滋賀県',
            29 => '奈良県',
            30 => '和歌山県',
            24 => '三重県',
        ),
        '中国・四国' => array(
            31 => '鳥取県',
            32 => '島根県',
            33 => '岡山県',
            34 => '広島県',
            35 => '山口県',
            36 => '徳島県',
            37 => '香川県',
            38 => '愛媛県',
            39 => '高知県',
        ),
        '九州・沖縄' => array(
            40 => '福岡県',
            41 => '佐賀県',
            42 => '長崎県',
            43 => '熊本県',
            44 => '大分県',
            45 => '宮崎県',
            46 => '鹿児島県',
            47 => '沖縄県',
        ),
    );
}

/**
 * Get job image file name with path
 * default image is returned if there is no job image
 * @param  object $job
 * @return string
 */
function get_job_image_src($job)
{
    $CI =& get_instance();

    if (count($job->images)) {
       $file = $CI->config->item('upload_img_path') . $job->images[0]->url;
    } else {
       $file = 'assets/common/img/JOBS_nophoto.jpg';
    }

   return base_url($file);
}

/**
 * Update user login session data
 */
function update_user_session($login_user_data, $user_data, $jobseeker_data)
{
    $CI =& get_instance();

    $jobseeker_data = (array) $jobseeker_data;
    $child = (array) $login_user_data['child'];
    $child = array_merge($child, $jobseeker_data);

    $login_user_data = array_merge($login_user_data, $user_data);
    $login_user_data['child'] = (object) $child;

    $CI->session->set_userdata($login_user_data);

    return $login_user_data;
}

/**
 * Return years, months, days ready for dropdown
 * @param int $start_year
 * @return array
 */
function get_years_months_days($start_year = 1970, $minus = 17)
{
    $years  = array('' => '--') + array_combine($y = range($start_year, date('Y') - $minus), $y);
    $months = array('' => '--') + array_combine($m = range(1, 12), $m);
    $days   = array('' => '--') + array_combine($d = range(1, 31), $d);

    return array($years, $months, $days);
}

/**
 * cURL helper
 * @param string $url    The absolute URL
 * @param array  $params The data to send
 * @param string $method GET|POST|PUT|DELETE
 * @return array
 */
function curl($url, $params = array(), $method = 'get', $headers = array())
{
    $method = strtoupper($method);
    if (!in_array($method, array('GET', 'POST', 'PUT', 'DELETE'))) {
        $method = 'GET';
    }

    $queryStr = '';
    if (!empty($params)) {
        $queryStr = http_build_query($params);
    }

    $ch = curl_init();
    if ($method == 'POST') {
        curl_setopt($ch, CURLOPT_POST, 1);
        if ($queryStr) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $queryStr);
        }
    } else {
        if ($queryStr) {
            $url .= '?' . $queryStr;
        }
    }

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    if (!empty($headers)) {
        curl_setopt ($ch, CURLOPT_HTTPHEADER, $headers);
    }

    $response = curl_exec($ch);
    curl_close ($ch);

    return $response;
}
