<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_User_Job_Preferences_Table extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ),
            'job_seeker_id' => array(
                'type'       => 'MEDIUMINT',
                'constraint' => 8,
                'null'       => false
            ),
            'conditions' => array(
                'type'       => 'VARCHAR',
                'constraint' => '3000',
                'null'       => false
            ),
            'created_at' => array(
                'type' => 'DATETIME',
                'null' => false,
            ),
            'deleted_at' => array(
                'type' => 'DATETIME',
                'null' => true,
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('user_job_preferences');
    }

    public function down()
    {
        $this->dbforge->drop_table('user_job_preferences', true);
    }
}
