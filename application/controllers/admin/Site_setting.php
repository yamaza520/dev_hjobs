<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site_setting extends MY_AdminController
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Site_setting_model');
    }
    /**
     * @route /admin/site_setting/db_backup
     */
    public function db_backup()
    {
        $this->page_title = 'データベースのバックアップ';

        if (count($_POST)) {
            $file_name = 'db-'. date('YmdHis');

            // Load the DB utcount($_POST)ility class
            $this->load->dbutil();
            $prefs = array(
                'tables'        => array(),                     // Array of tables to backup.
                'ignore'        => array(),                     // List of tables to omit from the backup
                'format'        => 'zip',                       // gzip, zip, txt
                'filename'      => $file_name. '.sql',
                'add_drop'      => TRUE,                        // Whether to add DROP TABLE statements to backup file
                'add_insert'    => TRUE,                        // Whether to add INSERT data to backup file
                'newline'       => "\n"                         // Newline character used in backup file
            );
            // Backup your entire database and assign it to a variable
            $backup = $this->dbutil->backup($prefs);
            // Load the download helper and send the file to your desktop
            $this->load->helper('download');
            force_download($file_name. '.zip', $backup);
        }

        $this->_render('site_setting/db_backup');
    }

    /**
     * @route /admin/site_setting/maintenance
     */
    public function maintenance()
    {
        $this->page_title = 'メンテナンスモード切り替え';

        $result = $this->Site_setting_model->find_one_by(array('name' => 'maintenance'));
        if (empty($result)) {
            show_404();
        }

        $result->value = (int) $result->value;
        $data['site_setting'] = $result;

        if (count($_POST)) {
            $update_data = array(
                'value'      => $result->value == 0 ? 1 : 0,
                'updated_at' => date('Y-m-d H:i:s'),
            );
            $this->Site_setting_model->update($result->id, $update_data);

            redirect($this->path . 'site_setting/maintenance');
        }
        $this->_render('site_setting/maintenance', $data);
    }
}
