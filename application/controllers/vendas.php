<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vendas extends CI_Controller {

    public function index(){
        //$this->load->helper('date');
        //$usuario = $this->session->userdata("usuario_logado");
        $usuario = autoriza();
        $this->load->model("produtos_model");
        $produtos_vendidos = $this->produtos_model->vendidos($usuario);        
        $dados = array('produtos' => $produtos_vendidos);
        $this->load->template('vendas/index', $dados);
    }

    public function nova(){
        //$this->load->helper('date');
        $usuario_logado = autoriza();
        $venda = array(
            'produto_id' => $this->input->post('produto_id'),
            'comprador_id' => $usuario_logado['id'],
            'data_de_entrega' => data_mysql($this->input->post('data_de_entrega'))
        );

        $this->load->model(array('vendas_model', 'produtos_model', 'usuarios_model'));
        $this->vendas_model->salva($venda);

        //enviar email para vendedor
        $this->load->library("email");
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.mailtrap.io';
        $config['smtp_user'] = 'ad46b0ed413ff2';
        $config['smtp_pass'] = 'a0c1b45cf6ea7a';
        $config['smtp_port'] = '465';
        $config['charset'] = 'utf-8';
        $config['mailtype'] = 'html';
        $config['newline'] = '\r\n';
        $this->email->initialize($config);

        $produto = $this->produtos_model->find($venda['produto_id']);
        $vendedor = $this->usuarios_model->busca($produto['usuario_id']);

        $dados = array("produto" => $produto);
        $conteudo = $this->load->view('vendas/email.php', $dados, TRUE);        
        var_dump($produto, $vendedor, $conteudo);

        $this->email->from("fernandovaller@gmail.com", 'Curso CodeIgniter');
        $this->email->to(array($vendedor['email']));
        $this->email->subject("Seu produto {$produto['nome']} foi vendido!");
        $this->email->message($conteudo);
        $this->email->send();        

        $this->session->set_flashdata('success', 'Venda cadastrada com sucesso!');
        //redirect('/');
    }
}