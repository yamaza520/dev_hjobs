<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Job_application_model extends MY_Model
{
    protected $table = 'job_application';

    /**
     * Find all results
     * @param  array $order_by such as array('field' => 'asc|desc')
     * @return array
     */
    public function search($filter = array(), $order_by = array(), $pagination = null)
    {
        if (empty($this->table)) {
            return array();
        }

        if (empty($order_by)) {
            $order_by = array('t.created_at' => 'DESC');
        }

        $this->db->select('t.*, j.job_title, j.company_name, j.product_name, j.employ_type_class, m.logo_file as media_logo_file, ju.first_name, ju.last_name');
        $this->db->from($this->table.' t');
        $this->db->join('job j', 't.job_id = j.id');
        $this->db->join('users ju', 't.user_id = ju.id');
        $this->db->join('media m', 'm.name = j.product_name', 'left');
        $this->db->where('t.deleted_at IS NULL');

        foreach ($filter as $field => $value) {
            if (!empty($value)) {
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
        $this->db->where('t.deleted_at IS NULL');

        foreach ($filter as $field => $value) {
            if (!empty($value)) {
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
     * Get job application count
     * @param int $user_id Optional user ID
     * @return int
     */
    public function get_job_application_count($user_id = null)
    {
        $this->db->select('COUNT(t.id) as count');
        $this->db->from($this->table.' t');
        $this->db->where('t.deleted_at IS NULL');

        if ($user_id !== null) {
            $this->db->where('t.user_id ', $user_id);
        }

        $count = $this->db->get()->row()->count;

        return $count;
    }

}
