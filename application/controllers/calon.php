<?php

/**
* 
*/
class Calon extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index() {
		if ( ! $_POST) {
			$this->db->select('nama, angkatan');
			$this->db->where('angkatan', '2011');
			
			$query = $this->db->get('mahasiswa');
			$data = array();

			if ($query->num_rows() > 0) {
				foreach ($query->result_array() as $row) {
					$data[] = $row;
				}
			}

			$query->free_result();
			print_r($data);
			//$this->load->view('wrapper', $data);
		} else {
			$this->_process();
		}
	}

    function _update() {
        
    }
}