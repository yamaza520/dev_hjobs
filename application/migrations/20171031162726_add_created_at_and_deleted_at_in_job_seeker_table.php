<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Created_At_And_Deleted_At_In_Job_Seeker_Table extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_column('job_seeker', array(
            'created_at' => array(
                'type' => 'DATETIME',
                'null' => false,
            ),
            'deleted_at' => array(
                'type' => 'DATETIME',
                'null' => true,
            ),
        ));
    }

    public function down()
    {
        $this->dbforge->drop_column('job_seeker', 'created_at');
        $this->dbforge->drop_column('job_seeker', 'deleted_at');
    }
}
