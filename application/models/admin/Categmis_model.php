<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Categmis_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_todos() {
        $query = $this->db->query("SELECT * FROM admin_categmis order by nombre;");          
        return $query->result();
    }

    function add() {
	$data['nombre']= $this->input->post('nombre');
        $this->db->insert('admin_categmis', $data);

        return $this->db->insert_id();
    }

    function get_by_id($id) {
        $query = $this->db->where('id_categmis', $id);
        $query = $this->db->get('admin_categmis');
        return $query->result();
    }

    function edit($id) {

	$data['nombre'] = $this->input->post('nombre');
        $this->db->where('id_categmis', $id);
        $this->db->update('admin_categmis', $data);
	return TRUE;
    }

    function elim($id) {
        $this->db->where('id_categmis', $id);
        $this->db->delete('admin_categmis');
	return TRUE;
    }

}
