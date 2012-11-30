<?php 

/**
* 
*/
class Calon_model extends CI_Model
{
    
    function __construct()
    {
        parent::__construct();
    }

    function update($id) {
        $this->db->select('counter');
        $this->db->where('id', $id);
        $this->db->get('calon');
    }
}