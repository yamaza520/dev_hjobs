<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_Job_Seeker_To_Job_Application extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_column('job_application', array(
            'job_seeker_id' => array(
                'type'       => 'MEDIUMINT',
                'constraint' => '8',
                'null'       => false,
                'after'      => 'job_id',
            ),
            'deleted_at' => array(
                'type'  => 'DATETIME',
                'null'  => true,
            ),
        ));
    }

    public function down()
    {
        $this->dbforge->drop_column('job_application', 'job_seeker_id');
        $this->dbforge->drop_column('job_application', 'deleted_at');
    }
}
