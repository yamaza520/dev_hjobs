<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_Salary2_Field_In_Job_Table extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_column('job', array(
            'salary2' => array(
                'type' => 'TEXT',
                'constraint' => '500',
                'null' => true,
                'after' => 'work_place'
            ),
            'work_place2' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                'null' => true,
                'after' => 'salary2'
            ),
        ));
    }

    public function down()
    {
        $this->dbforge->drop_column('job', 'salary2');
        $this->dbforge->drop_column('job', 'work_place2');
    }
}
