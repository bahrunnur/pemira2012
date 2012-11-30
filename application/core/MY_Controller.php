<?php 

/**
* 
*/
class MY_Controller extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $logged_in = $this->session->userdata('logged_in');
        
        if($logged_in == true)
        {
            $this->userdata['logged_in']    = true;
            $this->userdata['niu']     = $this->session->userdata('niu');
        }
        else
            redirect('login');
    }

   
     public function _output($me){
        
        if($this->config->item('progressive_compression') != 'yes' or 0 == 0){
            
            $me = preg_replace("@([\r\n])[\s]+@",'',$me);
            $me = preg_replace("/\n/",'',$me);
            $me = preg_replace("/\n/",'',$me);
            $me = preg_replace("/\n\r/",'',$me);
            $me = preg_replace("/\r/",'',$me);
            
        }
        echo $me;
        
    }
}