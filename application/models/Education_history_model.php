<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Education_history_model extends MY_Model
{
    protected $table = 'education_history';
    /**
     * Insert into education_history
     * @return boolean
     */
    public function remove_and_insert($jobseeker_id, $data)
    {
        if ($this->delete_by(array('job_seeker_id' => $jobseeker_id), true)) {
            foreach ($data as $edu) {
                if (!empty($edu['description'])) {
                    parent::insert($edu);
                }
            }

            return true;
        }

        return false;
    }
}
