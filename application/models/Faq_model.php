<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Faq_model extends MY_Model
{
    protected $table = 'faq';

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

        $this->db->select('t.*');
        $this->db->from($this->table.' t');
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
}
