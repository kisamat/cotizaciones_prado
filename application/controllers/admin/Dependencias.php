<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dependencias extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->helper(array('url', 'language'));

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->load->model('admin/Dependencias_model');
        $this->lang->load('auth');
    }

    // redirect if needed, otherwise display the user list
    function index() {


        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('admin/auth/login', 'refresh');
        } elseif (!$this->ion_auth->is_admin()) { // remove this elseif if you want to enable this for non-admins

            //Set the menu according with the type of user
            $this->smarty1->assign("listado", $this->ion_auth->menu_group($this->ion_auth->is_admin()));
            // set the flash data error message if there is one
            $this->smarty1->assign("message", (validation_errors()) ? validation_errors() : $this->session->flashdata('message'));
            //Load the view
            redirect('admin/auth', 'refresh');

        } else {

            //Set the menu according with the type of user
            $this->smarty1->assign("listado", $this->ion_auth->menu_group($this->ion_auth->is_admin()));
            // set the flash data error message if there is one
            $this->smarty1->assign("message", (validation_errors()) ? validation_errors() : $this->session->flashdata('message'));

            //Se asignan los usuarios a las variable $users

            $this->smarty1->assign("dependencias", $this->Dependencias_model->get_todos());
            $this->smarty1->assign("title", 'Dependencias');
            $this->smarty1->assign("class", "fa fa-tasks");
            //Se carga el Template Users
            $this->smarty1->view('admin/dependencias/dependencias');
        }
    }

    // create a new user
    function crear_dependencia() {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
          redirect('admin/auth', 'refresh');
        }
        //Set the menu according with the type of user
        $this->data['listado'] = $this->ion_auth->menu_group($this->ion_auth->is_admin());

        // validate form input
        $this->form_validation->set_rules('nombre', 'Nombre Dependencia', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            $id_insertado = $this->Dependencias_model->add();
            // check to see if we are creating the group
            // redirect them back to the admin page

            if ($id_insertado) {
                $this->session->set_flashdata('message', 'Dependencia Creada Exitósamente');
                redirect("admin/dependencias", 'refresh');
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

            $this->data['button'] = array(
                'class' => 'btn btn-success',
                'name' => 'enviar',
                'value' => 'Enviar'
            );
            $this->smarty1->assign("listado", $this->data['listado']);
            $this->smarty1->assign("message", $this->data['message']);
            $this->smarty1->assign("nombre", $this->data['nombre']);
            $this->smarty1->assign("button", $this->data['button']);
            $this->smarty1->assign("title", 'Crear Dependencia');
            $this->smarty1->assign("class", "fa fa-tasks");
            $this->smarty1->view('admin/dependencias/crear_dependencia');
        }
    }
    // edit a user
    function editar_dependencia($id) {

        // bail if no group id given
        if (!$id || empty($id) || !is_numeric($id)) {
            redirect('admin/dependencias', 'refresh');
        }
        //Set the menu according with the type of user
        $this->data['listado'] = $this->ion_auth->menu_group($this->ion_auth->is_admin());

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admin/auth', 'refresh');
        }

        $dependencia = $this->Dependencias_model->get_by_id($id);
        if (empty($dependencia)) {
            redirect('admin/dependencias', 'refresh');
        }

        // validate form input
        $this->form_validation->set_rules('nombre', 'Nombre Dependencia', 'trim|required');

        if (isset($_POST) && !empty($_POST)) {
            if ($this->form_validation->run() === TRUE) {
                $dependencia_update = $this->Dependencias_model->edit($id);

                if ($dependencia_update) {
                    $this->session->set_flashdata('message', 'Dependencia Editada Exitósamente');
                } else {
                    $this->session->set_flashdata('message', 'Error al Editar Dependencia');
                }
                redirect("admin/dependencias", 'refresh');
            }
        }

        $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

        $this->data['nombre'] = array(
            'name' => 'nombre',
            'id' => 'nombre',
            'class' => 'form-control',
            'placeholder' => 'Nombre de la Dependencia',
            'type' => 'text',
            'value' => $this->form_validation->set_value('nombre', $dependencia[0]->nombre)
        );

        $this->data['button'] = array(
            'class' => 'btn btn-success',
            'name' => 'enviar',
            'value' => 'Enviar'
        );

        $this->smarty1->assign("listado", $this->data['listado']);
        $this->smarty1->assign("message", $this->data['message']);
        $this->smarty1->assign("nombre", $this->data['nombre']);
        $this->smarty1->assign("button", $this->data['button']);
        $this->smarty1->assign("title", 'Editar Dependencia');
        $this->smarty1->assign("class", "fa fa-tasks");
        $this->smarty1->view('admin/dependencias/editar_dependencia');
    }

    // Eliminar Dependencia
    function borrar_dependencia($id) {
        // bail if no group id given
        if (!$id || empty($id) || !is_numeric($id)) {
            redirect('admin/dependencias', 'refresh');
        }

        //Set the menu according with the type of user
        $this->data['listado'] = $this->ion_auth->menu_group($this->ion_auth->is_admin());

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admin/auth', 'refresh');
        }

        $dependencia = $this->Dependencias_model->get_by_id($id);
        if (empty($dependencia)) {
            redirect('admin/dependencias', 'refresh');
        }

        if ($this->input->post()) {
            if ($this->input->post('confirm') == 'yes') {
                
		$dependencia_delete = $this->Dependencias_model->elim($id);
		
                if ($dependencia_delete) {
                    $this->session->set_flashdata('message', 'Dependencia Eliminada Exitósamente');
                } else {
                    $this->session->set_flashdata('message', 'Error al Eliminar Dependencia');
                }

                redirect('admin/dependencias');
            } else {
                redirect('admin/dependencias');
            }
        }

        $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

        $this->data['button'] = array(
            'class' => 'btn btn-success',
            'name' => 'enviar',
            'value' => 'Enviar'
        );

        $this->smarty1->assign("listado", $this->data['listado']);
        $this->smarty1->assign("message", $this->data['message']);
        $this->smarty1->assign("dependencia", $dependencia[0]);
        $this->smarty1->assign("button", $this->data['button']);
        $this->smarty1->assign("title", 'Eliminar Dependencia');
        $this->smarty1->assign("class", "fa fa-tasks");
        $this->smarty1->view('admin/dependencias/borrar_dependencia');
    }

}
