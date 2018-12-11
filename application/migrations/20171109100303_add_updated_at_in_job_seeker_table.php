<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Updated_At_In_Job_Seeker_Table extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_column('job_seeker', array(
            'updated_at' => array(
                'type'  => 'DATETIME',
                'null'  => true,
                'after' => 'created_at',
            ),
        ));
    }

    public function down()
    {
        $this->dbforge->drop_column('job_seeker', 'updated_at');
    }
}
