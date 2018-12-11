<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Article_model extends MY_Model
{
    protected $table = 'article';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Article_content_model');
    }

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

        $this->db->select('t.*, at.name as article_type');
        $this->db->from($this->table.' t');
        $this->db->join('article_type at', 'at.id = t.article_type_id');
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
            $result = $this->db->get()->result();
            if (is_array($result)) {
                foreach ($result as $row) {
                    $row->contents  = $this->get_contents($row->id);
                }
            }

            return $result;
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
     * Insert record
     * @return insert_id
     */
    public function insert($data)
    {
        $contents = null;
        if (isset($data['contents'])) {
            $contents = $data['contents'];
            unset($data['contents']);
        }

        $id = parent::insert($data);
        if ($id && $contents) {
            $this->insert_contents($id, $contents);
        }

        return $id;
    }

    /**
     * Update record
     */
    public function update($id, $data)
    {
        $contents = null;
        if (isset($data['contents'])) {
            $contents = $data['contents'];
            unset($data['contents']);
        }

        if ($id && $contents) {
            $this->insert_contents($id, $contents);
        }

        $data['updated_at'] = date('Y-m-d H:i:s');

        return parent::update($id, $data);
    }

    /**
     * Insert into article_content
     * @return boolean
     */
    public function insert_contents($article_id, $data)
    {
        if ($this->delete_content($article_id, true)) {
            // Insert into the pivot (many-to-many) table
            for ($i = 0; $i < count($data); $i++) {
                $this->Article_content_model->insert( array(
                    'article_id'    => $article_id,
                    'type'          => $data[$i]['type'],
                    'content'       => $data[$i]['content'],
                    'sort_order'    => $data[$i]['sort_order']
                ));
            }

            return true;
        }

        return false;
    }

    /**
     * Delete article_content by article_id
     * @return boolean
     */
    public function delete_content($article_id)
    {
        return $this->Article_content_model->delete_by(array('article_id' => $article_id), true);
    }

    /**
    * Find all images by $article_id
    * @param int $article_id
    * @return array|empty array
    */
    public function get_contents($article_id)
    {
        return $this->Article_content_model->find_by(array('article_id' => $article_id));
    }
}
