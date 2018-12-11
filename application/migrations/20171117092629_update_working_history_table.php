<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Update_Working_History_Table extends CI_Migration
{
    public function up()
    {
        $this->dbforge->modify_column('working_history', array(
            'user_id' => array(
                'name' => 'job_seeker_id',
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => true,
            ),
            'industory_s_id' => array(
                'name'       => 'industory_m_id',
                'type'       => 'MEDIUMINT',
                'constraint' => '8',
                'null'       => false
            ),
            'management_exp' => array(
                'type'       => 'TINYINT',
                'constraint' => '1',
                'null'       => true
            ),
        ));
    }

    public function down()
    {
        $this->dbforge->modify_column('working_history', array(
            'job_seeker_id' => array(
                'name' => 'user_id',
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => true,
            ),
            'industory_m_id' => array(
                'name'       => 'industory_s_id',
                'type'       => 'MEDIUMINT',
                'constraint' => '8',
                'null'       => false
            ),
            'management_exp' => array(
                'type'       => 'TINYINT',
                'constraint' => '1',
                'null'       => false
            ),
        ));
    }
}
