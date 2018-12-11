<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Custom Form Validation Class
 */
class MY_Form_validation extends CI_Form_validation
{
    /**
     * Unique check
     *
     * Check if the input value doesn't already exist
     * in the specified database field.
     *
     * @param   string  $value   The input value
     * @param   string  $params  The dot separated params [table.field] or [table.field.id]
     * @param   boolean $deleted Include deleted_at field check or not
     * @return  boolean
     */
    public function unique($value, $params, $deleted = false)
    {
        $CI =& get_instance();
        $CI->load->database();

        $params = explode('.', $params);
        if (count($params) == 3) {
            list($table, $field, $current_id) = $params;
        } else {
            list($table, $field) = $params;
        }

        $rule = 'unique';
        $query = $CI->db->select('id')->from($table)->where($field, $value);

        if ($deleted) {
            $rule = 'unique_non_deleted';
            $query->where('deleted_at IS NULL');
        }

        $query = $query->limit(1)->get();
        $CI->form_validation->set_message($rule, '%sが既存に使っています。他のメールを使ってください。');

        if (count($params) == 3) {
            return $query->row() && $query->row()->id != $current_id ? false : true;
        } else {
            return $query->row() ? false : true;
        }
    }

    /**
     * Unique check including deleted_at field check
     *
     * Check if the input value doesn't already exist
     * in the specified database field.
     *
     * @param   string  $value   The input value
     * @param   string  $params  The dot separated params [table.field] or [table.field.id]
     * @return  boolean
     */
    public function unique_non_deleted($value, $params)
    {
        return $this->unique($value, $params, true);
    }

    /**
     * Check the date is valid
     *
     * @param   string  $value   The input value
     * @param   string  $params  The input date value in the format Y-m-d
     * @return  boolean
     */
    public function checkdate_merge($value, $params)
    {
        $CI =& get_instance();
        $CI->load->database();

        $values = explode('.', $params);
        $params = $values[0];
        $label = (isset($values[1])) ? $values[1] : '%s';

        $rule = 'checkdate_merge';
        $CI->form_validation->set_message($rule, $label.'は無効です。');

        if (empty($params)) {
            return true;
        }

        $params = explode('-', $params);
        if (count($params) >= 3 && $params[0] && $params[1] && $params[2]) {
            return checkdate((int) $params[1], (int) $params[2], (int) $params[0]);
        } else {
            return false;
        }
    }

    /**
     * Check the password validation
     *
     * @param   string  $email
     * @param   string  $password
     * @return  boolean
     */
    public function password_checker($value, $email)
    {
        $CI =& get_instance();

        $disallowedChars = array(
            '\\-', '_',
            'Ａ','Ｂ','Ｃ','Ｄ','Ｅ','Ｆ','Ｇ','Ｈ','Ｉ','Ｊ','Ｋ','Ｌ','Ｍ',
            'Ｎ','Ｏ','Ｐ','Ｑ','Ｒ','Ｓ','Ｔ','Ｕ','Ｖ','Ｗ','Ｘ','Ｙ','Ｚ',
            'ａ','ｂ','ｃ','ｄ','ｅ','ｆ','ｇ','ｈ','ｉ','ｊ','ｋ','ｌ','ｍ',
            'ｎ','ｏ','ｐ','ｑ','ｒ','ｓ','ｔ','ｕ','ｖ','ｗ','ｘ','ｙ','ｚ',
            '０','１','２','３','４','５','６','７','８','９'
        );

        if ($CI->input->post($email)) {
            $email = explode('@', $CI->input->post($email));
            $username = $email[0];
            $disallowedChars[] = $username;
        }

        if (mb_strlen($value) >= 8 && !preg_match('/' . implode('|', $disallowedChars) . '/u', $value) &&  preg_match('/\d/',$value)) {
            // valid
            return true;
        } else {
            // invalid
            $CI->form_validation->set_message('password_checker', '他のパスワードで再入力して下さい。パスワードフィールドの下の参考情報を参照してください。');
            return false;
        }
    }
    
    /**
     * 全角カタカナ チェック
     *
     * @access public
     * @param    string
     * @return bool
     *
     */
    function katakana($str)
    {
        if ($str == '')
        {
            return TRUE;
        }
        $str = mb_convert_encoding($str, 'UTF-8');
        return ( ! preg_match("/^(?:\xE3\x82[\xA1-\xBF]|\xE3\x83[\x80-\xB6]|ー)+$/", $str)) ? FALSE : TRUE;
    }
}
