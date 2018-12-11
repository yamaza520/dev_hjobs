<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Job_model extends MY_Model
{
    protected $table = 'job';

    /**
     * Get active project count
     * @return int
     */
    public function get_active_job_count()
    {
        $this->db->select('COUNT(t.id) as count');
        $this->db->from($this->table.' t');
        $this->db->where('t.deleted_at IS NULL');
        $this->db->where('t.publish_start_date <= CURDATE()');
        $this->db->where('t.publish_end_date >= CURDATE()');

        return $this->db->get()->row()->count;
    }

    /**
     * Find jobs by conditions
     * @param  array $where The array of field and value for WHERE clauses
     * @param  array $order_by such as array('field' => 'asc|desc')
     * @param  array $pagination for paging
     * @praam  bool  $count Flag to return count or not
     * @return array
     */
    public function search($filter = array(), $order_by = array(), $pagination = null, $countQuery = false)
    {
        // select fields
        if ($countQuery) {
            $selectFields = 'COUNT(t.id) AS count';
        } else {
            $selectFields = 't.*, pref.name as pref_name, pref.slug as pref_slug, jcat_l.name as jcat_l, jcat_m.name as jcat_m, jcat_s.name as jcat_s';
            $selectFields .= ', m.type as media_type, m.logo_file as media_logo_file, m.link_url';
        }

        // join table
        $joins = array();
        $joins['hotel_type h_type']     = array('h_type.id = t.hotel_type_id', 'left');
        $joins['job_category_l jcat_l'] = array('jcat_l.id = t.job_category_l_id', 'left');
        $joins['job_category_m jcat_m'] = array('jcat_m.id = t.job_category_m_id', 'left');
        $joins['job_category_s jcat_s'] = array('jcat_s.id = t.job_category_s_id', 'left');
        $joins['industory_l ind_l']     = array('ind_l.id = t.industory_l_id', 'left');
        $joins['industory_m ind_m']     = array('ind_m.id = t.industory_m_id', 'left');
        $joins['prefecture pref']       = array('pref.pref_cd = t.pref_cd', 'left');
        $joins['media m']               = array('m.name = t.product_name', 'left');

        if (isset($filter['sh'])) {
            unset($filter['sh']);
        }

        $where_like = array();
        if (!empty($filter['keyword'])) {
            $keywords = explode(' ', $filter['keyword']);
            if (count($keywords)) {
                foreach ($keywords as $word) {
                    $where_like['t.job_title'] = $word;
                    $where_like['t.job_description'] = $word;
                }
            }
            unset($filter['keyword']);
        }

        if (!empty($filter['work_place'])) {
            $filter['work_place'] = is_array($filter['work_place']) ? $filter['work_place'] : array($filter['work_place']);
            $filter[] = 't.work_place REGEXP \'[[:<:]]' . implode('|', $filter['work_place']) . '[[:>:]]\'';
            unset($filter['work_place']);
        }

        if (!empty($filter['salary'])) {
            $salary = explode('-', $filter['salary']);
            if ($salary[0] && $salary[1]) {
                $filter[] = 't.min_salary >= ' . $salary[0] . ' AND t.max_salary <= ' . $salary[1];
            } elseif ($salary[0]) {
                $filter[] = 't.min_salary >= ' . $salary[0];
            } elseif ($salary[1]) {
                $filter[] = 't.max_salary <= ' . $salary[0];
            }

            unset($filter['salary']);
        }

        if (!empty($filter['qualification'])) {
            // @TODO: search by qualification
            unset($filter['qualification']);
        }

        if (!empty($filter['address'])) {
            $where_like['t.address1'] = $filter['address'];
            $where_like['t.address2'] = $filter['address'];
            unset($filter['address']);
        }

        if (!empty($filter['flag'])) {
            $flags = $filter['flag'];
            unset($filter['flag']);
            $filter = array_merge($filter, $flags);
        }

        $this->db->select($selectFields)
            ->from($this->table.' t')
            ->where('t.deleted_at IS NULL');

        foreach ($joins as $table => $join) {
            if ($join[1]) {
                $this->db->join($table, $join[0], $join[1]);
            } else {
                $this->db->join($table, $join[0]);
            }
        }

        // WHERE clauses
        foreach ($filter as $field => $value) {
            if ($value === '' || (is_array($value) && count($value) == 0)) {
                continue;
            }

            if (is_numeric($field)) {
                $this->db->where($value, null, false);
            } elseif (is_array($value)) {
                $this->db->where_in($field, $value);
            } else {
                $this->db->where($field, $value);
            }
        }

        if (count($where_like)) {
            $this->db->group_start();
            foreach ($where_like as $field => $value) {
                $this->db->or_like($field, $value);
            }
            $this->db->group_end();
        }

        if (!empty($order_by)) {
            foreach ($order_by as $field => $sort) {
                $this->db->order_by($field, strtoupper($sort));
            }
        }

        // If count query, just return count here
        if ($countQuery) {
            return $this->db->get()->row()->count;
        }

        // No pagination, return all results
        if ($pagination === null) {
            $result = $this->db->get()->result();
            if (is_array($result)) {
                foreach ($result as $row) {
                    $row->images  = $this->get_images($row->id);
                }
            }

            return $result;
        }

        // if pagination is limit, return the limited result
        if (is_numeric($pagination)) {
            $this->db->limit($pagination);

            $result = $this->db->get()->result();
            if (is_array($result)) {
                foreach ($result as $row) {
                    $row->images  = $this->get_images($row->id);
                }
            }

            return $result;
        }

        // return with pagination
        $this->db->limit($pagination['per_page'], $pagination['per_page'] * ($pagination['cur_page']-1));

        $result = $this->db->get()->result();
        if (is_array($result)) {
            foreach ($result as $row) {
                $row->images = $this->get_images($row->id);
            }
        }

        // Total record count query
        $this->db->select('COUNT(*) as count');
        $this->db->from($this->table.' t');

        foreach ($joins as $table => $join) {
            if ($join[1]) {
                $this->db->join($table, $join[0], $join[1]);
            } else {
                $this->db->join($table, $join[0]);
            }
        }

        // WHERE clauses
        foreach ($filter as $field => $value) {
            if ($value === '' || (is_array($value) && count($value) == 0)) {
                continue;
            }

            if (is_numeric($field)) {
                $this->db->where($value, null, false);
            } elseif (is_array($value)) {
                $this->db->where_in($field, $value);
            } else {
                $this->db->where($field, $value);
            }
        }

        if (count($where_like)) {
            $this->db->group_start();
            foreach ($where_like as $field => $value) {
                $this->db->or_like($field, $value);
            }
            $this->db->group_end();
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
     * Find job count by condition
     * @param  array $where The array of field and value for WHERE clauses
     * @return int
     */
    public function countJobs($filter = array())
    {
        return $this->search($filter, null, null, true);
    }

    /**
     * Find all images by job_id
     * @param int $job_id
     * @return array|empty array
     */
    public function get_images($job_id)
    {
        $this->db->select('id, url, caption');
        $this->db->from('job_image t');
        $this->db->where('t.job_id = ' .$job_id);
        $this->db->where('(t.url IS NOT NULL OR t.url != "")');
        $this->db->where('t.deleted_at IS NULL');
        $this->db->order_by('t.created_at', 'ASC');

        return $this->db->get()->result();
    }

    /**
     * Find all favorite jobs by user id
     * @param int $user_id
     * @param  array $pagination for paging
     * @return array
     */
    public function get_all_favorties_by_user($user_id = null, $pagination = null) {
        if ($user_id === null) {
            $cookie_name = $this->config->item('favjob_cookie_name');
            $items = $this->encrypt->decode(get_cookie($cookie_name));
            $items = $items ? unserialize($items) : array();

            if ($items && count($items)) {
                 return $this->search(array('t.id'=> $items), array(), $pagination);
            }
        } else {
            $favJobs = $this->db->select('t.job_id')
                ->from('favorite_job t')
                ->where('t.user_id = ' . $user_id)
                ->order_by('t.created_at', 'DESC')
                ->get()
                ->result();

            if (is_array($favJobs) && count($favJobs)) {
                $job_ids = array();
                foreach ($favJobs as $job) {
                    $job_ids[] =  $job->job_id;
                }

                return $this->search(array('t.id'=> $job_ids), array(), $pagination);
            }
        }

        if (is_array($pagination)) {
            return array(
                'meta' => array(
                    'total' => 0,
                    'limit' => $pagination['per_page'],
                    'page'  => $pagination['cur_page'],
                ),
                'data' => array(),
            );
        } else {
            return array();
        }
    }

    /**
     * Find all browsing jobs by user id
     * @param int $user_id
     * @param  array $pagination for paging
     * @return array
     */
    public function get_all_browsing_by_user($user_id = null, $pagination = null) {
        if ($user_id === null) {
            $cookie_name = $this->config->item('browsingjob_cookie_name');
            $items = $this->encrypt->decode(get_cookie($cookie_name));
            $items = $items ? unserialize($items) : array();

            if ($items && count($items)) {
                return $this->search(array('t.id'=> $items), array(), $pagination);
            }
        } else {
            $browsingJobs = $this->db->select('t.job_id')
                ->from('browsing_job t')
                ->where('t.user_id = '. $user_id)
                ->order_by('t.created_at', 'DESC')
                ->get()
                ->result();

            if (is_array($browsingJobs) && count($browsingJobs )) {
                $job_ids = array();
                foreach ($browsingJobs as $job) {
                    $job_ids[] = $job->job_id;
                }

                return $this->search(array('t.id'=> $job_ids), array(), $pagination);
            }
        }

        if (is_array($pagination)) {
            return array(
                'meta' => array(
                    'total' => 0,
                    'limit' => $pagination['per_page'],
                    'page'  => $pagination['cur_page'],
                ),
                'data' => array(),
            );
        } else {
            return array();
        }
    }

    /**
     * Find top most applied jobs
     * @param  int [$limit = 3]
     * @return array
     */
    public function find_top_applied_jobs($limit = 3)
    {
        // SELECT COUNT(a.job_id) applied_count, t.* FROM job t JOIN job_application a ON t.id = a.job_id GROUP BY a.job_id ORDER BY applied_count DESC LIMIT 3;
        $this->db->select('COUNT(a.job_id) applied_count, t.id, t.job_title, t.company_name, t.address1, t.address2, t.salary, t.salary2, t.min_salary, t.max_salary');
        $this->db->from('job t');
        $this->db->join('job_application a', 't.id = a.job_id', 'left');
        $this->db->where('t.deleted_at IS NULL');
        $this->db->group_by('a.job_id');
        $this->db->order_by('applied_count', 'DESC');

        if ($limit) {
            $this->db->limit($limit);
        }

        $result = $this->db->get()->result();
        if (is_array($result)) {
            foreach ($result as $row) {
                $row->images = $this->get_images($row->id);
            }
        }

        return $result;
    }

    /**
     * Find user preference jobs or top most applied jobs
     * @param  int [$job_seeker_id = null]
     * @param  int [$limit = 3]
     * @return array
     */
    public function find_top_jobs($job_seeker_id = null, $limit = 3)
    {
        $jobs = [];
        if ($job_seeker_id) {
            $preferences = $this->User_job_preferences_model->find_one_by(['job_seeker_id'=> $job_seeker_id]);
            if ($preferences) {
                $preferences = unserialize($preferences->conditions);
                $jobs = $this->search($preferences, ['publish_start_date' => 'desc'], $limit);
            }
        }

        if (!count($jobs)) {
            $jobs = $this->find_top_applied_jobs();
        }

        return $jobs;
    }

    /**
     * Find similar jobs
     * @param  object $job
     * @param  int $limit = 4
     * @return array
     */
    public function find_similar_jobs($job, $limit = 4)
    {
        $filter = array(
            'work_place'        => $job->work_place,
            'job_category_s_id' => $job->job_category_s_id,
            'min_salary'        => $job->min_salary,
            'max_salary'        => $job->max_salary,
            't.id != '          => $job->id,
            'product_name'      => $job->product_name
        );

        return $this->search($filter, array('t.publish_start_date' => 'desc'), $limit);
    }
}
