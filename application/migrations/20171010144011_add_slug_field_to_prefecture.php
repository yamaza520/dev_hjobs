<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Slug_Field_To_Prefecture extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_column('prefecture', array(
            'slug' => array(
                'type' => 'VARCHAR',
                'constraint' => '10',
                'null' => false,
                'after' => 'name',
            ),
        ));

        $slug = array(
            '1' => 'hokkaido',
            '2' => 'aomori',
            '3' => 'iwate',
            '4' => 'miyagi',
            '5' => 'akita',
            '6' => 'yamagata',
            '7' => 'fukushima',
            '8' => 'ibaraki',
            '9' => 'tochigi',
            '10' => 'gunma',
            '11' => 'saitama',
            '12' => 'chiba',
            '13' => 'tokyo',
            '14' => 'kanagawa',
            '15' => 'niigata',
            '16' => 'toyama',
            '17' => 'ishikawa',
            '18' => 'fukui',
            '19' => 'yamanashi',
            '20' => 'nagano',
            '21' => 'gifu',
            '22' => 'shizuoka',
            '23' => 'aichi',
            '24' => 'mie',
            '25' => 'shiga',
            '26' => 'kyoto',
            '27' => 'osaka',
            '28' => 'hyogo',
            '29' => 'nara',
            '30' => 'wakayama',
            '31' => 'tottori',
            '32' => 'shimane',
            '33' => 'okayama',
            '34' => 'hiroshima',
            '35' => 'yamaguchi',
            '36' => 'tokushima',
            '37' => 'kagawa',
            '38' => 'ehime',
            '39' => 'kochi',
            '40' => 'fukuoka',
            '41' => 'saga',
            '42' => 'nagasaki',
            '43' => 'kumamoto',
            '44' => 'oita',
            '45' => 'miyazaki',
            '46' => 'kagoshima',
            '47' => 'okinawa',
            '48' => 'overseas',
        );

        foreach ($slug as $key => $value)
        {
            $sql = "UPDATE prefecture SET slug = '$value' WHERE id= $key " ;
            $this->db->query($sql);
        }
    }

    public function down()
    {
        $this->dbforge->drop_column('prefecture', 'slug');
    }
}