<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model
{
    protected $table = '';

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Insert record
     * @return insert_id
     */
    public function insert($data)
    {
        if (empty($data['created_at'])) {
            $data['created_at'] = date('Y-m-d H:i:s');
        }

        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    /**
     * Insert many record
     * @return insert_id
     */
    public function insert_batch($data)
    {
        return $this->db->insert_batch($this->table, $data);
    }

    /**
     * Update record
     * @param int   $id The id to be updated
     * @param array $data The updated data
     */
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    /**
     * Delete record using deleted_at
     * @param int   $id The id to be deleted
     * @param bool  $hard_delete true to delete permanently, otherwise false
     */
    public function delete($id, $hard_delete = false)
    {
        if ($hard_delete === true) {
            return $this->db->delete($this->table, array('id' => $id));
        }

        $data['deleted_at'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);

        return $this->db->update($this->table, $data);
    }

    /**
     * Delete record by condition
     * @param array $where Array of condition
     * @param bool  $hard_delete true to delete permanently, otherwise false
     */
    public function delete_by($where, $hard_delete = false)
    {
        if ($hard_delete === true) {
            return $this->db->delete($this->table, $where);
        }

        return $this->db->update($this->table, array('deleted_at' => date('Y-m-d H:i:s')), $where);
    }

    /**
     * Find by id
     * @param  int      $id         ID to table.id
     * @param  array    $options    Array of options
     * @return object The result object
     */
    public function find_by_id($id, $options = array())
    {
        if (empty($this->table)) {
            return null;
        }

        $this->db
            ->select('t.*')
            ->from($this->table.' t')
            ->where('t.id', $id)
            ->where('t.deleted_at IS NULL');

        return $this->db->get()->row();
    }

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

        $this->db->select('*');
        $this->db->from($this->table.' t');
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

    /**
     * Find by
     * @param  array $where The array of field and value for WHERE clauses
     * @param  array $order_by such as array('field' => 'asc|desc')
     * @param  bool  $single_result A single result or array of results to be returned
     * @return array
     */
    public function find_by($where, $order_by = array(), $pagination = null)
    {
        $this->db->select('t.*');
        $this->db->from($this->table.' t');
        $this->db->where('t.deleted_at IS NULL');

        foreach ($where as $field => $value) {
            if ($value !== '' && $value !== null) {
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

        if ($pagination === null) {
            return $this->db->get()->result();
        }

        if (is_numeric($pagination)) {
            $this->db->limit($pagination);
            if ($pagination == 1) {
                return $this->db->get()->row();
            } else {
                return $this->db->get()->result();
            }

        }

        $this->db->limit($pagination['per_page'], $pagination['per_page'] * ($pagination['cur_page']-1));

        $result = $this->db->get()->result();

        // Total record count query
        $this->db->select('COUNT(*) as count');
        $this->db->from($this->table.' t');
        $this->db->where('t.deleted_at IS NULL');

        foreach ($where as $field => $value) {
            if ($value !== '' && $value !== null) {
                if (is_array($value)) {
                    $this->db->where_in($field, $value);
                } else {
                    $this->db->where($field, $value);
                }
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
     * Find one by
     * @param  array $where The array of field and value
     * @param  array $order_by such as array('field' => 'asc|desc')
     * @return object The result object
     */
    public function find_one_by($where, $order_by = array())
    {
        return $this->find_by($where, $order_by, 1);
    }
}
