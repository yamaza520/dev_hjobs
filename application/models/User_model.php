<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends MY_Model
{
    protected $table = 'users';

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();

        $this->load->library('encrypt');
    }

    /**
     * Find by filter
     *
     * @param array $filter                     Array of search condition
     * @param array $pagination                 Configuration for pagination
     * @param int   $pagination['per_page']     Number of items per page
     * @param int   $pagination['cur_page']     Current page number
     *
     * @return array
     */
    public function search($filter = array(), $pagination = null)
    {
        // Search query
        $this->db->select('t.*');
        $this->db->from($this->table.' t');
        $this->db->join('users_groups group', 't.id = group.user_id');
        $this->db->order_by('t.created_on', 'desc');
        $this->db->where('t.deleted_at IS NULL');

        foreach ($filter as $field => $value) {
            $this->db->where($field, $value);
        }

        if ($pagination === null) {
            return $this->db->get()->result();
        }

        $this->db->limit($pagination['per_page'], $pagination['per_page'] * ($pagination['cur_page'] - 1));
        $result = $this->db->get()->result();

        // Total record count query
        $this->db->select('COUNT(t.id) as count');
        $this->db->from($this->table.' t');
        $this->db->join('users_groups group', 't.id = group.user_id');
        $this->db->where('t.deleted_at IS NULL');

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

    /**
     * Get active favorite_job count
     * @return int
     */
    public function get_favorite_job_count($user_id)
    {
        if (empty($user_id)) {
            $items = $this->encrypt->decode(get_cookie($this->config->item('favjob_cookie_name')));
            $items = $items ? unserialize($items) : array();

            return count($items);
        }

        $this->db->select('COUNT(t.id) as count');
        $this->db->from('favorite_job t');
        $this->db->where('t.user_id', $user_id);
        $count = $this->db->get()->row()->count;

        return $count;
    }

    /**
     * Get browsing job count
     * @return int
     */
    public function get_browsing_job_count($user_id)
    {
        if (empty($user_id)) {
            $items = $this->encrypt->decode(get_cookie($this->config->item('browsingjob_cookie_name')));
            $items = $items ? unserialize($items) : array();

            return count($items);
        }

        $this->db->select('COUNT(t.id) as count');
        $this->db->from('browsing_job t');
        $this->db->where('t.user_id', $user_id);
        $count = $this->db->get()->row()->count;

        return $count;
    }

    /**
     * Insert favorite jobs by user
     * @param int $user_id
     * @param array $job_ids
     */
    public function insert_favorite_jobs($user_id, array $job_ids)
    {
        foreach ($job_ids as $job_id) {
            $this->db->select('t.id');
            $this->db->from('favorite_job t');
            $this->db->where('t.user_id', $user_id);
            $this->db->where('t.job_id', $job_id);
            if (!$this->db->get()->row()) {
                $this->db->insert('favorite_job', [
                    'user_id'    => $user_id,
                    'job_id'     => $job_id,
                    'created_at' => date('Y-m-d H:i:s')
                ]);
            }
        }
    }

    /**
     * remove favorite jobs by user
     * @param int $user_id
     * @param array $job_ids
     */
    public function remove_favorite_jobs($user_id, array $job_ids)
    {
        foreach ($job_ids as $job_id) {
            $this->db->delete('favorite_job', [
                'user_id'   => $user_id,
                'job_id'    => $job_id
            ]);
        }
    }

    /**
     * Check if the job is favorited by user
     * @param int $user_id
     * @param int $job_id
     */
    public function is_favorite_job($user_id, $job_id)
    {
        $this->db->select('t.id');
        $this->db->from('favorite_job t');
        $this->db->where('t.user_id', $user_id);
        $this->db->where('t.job_id', $job_id);

        return $this->db->get()->row() ? true : false;
    }

    /**
     * Insert browsing jobs by user
     * @param int $user_id
     * @param array $job_ids
     */
    public function save_browsing_jobs($user_id, array $job_ids)
    {
        if ($user_id == null) {
            $cookie_name = $this->config->item('browsingjob_cookie_name');
            $items = $this->encrypt->decode(get_cookie($cookie_name));
            $items = $items ? unserialize($items) : array();

            foreach ($job_ids as $job_id) {
                array_push($items, $job_id);
            }
            $items = array_unique($items);
            $cookieExpiry = time() + $this->config->item('browsingjob_duration');
            set_cookie($cookie_name, $this->encrypt->encode(serialize($items)), $cookieExpiry);
        } else {
            foreach ($job_ids as $job_id) {
                $this->db->select('t.id');
                $this->db->from('browsing_job t');
                $this->db->where('t.user_id', $user_id);
                $this->db->where('t.job_id', $job_id);
                if (!$this->db->get()->row()) {
                    $this->db->insert('browsing_job', [
                        'user_id'    => $user_id,
                        'job_id'     => $job_id,
                        'created_at' => date('Y-m-d H:i:s')
                    ]);
                }
            }
        }
    }

    /**
     * Remove browsing jobs by user
     * @param int $user_id
     * @param array $job_ids
     */
    public function remove_browsing_jobs($user_id, array $job_ids)
    {
        if ($user_id == null) {
            $cookie_name = $this->config->item('browsingjob_cookie_name');
            $items = $this->encrypt->decode(get_cookie($cookie_name));
            $items = $items ? unserialize($items) : array();

            foreach ($job_ids as $id) {
                if (in_array($id, $items)) {
                    // only if it have been browsed
                    unset($items[array_search($id, $items)]);
                }
            }

            if (count($items)) {
                $cookieExpiry = time() + $this->config->item('browsingjob_duration');
                set_cookie($cookie_name, $this->encrypt->encode(serialize($items)), $cookieExpiry);
            } else {
                delete_cookie($cookie_name);
            }
        } else {
            foreach ($job_ids as $job_id) {
                $this->db->delete('browsing_job', [
                    'user_id'   => $user_id,
                    'job_id'    => $job_id
                ]);
            }
        }
    }

    public function cookies_to_db($user_id)
    {
        $fav_cookie_name = $this->config->item('favjob_cookie_name');
        $fav_items = $this->encrypt->decode(get_cookie($fav_cookie_name));
        $fav_items = $fav_items ? unserialize($fav_items) : array();

        if (!empty($fav_items)) {
            $this->User_model->insert_favorite_jobs($user_id, $fav_items);
            delete_cookie($fav_cookie_name);
        }

        $browsing_cookie_name = $this->config->item('browsingjob_cookie_name');
        $browsing_items = $this->encrypt->decode(get_cookie($browsing_cookie_name));
        $browsing_items = $browsing_items ? unserialize($browsing_items) : array();

        if (!empty($browsing_items)) {
            $this->User_model->save_browsing_jobs($user_id, $browsing_items);
            delete_cookie($browsing_cookie_name);
        }
    }

    /**
     * Find users by alert_mail_flag and user_job_preferences
     * @return array
     */
    public function find_alert_mail_users()
    {
        if (empty($this->table)) {
            return array();
        }

        $this->db->select('u.first_name, u.last_name, u.email, p.job_seeker_id, p.conditions');
        $this->db->from($this->table.' u');
        $this->db->join('job_seeker j', 'j.user_id = u.id');
        $this->db->join('user_job_preferences p', 'p.job_seeker_id =j.id');
        $this->db->where('u.deleted_at IS NULL');
        $this->db->where('j.deleted_at IS NULL');
        $this->db->where('u.active = 1');
        $this->db->where('j.alert_mail_flag = 1');

        return $this->db->get()->result();
    }
}
