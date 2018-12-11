<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Change_Status_To_Profile_Status extends CI_Migration
{
    public function up()
    {
        $this->dbforge->modify_column('users', array(
            'status' => array(
                'name' => 'profile_status',
                'type' => 'MEDIUMINT',
                'constraint' => '4',
                'unsigned' => true,
                'default' => 0,
            ),
        ));
    }

    public function down()
    {
        $this->dbforge->modify_column('users', array(
            'profile_status' => array(
                'name' => 'status',
                'type' => 'TINYINT',
                'constraint' => '1',
                'unsigned' => true,
                'default' => 0,
            ),
        ));
    }
}
