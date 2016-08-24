<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes_model extends CI_Model {

    public $id_cliente; 
    public $nombres; 
    public $apellidos;
    public $documento;
    public $email; 
    public $telefono;
    public $celular;
    public $direccion; 
    public $activo;
    
    
    
    
    public function set_datos($data_cruda){
        foreach ($data_cruda as $nombre_campo => $valor_campo){
            
            if(property_exists('Clientes_model', $nombre_campo)){
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
        $query = $this->db->query("SELECT * FROM clientes where activo = 1;");          
        return $query->result();
    }
            
    public function add() {
    
        $id=$this->db->insert('clientes', $this);

        return $this->db->insert_id();
    }
    public function edit($id,$data) {
       
        $this->db->where('id_cliente =', $id);
        $id=$this->db->update('clientes', $data);
       // echo $this->db->last_query();

        return $id;
    }
    public function delete($id) {
         $timestamp = date('Y-m-d G:i:s');        
        $data['activo']= 0;
        $data['fechad']= $timestamp;
        $this->db->where('id_cliente =', $id);
        $id=$this->db->update('clientes', $data);
        
	return $id;
    }    
    
    public function get_item($id){
        
        $this->db->where(array('id_cliente'=>$id,'activo'=>1));
        $query= $this->db->get('clientes');
        
        $row = $query->custom_row_object(0, 'Clientes_model');
       
        return $row;
    }
    
    public function total_registros() {
        //return $this->db->count_all('clientes');    
        
        $this->db->where('activo',1);
        $this->db->from("clientes");
        
        return $this->db->count_all_results();

    }
    public function cliente_existe($documento){
        $this->db->where(array('documento'=>$documento,'activo'=>1));
        $query= $this->db->get('clientes');
        
        $row = $query->custom_row_object(0, 'Clientes_model');
       
        return $row;
    }


}
