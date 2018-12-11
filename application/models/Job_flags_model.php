<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'models/Master_model.php';

class Job_flags_model extends Master_model
{
    protected $table = 'job_flags';

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function find_all_for_dropdown($unselected = false)
    {
        $result = array();

        if ($unselected === true) {
            $result[''] = '選択してください';
        } elseif ($unselected && is_string($unselected)) {
            $result[''] = $unselected;
        }

        $query = $this->db
            ->select('code, name')
            ->from($this->table)
            ->where('deleted_at IS NULL')
            ->order_by('sort_order')
            ->get();

        foreach ($query->result() as $row) {
            $result[$row->code] = $row->name;
        }

        return $result;
    }
}
