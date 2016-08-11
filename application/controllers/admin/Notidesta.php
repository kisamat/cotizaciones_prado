<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Notidesta extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->helper(array('url', 'language'));

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->load->model('admin/Notidesta_model');
        $this->lang->load('auth');
    }

    // redirect if needed, otherwise display the user list
    function index() {

        if (!$this->ion_auth->logged_in()) {

            // redirect them to the login page
            redirect('admin/auth/login', 'refresh');
        }  else {
        //Set the menu according with the type of user
        $this->data['listado'] = $this->ion_auth->menu_group($this->ion_auth->is_admin());

            // set the flash data error message if there is one
        $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

        if (!empty($this->session->options)){
            $tipo=1;
            $notidesord=  $this->pintar($tipo);
            $this->smarty1->assign("notides", $notidesord);
        }    

       if (!empty($this->session->fijas)){
            $tipo=2;
            $notidesord=  $this->pintar($tipo);
            $this->smarty1->assign("fijas", $notidesord);
        } 

        $cuadro_actual=$this->Notidesta_model->get_notides_esp();
       
        if (!empty($cuadro_actual)){
            
             $notides= array();     
            foreach ($cuadro_actual as $temp){
                $notidest=$this->get_noticia($temp->notides);
                $notidesta=  array_shift($notidest);                 
                $opciones=array(
                   'pos'=>$temp->pos,
                   'titulo'=>$notidesta->titulo,
                   'imagen'=>$notidesta->archivo,         
                );

                array_push($notides, $opciones);
            }
                $notidesord= $this->ordenar($notides);                   
             
            $this->smarty1->assign("antiguas", $notidesord);
        }
        /*
         echo '<pre>';
          print_r($notidesord);
          echo '</pre>';
        exit();
*/

        $this->smarty1->assign("listado", $this->data['listado']);
        $this->smarty1->assign("message", $this->data['message']);

        $this->smarty1->assign("title", 'Crear Noticias Destacadas');
        $this->smarty1->assign("class", "fa fa-archive");
        $this->smarty1->view('admin/notidesta/notidesta');
        }
        
    }

    function crear_notidesta($pos) {

        if (!$this->ion_auth->logged_in()) {
            redirect('admin/auth/users', 'refresh');
        }
        //Set the menu according with the type of user
        $this->data['listado'] = $this->ion_auth->menu_group($this->ion_auth->is_admin());
      
        /*
        if($pos != 2 || $pos != 4 || $pos != 6 || $pos != 8 ){
           redirect("admin/notidesta");            
        }  
        */
        // validate form input
        $this->form_validation->set_rules('notidesta', 'Nombre Noticia Destacada', 'trim|required');

        $opciones= array();
        
        if ($this->form_validation->run() == TRUE) {
                        
            if (empty($this->session->options)){

                $opciones=array(
               'pos'=>$this->input->post('pos'),
               'notidesta'=>$this->input->post('notidesta'),                
            );
            
                
            $post_array[]=$opciones;
            
            $this->session->set_userdata('options', $post_array); 
            $this->session->set_flashdata('message', 'La noticia seleccionada se creo exitosamente en la Posición: '.$opciones['pos']);

               
            }else{
                
                $opciones=array(
               'pos'=>$this->input->post('pos'),
               'notidesta'=>$this->input->post('notidesta'),                
                );
                if($this->validar_data($opciones)==2){
                    $post_array=$this->session->options;
                    $post_array[]=$opciones;
                    
                    $this->session->set_userdata('options', $post_array);
                    $this->session->set_flashdata('message', 'La noticia seleccionada se creo exitosamente en la Posición: '.$opciones['pos']);

                }elseif ($this->validar_data($opciones)==1) {
                    $post_array=$this->reemplazar($opciones);
                    $this->session->set_userdata('options', $post_array);
                    $this->session->set_flashdata('message', 'En la Posición: '.$opciones['pos'].' La noticia fue cambiada exitosamente a la noticia: '. $opciones['notidesta']);
                }                
            }            
           redirect("admin/notidesta", 'refresh');
        
        } else {
            // display the create group form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $this->data['notides'] = $this->Notidesta_model->get_todos();
            $notidestas = array();
            $notidestas[""] = "Selecciona Uno...";
            foreach ($this->data['notides'] as $notides) {
                $notidestas[$notides->id_noticia] = $notides->titulo;
            }

            $this->data['notidesta'] = array(
                'name' => 'notidesta',
                'id' => 'notidesta1',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('notidesta'),
            );

            $this->data['button'] = array(
                'class' => 'btn btn-success',
                'name' => 'enviar',
                'value' => 'Enviar'
            );
            $this->smarty1->assign("pos", $pos);
            $this->smarty1->assign("listado", $this->data['listado']);
            $this->smarty1->assign("message", $this->data['message']);
            $this->smarty1->assign("notidestas", $notidestas);
            $this->smarty1->assign("notidesta", $this->data['notidesta']);
            $this->smarty1->assign("button", $this->data['button']);
            $this->smarty1->assign("title", 'Agregar Noticia Destacada');
            $this->smarty1->assign("class", "fa fa-archive");
            $this->smarty1->view('admin/notidesta/crear_notidesta');
        }
    }
    
    function validar_data($opciones) {

        if (!$this->ion_auth->logged_in()) {
            redirect('admin/auth/users', 'refresh');
        }

        $temporal = $this->session->options;
        $valor=0;
        $conf=0;
        $elementos = count($temporal);

            foreach ($temporal as $temp) {

                if ($temp['notidesta'] == $opciones['notidesta'] && $temp['pos'] == $opciones['pos']) {
                    $this->session->set_flashdata('message', 'la noticia seleccionada ya se encuentra en esta Posición: '.$temp['pos']);
                    $valor= 0;                   
                    break;
                }elseif($temp['notidesta'] == $opciones['notidesta'] && $temp['pos'] != $opciones['pos']){
                   $this->session->set_flashdata('message', 'la noticia seleccionada ya se encuentra en la Posición: '.$temp['pos']);
                    $valor= 0;                   
                    break; 
                }elseif($temp['notidesta'] != $opciones['notidesta'] && $temp['pos'] == $opciones['pos']){                    
                    $valor= 1;
                    $conf=1;
                    // break;
                } else {
                    $valor= 2;
                }       
            }
       
            if ($conf==1 && $valor!=0 ){
                    $valor= 1;
            }
         
        return $valor;
    }

    function get_noticia($id){
        if (!$this->ion_auth->logged_in()) {
            redirect('admin/auth/users', 'refresh');
        }
        $noticia = $this->Notidesta_model->get_by_id($id);
        return $noticia;
    }
    
    function ordenar($notides) {
        if (!$this->ion_auth->logged_in()) {
            redirect('admin/auth/users', 'refresh');
        }

        foreach ($notides as $key => $row) {
            $pociciones[$key] = $row['pos'];
        }
        array_multisort($notides, SORT_ASC, $pociciones);
        $notidesord = $notides;
        
        return $notidesord;
    }

    function limpiar() {
        if (!$this->ion_auth->logged_in()) {
            redirect('admin/auth/users', 'refresh');
        }
        $this->session->unset_userdata('options');
        $this->session->unset_userdata('fijas');
        $this->session->unset_userdata('cuadricula');
        redirect("admin/notidesta");
    }
    
    function reemplazar($opciones) {
        if (!$this->ion_auth->logged_in()) {
            redirect('admin/auth/users', 'refresh');
        }
        $temporal = $this->session->options;
        
         foreach ($temporal as $temp) {
            if($temp['pos']==$opciones['pos']){
                $final[]=$opciones;
            }else{
                $final[]=$temp;
            }
         }
        return $final;               
    }
    
    function pintar($tipo) {
        if (!$this->ion_auth->logged_in()) {
            redirect('admin/auth/users', 'refresh');
        }
        if($tipo==1){
            $temporal=$this->session->options;                    
        }elseif ($tipo==2) {
            $temporal=$this->session->fijas;                  
        }
                
        $notides= array();     
            foreach ($temporal as $temp){
                $notidest=$this->get_noticia($temp['notidesta']);
                $notidesta=  array_shift($notidest);                 
                $opciones=array(
                   'pos'=>$temp['pos'],
                   'titulo'=>$notidesta->titulo,
                   'imagen'=>$notidesta->archivo,         
                );

                array_push($notides, $opciones);
            }
                $notidesord= $this->ordenar($notides);                   
                return $notidesord;
    }
    
    function completar() {
        if (!$this->ion_auth->logged_in()) {
            redirect('admin/auth/users', 'refresh');
        }
        $temporal = $this->session->options;
       // $total = $this->Notidesta_model->get_todos();
        $cuenta=  count($temporal);
        if($cuenta!=4){
            $this->session->set_flashdata('message', 'Debe cargar las cuatro noticias fijas primero antes de cargar las demas');       
            redirect("admin/notidesta");              
        }        
        
        $this->data['total'] = $this->Notidesta_model->get_todos();
        $totales = array();
        foreach ($this->data['total'] as $total) {
            $opciones=array(
               'id_noticia'=>$total->id_noticia,                      
                );            
            $totales[] = $opciones;
        }
        
        $iteracion=1;
        foreach ($totales as $tot) {
           
                if ($tot['id_noticia'] != $temporal[0]['notidesta'] && $tot['id_noticia'] != $temporal[1]['notidesta'] && $tot['id_noticia'] != $temporal[2]['notidesta'] && $tot['id_noticia'] != $temporal[3]['notidesta']) {                    
                    
                    $opciones=array(
                   'pos'=>$iteracion,      
                   'notidesta'=>$tot['id_noticia'],                      
                    );  
                    
            $final[] = $opciones;
             $iteracion= $iteracion+2;   
            }
        }
        
        $salida = array_slice($final, 0, 5); 
        
        $resultante= array_merge($temporal, $salida);
        
        $resul_orden= $this->ordenar($resultante);
        
        $this->session->set_userdata('fijas', $salida); 
        $this->session->set_userdata('cuadricula', $resul_orden); 
        
         redirect("admin/notidesta");
    }
    
    function aplicar() {
        if (!$this->ion_auth->logged_in()) {
            redirect('admin/auth/users', 'refresh');
        }
        
        $cuadricula=$this->session->cuadricula;
        
         $cuenta=  count($cuadricula);
        if($cuenta!=9){
            $this->session->set_flashdata('message', 'Debe cargar las cuatro noticias fijas y luego generar la cuadricula antes de cargar las demas');       
            redirect("admin/notidesta");              
        }    
        
        
        $base=  $this->Notidesta_model->get_notides();
      
        if (empty($base)){
            
            foreach ($cuadricula as $cuadro){
                $this->Notidesta_model->add($cuadro);
            }
            
        }else{
            
            foreach ($base as $cuadro){
                $this->Notidesta_model->edit($cuadro);
            }
                        
            foreach ($cuadricula as $cuadro){
                $this->Notidesta_model->add($cuadro);
            }     
        }
        
        $this->session->set_flashdata('message', 'Se ha generado una nueva cuadricula');
        $this->limpiar();
        redirect("admin/notidesta");
    }
    

}
