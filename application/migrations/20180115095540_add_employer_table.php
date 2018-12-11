<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Employer_Table extends CI_Migration {

    public function up()
    {
        $this->dbforge->drop_table('employer', TRUE);
        $this->dbforge->add_field(array(
           'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => true,
                'auto_increment' => true,
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false,
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false,
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
        $this->dbforge->create_table('employer');

        $this->dbforge->add_column('job', array(
           'employer_id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => true,
                'after' => 'hotel_type_id'
            ),
            'job_detail_title' => array(
                'type' => 'VARCHAR',
                'constraint' => '202',
                'null' => false,
                'after' => 'employer_id'
            ),
            'free_space_title' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false,
                'after' => 'job_detail'
            ),
            'free_space_detail' => array(
                'type' => 'VARCHAR',
                'constraint' => '1000',
                'null' => false,
                'after' => 'free_space_title'
            ),
       ));
    }

    public function down()
    {
        $this->dbforge->drop_table('employer', true);
        $this->dbforge->drop_column('job', 'employer_id');
        $this->dbforge->drop_column('job', 'job_detail_title');
        $this->dbforge->drop_column('job', 'job_detail');
        $this->dbforge->drop_column('job', 'free_space_title');
        $this->dbforge->drop_column('job', 'free_space_detail');
    }
}
