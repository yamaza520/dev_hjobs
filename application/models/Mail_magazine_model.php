<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Mail_magazine_model extends My_model
{
    protected $table = 'mail_magazine';

    /**
     * Find all results
     * @param  array $order_by such as array('field' => 'asc|desc')
     * @param  mixed $pagination array for pagination or integer for limit
     * @return array
     */
    public function find_all($order_by = array(), $pagination = null)
    {
        if (empty($this->table)) {
            return array();
        }

        $this->db->select('t.*, u.first_name, u.last_name');
        $this->db->from($this->table.' t');
        $this->db->join('job_seeker j', 't.job_seeker_id = j.id');
        $this->db->join('users u', 'j.user_id = u.id');
        $this->db->where('t.deleted_at IS NULL');
        foreach ($order_by as $field => $sort) {
            $this->db->order_by($field, strtoupper($sort));
        }

        if ($pagination === null) {
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
        $this->db->where('t.deleted_at IS NULL');

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
}
