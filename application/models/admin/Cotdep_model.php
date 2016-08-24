<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cotdep_model extends CI_Model {

    public $id_cotizacion; 
    public $id_dependencia;
    public $observacion;
    public $fecha_creacion;
    public $fecha_aprobacion;
    public $activo;
    //public $fechad;
    
    
    
    
    public function set_datos($data_cruda){
        foreach ($data_cruda as $nombre_campo => $valor_campo){
            
            if(property_exists('Cotdep_model', $nombre_campo)){
                $this->$nombre_campo=$valor_campo;
            }
        }
        if($this->activo==NULL){
            $this->activo=1;
        }
        
        if($this->fecha_creacion==NULL){
            
            $timestamp = date('Y-m-d G:i:s'); 
            $this->fecha_creacion=$timestamp;
        }
        //$this->nombre=  strtoupper($this->nombre);
        
        return $this;
        
    }
    public function add_items(){
        $id=$this->db->insert('cotizacion_dependencia', $this);
        //echo $this->db->last_query(); 
        return $id;
    }
    public function actualizar_estado_items($iditem){
        $this->db->select('id_cotizacion');
        $this->db->where(array('id_cotizacion'=>$iditem,'activo'=>1));
        $query= $this->db->get('cotizacion_dependencia');
        

        if(!empty($query->row()->id_cotizacion)){
            //$this->db->reset_query();
            $this->db->set('activo', 0, FALSE);
            $id=$this->db->update('cotizacion_dependencia');
        }
        
        return $id;
    }
    public function get_items($iditem){
        $this->db->select('dependencias.id_dependencia');
        $this->db->select('dependencias.nombre');        
        $this->db->select('cotizacion_dependencia.observacion');
        
        $this->db->from('cotizacion_dependencia');
        $this->db->join('dependencias', 'dependencias.id_dependencia = cotizacion_dependencia.id_dependencia');
        $this->db->where(array('cotizacion_dependencia.id_cotizacion'=>$iditem,'cotizacion_dependencia.activo'=>1));
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
