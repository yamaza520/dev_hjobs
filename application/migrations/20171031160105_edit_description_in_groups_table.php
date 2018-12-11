<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Edit_Description_In_Groups_Table extends CI_Migration {

    public function up()
    {
        $sql = "UPDATE groups SET description = '管理者' WHERE id = 1" ;
        $this->db->query($sql);

        $sql = "UPDATE groups SET description = '編集者' WHERE id = 2" ;
        $this->db->query($sql);

        $sql = 'DELETE FROM users_groups WHERE user_id = 1 AND group_id = 2' ;
        $this->db->query($sql);
    }

    public function down()
    {
        $sql = "UPDATE groups SET description = 'Administrator' WHERE id = 1" ;
        $this->db->query($sql);

        $sql = "UPDATE groups SET description = 'General User' WHERE id = 2" ;
        $this->db->query($sql);
    }
}
