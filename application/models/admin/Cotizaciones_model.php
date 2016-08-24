<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cotizaciones_model extends CI_Model {

    public $id_cotizacion; 
    public $id_salon; 
    public $id_cliente;
    public $id_estado;
    public $fechai;
    public $horai;
    public $fechaf; 
    public $horaf; 
    public $val_subtotal;
    public $val_ipc;
    public $val_ival;    
    public $val_total;
    public $observaciones;    
    public $activo;
    
    
    
    
    public function set_datos($data_cruda){
        foreach ($data_cruda as $nombre_campo => $valor_campo){
            
            if(property_exists('Cotizaciones_model', $nombre_campo)){
                $this->$nombre_campo=$valor_campo;
            }
        }
        if($this->id_estado==NULL){
            $this->id_estado=1;
        }
        
        if($this->activo==NULL){
            $this->activo=1;
        }
        //$this->nombre=  strtoupper($this->nombre);
        
        return $this;
        
    }
    function listar_todos() {
        $this->db->select('*');
        $this->db->from('cotizaciones');
        $this->db->join('clientes', 'clientes.id_cliente = cotizaciones.id_cliente',  'left');   
        $this->db->where('cotizaciones.activo',1);
        $this->db->where('cotizaciones.id_estado !=',3);
        $this->db->where('cotizaciones.id_estado !=',4);
        $this->db->where('cotizaciones.activo',1);
        $query = $this->db->get();         
        return $query->result();
    }
    
    function listar_salones() {
        $query = $this->db->query("SELECT * FROM salones where activo = 1 order by nombre;");          
        return $query->result();
    }
   
	function busqueda($nombres) {
        $this->db->select('*');
        $this->db->from('cotizaciones');
        $this->db->join('clientes', 'clientes.id_cliente = cotizaciones.id_cliente',  'left');
        $this->db->like('nombres', $nombres);
        $this->db->or_like('apellidos', $nombres);   
        $this->db->where('cotizaciones.activo',1);
        $query = $this->db->get();
            
        return $query->result();
    }

    
    public function busquedafecha($fechai, $fechaf){
        
        $this->db->select('*');
        $this->db->from('cotizaciones');
        $this->db->join('clientes', 'clientes.id_cliente = cotizaciones.id_cliente',  'left');
        $this->db->where('cotizaciones.activo',1);
        $this->db->where('fechai >=', $fechai);
        $this->db->where('fechaf <=', $fechaf);

        $query = $this->db->get();
        
        return $query->result();               
    }

    public function busquedatotal($nombres, $fechai, $fechaf){
        
        $this->db->select('*');
        $this->db->from('cotizaciones');
        $this->db->join('clientes', 'clientes.id_cliente = cotizaciones.id_cliente',  'left');
        $this->db->like('nombres', $nombres);
        $this->db->or_like('apellidos', $nombres);        
        $this->db->where('fechai >=', $fechai);
        $this->db->where('fechaf <=', $fechaf);        
        $this->db->where('cotizaciones.activo',1);
        $query = $this->db->get();
        $query =$this->db->last_query();
        return $query;               
    }

    
    public function busquedafechai($nombres, $fechai) {
        $this->db->select('*');
        $this->db->from('cotizaciones');
        $this->db->join('clientes', 'clientes.id_cliente = cotizaciones.id_cliente',  'left');
        $this->db->like('nombres', $nombres);
        $this->db->or_like('apellidos', $nombres);
        $this->db->where('fechai', $fechai);
        $this->db->where('cotizaciones.activo',1);
        $query = $this->db->get();
        
        return $query->result();  
    }
    
     public function busquedafechaf($nombres, $fechaf) {
        $this->db->select('*');
        $this->db->from('cotizaciones');
        $this->db->join('clientes', 'clientes.id_cliente = cotizaciones.id_cliente',  'left');
        $this->db->like('nombres', $nombres);
        $this->db->or_like('apellidos', $nombres);
        $this->db->where('fechaf', $fechaf);
        $this->db->where('cotizaciones.activo',1);
        $query = $this->db->get();
            
        return $query->result();         
        
    }
    
    public function fechai($fechai) {
        $this->db->select('*');
        $this->db->from('cotizaciones');
        $this->db->join('clientes', 'clientes.id_cliente = cotizaciones.id_cliente',  'left');
        $this->db->where('fechai', $fechai);
        $this->db->where('cotizaciones.activo',1);
        $query = $this->db->get();
            
        return $query->result();         
        
    }
    
    public function fechaf($fechai) {
        $this->db->select('*');
        $this->db->from('cotizaciones');
        $this->db->join('clientes', 'clientes.id_cliente = cotizaciones.id_cliente',  'left');
        $this->db->where('fechai', $fechaf);
        $this->db->where('cotizaciones.activo',1);
        $query = $this->db->get();
            
        return $query->result();         
        
    }
    
    public function add() {
    
        $id=$this->db->insert('cotizaciones', $this);

        return $this->db->insert_id();
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

    public function edit($id,$data) {
       
        $this->db->where('id_cotizacion =', $id);
        $id=$this->db->update('cotizaciones', $data);
       // echo $this->db->last_query();

        return $id;
    }
    public function delete($id) {
        $timestamp = date('Y-m-d G:i:s');        
        $data['activo']= 0;
        $data['fechad']= $timestamp;
        $this->db->where('id_cotizacion =', $id);
        $id=$this->db->update('cotizaciones', $data);
        
	return $id;
    }    
    
    public function get_item($id){
        
        $this->db->where(array('id_cotizacion'=>$id,'activo'=>1));
        $query= $this->db->get('cotizaciones');
        
        $row = $query->custom_row_object(0, 'Cotizaciones_model');
       
        return $row;
    }
    
    public function get_item_estado($id){
        
        $this->db->select('*');
        $this->db->from('cotizaciones');
        $this->db->join('estados', 'estados.id_estado = cotizaciones.id_estado',  'left');
        $this->db->where('id_cotizacion',$id);
        $this->db->where('cotizaciones.activo',1);
        $query = $this->db->get();        
       
        return $query->result(); 
    }
    
    
    public function estados(){
        $this->db->where('activo',1);
        $this->db->where('id_estado !=',1);
        $this->db->where('id_estado !=',3);
        $this->db->from("estados");
        
        $query = $this->db->get();
            
        return $query->result(); 
        
    }


    public function total_registros() {
        //return $this->db->count_all('cotizaciones');    
        
        $this->db->where('activo',1);
        $this->db->from("cotizaciones");
        
        return $this->db->count_all_results();

    }
    public function count_trans($idCotizacion="") {
        
        $this->db->select('transaccion.fechac');
        $this->db->select('transaccion.id_cotizacion');
        $this->db->select('users.username');
        $this->db->select('operaciones.nombre');
        $this->db->from('transaccion');
        $this->db->join('users', 'users.id = transaccion.id_usuario', 'inner');
        $this->db->join('operaciones', 'operaciones.id_operacion = transaccion.id_operacion', 'inner');   
        if(!empty($idCotizacion)){
            $this->db->where('transaccion.id_cotizacion',$idCotizacion);
        }
        //$this->db->distinct();
        //echo $this->db->last_query();

        return $this->db->count_all_results();

    }
    
    public function fetch_cotizaciones($limit, $start,$idCotizacion="") {
        $this->db->limit($limit, $start);
        $this->db->select('transaccion.fechac');
        $this->db->select('transaccion.id_cotizacion');
        $this->db->select('users.username');
        $this->db->select('operaciones.nombre');
        $this->db->from('transaccion');
        $this->db->join('users', 'users.id = transaccion.id_usuario', 'inner');
        $this->db->join('operaciones', 'operaciones.id_operacion = transaccion.id_operacion', 'inner'); 
        if(!empty($idCotizacion)){
            $this->db->where('transaccion.id_cotizacion',$idCotizacion);
        }
        $this->db->order_by("transaccion.fechac");
        $query= $this->db->get();
        
        //echo $this->db->last_query();
        
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
    
/*
    function get_by_id($id) {
        $query = $this->db->where('id_categoria', $id);
        $query = $this->db->get('admin_categorias');
        return $query->result();
    }
*/




}
