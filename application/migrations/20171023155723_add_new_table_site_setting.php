<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_add_new_table_site_setting extends CI_Migration {

    public function up()
    {
        $this->dbforge->drop_table('site_setting', TRUE);
        $this->dbforge->add_field(array(
           'id' => array(
                'type'           => 'MEDIUMINT',
                'constraint'     => '8',
                'unsigned'       => true,
                'auto_increment' => true
            ),
            'name' => array(
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false
            ),
            'value' => array(
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false
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
        $this->dbforge->create_table('site_setting');

         // Dumping data for table 'site_setting'
        $data = array(
            'name'       => 'maintenance',
            'value'      => 0,
            'created_at' => date('Y-m-d H:i:s'),
        );
        $this->db->insert('site_setting', $data);
    }

    public function down()
    {
        $this->dbforge->drop_table('site_setting', TRUE);
    }
}
