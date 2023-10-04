<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Log_model extends CI_Model
{
    public function getAlldata()
    {
        return $this->db->get('log_admin')->result();
    }
}
