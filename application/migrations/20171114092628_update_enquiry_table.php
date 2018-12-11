<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Update_Enquiry_Table extends CI_Migration
{
    public function up()
    {
        // Drop table 'enquiry' if it exists
        $this->dbforge->drop_table('enquiry', true);

        // Table structure for table 'job_seeker'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => true,
                'auto_increment' => true
            ),
            'type' => array( // individual or company
                'type' => 'VARCHAR',
                'constraint' => '10',
                'unsigned' => true,
                'auto_increment' => true
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false
            ),
            'phone' => array(
                'type' => 'VARCHAR',
                'constraint' => '13',
                'null' => false
            ),
            'company' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ),
            'first_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => false
            ),
            'last_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => false
            ),
            'zip_code' => array(
                'type' => 'VARCHAR',
                'constraint' => '7',
                'null' => true
            ),
            'pref_cd' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => true
            ),
            'municipality' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ),
            'address' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ),
            'content' => array(
                'type' => 'TEXT',
                'null' => false
            ),
            'created_at' => array(
                'type' => 'DATETIME',
                'null' => false,
            ),
            'deleted_at' => array(
                'type' => 'DATETIME',
                'null' => true,
            )
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('enquiry');

        $this->dbforge->drop_table('enquiry_type', true);
    }

    public function down()
    {
        // Drop table 'enquiry_type' if it exists
        $this->dbforge->drop_table('enquiry_type', true);

        // Table structure for table 'enquiry_type'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => true,
                'auto_increment' => true
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false
            ),
            'sort_order' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '4',
                'null' => false
            ),
            'deleted_at' => array(
                'type' => 'DATETIME',
                'null' => true
            )
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('enquiry_type');

        // Drop table 'enquiry' if it exists
        $this->dbforge->drop_table('enquiry', true);

        // Table structure for table 'enquiry'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => true,
                'auto_increment' => true
            ),
            'enquiry_type_id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => false
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false
            ),
            'content' => array(
                'type' => 'TEXT',
                'constraint' => '1000',
                'null' => false
            ),
            'created_at' => array(
                'type' => 'DATETIME',
                'null' => true
            )
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('enquiry');
    }
}
