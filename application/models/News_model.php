<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class News_model extends MY_Model
{
    protected $table = 'news';

    /**
     * Find by
     * @param  array $where The array of field and value for WHERE clauses
     * @param  array $order_by such as array('field' => 'asc|desc')
     * @param  array $pagination for paging
     * @return array
     */
    public function search($filter = array(), $order_by = array(), $pagination = null)
    {
        $this->db->select('*')
            ->from($this->table.' t')
            ->where('t.deleted_at IS NULL');

        // WHERE clauses
        foreach ($filter as $field => $value) {
            $this->db->where($field, $value);
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

        // WHERE clauses
        foreach ($filter as $field => $value) {
            $this->db->where($field, $value);
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
