<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_News_Table extends CI_Migration
{
    public function up()
    {
        // Drop table 'news' if it exists
        $this->dbforge->drop_table('news', true);

        // Table structure for table 'news'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => true,
                'auto_increment' => true
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false
            ),
            'description' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ),
            'body' => array(
                'type' => 'LONGTEXT',
                'null' => false
            ),
            'heading_image' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ),
            'is_public' => array(
                'type' => 'TINYINT',
                'constraint' => '1',
                'null' => true
            ),
            'view_count' => array(
                'type' => 'INT',
                'constraint' => '10',
                'null' => true
            ),
            'created_at' => array(
                'type' => 'DATETIME',
                'null' => true
            ),
            'updated_at' => array(
                'type' => 'DATETIME',
                'null' => true
            ),
            'deleted_at' => array(
                'type' => 'DATETIME',
                'null' => true
            )
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('news');
    }

    public function down()
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->dbforge->drop_table('news', true);
    }
}
