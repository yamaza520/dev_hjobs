<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Subject_Field_In_Mail_Template_Table extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_column('mail_template', array(
            'subject' => array(
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false,
                'after'      => 'name',
            ),
        ));
    }

    public function down()
    {
        $this->dbforge->drop_column('mail_template', 'subject');
    }
}
