<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'models/Master_model.php';

class Market_model extends Master_model
{
    protected $table = 'market';
}