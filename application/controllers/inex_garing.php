<?php 

/**
* 
*/
class Inex_garing extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->logged_in();
    }

    function index() {
        $this->db->select('nama, niu, angkatan');
        $this->db->where('udah_milih', 'yes');
        $query = $this->db->get('mahasiswa');
        $lists = array();

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $rows) {
                $lists[] = $rows;
            }
        }

        $query->free_result();

        $admin['yg_udah'] = $lists;

        $data = array(
            'title' => 'Administrator Page',
            'content' => $this->load->view('admin/admin-page', $admin, true)
        );
        $this->load->view('wrapper', $data);
    }

    function regis() {
        $niu = $this->input->post('niu');

        $query = $this->db->select("*")->from('mahasiswa')->where('niu', $niu)->where('udah_milih', 'no')->get();

        if ($query->num_rows() == 1) {
            $this->db->where('niu', $niu);
            $this->db->update('mahasiswa', array('granted' => 'yes'));
            $data = array(
                'title' => 'Sukses',
                'content' => $this->load->view('admin/sukses', null, true)
            );
            $this->load->view('wrapper', $data);
        } else {
            $data = array(
                'title' => 'Error',
                'content' => $this->load->view('admin/error', null, true)
            );
            $this->load->view('wrapper', $data);
        }
    }

    function logged_in() {
        $logged_in = $this->session->userdata('logged_in');

        if (! isset($logged_in) || $logged_in !== true) {
            redirect('admin');
        }
    }
}