<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function index(){
        autoriza();
		$this->load->database();
		$this->load->model('usuarios_model');	
		$usuarios = $this->usuarios_model->findAll();
		$dados = array("usuarios" => $usuarios);	

		$this->load->helper('url');

		$this->load->template('usuarios/index', $dados);
	}
    
    public function novo() {
        autoriza();
        //$this->output->enable_profiler(TRUE);

    	//recebendo os dados
    	$usuario = array(
    		"nome" => $this->input->post("nome"),
    		"email" => $this->input->post("email"),
    		"senha" => md5($this->input->post("senha"))
    	);

    	//$this->load->database();
    	$this->load->model('usuarios_model');
    	$this->usuarios_model->salvar($usuario);
    	//$this->load->view('usuarios/novo');
        $this->session->set_flashdata('success', 'Usuário cadastrado com sucesso!');
        redirect('/usuarios');
    }

    public function formulario() {
        autoriza();
        $this->load->template('usuarios/formulario');
    }
}