<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_New_Table_Hotel_Type extends CI_Migration {

    public function up()
    {
        $this->dbforge->drop_table('hotel_type', TRUE);
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
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('hotel_type');

        $this->dbforge->add_column('job', array(
           'hotel_type_id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => true,
                'after' => 'order_id'
            ),
       ));
    }

    public function down()
    {
        $this->dbforge->drop_table('hotel_type', TRUE);
        $this->dbforge->drop_column('job', 'deleted_at');
    }
}
