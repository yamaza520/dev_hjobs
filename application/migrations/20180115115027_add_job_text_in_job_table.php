<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Job_Text_In_Job_Table extends CI_Migration {

    public function up()
    {
        //add_column in job table
        $this->dbforge->add_column('job', array(
            'job_text' => array(
                'type'       => 'TEXT',
                'null'       => true,
                'after'      => 'job_detail_title',
            ),
        ));
    }

    public function down()
    {
        $this->dbforge->drop_column('job', 'job_text');
    }
}
