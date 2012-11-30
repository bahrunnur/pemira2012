<?php 

/**
* 
*/
class Vote extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->bisa_vote();
    }

    function index() {
        if (empty($_POST)) {
            $data = array(
                'title' => 'Vote',
                'content' => $this->load->view('vote/vote-form', null, true)
            );

            $this->load->view('wrapper', $data);
        } else{
            $this->_process();
        }
    }

    function _process() {
        $niu = $this->session->userdata('niu');
        $siapa = $this->input->post('siapa');

        $this->db->where('niu', $niu);
        $this->db->update('mahasiswa', array('milih_siapa' => $siapa, 'granted' => 'no', 'udah_milih' => 'yes'));
        
        $this->session->sess_destroy();
        redirect('login');
    }
    
    function bisa_vote() {
        $bisa_vote = $this->session->userdata('bisa_vote');

        if (! isset($bisa_vote) || $bisa_vote !== true) {
            redirect();
        }
    }
    
}