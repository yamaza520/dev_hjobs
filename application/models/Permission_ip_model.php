<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Permission_ip_model extends MY_Model
{
    protected $table = 'permission_ip';

    public function search($pagination = null, $single_result = false)
    {
        $this->db->select('*');
        $this->db->from($this->table.' ip');
        $this->db->where('ip.deleted_at IS NULL');
        $this->db->order_by('ip.created_at desc');

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
        $this->db->select('COUNT(ip.id) as count');
        $this->db->from($this->table.' ip');
        $this->db->where('ip.deleted_at IS NULL');
        $this->db->order_by('ip.created_at desc');

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
     * Check if user IP is allowed or not
     * @param string $ip IP address
     * @return bool true or false
     */
    public function check_allowed_ip($ip)
    {
        if (in_array($ip, array('127.0.0.1', '::1'))) {
            return true;
        } else {
            $result = $this->find_one_by(array('ip_address' => $ip));

            return $result ? true : false;
        }
    }
}
