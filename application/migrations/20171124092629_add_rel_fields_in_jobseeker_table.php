<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_Rel_Fields_In_Jobseeker_Table extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_column('job_seeker', array(
            'rel_zip_code' => array(
                'type' => 'VARCHAR',
                'constraint' => '7',
                'null' => true,
                'after' => 'city'
            ),
            'rel_pref_cd' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => true,
                'after' => 'rel_zip_code'
            ),
            'rel_city' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
                'after' => 'rel_pref_cd'
            ),
            'rel_address' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
                'after' => 'rel_city'
            ),
        ));
    }

    public function down()
    {
        $this->dbforge->drop_column('job_seeker', 'rel_zip_code');
        $this->dbforge->drop_column('job_seeker', 'rel_pref_cd');
        $this->dbforge->drop_column('job_seeker', 'rel_city');
        $this->dbforge->drop_column('job_seeker', 'rel_address');
    }
}
