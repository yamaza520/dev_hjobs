<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Page_setting_model extends MY_Model
{
    protected $table = 'page_setting';

    public function find_one_by($where, $order_by = array())
    {
        $this->db->select('t.*');
        $this->db->from($this->table.' t');

        foreach ($where as $field => $value) {
            if (!empty($value)) {
                if (is_array($value)) {
                    $this->db->where_in($field, $value);
                } else {
                    $this->db->where($field, $value);
                }
            }
        }

        foreach ($order_by as $field => $sort) {
            $this->db->order_by($field, strtoupper($sort));
        }

        return $this->db->get()->row();
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);

        return $this->db->insert_id();
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);

        return $this->db->update($this->table, $data);
    }
}
