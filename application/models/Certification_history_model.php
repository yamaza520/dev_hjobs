<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Certification_history_model extends MY_Model
{
    protected $table = 'certification_history';

    /**
     * Insert into certification_history
     * @return boolean
     */
    public function remove_and_insert($jobseeker_id, $data)
    {
        if ($this->delete_by(array('job_seeker_id' => $jobseeker_id), true)) {
            foreach ($data as $certi) {
                if (!empty($certi['description'])) {
                    parent::insert($certi);
                }
            }

            return true;
        }

        return false;
    }
}
