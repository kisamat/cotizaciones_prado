 <?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Notidesta_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_todos() {
        $query = $this->db->query("SELECT * FROM admin_noticias where isactive = 1 order by fechac DESC;");   
        //$query = $this->db->get('espacios');
        return $query->result();
    }

    function get_by_id($id) {
        $query = $this->db->query("SELECT * FROM admin_noticias where id_noticia =".$id);   
        //$query = $this->db->get('espacios');
        return $query->result();
    }
    
    function get_notides() {
        $query = $this->db->query("SELECT id_notidest FROM admin_notidest where isactive = 1 order by fechac DESC;");   
        //$query = $this->db->get('espacios');
        return $query->result();
    }  
    
    function get_notides_esp() {
        $query = $this->db->query("SELECT posicion as pos, id_noticia as notides FROM `admin_notidest` WHERE isactive = 1 order by fechac DESC;");   
        //$query = $this->db->get('espacios');
        return $query->result();
    } 
    
    function add($cuadro) {	
        
        $data['id_noticia']= $cuadro['notidesta'];
        $data['posicion']= $cuadro['pos'];
                
        $this->db->insert('admin_notidest', $data);

        return $this->db->insert_id();
    }
    
    function edit($cuadro) {
        $timestamp = date('Y-m-d G:i:s');        
        
        $data['fechad']= $timestamp;
        $data['isactive'] = 0;
        $this->db->where('id_notidest', $cuadro->id_notidest);
        $this->db->update('admin_notidest', $data);
                
        return $this->db->insert_id();
    }
    
}
