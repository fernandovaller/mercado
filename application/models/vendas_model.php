<?php

class Vendas_model extends CI_Model {
    public function findAll() {
        return $this->db->get("vendas")->result_array();
    }    

    //salva a venda
    public function salva($venda) {
    	$this->db->insert("vendas", $venda);
    	
        //atualiza o campo vendido da tabela produtos
        $this->db->update('produtos', 
    		array('vendido'=> '1'),
    		array('id' => $venda['produto_id'])
    	);
    }

}