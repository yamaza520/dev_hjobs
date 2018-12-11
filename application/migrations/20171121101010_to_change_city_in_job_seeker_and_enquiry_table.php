<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migration_To_Change_City_In_Job_Seeker_And_Enquiry_Table extends CI_Migration
{
    public function up()
    {
        // Modify columns in the table `job_seeker`
        $this->dbforge->modify_column('job_seeker', array(
            'city_id' => array(
                'name'       => 'city',
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null'       => true,
            ),
        ));

        // Modify columns in the table `enquiry`
        $this->dbforge->modify_column('enquiry', array(
            'municipality' => array(
                'name'       => 'city',
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null'       => true,
            ),
        ));
    }

    public function down()
    {
        $this->dbforge->modify_column('job_seeker', array(
            'city' => array(
                'name'       => 'city_id',
                'type'       => 'MEDIUMINT',
                'constraint' => '8',
                'null'       => true,
            ),
        ));

        $this->dbforge->modify_column('enquiry', array(
            'city' => array(
                'name'       => 'municipality',
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ),
        ));
    }
}
