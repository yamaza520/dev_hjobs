<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_add_faq_table extends CI_Migration {

    public function up()
    {
        $this->dbforge->drop_table('faq', TRUE);
        $this->dbforge->add_field(array(
           'id' => array(
                'type'           => 'MEDIUMINT',
                'constraint'     => '8',
                'unsigned'       => true,
                'auto_increment' => true
            ),
            'question' => array(
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false
            ),
            'answer' => array(
                'type'       => 'TEXT',
                'null'       => false
            ),
           'is_public' => array(
               'type'       => 'TINYINT',
               'constraint' => '1',
               'unsigned'   => true,
               'default'    => 1,
            ),
           'job_detail_flag' => array(
               'type'       => 'TINYINT',
               'constraint' => '1',
               'unsigned'   => true,
               'default'    => 0,
            ),
           'sort_order' => array(
               'type'       => 'MEDIUMINT',
               'constraint' => '8',
               'unsigned'   => true,
               'default'    => 0,
            ),
            'created_at' => array(
                'type'   => 'DATETIME',
                'null'   => false
            ),
            'updated_at' => array(
                'type'   => 'DATETIME',
                'null'   => true
            ),
            'deleted_at' => array(
                'type'   => 'DATETIME',
                'null'   => true
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('faq');
    }

    public function down()
    {
        $this->dbforge->drop_table('faq', TRUE);
    }
}
