<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Espacios_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_hijos() {
        $query = $this->db->query("SELECT * FROM admin_espacios where id_padre != 0 order by nombre;");   
        //$query = $this->db->get('espacios');
        return $query->result();
    }

    function get_padres() {        
        $query = $this->db->query("SELECT * FROM admin_espacios where id_padre = 0 order by nombre;");       
        return $query->result();
    }    
    
    function add() {
        $data['id_padre']= $this->input->post('id_padre');
	$data['nombre']= $this->input->post('nombre');
        $this->db->insert('admin_espacios', $data);

        return $this->db->insert_id();
    }

    function get_by_id($id) {
        $query = $this->db->where('id_espacio', $id);
        $query = $this->db->get('admin_espacios');
        return $query->result();
    }

    function edit($id) {
        $data['id_padre']= $this->input->post('id_padre');
	$data['nombre'] = $this->input->post('nombre');
        $this->db->where('id_espacio', $id);
        $this->db->update('admin_espacios', $data);
	return TRUE;
    }

    function get_alone($id) {        
        $query = $this->db->query("SELECT count(*) as conteo FROM admin_espacios where id_padre =".$id );       
        return $query->result();
    }
    
    function elim($id) {
        $this->db->where('id_espacio', $id);
        $this->db->delete('admin_espacios');
	return TRUE;
    }

}
