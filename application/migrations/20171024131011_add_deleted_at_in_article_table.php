<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Deleted_At_In_Article_Table extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_column('article', array(
            'deleted_at' => array(
                'type' => 'DATETIME',
                'null' => true,
                'after' => 'updated_at',
            ),
        ));
    }

    public function down()
    {
        $this->dbforge->drop_column('article', 'deleted_at');
    }
}
