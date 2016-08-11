<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dependencias_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_todos() {
        $query = $this->db->query("SELECT * FROM admin_dependencias order by nombre;");   
        return $query->result();
    }

    function add() {
	$data['nombre']= $this->input->post('nombre');
        $this->db->insert('admin_dependencias', $data);

        return $this->db->insert_id();
    }

    function get_by_id($id) {
        $query = $this->db->where('id_dependencia', $id);
        $query = $this->db->get('admin_dependencias');
        return $query->result();
    }

    function edit($id) {

	$data['nombre'] = $this->input->post('nombre');
        $this->db->where('id_dependencia', $id);
        $this->db->update('admin_dependencias', $data);
	return TRUE;
    }

    function elim($id) {
        $this->db->where('id_dependencia', $id);
        $this->db->delete('admin_dependencias');
	return TRUE;
    }

}
