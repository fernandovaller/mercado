<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    
    public function index()
    {
     
     if(!$this->session->userdata("usuario_logado")){ 
     	//chama a view
        $this->load->view('home/index');
     }else {
     	redirect('/produtos');
     }     
                     
    }

 
}