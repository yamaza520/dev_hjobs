<?php defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Change_User_To_Job_Seeker_In_Groups_Table extends CI_Migration
{
    public function up()
    {
       $this->db->query('UPDATE groups SET name = "jobseeker", description = "求職者" WHERE id = 3');
    }

    public function down()
    {
        $this->db->query('UPDATE groups SET name = "user", description = "User" WHERE id = 3');
    }
}
