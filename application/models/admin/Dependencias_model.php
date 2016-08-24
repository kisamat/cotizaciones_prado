<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dependencias_model extends CI_Model {

    public $id_dependencia; 
    public $nombre; 
    public $descripcion;
    public $jefe;
    public $correo;
    public $activo;

    public function set_datos($data_cruda){
        foreach ($data_cruda as $nombre_campo => $valor_campo){
            
            if(property_exists('Dependencias_model', $nombre_campo)){
                $this->$nombre_campo=$valor_campo;
            }
        }
        if($this->activo==NULL){
            $this->activo=1;
        }
        //$this->nombre=  strtoupper($this->nombre);
        
        return $this;
        
    }
    function listar_todos() {
        $query = $this->db->query("SELECT * FROM dependencias where activo = 1 order by nombre;");          
        return $query->result();
    }
    public function add() {
        $id=$this->db->insert('dependencias', $this);

        return $this->db->insert_id();
    }
    public function edit($id,$data) {
       
        $this->db->where('id_dependencia =', $id);
        $id=$this->db->update('dependencias', $data);
       // echo $this->db->last_query();

        return $id;
    }
    public function delete($id) {
         $timestamp = date('Y-m-d G:i:s');        
        $data['activo']= 0;
        $data['fechad']= $timestamp;
        $this->db->where('id_dependencia =', $id);
        $id=$this->db->update('dependencias', $data);

// $this->db->where('id_dependencia', $id);
        //$id=$this->db->delete('dependencias');
        //echo $this->db->last_query();
        //exit();
        
	return $id;
    }    
    
    public function get_item($id){
        
        $this->db->where(array('id_dependencia'=>$id,'activo'=>1));
        $query= $this->db->get('dependencias');
        
        $row = $query->custom_row_object(0, 'Dependencias_model');
        /*
        if(isset($row)){
            $row->id=  intval($row->id);
        }
        $this->id=  intval($id);
        $this->nombre='Fernando Vargas';
        $this->correo='efvargasb@gmail.com';
        */
        return $row;
    }
    
    public function total_registros() {
        //return $this->db->count_all('dependencias');    
        
        $this->db->where('activo',1);
        $this->db->from("dependencias");
        
        return $this->db->count_all_results();

    }
    
    public function get_items($q){
        
        
        $this->db->where('activo',1);
        $this->db->like('nombre', $q);
        $this->db->limit(10);
        $query = $this->db->get("dependencias");
       // echo $this->db->last_query();
        return $query->result();
        
    }
/*
    function get_by_id($id) {
        $query = $this->db->where('id_categoria', $id);
        $query = $this->db->get('admin_categorias');
        return $query->result();
    }
*/




}
