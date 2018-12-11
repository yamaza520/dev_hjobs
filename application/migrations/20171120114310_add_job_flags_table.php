<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_Job_Flags_Table extends CI_Migration
{
    public function up()
    {
        // Drop table 'job_flags' if it exists
        $this->dbforge->drop_table('job_flags', true);

        // Table structure for table 'job_flags'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => true,
                'auto_increment' => true
            ),
            'code' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => false,
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
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
        $this->dbforge->create_table('job_flags');

        // Dumping data for table 'job_flags'
        $data = array(
            array(
                'id'   => '1',
                'name' => '社員平均年齢20代',
                'code' => 'average_age_flag',
                'sort_order' => '1'
            ),
            array(
                'id'   => '2',
                'name' => '中途入社50％以上',
                'code' => 'mid_career_flag',
                'sort_order' => '2'
            ),
            array(
                'id'   => '3',
                'name' => '女性社員50％以上',
                'code' => 'female_flag',
                'sort_order' => '3'
            ),
            array(
                'id'   => '4',
                'name' => '外資系企業',
                'code' => 'foreign_company_flag',
                'sort_order' => '4'
            ),
            array(
                'id'   => '5',
                'name' => '上場企業',
                'code' => 'market_id',
                'sort_order' => '5'
            ),
            array(
                'id'   => '6',
                'name' => 'フレックス勤務',
                'code' => 'flex_flag',
                'sort_order' => '6'
            ),
            array(
                'id'   => '7',
                'name' => '服装自由',
                'code' => 'cloth_free_flag',
                'sort_order' => '7'
            ),
            array(
                'id'   => '8',
                'name' => '週休2日',
                'code' => 'two_day_off_flag',
                'sort_order' => '8'
            ),
            array(
                'id'   => '9',
                'name' => '年間休日120日以上',
                'code' => 'holiday_120',
                'sort_order' => '9'
            ),
            array(
                'id'   => '10',
                'name' => '第二新卒歓迎',
                'code' => 'second_graduate_flag',
                'sort_order' => '10'
            ),
            array(
                'id'   => '11',
                'name' => '学歴不問',
                'code' => 'any_education_flag',
                'sort_order' => '11'
            ),
            array(
                'id'   => '12',
                'name' => 'Uターン/Iターン歓迎',
                'code' => 'uturn_flag',
                'sort_order' => '12'
            ),
            array(
                'id'   => '13',
                'name' => '未経験歓迎',
                'code' => 'inexperienced_flag',
                'sort_order' => '13'
            ),
            array(
                'id'   => '14',
                'name' => '転勤なし',
                'code' => 'no_relocation_flag',
                'sort_order' => '14'
            ),
            array(
                'id'   => '15',
                'name' => '海外勤務あり',
                'code' => 'work_abroad',
                'sort_order' => '15'
            ),
            array(
                'id'   => '16',
                'name' => '管理職採用',
                'code' => 'manager',
                'sort_order' => '16'
            ),
            array(
                'id'   => '17',
                'name' => '社宅/家賃補助あり',
                'code' => 'company_house_flag',
                'sort_order' => '17'
            ),
            array(
                'id'   => '18',
                'name' => '育児支援制度',
                'code' => 'child_care_flag',
                'sort_order' => '18'
            ),
            array(
                'id'   => '19',
                'name' => 'ストックオプション',
                'code' => 'stock_holding_flag',
                'sort_order' => '19'
            ),
            array(
                'id'   => '20',
                'name' => '研修制度/教育制度充実',
                'code' => 'training_flag',
                'sort_order' => '20'
            ),
            array(
                'id'   => '21',
                'name' => '資格取得支援制度',
                'code' => 'qualification_flag',
                'sort_order' => '21'
            ),
            array(
                'id'   => '22',
                'name' => '社内ベンチャー制度',
                'code' => 'internal_venture_flag',
                'sort_order' => '22'
            ),
            array(
                'id'   => '23',
                'name' => '独立支援制度',
                'code' => 'independent_support_flag',
                'sort_order' => '23'
            ),
        );
        $this->db->insert_batch('job_flags', $data);
    }

    public function down()
    {
        $this->dbforge->drop_table('job_flags', true);
    }
}
