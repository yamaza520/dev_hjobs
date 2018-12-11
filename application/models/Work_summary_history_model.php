<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Work_summary_history_model extends MY_Model
{
    protected $table = 'work_summary_history';
    /**
     * Insert into work_summary_history
     * @return boolean
     */
    public function remove_and_insert($jobseeker_id, $data)
    {
        if ($this->delete_by(array('job_seeker_id' => $jobseeker_id), true)) {
            foreach ($data as $work) {
                if (!empty($work['description'])) {
                    parent::insert($work);
                }
            }

            return true;
        }

        return false;
    }
}
