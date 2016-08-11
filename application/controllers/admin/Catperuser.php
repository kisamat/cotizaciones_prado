<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Catperuser extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->helper(array('url', 'language'));

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->load->model('admin/Catperuser_model');
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

            $this->smarty1->assign("categorias", $this->Catperuser_model->get_todos());
            $this->smarty1->assign("title", 'Categorias Perfil de Usuario');
            $this->smarty1->assign("class", "fa fa-shield");
            //Se carga el Template Users
            $this->smarty1->view('admin/catperuser/catperuser');
        }
    }

    // create a new category
    function crear_catperuser() {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
          redirect('admin/auth', 'refresh');
        }
        //Set the menu according with the type of user
        $this->data['listado'] = $this->ion_auth->menu_group($this->ion_auth->is_admin());

        // validate form input
        $this->form_validation->set_rules('nombre', 'Nombre Categoria', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            $id_insertado = $this->Catperuser_model->add();
            // check to see if we are creating the group
            // redirect them back to the admin page

            if ($id_insertado) {
                $this->session->set_flashdata('message', 'Categoría Creada Exitósamente');
                redirect("admin/catperuser", 'refresh');
            }
        } else {
            // display the create group form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $this->data['nombre'] = array(
                'name' => 'nombre',
                'id' => 'nombre',
                'class' => 'form-control',
                'placeholder' => 'Nombre de la Categoria',
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
            $this->smarty1->assign("title", 'Crear Categoria Perfil de Usuario');
            $this->smarty1->assign("class", "fa fa-shield");
            $this->smarty1->view('admin/catperuser/crear_catperuser');
        }
    }
    // edit a category
    function editar_catperuser($id) {

        // bail if no group id given
        if (!$id || empty($id) || !is_numeric($id)) {
            redirect('admin/catperuser', 'refresh');
        }
        //Set the menu according with the type of user
        $this->data['listado'] = $this->ion_auth->menu_group($this->ion_auth->is_admin());

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admin/auth', 'refresh');
        }

        $categoria = $this->Catperuser_model->get_by_id($id);
        if (empty($categoria)) {
            redirect('admin/catperuser', 'refresh');
        }

        // validate form input
        $this->form_validation->set_rules('nombre', 'Nombre Categoria', 'trim|required');

        if (isset($_POST) && !empty($_POST)) {
            if ($this->form_validation->run() === TRUE) {
                $categoria_update = $this->Catperuser_model->edit($id);
		
                if ($categoria_update) {
                    $this->session->set_flashdata('message', 'Categoria Editada Exitósamente');
                } else {
                    $this->session->set_flashdata('message', 'Error al Editar Categoria');
                }
                redirect("admin/catperuser", 'refresh');
            }
        }

        $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

        $this->data['nombre'] = array(
            'name' => 'nombre',
            'id' => 'nombre',
            'class' => 'form-control',
            'placeholder' => 'Nombre de la Categoria',
            'type' => 'text',
            'value' => $this->form_validation->set_value('nombre', $categoria[0]->nombre)
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
        $this->smarty1->assign("title", 'Editar Categoria Perfil de Usuario');
        $this->smarty1->assign("class", "fa fa-shield");
        $this->smarty1->view('admin/catperuser/editar_catperuser');
    }

    // delete a category
    function borrar_catperuser($id) {
        // bail if no category id given
        if (!$id || empty($id) || !is_numeric($id)) {
            redirect('admin/catperuser', 'refresh');
        }

        //Set the menu according with the type of user
        $this->data['listado'] = $this->ion_auth->menu_group($this->ion_auth->is_admin());

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admin/auth', 'refresh');
        }

        $categoria = $this->Catperuser_model->get_by_id($id);
        if (empty($categoria)) {
            redirect('admin/catperuser', 'refresh');
        }

        if ($this->input->post()) {
            if ($this->input->post('confirm') == 'yes') {                
 		$categoria_delete = $this->Catperuser_model->elim($id);
		
                if ($categoria_delete) {
                    $this->session->set_flashdata('message', 'Categoria Eliminada Exitósamente');
                } else {
                    $this->session->set_flashdata('message', 'Error al Eliminar Categoria');
                }

                redirect('admin/catperuser');
            } else {
                redirect('admin/catperuser');
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
        $this->smarty1->assign("categoria", $categoria[0]);
        $this->smarty1->assign("button", $this->data['button']);
        $this->smarty1->assign("title", 'Eliminar Categoria Perfil de Usuario');
        $this->smarty1->assign("class", "fa fa-shield");
        $this->smarty1->view('admin/catperuser/borrar_catperuser');
    }

}
