<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Noticias_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_todos() {
        $query = $this->db->query("SELECT * FROM admin_noticias where isactive = 1;");   
        //$query = $this->db->get('espacios');
        return $query->result();
    }

    function get_categnot() {
        $query = $this->db->query("SELECT * FROM admin_categnot order by nombre;");   
        //$query = $this->db->get('espacios');
        return $query->result();
    }
    
     public function fetch_noticias($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->where('isactive', '1');
        $query = $this->db->order_by('fechac', 'DESC');
        $query = $this->db->get("admin_noticias");
        
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
    
    
    function get_cuantos() {
        return $this->db->count_all('admin_noticias');      
    }   
    
    function add() {
        $data['id_categnot']= $this->input->post('categnot');
        $data['opcion']= $this->input->post('opcion');
        $data['titulo']= $this->input->post('titulo');
        $data['url']= $this->input->post('url');
	$data['descripcion']= $this->input->post('descripcion');

        $this->db->insert('admin_noticias', $data);

        return $this->db->insert_id();
    }

    function get_by_id($id) {
        $query = $this->db->where('id_noticia', $id);
        $query = $this->db->get('admin_noticias');
        return $query->result();
    }

    function edit($id) { 
        $data['id_categnot']= $this->input->post('categnot');
        $data['opcion']= $this->input->post('opcion');
        $data['titulo']= $this->input->post('titulo');
        $data['url']= $this->input->post('url');
	$data['descripcion']= $this->input->post('descripcion');
        $this->db->where('id_noticia', $id);
        $this->db->update('admin_noticias', $data);
	return TRUE;
    }

    function elim($id) {       
        
        $timestamp = date('Y-m-d G:i:s');        
        $data['isactive']= 0;
        $data['fechad']= $timestamp;
        $this->db->where('id_noticia', $id);        
        $this->db->update('admin_noticias', $data);
	return TRUE;
    }
    
     function create_image($id, $nombre) {  
        $data['archivo']= $nombre;         
        $this->db->where('id_noticia', $id);        
        $this->db->update('admin_noticias', $data);
	return TRUE;
    }
}
