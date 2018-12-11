<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Fields_In_Job_Seeker_Table extends CI_Migration {

    public function up()
    {
        $this->dbforge->drop_column('job_seeker', 'name');
        $this->dbforge->drop_column('job_seeker', 'work_ym_from');
        $this->dbforge->drop_column('job_seeker', 'work_ym_to');
        $this->dbforge->drop_column('job_seeker', 'job_category_l_id');
        $this->dbforge->drop_column('job_seeker', 'job_category_m_id');
        $this->dbforge->drop_column('job_seeker', 'job_category_s_id');
        $this->dbforge->drop_column('job_seeker', 'employ_type_cd');
        $this->dbforge->drop_column('job_seeker', 'work_description');

        $this->dbforge->add_column('job_seeker', array(
            'first_name_kana' => array(
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
                'after'      => 'address',
            ),
            'last_name_kana' => array(
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
                'after'      => 'first_name_kana',
            ),
            'gender' => array(
                'type'       => 'VARCHAR',
                'constraint' => '1',
                'null'       => true,
                'after'      => 'last_name_kana',
            ),
            'marital_status' => array(
                'type'       => 'VARCHAR',
                'constraint' => '1',
                'null'       => true,
                'after'      => 'gender',
            ),
            'reason_for_change_work' => array(
                'type'  => 'TEXT',
                'null'  => true,
                'after' => 'marital_status',
            ),
            'literature_type' => array(
                'type'       => 'MEDIUMINT',
                'constraint' => '8',
                'null'       => true,
                'after'      => 'reason_for_change_work',
            ),
            'is_working' => array(
                'type'       => 'TINYINT',
                'constraint' => '2',
                'null'       => true,
                'after'      => 'literature_type',
            ),
            'current_job' => array(
                'type'       => 'VARCHAR',
                'constraint' => '120',
                'null'       => true,
                'after'      => 'is_working',
            ),
            'change_work_count' => array(
                'type'       => 'TINYINT',
                'constraint' => '1',
                'null'       => true,
                'after'      => 'current_job',
            ),
            'english_level' => array(
                'type'       => 'MEDIUMINT',
                'constraint' => '8',
                'null'       => true,
                'after'      => 'change_work_count',
            ),
            'toeic' => array(
                'type'       => 'INT',
                'constraint' => '3',
                'null'       => true,
                'after'      => 'english_level',
            ),
            'other_language' => array(
                'type'  => 'TEXT',
                'null'  => true,
                'after' => 'toeic',
            ),
            'useful_knowledge' => array(
                'type'  => 'TEXT',
                'null'  => true,
                'after' => 'other_language',
            ),
            'summary' => array(
                'type'  => 'TEXT',
                'null'  => true,
                'after' => 'useful_knowledge',
            ),
            'motivation' => array(
                'type'  => 'TEXT',
                'null'  => true,
                'after' => 'summary',
            ),
            'hobby' => array(
                'type'  => 'TEXT',
                'null'  => true,
                'after' => 'motivation',
            ),
            'request' => array(
                'type'  => 'TEXT',
                'null'  => true,
                'after' => 'hobby',
            ),
            'nearest_station' => array(
                'type'  => 'TEXT',
                'null'  => true,
                'after' => 'request',
            ),
            'dependents' => array(
                'type'       => 'INT',
                'constraint' => '2',
                'null'       => true,
                'after'      => 'nearest_station',
            ),
            'spouse_support' => array(
                'type'       => 'TINYINT',
                'constraint' => '1',
                'null'       => true,
                'after'      => 'dependents',
            ),
            'photo' => array(
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
                'after'      => 'spouse_support',
            ),
        ));

        // Drop table 'working_history' if it exists
        $this->dbforge->drop_table('working_history', true);

        // Table structure for table 'working_history'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint'     => '8',
                'unsigned'       => true,
                'auto_increment' => true
            ),
            'user_id' => array(
                'type'       => 'MEDIUMINT',
                'constraint' => '8',
                'null'       => false
            ),
            'company_name' => array(
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => false
            ),
            'from_year' => array(
                'type'       => 'MEDIUMINT',
                'constraint' => '4',
                'null'       => false
            ),
            'from_month' => array(
                'type'       => 'MEDIUMINT',
                'constraint' => '2',
                'null'       => false
            ),
            'to_year' => array(
                'type'       => 'MEDIUMINT',
                'constraint' => '4',
                'null'       => true
            ),
            'to_month' => array(
                'type'       => 'MEDIUMINT',
                'constraint' => '2',
                'null'       => true
            ),
            'current' => array(
                'type'       => 'TINYINT',
                'constraint' => '1',
                'null'       => false
            ),
            'employ_type' => array(
                'type' => 'TEXT',
                'null' => false
            ),
            'annual_income' => array(
                'type'       => 'INT',
                'constraint' => '100',
                'null'       => false
            ),
            'management_exp' => array(
                'type'       => 'TINYINT',
                'constraint' => '1',
                'null'       => false
            ),
            'manage_person_count' => array(
                'type'       => 'INT',
                'constraint' => '4',
                'null'       => true
            ),
            'industory_l_id' => array(
                'type'       => 'MEDIUMINT',
                'constraint' => '8',
                'null'       => false
            ),
            'industory_s_id' => array(
                'type'       => 'MEDIUMINT',
                'constraint' => '8',
                'null'       => false
            ),
            'job_category_l_id' => array(
                'type'       => 'MEDIUMINT',
                'constraint' => '8',
                'null'       => false
            ),
            'job_category_m_id' => array(
                'type'       => 'MEDIUMINT',
                'constraint' => '8',
                'null'       => false
            ),
            'job_category_s_id' => array(
                'type'       => 'MEDIUMINT',
                'constraint' => '8',
                'null'       => false
            ),
             'exp_from_year' => array(
                'type'       => 'MEDIUMINT',
                'constraint' => '4',
                'null'       => false
            ),
             'exp_from_month' => array(
                'type'       => 'MEDIUMINT',
                'constraint' => '2',
                'null'       => false
            ),
             'exp_to_year' => array(
                'type'       => 'MEDIUMINT',
                'constraint' => '4',
                'null'       => true
            ),
             'exp_to_month' => array(
                'type'       => 'MEDIUMINT',
                'constraint' => '2',
                'null'       => true
            ),
            'exp_current' => array(
                'type'       => 'TINYINT',
                'constraint' => '1',
                'null'       => false
            ),
            'job_description' => array(
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
        $this->dbforge->create_table('working_history');

        // Drop table 'education_history' if it exists
        $this->dbforge->drop_table('education_history', true);

        // Table structure for table 'education_history'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint'     => '8',
                'unsigned'       => true,
                'auto_increment' => true
            ),
            'job_seeker_id' => array(
                'type'       => 'MEDIUMINT',
                'constraint' => '8',
                'null'       => false
            ),
            'from_year' => array(
                'type'       => 'MEDIUMINT',
                'constraint' => '4',
                'null'       => false
            ),
            'from_month' => array(
                'type'       => 'MEDIUMINT',
                'constraint' => '2',
                'null'       => false
            ),
            'description' => array(
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false
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
        $this->dbforge->create_table('education_history');

        // Drop table 'certification_history' if it exists
        $this->dbforge->drop_table('certification_history', true);

        // Table structure for table 'certification_history'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint'     => '8',
                'unsigned'       => true,
                'auto_increment' => true
            ),
            'job_seeker_id' => array(
                'type'       => 'MEDIUMINT',
                'constraint' => '8',
                'null'       => false
            ),
            'from_year' => array(
                'type'       => 'MEDIUMINT',
                'constraint' => '4',
                'null'       => false
            ),
            'from_month' => array(
                'type'       => 'MEDIUMINT',
                'constraint' => '2',
                'null'       => false
            ),
            'description' => array(
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false
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
        $this->dbforge->create_table('certification_history');

        // Drop table 'work_summary_history' if it exists
        $this->dbforge->drop_table('work_summary_history', true);

        // Table structure for table 'work_summary_history'
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'MEDIUMINT',
                'constraint'     => '8',
                'unsigned'       => true,
                'auto_increment' => true
            ),
            'job_seeker_id' => array(
                'type'       => 'MEDIUMINT',
                'constraint' => '8',
                'null'       => false
            ),
            'from_year' => array(
                'type'       => 'MEDIUMINT',
                'constraint' => '4',
                'null'       => false
            ),
            'from_month' => array(
                'type'       => 'MEDIUMINT',
                'constraint' => '2',
                'null'       => false
            ),
            'description' => array(
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false
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
        $this->dbforge->create_table('work_summary_history');
    }

    public function down()
    {
        $this->dbforge->drop_column('job_seeker', 'first_name_kana');
        $this->dbforge->drop_column('job_seeker', 'last_name_kana');
        $this->dbforge->drop_column('job_seeker', 'gender');
        $this->dbforge->drop_column('job_seeker', 'marital_status');
        $this->dbforge->drop_column('job_seeker', 'reason_for_change_work');
        $this->dbforge->drop_column('job_seeker', 'literature_type');
        $this->dbforge->drop_column('job_seeker', 'is_working');
        $this->dbforge->drop_column('job_seeker', 'current_job');
        $this->dbforge->drop_column('job_seeker', 'change_work_count');
        $this->dbforge->drop_column('job_seeker', 'english_level');
        $this->dbforge->drop_column('job_seeker', 'toeic');
        $this->dbforge->drop_column('job_seeker', 'other_language');
        $this->dbforge->drop_column('job_seeker', 'useful_knowledge');
        $this->dbforge->drop_column('job_seeker', 'summary');
        $this->dbforge->drop_column('job_seeker', 'motivation');
        $this->dbforge->drop_column('job_seeker', 'hobby');
        $this->dbforge->drop_column('job_seeker', 'request');
        $this->dbforge->drop_column('job_seeker', 'nearest_station');
        $this->dbforge->drop_column('job_seeker', 'dependents');
        $this->dbforge->drop_column('job_seeker', 'spouse_support');
        $this->dbforge->drop_column('job_seeker', 'photo');

        $this->dbforge->add_column('job_seeker', array(
            'name' => array(
                'type'       => 'TINYINT',
                'constraint' => '1',
                'null'       => true
            ),
            'work_ym_from' => array(
                'type'       => 'MEDIUMINT',
                'constraint' => '8',
                'null'       => true
            ),
            'work_ym_to' => array(
                'type'       => 'MEDIUMINT',
                'constraint' => '8',
                'null'       => true
            ),
            'job_category_l_id' => array(
                'type'       => 'MEDIUMINT',
                'constraint' => '8',
                'null'       => true
            ),
            'job_category_m_id' => array(
                'type'       => 'MEDIUMINT',
                'constraint' => '8',
                'null'       => true
            ),
            'job_category_s_id' => array(
                'type'       => 'MEDIUMINT',
                'constraint' => '8',
                'null'       => true
            ),
            'employ_type_cd' => array(
                'type'       => 'MEDIUMINT',
                'constraint' => '8',
                'null'       => true
            ),
            'work_description' => array(
                'type'       => 'TEXT',
                'constraint' => '500',
                'null'       => true
            ),
         ));

        $this->dbforge->drop_table('working_history', true);
        $this->dbforge->drop_table('education_history', true);
        $this->dbforge->drop_table('certification_history', true);
        $this->dbforge->drop_table('work_summary_history', true);
    }
}
