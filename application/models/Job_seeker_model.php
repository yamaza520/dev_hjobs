<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Job_seeker_model extends MY_Model
{
    protected $table = 'job_seeker';

    public function find_by_id($id, $options = array())
    {
        $db = $this->db
                ->select('j.*, u.first_name, u.last_name, u.email, u.password, u.phone, pref.name pref_name, rel_pref.name rel_pref_name, u.profile_status')
                ->from($this->table.' j')
                ->join('users u', 'j.user_id = u.id')
                ->join('prefecture pref', 'j.pref_cd = pref.pref_cd')
                ->join('prefecture rel_pref', 'j.rel_pref_cd = rel_pref.pref_cd', 'left')
                ->where('j.id', $id);

        $data = $db->get()->row();
        if (!empty($data->birthdate)) {
            $birth_date = explode('-', $data->birthdate);
            $data->birth_year   = !empty($birth_date[0]) && ($birth_date[0]!= '0000') ? $birth_date[0] : '';
            $data->birth_month  = !empty($birth_date[1]) ? $birth_date[1] : '';
            $data->birth_day    = !empty($birth_date[2]) ? substr($birth_date[2], 0, 2) : '';
        } else {
            $data->birth_year   = '';
            $data->birth_month  = '';
            $data->birth_day    = '';
        }

        if ($data->photo) {
            $data->photo_url = $this->config->item('photo_upload_path').$data->id.'/'.$data->photo;
        }

        return $data;
    }

    public function find_all($order_by = array(), $pagination = null)
    {
        return $this->search(array(), $order_by = array(), $pagination);
    }

    /**
     * Get member count
     * @return int
     */
    public function get_member_count()
    {
        $this->db->select('COUNT(t.id) as count');
        $this->db->from($this->table.' t');
        $this->db->where('t.deleted_at IS NULL');

        $count = $this->db->get()->row()->count;

        return $count;
    }

    /**
     * Find jobs by conditions
     * @param  array $where The array of field and value for WHERE clauses
     * @param  array $order_by such as array('field' => 'asc|desc')
     * @param  array $pagination for paging
     * @praam  bool  $count Flag to return count or not
     * @return array
     */
    public function search($filter = array(), $order_by = array(), $pagination = null)
    {
        if (empty($this->table)) {
            return array();
        }

        $this->db->select('t.*, u.first_name, u.last_name, u.email, u.phone, p.name as pref_name');
        $this->db->from($this->table.' t');
        $this->db->join('users u', 't.user_id = u.id');
        $this->db->join('prefecture p', 't.pref_cd = p.pref_cd');
        $this->db->where('t.deleted_at IS NULL');

        foreach ($filter as $field => $value) {
            $this->db->where($field, $value);
        }

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

        foreach ($result as $row) {
            $birth_date = explode('-', $row->birthdate);

            $row->birth_year   = !empty($birth_date[0]) && ($birth_date[0]!= '0000') ? $birth_date[0] : '';
            $row->birth_month  = !empty($birth_date[1]) ? $birth_date[1] : '';
            $row->birth_day    = !empty($birth_date[2]) ? substr($birth_date[2], 0, 2) : '';
        }

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
