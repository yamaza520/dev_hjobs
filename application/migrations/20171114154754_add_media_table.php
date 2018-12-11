<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_Media_Table extends CI_Migration
{
    public function up()
    {
        // Drop table 'media' if it exists
        $this->dbforge->drop_table('media', true);

        // Table structure for table 'media'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => true,
                'auto_increment' => true
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => false,
            ),
            'logo_file' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
            ),
            'type' => array( // api or link or hotelier
                'type' => 'VARCHAR',
                'constraint' => '10',
                'null' => false,
            ),
            'link_url' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
            ),
            'price' => array(
                'type' => 'DOUBLE',
                'constraint' => '10,2',
                'null' => true,
            ),
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('media');

        // Dumping data for table 'media'
        $data = array(
            'id'        => '1',
            'name'      => 'DODA',
            'logo_file' => 'doda.jpg',
            'type'      => 'link',
            'link_url'  => 'https://doda.jp/dcfront/member/memberRegist/?carry_class=d&entry_id=25&ndrs=a5989663d0f1bb&fm=list&carry_id=%s',
        );
        $this->db->insert('media', $data);
    }

    public function down()
    {
        $this->dbforge->drop_table('media', true);
    }
}
