<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_New_Table_Article_Content extends CI_Migration {

    public function up()
    {
        $this->dbforge->drop_table('article_content', TRUE);
        $this->dbforge->add_field(array(
           'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => true,
                'auto_increment' => true
            ),
            'article_id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => false
            ),
            'type' => array(
                'type' => 'VARCHAR',
                'constraint' => '8',
                'null' => false
            ),
            'content' => array(
                'type' => 'TEXT',
                'null' => false
            ),
            'sort_order' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '4',
                'default' => 0,
            ),
            'created_at' => array(
                'type' => 'DATETIME',
                'null' => true
            ),
            'deleted_at' => array(
                'type' => 'DATETIME',
                'null' => true
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('article_content');
    }

    public function down()
    {
        $this->dbforge->drop_table('article_content', TRUE);
    }
}
