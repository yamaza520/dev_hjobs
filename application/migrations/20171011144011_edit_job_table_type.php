<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Edit_Job_Table_Type extends CI_Migration {

    public function up()
    {
        // change job table from innoDB to MyISAM
        $this->db->query('ALTER TABLE job ENGINE = MYISAM');
        // Dumping data for table 'hotel_type'
        $this->db->truncate('hotel_type');
        $data = array(
            array(
                'id'    =>'',
                'name'  =>'シティホテル',
                'sort_order' => '1',
                'deleted_at' => null
            ),
            array(
                'id'    =>'',
                'name'  => 'リゾートホテル',
                'sort_order' => '2',
                'deleted_at' => null
            ),
            array(
                'id'    =>'',
                'name'  => 'ビジネスホテル',
                'sort_order' => '3',
                'deleted_at' => null
            ),
            array(
                'id'    =>'',
                'name'  => '旅館',
                'sort_order' => '4',
                'deleted_at' => null
            ),
            array(
                'id'    =>'',
                'name'  => 'その他',
                'sort_order' => '5',
                'deleted_at' => null
            )
        );
        $this->db->insert_batch('hotel_type', $data);
    }

    public function down()
    {
        $this->db->truncate('hotel_type');
    }
}
