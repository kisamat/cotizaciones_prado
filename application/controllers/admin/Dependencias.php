<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dependencias extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation','pagination'));
        $this->load->helper(array('url', 'language'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->load->model('admin/Dependencias_model');
        $this->lang->load('auth');
        $this->idmenu = $this->uri->segment(4);
        $this->listado= $this->ion_auth->menu_group($this->ion_auth->user()->row());
    }

    // redirect if needed, otherwise display the user list
    function index() {
            $this->ion_auth->validate_login();
            //Set the menu according with the type of user
            $totalreg=$this->Dependencias_model->total_registros();
            $this->smarty1->assign("listado", $this->listado);
            $this->smarty1->assign("data", $this->Dependencias_model->listar_todos());
            $this->smarty1->assign("title", 'Dependencias hotel el prado');
            $this->smarty1->assign("idmenu", $this->idmenu);
            $this->smarty1->view('admin/dependencias/master');

    }

    // create a new category
    function crear() {
        $this->ion_auth->validate_login();
        
        
        
        //Set the menu according with the type of user
        
        
        $this->form_validation->set_rules('nombre', 'Nombre de la Dependencia', 'trim|required');
        $this->form_validation->set_rules('descripcion', 'Descripcion del Dependencia', 'trim|required');        
        $this->form_validation->set_rules('jefe', 'Jefe de la Dependencia', 'trim|required');
        $this->form_validation->set_rules('correo', 'Correo de la Dependencia', 'trim|required|valid_email');

        if ($this->form_validation->run() == TRUE) {
            $data['nombre']=$this->input->post('nombre');
            $data['descripcion']=$this->input->post('descripcion');
            $data['jefe']=$this->input->post('jefe');
            $data['correo']=$this->input->post('correo');

            $salon = $this->Dependencias_model->set_datos($data);
            $id_insertado = $salon->add();
            
            
            // check to see if we are creating the group
            // redirect them back to the admin page

            if ($id_insertado) {
                $this->session->set_flashdata('message', 'Categoría Creada Exitósamente');
                redirect("admin/dependencias/index/".$this->idmenu, 'refresh');
            }
        } else {
            // display the create group form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $this->data['nombre'] = array(
                'name' => 'nombre',
                'id' => 'nombre',
                'class' => 'form-control',
                'placeholder' => 'Nombre de la Dependencia',
                'type' => 'text',
                'value' => $this->form_validation->set_value('nombre'),
            );
            $this->data['descripcion']= array(
                'name' => 'descripcion',
                'id' => 'descripcion',
                'class' => 'form-control',
                'placeholder' => 'Descripcion de la Dependencia',
                'type' => 'textarea',
                'value' => $this->form_validation->set_value('descripcion'),
            );
            
            $this->data['jefe']= array(
                'name' => 'jefe',
                'id' => 'jefe',
                'class' => 'form-control',
                'placeholder' => 'Jefe de la Dependencia',
                'type' => 'textarea',
                'value' => $this->form_validation->set_value('jefe'),
            );
            
            $this->data['correo']= array(
                'name' => 'correo',
                'id' => 'correo',
                'class' => 'form-control',
                'placeholder' => 'Correo de la Dependencia',
                'type' => 'textarea',
                'value' => $this->form_validation->set_value('correo'),
            );

            $this->data['button'] = array(
                'class' => 'btn btn-success',
                'name' => 'enviar',
                'value' => 'Enviar'
            );
            $this->smarty1->assign("listado", $this->listado);
            $this->smarty1->assign("message", $this->data['message']);
            $this->smarty1->assign("nombre", $this->data['nombre']);
            $this->smarty1->assign("descripcion", $this->data['descripcion']);
            
            $this->smarty1->assign("jefe", $this->data['jefe']);
            $this->smarty1->assign("correo", $this->data['correo']);
            
            $this->smarty1->assign("button", $this->data['button']);
            $this->smarty1->assign("title", 'Crear Dependencia');
            $this->smarty1->assign("idmenu", $this->idmenu);
            $this->smarty1->view('admin/dependencias/form_categoria');
        }
    }
    // edit a category
    function editar() {
        $this->ion_auth->validate_login();
        
        $iditem= $this->uri->segment(5);
        
        //Set the menu according with the type of user
        $this->form_validation->set_rules('nombre', 'Nombre de la Dependencia', 'trim|required');
        $this->form_validation->set_rules('descripcion', 'Descripcion del Dependencia', 'trim|required');
        $this->form_validation->set_rules('jefe', 'Jefe de la Dependencia', 'trim|required');
        $this->form_validation->set_rules('correo', 'Correo de la Dependencia', 'trim|required|valid_email');
        
        if ($this->form_validation->run() === TRUE) {
                
                $data['nombre']=$this->input->post('nombre');
                $data['descripcion']=$this->input->post('descripcion');
                $data['jefe']=$this->input->post('jefe');
                $data['correo']=$this->input->post('correo');
                
                $salon = $this->Dependencias_model->set_datos($data);

                $id_insertado = $salon->edit($iditem,$data);

		
                if ($id_insertado) {
                    $this->session->set_flashdata('message', 'item editado Exitósamente');
                } else {
                    $this->session->set_flashdata('message', 'Error al editar el item');
                }

                redirect("admin/dependencias/index/".$this->idmenu, 'refresh');
        }
        
        $datos= $this->Dependencias_model->get_item($iditem);

        $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

        $this->data['nombre'] = array(
            'name' => 'nombre',
            'id' => 'nombre',
            'class' => 'form-control',
            'placeholder' => 'Nombre de la Dependencia',
            'type' => 'text',
            'value' => $this->form_validation->set_value('nombre',$datos->nombre),
        );
        $this->data['descripcion']= array(
            'name' => 'descripcion',
            'id' => 'descripcion',
            'class' => 'form-control',
            'placeholder' => 'Descripcion del Dependencia',
            'type' => 'textarea',
            'value' => $this->form_validation->set_value('descripcion',$datos->descripcion),
        );

         $this->data['jefe']= array(
                'name' => 'jefe',
                'id' => 'jefe',
                'class' => 'form-control',
                'placeholder' => 'Jefe de la Dependencia',
                'type' => 'textarea',
                'value' => $this->form_validation->set_value('jefe',$datos->jefe),
            );
            
            $this->data['correo']= array(
                'name' => 'correo',
                'id' => 'correo',
                'class' => 'form-control',
                'placeholder' => 'Correo de la Dependencia',
                'type' => 'textarea',
                'value' => $this->form_validation->set_value('correo',$datos->correo),
            );
        
        $this->data['button'] = array(
            'class' => 'btn btn-success',
            'name' => 'enviar',
            'value' => 'Enviar'
        );
        
        $this->smarty1->assign("listado", $this->listado);
        $this->smarty1->assign("message", $this->data['message']);
        $this->smarty1->assign("nombre", $this->data['nombre']);
        $this->smarty1->assign("descripcion", $this->data['descripcion']);
        $this->smarty1->assign("jefe", $this->data['jefe']);
        $this->smarty1->assign("correo", $this->data['correo']);
        $this->smarty1->assign("button", $this->data['button']);
        $this->smarty1->assign("title", 'Editar Dependencia');
        $this->smarty1->assign("idmenu", $this->idmenu);
        $this->smarty1->view('admin/dependencias/form_categoria');
    }

    // delete a category
    function borrar() {
        
        $this->ion_auth->validate_login();
        
        $iditem= $this->uri->segment(5);
        
         
        // bail if no category id given
        if (!$iditem || empty($iditem) || !is_numeric($iditem)) {
            redirect('admin/dependencias/index/'.$this->idmenu, 'refresh');
        }
        
        $categoria_delete = $this->Dependencias_model->delete($iditem);
	
        redirect('admin/dependencias/index/'.$this->idmenu);
    }

}
