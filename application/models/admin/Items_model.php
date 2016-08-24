<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Items_model extends CI_Model {

    public $id_item; 
    public $id_tipo_item; 
    public $nombre;
    public $valor;
    public $impuesto;
    public $activo;

    public function set_datos($data_cruda){
        foreach ($data_cruda as $nombre_campo => $valor_campo){
            
            if(property_exists('Items_model', $nombre_campo)){
                $this->$nombre_campo=$valor_campo;
            }
        }
        if($this->activo==NULL){
            $this->activo=1;
        }
        //$this->nombre=  strtoupper($this->nombre);
        
        return $this;
        
    }
    function listar_todos($idtipo) {
        $this->db->where(array('id_tipo_item'=>$idtipo,'activo'=>1));
        $this->db->order_by("nombre", "asc");
        $query = $this->db->get("items_cotizacion");          
        return $query->result();
    }
    public function add() {
        $id=$this->db->insert('items_cotizacion', $this);

        return $this->db->insert_id();
    }
    public function edit($id,$data) {
       
        $this->db->where('id_item =', $id);
        $id=$this->db->update('items_cotizacion', $data);
       // echo $this->db->last_query();

        return $id;
    }
    public function delete($id) {
   /*     
        $timestamp = date('Y-m-d G:i:s');        
        $data['activo']= 0;
        $data['fechad']= $timestamp;
        $this->db->where('id_salon =', $id);
        $id=$this->db->update('salones', $data);
    */
        $this->db->where('id_item', $id);
        $id=$this->db->delete('items_cotizacion');
        //echo $this->db->last_query();
        //exit();
        
	return $id;
    }    
    
    public function get_item($id){
        
        $this->db->where(array('id_item'=>$id,'activo'=>1));
        $query= $this->db->get('items_cotizacion');
        
        $row = $query->custom_row_object(0, 'Items_model');

        return $row;
    }
    
    public function total_registros() {
        //return $this->db->count_all('salones');    
        
        $this->db->where('activo',1);
        $this->db->from("items_cotizacion");
        
        return $this->db->count_all_results();

    }
    public function get_items($q){
        
        
        $this->db->where('activo',1);
        $this->db->like('nombre', $q);
        $this->db->limit(10);
        $query = $this->db->get("items_cotizacion");
        //echo $this->db->last_query();
        return $query->result();
        
    }
}
