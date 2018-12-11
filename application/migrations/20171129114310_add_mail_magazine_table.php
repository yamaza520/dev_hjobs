<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_Mail_Magazine_Table extends CI_Migration
{
    public function up()
    {
        // Drop table 'mail_magazine' if it exists
        $this->dbforge->drop_table('mail_magazine', true);

        // Table structure for table 'mail_magazine'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => true,
                'auto_increment' => true
            ),
            'job_seeker_id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => true,
                'null' => false,
            ),
            'mail_template_id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => true,
                'null' => false,
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false
            ),
            'subject' => array(
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false,
                'after'      => 'name',
            ),
            'message' => array(
                'type'       => 'TEXT',
                'null'       => false
            ),
            'sent_at' => array(
                'type' => 'DATETIME',
                'null' => true
            ),
            'created_at' => array(
                'type'   => 'DATETIME',
                'null'   => false
            ),
            'deleted_at' => array(
                'type'   => 'DATETIME',
                'null'   => true
            )
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('mail_magazine');
    }

    public function down()
    {
        $this->dbforge->drop_table('mail_magazine', true);
    }
}
