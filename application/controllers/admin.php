<?php 

/**
* 
*/
class Admin extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
    }

    function index() {
        if (! $_POST) {
            $data = array(
                'title' => 'Admin Login',
                'content' => $this->load->view('admin/login-form.php', null, true)
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
            $this->session->set_userdata('logged_in', true);
            redirect('inex_garing');
        } else {
            $this->session->set_flashdata('error', 'username atau password salah');
            redirect('admin');
        }
    }
}