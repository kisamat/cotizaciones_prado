<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_todos() {
        $query = $this->db->query("SELECT * FROM admin_categorias order by nombre;");          
        return $query->result();
    }

    function add() {
	$data['nombre']= $this->input->post('nombre');
        $this->db->insert('admin_categorias', $data);

        return $this->db->insert_id();
    }

    function get_by_id($id) {
        $query = $this->db->where('id_categoria', $id);
        $query = $this->db->get('admin_categorias');
        return $query->result();
    }

    function edit($id) {

	$data['nombre'] = $this->input->post('nombre');
        $this->db->where('id_categoria', $id);
        $this->db->update('admin_categorias', $data);
	return TRUE;
    }

    function elim($id) {
        $this->db->where('id_categoria', $id);
        $this->db->delete('admin_categorias');
	return TRUE;
    }

}
