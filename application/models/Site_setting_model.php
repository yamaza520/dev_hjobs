<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Site_setting_model extends MY_Model
{
    protected $table = 'site_setting';

    /**
     * Check site setting if maintenance mode is on or off
     * @return bool true or false
     */
    public function check_maintenance_on()
    {
        $result = $this->find_one_by(array('name' => 'maintenance'));

        return (bool) $result->value;
    }
}
