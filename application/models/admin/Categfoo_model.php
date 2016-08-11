<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Categfoo_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_todos() {
        $query = $this->db->query("SELECT * FROM admin_categfoo order by nombre;");          
        return $query->result();
    }

    function add() {
	$data['nombre']= $this->input->post('nombre');
        $this->db->insert('admin_categfoo', $data);

        return $this->db->insert_id();
    }

    function get_by_id($id) {
        $query = $this->db->where('id_categfoo', $id);
        $query = $this->db->get('admin_categfoo');
        return $query->result();
    }

    function edit($id) {

	$data['nombre'] = $this->input->post('nombre');
        $this->db->where('id_categfoo', $id);
        $this->db->update('admin_categfoo', $data);
	return TRUE;
    }

    function elim($id) {
        $this->db->where('id_categfoo', $id);
        $this->db->delete('admin_categfoo');
	return TRUE;
    }

}
