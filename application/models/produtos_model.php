<?php

class Produtos_model extends CI_Model {


    public function vendidos($usuario){
        $id_usuario = $usuario['id'];
        $this->db->select("produtos.*, vendas.data_de_entrega");
        $this->db->from("produtos");
        $this->db->join("vendas", "vendas.produto_id = produtos.id");
        $this->db->where("usuario_id", $id_usuario); 
        $this->db->where("vendido", true); 
        return $this->db->get()->result_array();
    }


    public function findAll() {
        return $this->db->get("produtos")->result_array();
    }
    public function findAllDisponivel(){
        return $this->db->get_where("produtos", 
            array('vendido'=> '0')
        )->result_array();
    }
    public function salva($produto) {
    	return $this->db->insert("produtos", $produto);
    }

    public function find($id) {
    	/*$this->db->where("id", $id);
    	return $this->db->get("produtos")->row_array();*/
    	return $this->db->get_where("produtos", array(
    		"id" => $id
    	))->row_array();
    }
}