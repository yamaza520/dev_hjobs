<?php
class Master_model extends MY_Model {

    protected $table = '';

    public function __construct() {
        $this->load->database();
    }

    /**
     * Insert a record
     */
    public function insert($data) {
        //get max sort order+1
        $row = $this->db
                ->select('max(sort_order) + 1 as sort_order')
                ->from($this->table)
                ->get()
                ->row();

        //set sort order
        $max_order = $row->sort_order;

        //set 1 for first record
        if ($max_order == NULL){
            $max_order = 1;
        }

        if (!empty($data['name'])) {
            $data['slug'] = ab_slugify($data['name']);
        }

        $data['sort_order'] = $max_order;
        $data['created_at'] = date('Y-m-d H:i:s');

        $this->db->insert($this->table, $data);

        return $this->db->insert_id();
    }

    /**
     * Update record
     * @param int   $id The id to be updated
     * @param array $data The updated data
     */
    public function update($id, $data)
    {
        if (!empty($data['name'])) {
            $data['slug'] = ab_slugify($data['name']);
        }

        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    /**
     * Find all results
     * @param  array $order_by such as array('field' => 'asc|desc')
     * @return array
     */
    public function find_all($order_by = array(), $pagination = null)
    {
        if (empty($order_by)) {
            $order_by = array('name' => 'asc');
        }

        return parent::find_all($order_by, $pagination);
    }

    /**
     * Find results for dropdown
     * @param  mixed true/false/string
     * @return array
     */
    public function find_all_for_dropdown($unselected = true)
    {
        $result = array();

        if ($unselected === true) {
            $result[''] = '選択してください';
        } elseif ($unselected && is_string($unselected)) {
            $result[''] = $unselected;
        }

        $query = $this->db
            ->select('id, name')
            ->from($this->table)
            ->where('deleted_at IS NULL')
            ->order_by('sort_order')
            ->get();

        foreach ($query->result() as $row) {
            $result[$row->id] = $row->name;
        }

        return $result;
    }

}
