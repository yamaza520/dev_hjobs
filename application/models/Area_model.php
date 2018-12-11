<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Area_model extends MY_Model
{
    protected $table = 'area';

    /**
     * Find one by
     * @param  array $where The array of field and value
     * @param  array $order_by such as array('field' => 'asc|desc')
     * @return object The result object
     */
    public function find_one_by($where, $order_by = array())
    {
        $this->db->select('t.*');
        $this->db->from($this->table.' t');

        foreach ($where as $field => $value) {
            $this->db->where($field, $value);
        }

        foreach ($order_by as $field => $sort) {
            $this->db->order_by($field, strtoupper($sort));
        }

        return $this->db->get()->row();
    }
}
