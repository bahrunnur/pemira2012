<?php 

/**
* 
*/
class Login extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
    }

    function index() {
        if (! $_POST) {
            $data = array(
                'title' => 'Login',
                'content' => $this->load->view('login/login-form', null, true)
            );
            $this->load->view('wrapper', $data);
        } else {
            $this->_validasi();
        }
    }

    function logout() {
        $this->session->sess_destroy();
        redirect();
    }

    function _validasi() {
        $niu = $this->input->post('niu');

        $query = $this->db->select("*")->from('mahasiswa')->where('niu', $niu)->where('granted', 'yes')->get();

        if ($query->num_rows() == 1) {
            $table = $query->row();
            $this->session->set_userdata('niu', $table->niu);
            $this->session->set_userdata('bisa_vote', true);
            redirect('vote');
        } else {
            $this->session->set_flashdata('error', 'Kamu Belum terdaftar');
            redirect('login');
        }
    }

}