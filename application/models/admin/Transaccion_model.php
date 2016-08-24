<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaccion_model extends CI_Model {

    public $id_transaccion; 
    public $id_cotizacion; 
    public $id_usuario;
    public $id_operacion;

    
    public function set_datos($data_cruda){
        foreach ($data_cruda as $nombre_campo => $valor_campo){
            
            if(property_exists('Transaccion_model', $nombre_campo)){
                $this->$nombre_campo=$valor_campo;
            }
        }
         
        return $this;
        
    }
    function listar_todos() {
        $query = $this->db->query("SELECT * FROM transaccion where activo = 1 order by nombre;");          
        return $query->result();
    }
    public function add() {
        $id=$this->db->insert('transaccion', $this);

        return $this->db->insert_id();
    }
    public function edit($id,$data) {
       
        $this->db->where('id_transaccion =', $id);
        $id=$this->db->update('transaccion', $data);
       // echo $this->db->last_query();

        return $id;
    }
    public function delete($id) {
        
        $timestamp = date('Y-m-d G:i:s');        
        $data['activo']= 0;
        $data['fechad']= $timestamp;
        $this->db->where('id_transaccion =', $id);
        $id=$this->db->update('transaccion', $data);
        //$this->db->where('id_transaccion', $id);
        //$id=$this->db->delete('transaccion');
        //echo $this->db->last_query();
        //exit();
        
	return $id;
    }    
    
    public function get_item($id){
        
        $this->db->where(array('id_transaccion'=>$id,'activo'=>1));
        $query= $this->db->get('transaccion');
        
        $row = $query->custom_row_object(0, 'Transaccion_model');
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
        //return $this->db->count_all('transaccion');    
        
        $this->db->where('activo',1);
        $this->db->from("transaccion");
        
        return $this->db->count_all_results();

    }
    
/*
    function get_by_id($id) {
        $query = $this->db->where('id_categoria', $id);
        $query = $this->db->get('admin_categorias');
        return $query->result();
    }
*/




}
