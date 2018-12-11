<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_add_new_table_mail_template extends CI_Migration {

    public function up()
    {
        $this->dbforge->drop_table('mail_template', TRUE);
        $this->dbforge->add_field(array(
            'id' => array(
                'type'           => 'MEDIUMINT',
                'constraint'     => '8',
                'unsigned'       => true,
                'auto_increment' => true
            ),
            'name' => array(
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => false
            ),
            'text' => array(
                'type'       => 'TEXT',
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
        $this->dbforge->create_table('mail_template');
    }

    public function down()
    {
        $this->dbforge->drop_table('mail_template', TRUE);
    }
}
