<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Catperuser_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_todos() {
        $query = $this->db->query("SELECT * FROM admin_catperuser order by nombre;");          
        return $query->result();
    }

    function add() {
	$data['nombre']= $this->input->post('nombre');
        $this->db->insert('admin_catperuser', $data);

        return $this->db->insert_id();
    }

    function get_by_id($id) {
        $query = $this->db->where('id_catperuser', $id);
        $query = $this->db->get('admin_catperuser');
        return $query->result();
    }

    function edit($id) {

	$data['nombre'] = $this->input->post('nombre');
        $this->db->where('id_catperuser', $id);
        $this->db->update('admin_catperuser', $data);
	return TRUE;
    }

    function elim($id) {
        $this->db->where('id_catperuser', $id);
        $this->db->delete('admin_catperuser');
	return TRUE;
    }

}
