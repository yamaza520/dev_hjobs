<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Code_In_Master_Table extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_column('industory_l', array(
            'code' => array(
                'type' => 'VARCHAR',
                'constraint' => '2',
                'null' => true,
                'after' => 'id'
            ),
        ));

        $this->dbforge->add_column('industory_m', array(
            'code' => array(
                'type' => 'VARCHAR',
                'constraint' => '4',
                'null' => true,
                'after' => 'industory_l_id'
            ),
        ));

        $this->dbforge->add_column('industory_s', array(
            'code' => array(
                'type' => 'VARCHAR',
                'constraint' => '6',
                'null' => true,
                'after' => 'industory_m_id'
            ),
        ));

        $this->dbforge->add_column('job_category_l', array(
            'code' => array(
                'type' => 'VARCHAR',
                'constraint' => '6',
                'null' => true,
                'after' => 'id'
            ),
        ));

        $this->dbforge->add_column('job_category_m', array(
            'code' => array(
                'type' => 'VARCHAR',
                'constraint' => '4',
                'null' => true,
                'after' => 'job_category_l_id'
            ),
        ));

        $this->dbforge->add_column('job_category_s', array(
            'code' => array(
                'type' => 'VARCHAR',
                'constraint' => '6',
                'null' => true,
                'after' => 'job_category_m_id'
            ),
        ));

        $this->dbforge->add_column('area', array(
            'code' => array(
                'type' => 'VARCHAR',
                'constraint' => '4',
                'null' => true,
                'after' => 'id'
            ),
        ));
    }

    public function down()
    {
        $this->dbforge->drop_column('industory_l', 'code');
        $this->dbforge->drop_column('industory_m', 'code');
        $this->dbforge->drop_column('industory_s', 'code');
        $this->dbforge->drop_column('job_category_l', 'code');
        $this->dbforge->drop_column('job_category_m', 'code');
        $this->dbforge->drop_column('job_category_s', 'code');
    }
}
