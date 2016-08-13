<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Espacios extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->helper(array('url', 'language'));

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->load->model('admin/Espacios_model');
        $this->lang->load('auth');
        $this->idmenu = $this->uri->segment(4);
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

            $this->smarty1->assign("padres", $this->Espacios_model->get_padres());
            $this->smarty1->assign("hijos", $this->Espacios_model->get_hijos());
            $this->smarty1->assign("title", 'Espacios');
            $this->smarty1->assign("class", "fa fa-fw fa-sitemap");
            $this->smarty1->assign("idmenu", $this->idmenu);
            //Se carga el Template Users
            $this->smarty1->view('admin/espacios/espacios');
        }
    }

    // create a new space
    function crear_espacio() {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admin/auth', 'refresh');
        }
        //Set the menu according with the type of user
        $this->data['listado'] = $this->ion_auth->menu_group($this->ion_auth->is_admin());

        // validate form input
        $this->form_validation->set_rules('nombre', 'Nombre Espacio', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            $id_insertado = $this->Espacios_model->add();
            // check to see if we are creating the group
            // redirect them back to the admin page

            if ($id_insertado) {
                $this->session->set_flashdata('message', 'Espacio Creado Exitósamente');
                redirect("admin/espacios", 'refresh');
            }
        } else {
            // display the create group form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $this->data['padres'] = $this->Espacios_model->get_padres();


            $padres=array();
            $padres["0"]="Selecciona Uno...";
            foreach($this->data['padres'] as $padre){
            $padres[$padre->id_espacio]=$padre->nombre;
            }

            $this->data['id_padre'] = array(
                'name' => 'id_padre',
                'id' => 'id_padre',
                'class' => 'form-control',
            );

            $this->data['nombre'] = array(
                'name' => 'nombre',
                'id' => 'nombre',
                'class' => 'form-control',
                'placeholder' => 'Nombre del Espacio',
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
            $this->smarty1->assign("id_padre", $this->data['id_padre']);
            $this->smarty1->assign("nombre", $this->data['nombre']);
            $this->smarty1->assign("button", $this->data['button']);
            $this->smarty1->assign("padres", $padres);
            $this->smarty1->assign("title", 'Crear Espacio');
            $this->smarty1->assign("class", "fa fa-fw fa-sitemap");
            $this->smarty1->assign("idmenu", $this->idmenu);
            $this->smarty1->view('admin/espacios/crear_espacio');
        }
    }
    // edit a user
    function editar_espacio($id) {

        // bail if no group id given
        if (!$id || empty($id) || !is_numeric($id)) {
            redirect('admin/espacios', 'refresh');
        }
        //Set the menu according with the type of user
        $this->data['listado'] = $this->ion_auth->menu_group($this->ion_auth->is_admin());

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admin/auth', 'refresh');
        }

        $espacio = $this->Espacios_model->get_by_id($id);
        if (empty($espacio)) {
            redirect('admin/espacios', 'refresh');
        }

        // validate form input
        $this->form_validation->set_rules('nombre', 'Nombre Espacio', 'trim|required');

        if (isset($_POST) && !empty($_POST)) {
            if ($this->form_validation->run() === TRUE) {
                $espacio_update = $this->Espacios_model->edit($id);

                if ($espacio_update) {
                    $this->session->set_flashdata('message', 'Espacio Editado Exitósamente');

                } else {
                    $this->session->set_flashdata('message', 'Error al Editar Espacio');

                }

                redirect("admin/espacios", 'refresh');
            }
        }

        $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

        $this->data['padres'] = $this->Espacios_model->get_padres();

        $padres=array();
        $padres["0"]="Selecciona Uno...";
        foreach($this->data['padres'] as $padre){
        $padres[$padre->id_espacio]=$padre->nombre;
        }

        $this->data['id_padre'] = array(
            'name' => 'id_padre',
            'id' => 'id_padre',
            'class' => 'form-control'
        );

        $this->data['nombre'] = array(
        'name' => 'nombre',
        'id' => 'nombre',
        'class' => 'form-control',
        'placeholder' => 'Nombre del Espacio',
        'type' => 'text',
        'value' => $this->form_validation->set_value('nombre', $espacio[0]->nombre)
        );

        $this->data['button'] = array(
            'class' => 'btn btn-success',
            'name' => 'enviar',
            'value' => 'Enviar'
        );

        $this->smarty1->assign("listado", $this->data['listado']);
        $this->smarty1->assign("message", $this->data['message']);
        $this->smarty1->assign("nombre", $this->data['nombre']);
        $this->smarty1->assign("id_padre", $this->data['id_padre']);
        $this->smarty1->assign("button", $this->data['button']);
        $this->smarty1->assign("padres", $padres);
        $this->smarty1->assign("valor", $espacio[0]->id_padre);
        $this->smarty1->assign("title", 'Editar Espacio');
        $this->smarty1->assign("class", "fa fa-fw fa-sitemap");
        $this->smarty1->view('admin/espacios/editar_espacio');
    }

    // create a new group
    function borrar_espacio($id) {
        // bail if no group id given
        if (!$id || empty($id) || !is_numeric($id)) {
            redirect('admin/espacios', 'refresh');
        }

        //Set the menu according with the type of user
        $this->data['listado'] = $this->ion_auth->menu_group($this->ion_auth->is_admin());

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admin/auth', 'refresh');
        }

        $espacio = $this->Espacios_model->get_by_id($id);
        if (empty($espacio)) {
            redirect('admin/espacios', 'refresh');
        }

        $alone = $this->Espacios_model->get_alone($id);
        $opcion=array_shift($alone);

        if ($this->input->post()) {
            if ($this->input->post('confirm') == 'yes') {                

		$espacio_delete = $this->Espacios_model->elim($id);

                if ($espacio_delete) {
                    $this->session->set_flashdata('message', 'Espacio Eliminado Exitósamente');

                } else {
                    $this->session->set_flashdata('message', 'Error al Eliminar Espacio');
                }

                redirect('admin/espacios');
            } else {
                redirect('admin/espacios');
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
        $this->smarty1->assign("espacio", $espacio[0]);
        $this->smarty1->assign("opcion", $opcion->conteo);
        $this->smarty1->assign("button", $this->data['button']);
        $this->smarty1->assign("title", 'Eliminar Espacio');
        $this->smarty1->assign("class", "fa fa-fw fa-sitemap");
        $this->smarty1->view('admin/espacios/borrar_espacio');
    }

}
