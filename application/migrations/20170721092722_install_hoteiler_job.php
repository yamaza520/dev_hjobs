<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Install_Hoteiler_Job extends CI_Migration {

    public function up()
    {
        // Drop table 'industory_l' if it exists
        $this->dbforge->drop_table('industory_l', true);

        // Table structure for table 'industory_l'
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
        $this->dbforge->create_table('industory_l');

        // Drop table 'industory_m' if it exists
        $this->dbforge->drop_table('industory_m', true);

        // Table structure for table 'industory_m'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => true,
                'auto_increment' => true
            ),
            'industory_l_id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => false
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
        $this->dbforge->create_table('industory_m');

        // Drop table 'industory_s' if it exists
        $this->dbforge->drop_table('industory_s', true);

        // Table structure for table 'industory_s'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => true,
                'auto_increment' => true
            ),
            'industory_l_id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => false
            ),
            'industory_m_id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => false
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
                'null' => true,
            )
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('industory_s');


        // Drop table 'area' if it exists
        $this->dbforge->drop_table('area', true);

        // Table structure for table 'area'
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
            )
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('area');

        // Drop table 'prefecture' if it exists
        $this->dbforge->drop_table('prefecture', true);

        // Table structure for table 'prefecture'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => true,
                'auto_increment' => true
            ),
            'pref_cd' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => false
            ),
            'area_id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => false
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
            )
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('prefecture');

        // Drop table 'city' if it exists
        $this->dbforge->drop_table('city', true);

        // Table structure for table 'city'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => true,
                'auto_increment' => true
            ),
            'pref_cd' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => false
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
            )
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('city');

        // Drop table 'market' if it exists
        $this->dbforge->drop_table('market', true);

        // Table structure for table 'market'
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
        $this->dbforge->create_table('market');

        // Drop table 'job_category_l' if it exists
        $this->dbforge->drop_table('job_category_l', true);

        // Table structure for table 'job_category_l'
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
        $this->dbforge->create_table('job_category_l');

        // Drop table 'job_category_m' if it exists
        $this->dbforge->drop_table('job_category_m', true);

        // Table structure for table 'job_category_m'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => true,
                'auto_increment' => true
            ),
            'job_category_l_id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => false
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
        $this->dbforge->create_table('job_category_m');

        // Drop table 'job_category_s' if it exists
        $this->dbforge->drop_table('job_category_s', true);

        // Table structure for table 'job_category_s'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => true,
                'auto_increment' => true
            ),
            'job_category_l_id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => false
            ),
            'job_category_m_id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => false
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
        $this->dbforge->create_table('job_category_s');

        // Drop table 'line' if it exists
        $this->dbforge->drop_table('line', true);

        // Table structure for table 'line'
        $this->dbforge->add_field(array(
            'line_cd' => array(
                'type' => 'INT',
                'constraint' => '10',
                'unsigned' => true,
                'auto_increment' => true
            ),
            'line_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '80',
                'null' => false
            ),
            'line_name_k' => array(
                'type' => 'VARCHAR',
                'constraint' => '80',
                'null' => true
            ),
            'line_name_h' => array(
                'type' => 'DOUBLE',
                'null' => true
            ),
            'lon' => array(
                'type' => 'DOUBLE',
                'null' => true
            ),
            'lat' => array(
                'type' => 'VARCHAR',
                'constraint' => '80',
                'null' => true
            ),
            'e_sort' => array(
                'type' => 'INT',
                'constraint' => '10',
                'null' => false
            )
        ));
        $this->dbforge->add_key('line_cd', true);
        $this->dbforge->create_table('line');

        // Drop table 'station' if it exists
        $this->dbforge->drop_table('station', true);

        // Table structure for table 'station'
        $this->dbforge->add_field(array(
            'station_cd' => array(
                'type' => 'INT',
                'constraint' => '10',
                'unsigned' => true,
                'auto_increment' => true
            ),
            'line_cd' => array(
                'type' => 'INT',
                'constraint' => '10',
                'null' => false
            ),
            'pref_cd' => array(
                'type' => 'INT',
                'constraint' => '10',
                'null' => true
            ),
            'station_g_cd' => array(
                'type' => 'INT',
                'constraint' => '10',
                'null' => false
            ),
            'station_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '80',
                'null' => false
            ),
            'station_name_k' => array(
                'type' => 'VARCHAR',
                'constraint' => '80',
                'null' => true
            ),
            'station_name_r' => array(
                'type' => 'DOUBLE',
                'null' => true
            ),
            'lon' => array(
                'type' => 'DOUBLE',
                'null' => true
            ),
            'lat' => array(
                'type' => 'VARCHAR',
                'constraint' => '80',
                'null' => true
            ),
            'e_sort' => array(
                'type' => 'INT',
                'constraint' => '10',
                'null' => false
            )
        ));
        $this->dbforge->add_key('station_cd', true);
        $this->dbforge->create_table('station');

        // Drop table 'page_setting' if it exists
        $this->dbforge->drop_table('page_setting', true);

        // Table structure for table 'page_setting'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => true,
                'auto_increment' => true
            ),
            'page_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '80',
                'null' => true
            ),
            'pagination_limit' => array(
                'type' => 'INT',
                'constraint' => '10',
                'null' => true
            ),
            'personal_link' => array(
                'type' => 'INT',
                'constraint' => '8',
                'null' => true
            ),
            'seo_link' => array(
                'type' => 'INT',
                'constraint' => '10',
                'null' => true
            ),
            'seo_index' => array(
                'type' => 'INT',
                'constraint' => '10',
                'null' => true
            ),
            'pubsubhubbub' => array(
                'type' => 'TINYINT',
                'constraint' => '1',
                'null' => true
            )
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('page_setting');

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

        // Drop table 'article_type' if it exists
        $this->dbforge->drop_table('article_type', true);

        // Table structure for table 'article_type'
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
        $this->dbforge->create_table('article_type');

        // Drop table 'article' if it exists
        $this->dbforge->drop_table('article', true);

        // Table structure for table 'article'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => true,
                'auto_increment' => true
            ),
            'article_type_id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => false
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
            )
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('article');

        // Drop table 'job_seeker' if it exists
        $this->dbforge->drop_table('job_seeker', true);

        // Table structure for table 'job_seeker'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => true,
                'auto_increment' => true
            ),
            'user_id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => false
            ),
            'pref_cd' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => true
            ),
            'city_id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => true
            ),
            'address' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ),
            'name' => array(
                'type' => 'TINYINT',
                'constraint' => '1',
                'null' => true
            ),
            'name_kana' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ),
            'birthdate' => array(
                'type' => 'DATETIME',
                'null' => true
            ),
            'last_login' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => true
            ),
            'job_type_id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => true
            ),
            'zip_code' => array(
                'type' => 'VARCHAR',
                'constraint' => '7',
                'null' => true
            ),
            'phone_number' => array(
                'type' => 'VARCHAR',
                'constraint' => '13',
                'null' => true
            ),
            'mail_address' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ),
            'pr' => array(
                'type' => 'TEXT',
                'constraint' => '1000',
                'null' => true
            ),
            'license' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ),
            'remarks' => array(
                'type' => 'TEXT',
                'constraint' => '1000',
                'null' => true
            ),
            'last_education_cd' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => true
            ),
            'graduate_cd' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => true
            ),
            'graduate_ym' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => true
            ),
            'school_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ),
            'work_flg' => array(
                'type' => 'TINYINT',
                'constraint' => '1',
                'null' => true
            ),
            'work_ym_from' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => true
            ),
            'work_ym_to' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => true
            ),
            'job_category_l_id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => true
            ),
            'job_category_m_id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => true
            ),
            'job_category_s_id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => true
            ),
            'employ_type_cd' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => true
            ),
            'work_description' => array(
                'type' => 'TEXT',
                'constraint' => '500',
                'null' => true
            ),
            'wish_job_category' => array(
                'type' => 'TEXT',
                'constraint' => '300',
                'null' => true
            ),
            'wish_place' => array(
                'type' => 'TEXT',
                'constraint' => '300',
                'null' => true
            ),
            'mail_magazine_flag' => array(
                'type' => 'TINYINT',
                'null' => true
            ),
            'alert_mail_flag' => array(
                'type' => 'TINYINT',
                'null' => true
            )
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('job_seeker');

        // Drop table 'job' if it exists
        $this->dbforge->drop_table('job', true);

        // Table structure for table 'job'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => true,
                'auto_increment' => true
            ),
            'order_id' => array(
                'type' => 'VARCHAR',
                'constraint' => '10',
                'null' => true
            ),
            'order_no' => array(
                'type' => 'VARCHAR',
                'constraint' => '8',
                'null' => true
            ),
            'job_code' => array(
                'type' => 'VARCHAR',
                'constraint' => '10',
                'null' => true
            ),
            'real_name_job_id' => array(
                'type' => 'VARCHAR',
                'constraint' => '1',
                'null' => true
            ),
            'anonymous_job_id' => array(
                'type' => 'VARCHAR',
                'constraint' => '1',
                'null' => true
            ),
            'public_cd' => array(
                'type' => 'VARCHAR',
                'constraint' => '1',
                'null' => true
            ),
            'publish_start_date' => array(
                'type' => 'DATETIME',
                'null' => true
            ),
            'publish_end_date' => array(
                'type' => 'DATETIME',
                'null' => true
            ),
            'company_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                'null' => true
            ),
            'establish_date' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ),
            'representative' => array(
                'type' => 'VARCHAR',
                'constraint' => '201',
                'null' => true
            ),
            'employee_count' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ),
            'capital' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ),
            'industory_l_id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => true
            ),
            'industory_m_id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => true
            ),
            'job_title' => array(
                'type' => 'TEXT',
                'constraint' => '320',
                'null' => true
            ),
            'pref_cd' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => true
            ),
            'address1' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ),
            'address2' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ),
            'company_description' => array(
                'type' => 'TEXT',
                'constraint' => '2000',
                'null' => true
            ),
            'company_url' => array(
                'type' => 'TEXT',
                'constraint' => '400',
                'null' => true
            ),
            'market_id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => true
            ),
            'average_age' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ),
            'job_category_l_id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => true
            ),
            'job_category_m_id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => true
            ),
            'job_category_s_id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => true
            ),
            'job_description' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ),
            'job_detail' => array(
                'type' => 'TEXT',
                'constraint' => '3000',
                'null' => true
            ),
            'min_salary' => array(
                'type' => 'INT',
                'constraint' => '5',
                'null' => true
            ),
            'max_salary' => array(
                'type' => 'INT',
                'constraint' => '5',
                'null' => true
            ),
            'salary' => array(
                'type' => 'TEXT',
                'constraint' => '500',
                'null' => true
            ),
            'work_place' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                'null' => true
            ),
            'requirement' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ),
            'requirement_detail' => array(
                'type' => 'TEXT',
                'constraint' => '3200',
                'null' => true
            ),
            'age_restriction' => array(
                'type' => 'VARCHAR',
                'constraint' => '1',
                'null' => true
            ),
            'min_age' => array(
                'type' => 'INT',
                'constraint' => '3',
                'null' => true
            ),
            'max_age' => array(
                'type' => 'INT',
                'constraint' => '3',
                'null' => true
            ),
            'work_time' => array(
                'type' => 'TEXT',
                'constraint' => '1000',
                'null' => true
            ),
            'flex_flag' => array(
                'type' => 'INT',
                'constraint' => '3',
                'null' => true
            ),
            'holiday' => array(
                'type' => 'TEXT',
                'constraint' => '1000',
                'null' => true
            ),
            'treatment' => array(
                'type' => 'TEXT',
                'constraint' => '1000',
                'null' => true
            ),
            'selection_process' => array(
                'type' => 'TEXT',
                'constraint' => '1000',
                'null' => true
            ),
            'application_method' => array(
                'type' => 'TEXT',
                'constraint' => '1000',
                'null' => true
            ),
            'inexperienced_flag' => array(
                'type' => 'INT',
                'constraint' => '3',
                'null' => true
            ),
            'second_graduate_flag' => array(
                'type' => 'INT',
                'constraint' => '3',
                'null' => true
            ),
            'foreign_company_flag' => array(
                'type' => 'INT',
                'constraint' => '3',
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
            'plan_type_id' => array(
                'type' => 'INT',
                'constraint' => '10',
                'null' => true
            ),
            'plan_name' => array(
                'type' => 'TEXT',
                'constraint' => '500',
                'null' => true
            ),
            'publish_period' => array(
                'type' => 'INT',
                'constraint' => '3',
                'null' => true
            ),
            'new_class' => array(
                'type' => 'INT',
                'constraint' => '1',
                'null' => true
            ),
            'manuscript_id' => array(
                'type' => 'INT',
                'constraint' => '10',
                'null' => true
            ),
            'search_company_name1' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                'null' => true
            ),
            'search_company_name2' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                'null' => true
            ),
            'search_company_name3' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                'null' => true
            ),
            'search_company_name4' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                'null' => true
            ),
            'search_company_name5' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                'null' => true
            ),
            'holiday_120' => array(
                'type' => 'INT',
                'constraint' => '3',
                'null' => true
            ),
            'work_abroad' => array(
                'type' => 'INT',
                'constraint' => '3',
                'null' => true
            ),
            'manager' => array(
                'type' => 'INT',
                'constraint' => '3',
                'null' => true
            ),
            'employ_type_class' => array(
                'type' => 'INT',
                'constraint' => '3',
                'null' => true
            ),
            'recruit_background' => array(
                'type' => 'TEXT',
                'constraint' => '1000',
                'null' => true
            ),
            'language1' => array(
                'type' => 'INT',
                'constraint' => '1',
                'null' => true
            ),
            'language2' => array(
                'type' => 'INT',
                'constraint' => '1',
                'null' => true
            ),
            'zip_code' => array(
                'type' => 'VARCHAR',
                'constraint' => '7',
                'null' => true
            ),
            'guidance_reason' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                'null' => true
            ),
            'supplement' => array(
                'type' => 'TEXT',
                'constraint' => '1000',
                'null' => true
            ),
            'contact_info' => array(
                'type' => 'TEXT',
                'constraint' => '1000',
                'null' => true
            ),
            'search_work_place' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                'null' => true
            ),
            'traffic' => array(
                'type' => 'TEXT',
                'constraint' => '3000',
                'null' => true
            ),
            'standard_working_hours' => array(
                'type' => 'TEXT',
                'constraint' => '1000',
                'null' => true
            ),
            'employ_period' => array(
                'type' => 'TEXT',
                'constraint' => '1000',
                'null' => true
            ),
            'job_category_l_id2' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => true
            ),
            'job_category_m_id2' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => true
            ),
            'job_category_s_id2' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => true
            ),
            'representative_position' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ),
            'earnings' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ),
            'deleted_at' => array(
                'type' => 'DATETIME',
                'null' => true
            ),
            'earnings' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ),
            'logical_deletion' => array(
                'type' => 'VARCHAR',
                'constraint' => '1',
                'null' => true
            ),
            'job_details_id1' => array(
                'type' => 'VARCHAR',
                'constraint' => '8',
                'null' => true
            ),
            'job_details_id2' => array(
                'type' => 'VARCHAR',
                'constraint' => '8',
                'null' => true
            ),
            'annual_income_example1' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ),
            'annual_income_example2' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ),
            'annual_income_example3' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ),
            'annual_income_example4' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ),
            'annual_income_example5' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ),
            'profit' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ),
            'list_message' => array(
                'type' => 'TEXT',
                'constraint' => '300',
                'null' => true
            ),
            'any_education_flag' => array(
                'type' => 'INT',
                'constraint' => '3',
                'null' => true
            ),
            'mid_career_flag' => array(
                'type' => 'INT',
                'constraint' => '3',
                'null' => true
            ),
            'average_age_flag' => array(
                'type' => 'INT',
                'constraint' => '3',
                'null' => true
            ),
            'no_relocation_flag' => array(
                'type' => 'INT',
                'constraint' => '3',
                'null' => true
            ),
            'stock_option_flag' => array(
                'type' => 'INT',
                'constraint' => '3',
                'null' => true
            ),
            'employ500' => array(
                'type' => 'INT',
                'constraint' => '3',
                'null' => true
            ),
            'employ1000' => array(
                'type' => 'INT',
                'constraint' => '3',
                'null' => true
            ),
            'continuous_growth_flag' => array(
                'type' => 'INT',
                'constraint' => '3',
                'null' => true
            ),
            'cloth_free_flag' => array(
                'type' => 'INT',
                'constraint' => '3',
                'null' => true
            ),
            'female_flag' => array(
                'type' => 'INT',
                'constraint' => '3',
                'null' => true
            ),
            'commission_flag' => array(
                'type' => 'INT',
                'constraint' => '3',
                'null' => true
            ),
            'annual_salary_flag' => array(
                'type' => 'INT',
                'constraint' => '3',
                'null' => true
            ),
            'internal_venture_flag' => array(
                'type' => 'INT',
                'constraint' => '3',
                'null' => true
            ),
            'uturn_flag' => array(
                'type' => 'INT',
                'constraint' => '3',
                'null' => true
            ),
            'cafeteria_plan_flag' => array(
                'type' => 'INT',
                'constraint' => '3',
                'null' => true
            ),
            'stock_holding_flag' => array(
                'type' => 'INT',
                'constraint' => '3',
                'null' => true
            ),
            'independent_support_flag' => array(
                'type' => 'INT',
                'constraint' => '3',
                'null' => true
            ),
            'long_vacation_flag' => array(
                'type' => 'INT',
                'constraint' => '3',
                'null' => true
            ),
            'child_care_flag' => array(
                'type' => 'INT',
                'constraint' => '3',
                'null' => true
            ),
            'two_day_off_flag' => array(
                'type' => 'INT',
                'constraint' => '3',
                'null' => true
            ),
            'company_house_flag' => array(
                'type' => 'INT',
                'constraint' => '3',
                'null' => true
            ),
            'qualification_flag' => array(
                'type' => 'INT',
                'constraint' => '3',
                'null' => true
            ),
            'training_flag' => array(
                'type' => 'INT',
                'constraint' => '3',
                'null' => true
            ),
            'product_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => true
            ),
            'post_complete' => array(
                'type' => 'INT',
                'constraint' => '3',
                'null' => true
            ),
            'other_job' => array(
                'type' => 'INT',
                'constraint' => '3',
                'null' => true
            ),
            'seminar_title_id' => array(
                'type' => 'INT',
                'constraint' => '10',
                'null' => true
            ),
            'issue_no_from' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => true
            ),
            'issue_no_to' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => true
            ),
            'link_job_id' => array(
                'type' => 'INT',
                'constraint' => '10',
                'null' => true
            ),
            'search_comp_name_kana' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                'null' => true
            ),
            'job_type' => array(
                'type' => 'INT',
                'constraint' => '3',
                'null' => true
            ),
            'selection_point' => array(
                'type' => 'TEXT',
                'constraint' => '400',
                'null' => true
            ),
            'pay_rise' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                'null' => true
            ),
            'bonus' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                'null' => true
            ),
            'recruit_detail_code' => array(
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => true
            ),
            'recruit_job_title' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                'null' => true
            ),
            'company_name_kana' => array(
                'type' => 'TEXT',
                'constraint' => '400',
                'null' => true
            ),
            'salary_pay_class' => array(
                'type' => 'VARCHAR',
                'constraint' => '1',
                'null' => true
            ),
            'age' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                'null' => true
            ),
            'age_code_max' => array(
                'type' => 'VARCHAR',
                'constraint' => '2',
                'null' => true
            ),
            'age_code_min' => array(
                'type' => 'VARCHAR',
                'constraint' => '2',
                'null' => true
            ),
            'closest_station' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                'null' => true
            ),
            'line_block_code' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => true
            ),
            'line_code' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => true
            ),
            'station_code' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => true
            ),
            'employ_type' => array(
                'type' => 'TEXT',
                'constraint' => '1000',
                'null' => true
            ),
            'employ_type_cd' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                'null' => true
            ),
            'pr_point_cd' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                'null' => true
            ),
            'work_time_cd' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                'null' => true
            ),
            'special_feature_cd' => array(
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => true
            ),
            'related_url' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
                'null' => true
            ),
            'period_cd' => array(
                'type' => 'VARCHAR',
                'constraint' => '1',
                'null' => true
            ),
            'latitude' => array(
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => true
            ),
            'longitude' => array(
                'type' => 'VARCHAR',
                'constraint' => '1',
                'null' => true
            )
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('job');

        // Drop table 'job_image' if it exists
        $this->dbforge->drop_table('job_image', true);

        // Table structure for table 'job_image'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => true,
                'auto_increment' => true
            ),
            'job_id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => false
            ),
            'url' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false
            ),
            'caption' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ),
            'category' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ),
            'created_at' => array(
                'type' => 'DATETIME',
                'null' => true
            ),
            'updated_at' => array(
                'type' => 'DATETIME',
                'null' => true
            )
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('job_image');

        // Drop table 'job_free_item' if it exists
        $this->dbforge->drop_table('job_free_item', true);

        // Table structure for table 'job_free_item'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => true,
                'auto_increment' => true
            ),
            'job_id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => false
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ),
            'description' => array(
                'type' => 'TEXT',
                'constraint' => '2000',
                'null' => true
            ),
            'created_at' => array(
                'type' => 'DATETIME',
                'null' => true
            ),
            'updated_at' => array(
                'type' => 'DATETIME',
                'null' => true
            )
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('job_free_item');

        // Drop table 'job_application' if it exists
        $this->dbforge->drop_table('job_application', true);

        // Table structure for table 'job_application'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => true,
                'auto_increment' => true
            ),
            'job_id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => false
            ),
            'user_id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => false
            ),
            'status' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => false
            ),
            'created_at' => array(
                'type' => 'DATETIME',
                'null' => true
            ),
            'updated_at' => array(
                'type' => 'DATETIME',
                'null' => true
            )
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('job_application');

        // Drop table 'favorite_word' if it exists
        $this->dbforge->drop_table('favorite_word', true);

        // Table structure for table 'favorite_word'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => true,
                'auto_increment' => true
            ),
            'keyword' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false
            ),
            'sort_order' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => false
            ),
            'created_at' => array(
                'type' => 'DATETIME',
                'null' => true
            ),
            'updated_at' => array(
                'type' => 'DATETIME',
                'null' => true
            )
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('favorite_word');

        // Drop table 'search_count' if it exists
        $this->dbforge->drop_table('search_count', true);

        // Table structure for table 'search_count'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => true,
                'auto_increment' => true
            ),
            'keyword' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false
            ),
            'created_at' => array(
                'type' => 'DATETIME',
                'null' => true
            ),
            'updated_at' => array(
                'type' => 'DATETIME',
                'null' => true
            )
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('search_count');

        // Drop table 'admin_login_history' if it exists
        $this->dbforge->drop_table('admin_login_history', true);

        // Table structure for table 'admin_login_history'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => true,
                'auto_increment' => true
            ),
            'user_id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => false
            ),
            'created_at' => array(
                'type' => 'DATETIME',
                'null' => true
            )
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('admin_login_history');

        // Drop table 'permission_ip' if it exists
        $this->dbforge->drop_table('permission_ip', true);

        // Table structure for table 'permission_ip'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => true,
                'auto_increment' => true
            ),
            'ip_address' => array(
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => false
            ),
            'created_at' => array(
                'type' => 'DATETIME',
                'null' => true
            )
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('permission_ip');

        // Drop table 'favorite_job' if it exists
        $this->dbforge->drop_table('favorite_job', true);

        // Table structure for table 'favorite_job'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => true,
                'auto_increment' => true
            ),
            'user_id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => false
            ),
            'job_id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => false
            ),
            'created_at' => array(
                'type' => 'DATETIME',
                'null' => true
            )
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('favorite_job');

        // Drop table 'browsing_job' if it exists
        $this->dbforge->drop_table('browsing_job', true);

        // Table structure for table 'browsing_job'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'unsigned' => true,
                'auto_increment' => true
            ),
            'user_id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => false
            ),
            'job_id' => array(
                'type' => 'MEDIUMINT',
                'constraint' => '8',
                'null' => false
            ),
            'created_at' => array(
                'type' => 'DATETIME',
                'null' => true
            )
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('browsing_job');

    }

    public function down()
    {
        $this->dbforge->drop_table('industory_l', true);
        $this->dbforge->drop_table('industory_m', true);
        $this->dbforge->drop_table('industory_s', true);
        $this->dbforge->drop_table('area', true);
        $this->dbforge->drop_table('prefecture', true);
        $this->dbforge->drop_table('city', true);
        $this->dbforge->drop_table('market', true);
        $this->dbforge->drop_table('job_category_l', true);
        $this->dbforge->drop_table('job_category_m', true);
        $this->dbforge->drop_table('job_category_s', true);
        $this->dbforge->drop_table('line', true);
        $this->dbforge->drop_table('station', true);
        $this->dbforge->drop_table('page_setting', true);
        $this->dbforge->drop_table('enquiry_type', true);
        $this->dbforge->drop_table('enquiry', true);
        $this->dbforge->drop_table('article_type', true);
        $this->dbforge->drop_table('article', true);
        $this->dbforge->drop_table('job_seeker', true);
        $this->dbforge->drop_table('job', true);
        $this->dbforge->drop_table('job_image', true);
        $this->dbforge->drop_table('job_free_item', true);
        $this->dbforge->drop_table('job_application', true);
        $this->dbforge->drop_table('favorite_word', true);
        $this->dbforge->drop_table('search_count', true);
        $this->dbforge->drop_table('admin_login_history', true);
        $this->dbforge->drop_table('permission_ip', true);
        $this->dbforge->drop_table('favorite_job', true);
        $this->dbforge->drop_table('browsing_job', true);
    }
}
