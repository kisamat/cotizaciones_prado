<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Salones_model extends CI_Model {

    public $id_salon; 
    public $nombre; 
    public $descripcion;
    public $activo;

    public function set_datos($data_cruda){
        foreach ($data_cruda as $nombre_campo => $valor_campo){
            
            if(property_exists('Salones_model', $nombre_campo)){
                $this->$nombre_campo=$valor_campo;
            }
        }
        if($this->activo==NULL){
            $this->activo=1;
        }
        //$this->nombre=  strtoupper($this->nombre);
        
        return $this;
        
    }
    function listar_todos($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->where('activo',1);      
        $this->db->order_by("id_salon", "desc");
        $query= $this->db->get('salones');
        
        return $query->result();
    }
    public function add() {
        $id=$this->db->insert('salones', $this);

        return $this->db->insert_id();
    }
    public function edit($id,$data) {
       
        $this->db->where('id_salon =', $id);
        $id=$this->db->update('salones', $data);
       // echo $this->db->last_query();

        return $id;
    }
    public function delete($id) {
        
        $timestamp = date('Y-m-d G:i:s');        
        $data['activo']= 0;
        $data['fechad']= $timestamp;
        $this->db->where('id_salon =', $id);
        $id=$this->db->update('salones', $data);
        //$this->db->where('id_salon', $id);
        //$id=$this->db->delete('salones');
        //echo $this->db->last_query();
        //exit();
        
	return $id;
    }    
    
    public function get_item($id){
        
        $this->db->where(array('id_salon'=>$id,'activo'=>1));
        $query= $this->db->get('salones');
        
        $row = $query->custom_row_object(0, 'Salones_model');
       //  $row = $query->result();
         
        // echo $this->db->last_query();

      
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
        //return $this->db->count_all('salones');    
        
        $this->db->where('activo',1);
        return $this->db->count_all_results('salones');


    }
    
/*
    function get_by_id($id) {
        $query = $this->db->where('id_categoria', $id);
        $query = $this->db->get('admin_categorias');
        return $query->result();
    }
*/




}
