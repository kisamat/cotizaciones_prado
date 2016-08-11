<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->helper(array('url', 'language'));

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->load->model('admin/Agenda_model');
        $this->lang->load('auth');
    }

    // redirect if needed, otherwise display the user list
    function index() {

        if (!$this->ion_auth->logged_in()) {

            // redirect them to the login page
            redirect('admin/auth/login', 'refresh');
        } else {

            $this->data['eventos'] = $this->Agenda_model->get_all();

            $eventsArray = array();
            
            foreach ($this->data['eventos'] as $evento) {
                $eventsArray['id'] = $evento->id_evento;
                $eventsArray['title'] = $evento->titulo;
                $eventsArray['start'] = $evento->fechai . " " . $evento->horai;
                $eventsArray['end'] = $evento->fechaf . " " . $evento->horaf;
                $eventsArray['url'] = "javascript:editarEvento($evento->id_evento)";
                $eventsArray['allDay'] = false;
                $events[] = $eventsArray;
            }

            $this->smarty1->assign("jason", json_encode($events));

            //Set the menu according with the type of user
            $this->smarty1->assign("listado", $this->ion_auth->menu_group($this->ion_auth->is_admin()));
            // set the flash data error message if there is one
            $this->smarty1->assign("message", (validation_errors()) ? validation_errors() : $this->session->flashdata('message'));
            //Set the title of the template
            $this->smarty1->assign("title", "Agenda");
            $this->smarty1->assign("class", "fa fa-calendar");
            //Load the view
            $this->smarty1->view('admin/agenda/index');
        }
    }

    function crear_evento() {
        if (!$this->ion_auth->logged_in()) {
            redirect('admin/auth/users', 'refresh');
        }
        //Set the menu according with the type of user
        $this->data['listado'] = $this->ion_auth->menu_group($this->ion_auth->is_admin());

        // validate form input
        $this->form_validation->set_rules('categoria', 'Categoria del Evento', 'trim|required');
        $this->form_validation->set_rules('dependencia', 'Dependencia del Evento', 'trim|required');
        $this->form_validation->set_rules('tiprog', 'Tipos de Programación', 'trim|required');
        $this->form_validation->set_rules('instalacion', 'Instalacion del Evento', 'trim|required');
        $this->form_validation->set_rules('espacio', 'Espacio del Evento', 'trim|required');
        $this->form_validation->set_rules('titulo', 'Titulo del Evento', 'trim|required');
        $this->form_validation->set_rules('descripcion', 'Descripción del Evento', 'trim|required');
        $this->form_validation->set_rules('fechai', 'Fecha Inicial', 'trim|required');
        $this->form_validation->set_rules('horai', 'Hora Inicial', 'trim|required');
        $this->form_validation->set_rules('fechaf', 'Fecha Final', 'trim|required');
        $this->form_validation->set_rules('horaf', 'Hora Inicial', 'trim|required');
        if ($this->form_validation->run() == TRUE) {
            $id_insertado = $this->Agenda_model->add();
            // check to see if we are creating the group
            // redirect them back to the admin page

            if ($id_insertado) {
                $this->session->set_flashdata('message', 'Evento Creado Exitósamente');
                redirect("admin/agenda", 'refresh');
            }
        } else {
            // display the create group form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));


            $this->data['instalaciones'] = $this->Agenda_model->get_instalaciones();
            $instalaciones = array();
            $instalaciones[""] = "Selecciona Uno...";
            foreach ($this->data['instalaciones'] as $instalacion) {
                $instalaciones[$instalacion->id_espacio] = $instalacion->nombre;
            }

            $this->data['categorias'] = $this->Agenda_model->get_categorias();
            $categorias = array();
            $categorias[""] = "Selecciona Uno...";
            foreach ($this->data['categorias'] as $categoria) {
                $categorias[$categoria->id_categoria] = $categoria->nombre;
            }

            $this->data['dependencias'] = $this->Agenda_model->get_dependencias();
            $dependencias = array();
            $dependencias[""] = "Selecciona Uno...";
            foreach ($this->data['dependencias'] as $dependencia) {
                $dependencias[$dependencia->id_dependencia] = $dependencia->nombre;
            }

            $this->data['tiprogs'] = $this->Agenda_model->get_tiprog();
            $tiprogs = array();
            $tiprogs[""] = "Selecciona Uno...";
            foreach ($this->data['tiprogs'] as $tiprog) {
                $tiprogs[$tiprog->id_tiprog] = $tiprog->nombre;
            }

            $this->data['titulo'] = array(
                'name' => 'titulo',
                'id' => 'titulo',
                'class' => 'form-control',
                'placeholder' => 'Titulo del Evento',
                'type' => 'text',
                'value' => $this->form_validation->set_value('titulo'),
            );

            $this->data['categoria'] = array(
                'name' => 'categoria',
                'id' => 'categoria',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('categoria'),
            );

            $this->data['dependencia'] = array(
                'name' => 'dependencia',
                'id' => 'dependencia',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('dependencia'),
            );

            $this->data['tiprog'] = array(
                'name' => 'tiprog',
                'id' => 'tiprog',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('tiprog'),
            );

            $this->data['instalacion'] = array(
                'name' => 'instalacion',
                'id' => 'instalacion',
                'class' => 'form-control',
                'onChange' => 'espacios();',
                'value' => $this->form_validation->set_value('instalacion'),
            );

            $this->data['descripcion'] = array(
                'name' => 'descripcion',
                'id' => 'descripcion',
                'placeholder' => 'Descripción del Evento',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('descripcion'),
            );

            $this->data['fechai'] = array(
                'name' => 'fechai',
                'id' => 'fechai',
                'placeholder' => 'Fecha Inicial',
                'class' => 'form-control',
                'type' => 'text',
                'value' => $this->form_validation->set_value('fechai'),
            );

            $this->data['horai'] = array(
                'name' => 'horai',
                'id' => 'horai',
                'placeholder' => 'Hora Inicial',
                'class' => 'form-control',
                'type' => 'text',
                'value' => $this->form_validation->set_value('horai'),
            );

            $this->data['fechaf'] = array(
                'name' => 'fechaf',
                'id' => 'fechaf',
                'placeholder' => 'Fecha Final',
                'class' => 'form-control',
                'type' => 'text',
                'value' => $this->form_validation->set_value('fechaf'),
            );

            $this->data['horaf'] = array(
                'name' => 'horaf',
                'id' => 'horaf',
                'placeholder' => 'Hora Final',
                'class' => 'form-control',
                'type' => 'text',
                'value' => $this->form_validation->set_value('horaf'),
            );

            $this->data['button'] = array(
                'class' => 'btn btn-success',
                'name' => 'enviar',
                'value' => 'Enviar'
            );

            $this->smarty1->assign("listado", $this->data['listado']);
            $this->smarty1->assign("message", $this->data['message']);
            $this->smarty1->assign("titulo", $this->data['titulo']);
            $this->smarty1->assign("descripcion", $this->data['descripcion']);
            $this->smarty1->assign("categoria", $this->data['categoria']);
            $this->smarty1->assign("dependencia", $this->data['dependencia']);
            $this->smarty1->assign("tiprog", $this->data['tiprog']);
            $this->smarty1->assign("instalacion", $this->data['instalacion']);
            $this->smarty1->assign("fechai", $this->data['fechai']);
            $this->smarty1->assign("horai", $this->data['horai']);
            $this->smarty1->assign("fechaf", $this->data['fechaf']);
            $this->smarty1->assign("horaf", $this->data['horaf']);

            $this->smarty1->assign("instalaciones", $instalaciones);
            $this->smarty1->assign("categorias", $categorias);
            $this->smarty1->assign("dependencias", $dependencias);
            $this->smarty1->assign("tiprogs", $tiprogs);

            $this->smarty1->assign("button", $this->data['button']);
            $this->smarty1->assign("title", 'Crear Evento');
            $this->smarty1->assign("class", "fa fa-calendar");
            // $this->smarty1->assign("url","fa fa-calendar");
            //   $this->smarty1->view('agenda/crear_evento');
            $this->smarty1->view('admin/agenda/crear_evento');

            //$this->load->view('agenda/create_event');
        }
    }

    function editar_evento($id) {

        if (!$id || empty($id) || !is_numeric($id)) {
            redirect('admin/agenda', 'refresh');
        }
        //Set the menu according with the type of user
        $this->data['listado'] = $this->ion_auth->menu_group($this->ion_auth->is_admin());

        if (!$this->ion_auth->logged_in()) {
            redirect('admin/auth', 'refresh');
        }

        $evento = $this->Agenda_model->get_by_id($id);
        if (empty($evento)) {
            redirect('admin/agenda', 'refresh');
        }
        // validate form input
        $this->form_validation->set_rules('categoria', 'Categoria del Evento', 'trim|required');
        $this->form_validation->set_rules('dependencia', 'Dependencia del Evento', 'trim|required');
        $this->form_validation->set_rules('tiprog', 'Tipos de Programación', 'trim|required');
        $this->form_validation->set_rules('instalacion', 'Instalacion del Evento', 'trim|required');
        $this->form_validation->set_rules('espacio', 'Espacio del Evento', 'trim|required');
        $this->form_validation->set_rules('titulo', 'Titulo del Evento', 'trim|required');
        $this->form_validation->set_rules('descripcion', 'Descripción del Evento', 'trim|required');
        $this->form_validation->set_rules('fechai', 'Fecha Inicial', 'trim|required');
        $this->form_validation->set_rules('horai', 'Hora Inicial', 'trim|required');
        $this->form_validation->set_rules('fechaf', 'Fecha Final', 'trim|required');
        $this->form_validation->set_rules('horaf', 'Hora Inicial', 'trim|required');

        if (isset($_POST) && !empty($_POST)) {
            if ($this->form_validation->run() === TRUE) {
                $evento_update = $this->Agenda_model->edit($id);

                if ($evento_update) {
                    $this->session->set_flashdata('message', 'Evento Editado Exitósamente');
                } else {
                    $this->session->set_flashdata('message', 'Error al Editar Evento');
                }
                redirect("admin/agenda", 'refresh');
            }
        }

        // display the create group form
        // set the flash data error message if there is one
        $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));


        $this->data['instalaciones'] = $this->Agenda_model->get_instalaciones();
        $instalaciones = array();
        $instalaciones[""] = "Selecciona Uno...";
        foreach ($this->data['instalaciones'] as $instalacion) {
            $instalaciones[$instalacion->id_espacio] = $instalacion->nombre;
        }

        $this->data['categorias'] = $this->Agenda_model->get_categorias();
        $categorias = array();
        $categorias[""] = "Selecciona Uno...";
        foreach ($this->data['categorias'] as $categoria) {
            $categorias[$categoria->id_categoria] = $categoria->nombre;
        }

        $this->data['dependencias'] = $this->Agenda_model->get_dependencias();
        $dependencias = array();
        $dependencias[""] = "Selecciona Uno...";
        foreach ($this->data['dependencias'] as $dependencia) {
            $dependencias[$dependencia->id_dependencia] = $dependencia->nombre;
        }

        $this->data['tiprogs'] = $this->Agenda_model->get_tiprog();
        $tiprogs = array();
        $tiprogs[""] = "Selecciona Uno...";
        foreach ($this->data['tiprogs'] as $tiprog) {
            $tiprogs[$tiprog->id_tiprog] = $tiprog->nombre;
        }

        $this->data['titulo'] = array(
            'name' => 'titulo',
            'id' => 'titulo',
            'class' => 'form-control',
            'placeholder' => 'Titulo del Evento',
            'type' => 'text',
            'value' => $this->form_validation->set_value('titulo', $evento[0]->titulo),
        );

        $this->data['categoria'] = array(
            'name' => 'categoria',
            'id' => 'categoria',
            'class' => 'form-control',
            'value' => $this->form_validation->set_value('categoria', $evento[0]->id_categoria),
        );

        $this->data['dependencia'] = array(
            'name' => 'dependencia',
            'id' => 'dependencia',
            'class' => 'form-control',
            'value' => $this->form_validation->set_value('dependencia', $evento[0]->id_dependencia),
        );

        $this->data['tiprog'] = array(
            'name' => 'tiprog',
            'id' => 'tiprog',
            'class' => 'form-control',
            'value' => $this->form_validation->set_value('tiprog', $evento[0]->id_tiprog),
        );

        $this->data['instalacion'] = array(
            'name' => 'instalacion',
            'id' => 'instalacion',
            'class' => 'form-control',
            'onChange' => 'espacios();',
            'value' => $this->form_validation->set_value('instalacion', $evento[0]->id_instalacion),
        );


        $this->data['descripcion'] = array(
            'name' => 'descripcion',
            'id' => 'descripcion',
            'placeholder' => 'Descripción del Evento',
            'class' => 'form-control',
            'value' => $this->form_validation->set_value('descripcion', $evento[0]->descripcion),
        );

        $this->data['fechai'] = array(
            'name' => 'fechai',
            'id' => 'fechai',
            'placeholder' => 'Fecha Inicial',
            'class' => 'form-control',
            'type' => 'text',
            'value' => $this->form_validation->set_value('fechai', $evento[0]->fechai),
        );

        $this->data['horai'] = array(
            'name' => 'horai',
            'id' => 'horai',
            'placeholder' => 'Hora Inicial',
            'class' => 'form-control',
            'type' => 'text',
            'value' => $this->form_validation->set_value('horai', $evento[0]->horai),
        );

        $this->data['fechaf'] = array(
            'name' => 'fechaf',
            'id' => 'fechaf',
            'placeholder' => 'Fecha Final',
            'class' => 'form-control',
            'type' => 'text',
            'value' => $this->form_validation->set_value('fechaf', $evento[0]->fechaf),
        );

        $this->data['horaf'] = array(
            'name' => 'horaf',
            'id' => 'horaf',
            'placeholder' => 'Hora Final',
            'class' => 'form-control',
            'type' => 'text',
            'value' => $this->form_validation->set_value('horaf', $evento[0]->horaf),
        );

        $this->data['button'] = array(
            'class' => 'btn btn-success',
            'name' => 'enviar',
            'value' => 'Enviar'
        );

        $this->smarty1->assign("listado", $this->data['listado']);
        $this->smarty1->assign("message", $this->data['message']);
        $this->smarty1->assign("titulo", $this->data['titulo']);
        $this->smarty1->assign("descripcion", $this->data['descripcion']);
        $this->smarty1->assign("categoria", $this->data['categoria']);
        $this->smarty1->assign("dependencia", $this->data['dependencia']);
        $this->smarty1->assign("tiprog", $this->data['tiprog']);
        $this->smarty1->assign("instalacion", $this->data['instalacion']);
        $this->smarty1->assign("fechai", $this->data['fechai']);
        $this->smarty1->assign("horai", $this->data['horai']);
        $this->smarty1->assign("fechaf", $this->data['fechaf']);
        $this->smarty1->assign("horaf", $this->data['horaf']);
        $this->smarty1->assign("instalaciones", $instalaciones);
        $this->smarty1->assign("categorias", $categorias);
        $this->smarty1->assign("dependencias", $dependencias);
        $this->smarty1->assign("tiprogs", $tiprogs);

        $this->smarty1->assign("id_categoria", $evento[0]->id_categoria);
        $this->smarty1->assign("id_dependencia", $evento[0]->id_dependencia);
        $this->smarty1->assign("id_tiprog", $evento[0]->id_tiprog);
        $this->smarty1->assign("id_instalacion", $evento[0]->id_instalacion);
        $this->smarty1->assign("id_espacio", $evento[0]->id_espacio);
        $this->smarty1->assign("id_evento", $id);

        $this->smarty1->assign("button", $this->data['button']);
        $this->smarty1->assign("title", 'Editar Evento');
        $this->smarty1->assign("class", "fa fa-calendar");

        $this->smarty1->view('admin/agenda/editar_evento');
    }

    function borrar_evento($id) {
        // bail if no group id given
        if (!$id || empty($id) || !is_numeric($id)) {
            redirect('admin/agenda', 'refresh');
        }

        //Set the menu according with the type of user
        $this->data['listado'] = $this->ion_auth->menu_group($this->ion_auth->is_admin());

        if (!$this->ion_auth->logged_in()) {
            redirect('admin/auth', 'refresh');
        }

        $agenda = $this->Agenda_model->get_by_id($id);
        if (empty($agenda)) {
            redirect('admin/agenda', 'refresh');
        }

        if ($this->input->post()) {
            if ($this->input->post('confirm') == 'yes') {                

	 $evento_delete = $this->Agenda_model->elim($id);

                if ($evento_delete) {
                    $this->session->set_flashdata('message', 'Evento Eliminado Exitósamente');
                } else {
                    $this->session->set_flashdata('message', 'Error al Eliminar Evento');
                }

                redirect('admin/agenda');
            } else {
                redirect('admin/agenda');
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
        $this->smarty1->assign("evento", $agenda[0]);
        $this->smarty1->assign("button", $this->data['button']);
        $this->smarty1->assign("title", 'Eliminar Evento');
        $this->smarty1->assign("class", "fa fa-calendar");
        $this->smarty1->view('admin/agenda/borrar_evento');
    }

    function espacios($id, $id_espacio) {

        $this->data['espacios'] = $this->Agenda_model->get_espacios($id);

        $espacios = array();
        $espacios[''] = "Selecciona Uno...";
        foreach ($this->data['espacios'] as $espacio) {
            $espacios[$espacio->id_espacio] = $espacio->nombre;
        }

        $this->data['espacio'] = array(
            'name' => 'espacio',
            'id' => 'espacio',
            'class' => 'form-control',
            'value' => $this->form_validation->set_value('espacio'),
        );

        $outlab = form_label('Escoja el Espacio', 'espacio');
        $espacio = $this->data['espacio'];
        $output = form_dropdown($espacio, $espacios, $id_espacio);

        echo $outlab;
        echo $output;
    }

    function espacio($id) {

        $this->data['espacios'] = $this->Agenda_model->get_espacios($id);
        $espacios = array();
        $espacios[''] = "Selecciona Uno...";
        foreach ($this->data['espacios'] as $espacio) {
            $espacios[$espacio->id_espacio] = $espacio->nombre;
        }

        $this->data['espacio'] = array(
            'name' => 'espacio',
            'id' => 'espacio',
            'class' => 'form-control',
            'value' => $this->form_validation->set_value('espacio'),
        );

        $outlab = form_label('Escoja el Espacio', 'espacio');
        $espacio = $this->data['espacio'];
        $output = form_dropdown($espacio, $espacios);

        echo $outlab;
        echo $output;
    }

}
