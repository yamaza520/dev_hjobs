<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_Hotelier_To_Media_Table extends CI_Migration
{
    public function up()
    {
        $data = array(
            'name'      => 'HOTELIER',
            'logo_file' => 'hotelier.png',
            'type'      => 'hotelier',
        );

        $this->db->insert('media', $data);
    }

    public function down()
    {
        // do nothing
    }
}
