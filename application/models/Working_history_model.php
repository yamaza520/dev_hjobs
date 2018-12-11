<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Working_history_model extends MY_Model
{
    protected $table = 'working_history';

    /**
     * Find by
     * @param  array $where The array of field and value for WHERE clauses
     * @param  array $order_by such as array('field' => 'asc|desc')
     * @param  array $pagination for paging
     * @return array
     */
    public function search($filter = array(), $order_by = array(), $pagination = null)
    {
        // select fields
        $selectFields = 't.*, jcat_l.name as jcat_l, jcat_m.name as jcat_m, jcat_s.name as jcat_s, ind_m.name as industory_m, ind_l.name as industory_l ';

        // join table
        $joins = array();
        $joins['job_category_l jcat_l'] = array('jcat_l.id = t.job_category_l_id', 'left');
        $joins['job_category_m jcat_m'] = array('jcat_m.id = t.job_category_m_id', 'left');
        $joins['job_category_s jcat_s'] = array('jcat_s.id = t.job_category_s_id', 'left');
        $joins['industory_l ind_l']     = array('ind_l.id = t.industory_l_id', 'left');
        $joins['industory_m ind_m']     = array('ind_m.id = t.industory_m_id', 'left');

        $this->db->select($selectFields)
            ->from($this->table.' t')
            ->where('t.deleted_at IS NULL');

        foreach ($joins as $table => $join) {
            if ($join[1]) {
                $this->db->join($table, $join[0], $join[1]);
            } else {
                $this->db->join($table, $join[0]);
            }
        }

        // WHERE clauses
        foreach ($filter as $field => $value) {
            if ($value === '' || (is_array($value) && count($value) == 0)) {
                continue;
            }

            if (is_numeric($field)) {
                $this->db->where($value, null, false);
            } elseif (is_array($value)) {
                $this->db->where_in($field, $value);
            } else {
                $this->db->where($field, $value);
            }
        }

        foreach ($order_by as $field => $sort) {
            $this->db->order_by($field, strtoupper($sort));
        }

        if ($pagination === null ) {
            return $this->db->get()->result();
        }

        if (is_numeric($pagination)) {
            $this->db->limit($pagination);

            return $this->db->get()->result();
        }

        $this->db->limit($pagination['per_page'], $pagination['per_page'] * ($pagination['cur_page']-1));

        $result = $this->db->get()->result();

        // Total record count query
        $this->db->select('COUNT(*) as count');
        $this->db->from($this->table.' t');

        foreach ($joins as $table => $join) {
            if ($join[1]) {
                $this->db->join($table, $join[0], $join[1]);
            } else {
                $this->db->join($table, $join[0]);
            }
        }

        // WHERE clauses
        foreach ($filter as $field => $value) {
            if ($value === '' || (is_array($value) && count($value) == 0)) {
                continue;
            }

            if (is_numeric($field)) {
                $this->db->where($value, null, false);
            } elseif (is_array($value)) {
                $this->db->where_in($field, $value);
            } else {
                $this->db->where($field, $value);
            }
        }

        $count = $this->db->get()->row()->count;

        return array(
            'meta' => array(
                'total' => $count,
                'limit' => $pagination['per_page'],
                'page'  => $pagination['cur_page'],
            ),
            'data' => $result,
        );
    }

    /**
     * Insert into education_history
     * @return boolean
     */
    public function remove_and_insert($jobseeker_id, $data)
    {
        if ($this->delete_by(array('job_seeker_id' => $jobseeker_id), true)) {
            foreach ($data as $work) {
                parent::insert($work);
            }

            return true;
        }

        return false;
    }
}
