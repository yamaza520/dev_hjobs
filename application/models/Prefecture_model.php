<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'models/Master_model.php';

class Prefecture_model extends Master_model
{
    protected $table = 'prefecture';

    /**
     * Find results for dropdown
     * @param  boolean $unselected TRUE for "エリアを選択"
     * @return array
     */
    public function find_all_for_dropdown($unselected = true)
    {
        $result = array();

        if ($unselected === true) {
            $result[''] = 'エリアを選択';
        } elseif ($unselected && is_string($unselected)) {
            $result[''] = $unselected;
        }

        $query = $this->db
            ->select('pref_cd, name')
            ->from($this->table)
            ->where('deleted_at IS NULL')
            ->order_by('sort_order')
            ->get();

        foreach ($query->result() as $row) {
            $result[$row->pref_cd] = $row->name;
        }

        return $result;
    }

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
}
