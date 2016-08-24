<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cotizacionesitems_model extends CI_Model {

    public $id_cotizacion; 
    public $id_item;
    public $cantidad;
    public $valor;
    public $activo;    
    //public $fechad;
    
    
    
    
    public function set_datos($data_cruda){
        foreach ($data_cruda as $nombre_campo => $valor_campo){
            
            if(property_exists('Cotizacionesitems_model', $nombre_campo)){
                $this->$nombre_campo=$valor_campo;
            }
        }
        if($this->activo==NULL){
            $this->activo=1;
        }
        //$this->nombre=  strtoupper($this->nombre);
        
        return $this;
        
    }
    public function add_items(){
        $id=$this->db->insert('cotizacion_items', $this);

        return $this->db->insert_id();
    }
    public function actualizar_estado_items($iditem){
        $this->db->select('id_cotizacion');
        $this->db->where(array('id_cotizacion'=>$iditem,'activo'=>1));
        $query= $this->db->get('cotizacion_items');
        

        if(!empty($query->row()->id_cotizacion)){
            //$this->db->reset_query();
            $this->db->set('activo', 0, FALSE);
            $id=$this->db->update('cotizacion_items');
        }
        
        return $id;
    }
    public function get_items($iditem){
        $this->db->select('items_cotizacion.id_item');
        $this->db->select('items_cotizacion.nombre');
        $this->db->select('items_cotizacion.valor as valu');
        $this->db->select('items_cotizacion.impuesto');
        $this->db->select('cotizacion_items.cantidad');
        $this->db->select('cotizacion_items.valor');
        
        $this->db->from('cotizacion_items');
        $this->db->join('items_cotizacion', 'items_cotizacion.id_item = cotizacion_items.id_item');
        $this->db->where(array('cotizacion_items.id_cotizacion'=>$iditem,'cotizacion_items.activo'=>1));
        $query= $this->db->get();
        //echo $this->db->last_query(); 
        //exit();
        
        return $query->result();
    }
    
    public function total_registros() {
        //return $this->db->count_all('cotizaciones');    
        
        $this->db->where('activo',1);
        $this->db->from("cotizaciones");
        
        return $this->db->count_all_results();

    }





}
