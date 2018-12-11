<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Deleated_At_In_Job_Image_Table extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_column('job_image', array(
            'deleted_at' => array(
                'type' => 'DATETIME',
                'null' => true,
                'after' => 'updated_at',
            ),
        ));
    }

    public function down()
    {
        $this->dbforge->drop_column('job_image', 'deleted_at');
    }
}
