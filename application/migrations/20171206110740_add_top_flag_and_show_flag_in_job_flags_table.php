<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Top_Flag_And_Show_Flag_In_Job_Flags_Table extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_column('job_flags', array(
            'top_flag' => array(
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
                'after'      => 'name',
            ),
            'show_flag' => array(
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 1,
                'after'      => 'top_flag',
            ),
        ));
    }

    public function down()
    {
        $this->dbforge->drop_column('job_flags', 'top_flag');
        $this->dbforge->drop_column('job_flags', 'show_flag');
    }
}
