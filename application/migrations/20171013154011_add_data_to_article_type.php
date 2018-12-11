<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Data_To_Article_Type extends CI_Migration {

    public function up()
    {
        // Dumping data for table 'hotel_type'
        $this->db->truncate('article_type');
        $data = array(
            array(
                'id'    =>'',
                'name'  =>'転職ノウハウ',
                'sort_order' => '1',
                'deleted_at' => null
            ),
            array(
                'id'    =>'',
                'name'  => 'お仕事内容',
                'sort_order' => '2',
                'deleted_at' => null
            ),
            array(
                'id'    =>'',
                'name'  => 'ニュース',
                'sort_order' => '3',
                'deleted_at' => null
            ),
        );
        $this->db->insert_batch('article_type', $data);

        $this->dbforge->add_column('prefecture', array(
            'deleted_at' => array(
                'type' => 'DATETIME',
                'null' => true,
                'after' => 'sort_order',
            ),
        ));
    }

    public function down()
    {
        $this->db->truncate('article_type');
        $this->dbforge->drop_column('prefecture', 'deleted_at');
    }
}
