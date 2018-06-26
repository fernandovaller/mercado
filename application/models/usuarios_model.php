<?php

class Usuarios_model extends CI_Model {

    public function findAll(){
        return $this->db->get("usuarios")->result_array();
    }	

    public function busca($id){
		$this->db->where("id", $id);
        return $this->db->get("usuarios")->row_array();
	}

    public function salvar($usuario) {
        return $this->db->insert("usuarios", $usuario);
    }

    public function login($email, $senha) {
    	$this->db->where("email", $email);
    	$this->db->where("senha", $senha);
    	$usuario = $this->db->get('usuarios')->row_array(); //retorna apenas uma linha
    	return $usuario;
    }
}