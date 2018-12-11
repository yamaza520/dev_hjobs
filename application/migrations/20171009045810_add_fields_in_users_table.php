<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Fields_In_Users_Table extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_column('users', array(
           'status' => array(
               'type' => 'TINYINT',
               'constraint' => '1',
               'default'  => 0,
               'unsigned' => true,
            ),
            'deleted_at' => array(
                'type' => 'DATETIME',
                'null' => true
            )
       ));

        // this up() migration is auto-generated, please modify it to your needs
       // insert two new user roles in the table 'groups'
       $data = array(
           array(
               'id' => '3',
               'name' => 'user',
               'description' => 'User',
           ),
       );
       $this->db->insert_batch('groups', $data);

        // Dumping data for table 'users'
       $data = array(
           'ip_address'        => '127.0.0.1',
           'username'          => 'alutobenli',
           'password'          => '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36',
           'salt'              => '',
           'email'             => 'info@aluto-benli.com',
           'activation_code'   => '',
           'forgotten_password_code' => null,
           'created_on'        => time(),
           'last_login'        => null,
           'active'            => 1,
           'first_name'        => 'Aluto',
           'last_name'         => 'Benli',
           'company'           => 'Aluto Benli',
           'phone'             => '09-979562779',
       );
        $this->db->insert('users', $data);
        $user_id = $this->db->insert_id();

        $data = array(
           'user_id'   => $user_id,
           'group_id'  => GROUP_JOBSEEKER,
       );
       $this->db->insert('users_groups', $data);
    }
    public function down()
    {
        $this->dbforge->drop_column('users', 'deleted_at');
    }
}
