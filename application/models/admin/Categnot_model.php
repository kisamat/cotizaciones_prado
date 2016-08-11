<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Categnot_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_todos() {
        $query = $this->db->query("SELECT * FROM admin_categnot order by nombre;");          
        return $query->result();
    }

    function add() {
	$data['nombre']= $this->input->post('nombre');
        $this->db->insert('admin_categnot', $data);

        return $this->db->insert_id();
    }

    function get_by_id($id) {
        $query = $this->db->where('id_categnot', $id);
        $query = $this->db->get('admin_categnot');
        return $query->result();
    }

    function edit($id) {

	$data['nombre'] = $this->input->post('nombre');
        $this->db->where('id_categnot', $id);
        $this->db->update('admin_categnot', $data);
	return TRUE;
    }

    function elim($id) {
        $this->db->where('id_categnot', $id);
        $this->db->delete('admin_categnot');
	return TRUE;
    }

}
