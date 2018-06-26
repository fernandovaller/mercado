<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produtos extends CI_Controller {
    
    public function index()
    {
        autoriza();
        // $produtos = array();
        // $p1 = array("nome"=> "Bola de Futebol", "descricao" => "Bola de futebol do zico", "preco" => 300);
        // $p2 = array("nome"=> "HD externo", "descricao" => "Marca Mega-HD 300 teras", "preco" => 400);
        // array_push($produtos, $p1, $p2);

    	//carrega o banco
    	//$this->load->database();    
    	
        //$this->output->enable_profiler(TRUE);

    	//carrega o model
    	$this->load->model("produtos_model");
        //$produtos = $this->produtos_model->findAll();
        
        //Exibe apenas os disponiveis
    	$produtos = $this->produtos_model->findAllDisponivel();

        $dados = array("produtos" => $produtos);

        //carrega o helper
        //$this->load->helper(array('url', 'currency', 'form'));

        //chama a view
        $this->load->template('produtos/index', $dados);
        //$this->load->view('produtos/index', $dados);

    }

    public function formulario() {
        autoriza();
        $this->load->template('produtos/formulario');
    }

    public function mostra($id) {
         autoriza();
        //$id = $this->input->get("id");
        $this->load->model('produtos_model');
        $produto = $this->produtos_model->find($id);
        $dados = array("produto" => $produto);
        $this->load->template("produtos/mostra", $dados);
    }

    public function novo() {        
        autoriza();

        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('nome', 'nome', 'trim|required|min_length[5]|callback_nao_tenha_melhor');        
        $this->form_validation->set_rules('preco', 'preco', 'required');
        $this->form_validation->set_rules('descricao', 'descricao', 'trim|required|min_length[10]');

        $this->form_validation->set_error_delimiters('<p class="alert-danger">', '</p>');

        $sucesso = $this->form_validation->run();

        if($sucesso){

            $usuario_logado = $this->session->userdata("usuario_logado");
            $produto = array(
                'nome' => $this->input->post('nome'),
                'descricao' => $this->input->post('descricao'),
                'preco' => $this->input->post('preco'),
                'usuario_id' => $usuario_logado['id']
            );
            $this->load->model('produtos_model');
            $this->produtos_model->salva($produto);       
            $this->session->set_flashdata('success', 'Produto cadastrado com sucesso!');
            redirect('/produtos');

        } else {
            $this->load->template('produtos/formulario');
        }

    }

    //Criando uma validação especifica
    public function nao_tenha_melhor($str){
        $posicao = strpos($str, "melhor");
        if($posicao === false){
            return TRUE;
        } else {
            $this->form_validation->set_message("nao_tenha_melhor", "O campo '%s' nao pode ter a palavras 'melhor'");
            return FALSE;
        }
    }
}