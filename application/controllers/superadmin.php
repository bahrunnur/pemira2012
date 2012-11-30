<?php 

/**
* 
*/
class Superadmin extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
    }

    function index() {
        if (! $_POST) {
            $data = array(
                'title' => 'Super Admin Login',
                'content' => $this->load->view('superadmin/login-form.php', null, true)
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
        $nama = $this->input->post('nama');
        $access = $this->input->post('access');
        $pass = md5($this->input->post('pass'));

        $query = $this->db->select("*")->from('user')->where('nama', $nama)->where('password', $pass)->where('access_level', $access)->get();

        if ($query->num_rows() == 1) {
            $table = $query->row();
            $this->session->set_userdata('nama', $table->nama);
            $this->session->set_userdata('super_logged_in', true);
            redirect('mikat_bravo');
        } else {
            $this->session->set_flashdata('error', 'username atau password salah');
            redirect('superadmin');
        }
    }
}