<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Login_history_model extends MY_Model
{
    protected $table = 'admin_login_history';

    public function search($pagination = null, $single_result = false)
    {
        $this->db->select('history.created_at, CONCAT(u.last_name, " ", u.first_name) as user_name, u.email');
        $this->db->from($this->table.' history');
        $this->db->join('users u', 'u.id = history.user_id');
        $this->db->order_by('history.created_at desc');

        if ($pagination === null) {
            if ($single_result) {
                $this->db->limit(1);
                return $this->db->get()->row();
            }

            return $this->db->get()->result();
        }

        $this->db->limit($pagination['per_page'], $pagination['per_page'] * ($pagination['cur_page']-1));

        $result = $this->db->get()->result();

        // Total record count query
        $this->db->select('COUNT(history.id) as count');
        $this->db->from($this->table.' history');
        $this->db->join('users u', 'u.id = history.user_id');
        $this->db->order_by('history.created_at desc');

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
