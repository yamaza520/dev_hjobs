<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Deleted_At_In_Permission_Ip_Table extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_column('permission_ip', array(
            'deleted_at' => array(
                'type' => 'DATETIME',
                'null' => true,
                'after' => 'created_at',
            ),
        ));
    }

    public function down()
    {
        $this->dbforge->drop_column('permission_ip', 'deleted_at');
    }
}