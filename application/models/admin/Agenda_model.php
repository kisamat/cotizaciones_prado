<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_all() {
        $query = $this->db->query("SELECT * FROM admin_eventos where isactive = 1;");   
        //$query = $this->db->get('espacios');
        return $query->result();
    }

    function get_categorias() {
        $query = $this->db->query("SELECT * FROM admin_categorias order by nombre;");   
        //$query = $this->db->get('espacios');
        return $query->result();
    }

    function get_dependencias() {        
        $query = $this->db->query("SELECT * FROM admin_dependencias order by nombre;");       
        return $query->result();
    }    
    
    function get_tiprog() {        
        $query = $this->db->query("SELECT * FROM admin_tiprog order by nombre;");       
        return $query->result();
    } 

    function get_instalaciones() {        
        $query = $this->db->query("SELECT * FROM admin_espacios where id_padre = 0 order by nombre;");       
        return $query->result();
    }

    function get_espacios($id) {        
        $query = $this->db->query("SELECT * FROM admin_espacios where id_padre = ".$id." order by nombre;");       
        return $query->result();
    }
    
    function add() {
        $data['id_categoria']= $this->input->post('categoria');
        $data['id_dependencia']= $this->input->post('dependencia');
        $data['id_tiprog']= $this->input->post('tiprog');
        $data['id_instalacion']= $this->input->post('instalacion');        
        $data['id_espacio']= $this->input->post('espacio');
        $data['titulo']= $this->input->post('titulo');
        $data['fechai']= $this->input->post('fechai');
        $data['horai']= $this->input->post('horai');
        $data['fechaf']= $this->input->post('fechaf');
        $data['horaf']= $this->input->post('horaf');
	$data['descripcion']= $this->input->post('descripcion');
        $this->db->insert('admin_eventos', $data);

        return $this->db->insert_id();
    }

    function get_by_id($id) {
        $query = $this->db->where('id_evento', $id);
        $query = $this->db->get('admin_eventos');
        return $query->result();
    }

    function edit($id) {
        $data['id_categoria']= $this->input->post('categoria');
        $data['id_dependencia']= $this->input->post('dependencia');
        $data['id_tiprog']= $this->input->post('tiprog');
        $data['id_instalacion']= $this->input->post('instalacion');        
        $data['id_espacio']= $this->input->post('espacio');
        $data['titulo']= $this->input->post('titulo');
        $data['fechai']= $this->input->post('fechai');
        $data['horai']= $this->input->post('horai');
        $data['fechaf']= $this->input->post('fechaf');
        $data['horaf']= $this->input->post('horaf');
	$data['descripcion']= $this->input->post('descripcion');
        $this->db->where('id_evento', $id);
        $this->db->update('admin_eventos', $data);
	return TRUE;
    }

    function elim($id) {       
        
        $timestamp = date('Y-m-d G:i:s');        
        $data['isactive']= 0;
        $data['fechad']= $timestamp;
        $this->db->where('id_evento', $id);        
        $this->db->update('admin_eventos', $data);
	return TRUE;
    }

}
