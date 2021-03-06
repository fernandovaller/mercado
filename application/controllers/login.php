<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function autenticar(){

        $this->output->enable_profiler(TRUE);

		$this->load->model("usuarios_model");

		$email = $this->input->post("email");
		$senha = md5($this->input->post("senha"));
		$usuario = $this->usuarios_model->login($email, $senha);
		if ($usuario) {
			$this->session->set_userdata("usuario_logado", $usuario);			
			$this->session->set_flashdata('success', 'Logado com sucesso!');
			//$dados = array('mensagem' => 'Usuario logado com sucesso!');
		} else {
			//$dados = array('mensagem' => 'Usuario ou Senha inválidos!');
			$this->session->set_flashdata('danger', 'Usuário ou senha incorretos!');
		}
		//$this->load->view('login/autenticar', $dados);
		redirect("/");
	}

	public function logout() {
		$this->session->unset_userdata("usuario_logado");
		//$this->load->view('login/logout');
		$this->session->set_flashdata('success', 'Deslogado com sucesso!');
		redirect('/');
	}

}

