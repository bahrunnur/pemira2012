<?php 

/**
* 
*/
class Mikat_bravo extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->super_logged_in();
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

        $this->db->where('milih_siapa', '1')->from('mahasiswa');
        $bondan = $this->db->count_all_results();

        $this->db->where('milih_siapa', '2')->from('mahasiswa');
        $ical = $this->db->count_all_results();

        $this->db->where('milih_siapa', '3')->from('mahasiswa');
        $ojan = $this->db->count_all_results();

        $this->db->where('udah_milih', 'yes')->from('mahasiswa');
        $jumlah = $this->db->count_all_results();

        $admin['yg_udah'] = $lists;
        $admin['vote'] = array(
            'bondan' => $bondan,
            'ical' => $ical,
            'ojan' => $ojan,
            'jumlah' => $jumlah
        );

        $data = array(
            'title' => 'Super Administrator Page',
            'content' => $this->load->view('superadmin/admin-page', $admin, true)
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
                'content' => $this->load->view('superadmin/sukses', null, true)
            );
            $this->load->view('wrapper', $data);
        } else {
            $data = array(
                'title' => 'Error',
                'content' => $this->load->view('superadmin/error', null, true)
            );
            $this->load->view('wrapper', $data);
        }
    }

    function super_logged_in() {
        $super_logged_in = $this->session->userdata('super_logged_in');

        if (! isset($super_logged_in) || $super_logged_in !== true) {
            redirect('superadmin');
        }
    }
}