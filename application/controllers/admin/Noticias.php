<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Noticias extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation', 'pagination', 'upload'));
        $this->load->helper(array('url', 'language'));

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->load->model('admin/Noticias_model');
        $this->lang->load('auth');
    }

    // redirect if needed, otherwise display the user list
    function index() {

        if (!$this->ion_auth->logged_in()) {
            redirect('admin/auth/users', 'refresh');
        }

            //Set the menu according with the type of user
            $this->smarty1->assign("listado", $this->ion_auth->menu_group($this->ion_auth->is_admin()));
            // set the flash data error message if there is one
            $this->smarty1->assign("message", (validation_errors()) ? validation_errors() : $this->session->flashdata('message'));


            $total = $this->Noticias_model->get_cuantos();


            $config['base_url'] = base_url() . 'admin/noticias/index';
            $config['total_rows'] = $total;
            $config['per_page'] = 10;
            $config["uri_segment"] = 4;
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['first_link'] = false;
            $config['last_link'] = false;
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['prev_link'] = '&laquo';
            $config['prev_tag_open'] = '<li class="prev">';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = '&raquo';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';

            $this->pagination->initialize($config);

            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            $this->data["noticias"] = $this->Noticias_model->fetch_noticias($config["per_page"], $page);

            $this->data["links"] = $this->pagination->create_links();

            //Se asignan los usuarios a las variable $users

            $this->smarty1->assign("noticias", $this->data["noticias"]);
            $this->smarty1->assign("title", 'Noticias');
            $this->smarty1->assign("class", "fa fa-newspaper-o");
            $this->smarty1->assign("links", $this->data["links"]);
            //Se carga el Template Users
            $this->smarty1->view('admin/noticias/noticias');
        
    }

    function crear_noticia() {
        if (!$this->ion_auth->logged_in()) {
            redirect('admin/auth/users', 'refresh');
        }
        //Set the menu according with the type of user
        $this->data['listado'] = $this->ion_auth->menu_group($this->ion_auth->is_admin());

        // validate form input
        $this->form_validation->set_rules('categnot', 'Categoria de la Noticia', 'trim|required');
        $this->form_validation->set_rules('opcion', 'Opcion de Presentación la Noticia', 'trim|required');
        $this->form_validation->set_rules('titulo', 'Titulo de la Noticia', 'trim|required');
        $this->form_validation->set_rules('descripcion', 'Descripción de la Noticia', 'trim|required');
        $this->form_validation->set_rules('url', 'URL de la Noticia', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            $id_insertado = $this->Noticias_model->add();
            // check to see if we are creating the group
            // redirect them back to the admin page

            if ($id_insertado) {
                $this->session->set_flashdata('message', 'Noticia Creada Exitósamente');
                redirect("admin/noticias", 'refresh');
            }
        } else {
            // display the create group form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));


            $this->data['categnot'] = $this->Noticias_model->get_categnot();
            $categnots = array();
            $categnots[""] = "Selecciona Uno...";
            foreach ($this->data['categnot'] as $categnot) {
                $categnots[$categnot->id_categnot] = $categnot->nombre;
            }

            $opciones = array();
            $opciones[""] = "Selecciona Uno...";
            $opciones[0] = "IMAGEN";
            $opciones[1] = "TEXTO";


            $this->data['titulo'] = array(
                'name' => 'titulo',
                'id' => 'titulo',
                'class' => 'form-control',
                'placeholder' => 'Titulo de la Noticia',
                'type' => 'text',
                'value' => $this->form_validation->set_value('titulo'),
            );

            $this->data['url'] = array(
                'name' => 'url',
                'id' => 'url',
                'class' => 'form-control',
                'placeholder' => 'Url de la Noticia',
                'type' => 'text',
                'value' => $this->form_validation->set_value('titulo'),
            );

            $this->data['categnot'] = array(
                'name' => 'categnot',
                'id' => 'categnot',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('categnot'),
            );

            $this->data['opcion'] = array(
                'name' => 'opcion',
                'id' => 'opcion',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('opcion'),
            );

            $this->data['descripcion'] = array(
                'name' => 'descripcion',
                'id' => 'descripcion',
                'placeholder' => 'Descripción del Evento',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('descripcion'),
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
            $this->smarty1->assign("categnot", $this->data['categnot']);
            $this->smarty1->assign("url", $this->data['url']);
            $this->smarty1->assign("opciones", $opciones);
            $this->smarty1->assign("opcion", $this->data['opcion']);
            $this->smarty1->assign("categnots", $categnots);
            $this->smarty1->assign("button", $this->data['button']);
            $this->smarty1->assign("title", 'Crear Noticia');
            $this->smarty1->assign("class", "fa fa-newspaper-o");
            $this->smarty1->view('admin/noticias/crear_noticia');
        }
    }

    function editar_noticia($id) {

        if (!$id || empty($id) || !is_numeric($id)) {
            redirect('admin/noticias', 'refresh');
        }
        //Set the menu according with the type of user
        $this->data['listado'] = $this->ion_auth->menu_group($this->ion_auth->is_admin());

        if (!$this->ion_auth->logged_in()) {
            redirect('admin/auth', 'refresh');
        }

        $noticia = $this->Noticias_model->get_by_id($id);
        if (empty($noticia)) {
            redirect('admin/noticias', 'refresh');
        }
        // validate form input
         $this->form_validation->set_rules('categnot', 'Categoria de la Noticia', 'trim|required');
        $this->form_validation->set_rules('opcion', 'Opcion de Presentación la Noticia', 'trim|required');
        $this->form_validation->set_rules('titulo', 'Titulo de la Noticia', 'trim|required');
        $this->form_validation->set_rules('descripcion', 'Descripción de la Noticia', 'trim|required');
        $this->form_validation->set_rules('url', 'URL de la Noticia', 'trim|required');

        if (isset($_POST) && !empty($_POST)) {
            if ($this->form_validation->run() === TRUE) {
                $evento_update = $this->Noticias_model->edit($id);

                if ($evento_update) {
                    $this->session->set_flashdata('message', 'Noticia Editada Exitósamente');
                } else {
                    $this->session->set_flashdata('message', 'Error al Editar la Noticia');
                }
                redirect("admin/noticias", 'refresh');
            }
        }

        // display the create group form
        // set the flash data error message if there is one
        $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));


       $this->data['categnot'] = $this->Noticias_model->get_categnot();
            $categnots = array();
            $categnots[""] = "Selecciona Uno...";
            foreach ($this->data['categnot'] as $categnot) {
                $categnots[$categnot->id_categnot] = $categnot->nombre;
            }

            $opciones = array();
            $opciones[""] = "Selecciona Uno...";
            $opciones[0] = "IMAGEN";
            $opciones[1] = "TEXTO";


            $this->data['titulo'] = array(
                'name' => 'titulo',
                'id' => 'titulo',
                'class' => 'form-control',
                'placeholder' => 'Titulo de la Noticia',
                'type' => 'text',
                'value' => $this->form_validation->set_value('titulo', $noticia[0]->titulo),
            );

            $this->data['url'] = array(
                'name' => 'url',
                'id' => 'url',
                'class' => 'form-control',
                'placeholder' => 'Url de la Noticia',
                'type' => 'text',
                'value' => $this->form_validation->set_value('titulo', $noticia[0]->url),
            );

            $this->data['categnot'] = array(
                'name' => 'categnot',
                'id' => 'categnot',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('categnot'),
            );

            $this->data['opcion'] = array(
                'name' => 'opcion',
                'id' => 'opcion',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('opcion'),
            );

            $this->data['descripcion'] = array(
                'name' => 'descripcion',
                'id' => 'descripcion',
                'placeholder' => 'Descripción del Evento',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('descripcion', $noticia[0]->descripcion),
            );

            $this->data['button'] = array(
                'class' => 'btn btn-success',
                'name' => 'enviar',
                'value' => 'Enviar'
            );

            $this->smarty1->assign("noticia", array_pop($noticia));  
            $this->smarty1->assign("listado", $this->data['listado']);
            $this->smarty1->assign("message", $this->data['message']);
            $this->smarty1->assign("titulo", $this->data['titulo']);
            $this->smarty1->assign("descripcion", $this->data['descripcion']);
            $this->smarty1->assign("categnot", $this->data['categnot']);
            $this->smarty1->assign("url", $this->data['url']);
            $this->smarty1->assign("opciones", $opciones);
            $this->smarty1->assign("opcion", $this->data['opcion']);
            $this->smarty1->assign("categnots", $categnots);
            $this->smarty1->assign("button", $this->data['button']);
            $this->smarty1->assign("title", 'Crear Noticia');
            $this->smarty1->assign("class", "fa fa-newspaper-o");;

        $this->smarty1->view('admin/noticias/editar_noticia');
    }

    function borrar_noticia($id) {
        // bail if no group id given
        if (!$id || empty($id) || !is_numeric($id)) {
            redirect('admin/noticias', 'refresh');
        }

        //Set the menu according with the type of user
        $this->data['listado'] = $this->ion_auth->menu_group($this->ion_auth->is_admin());

        if (!$this->ion_auth->logged_in()) {
            redirect('admin/auth', 'refresh');
        }

        $noticia = $this->Noticias_model->get_by_id($id);
        if (empty($noticia)) {
            redirect('admin/noticias', 'refresh');
        }

        if ($this->input->post()) {
            if ($this->input->post('confirm') == 'yes') {

                $noticia_delete = $this->Noticias_model->elim($id);

                if ($noticia_delete) {
                    $this->session->set_flashdata('message', 'Noticia Eliminada Exitósamente');
                } else {
                    $this->session->set_flashdata('message', 'Error al Eliminar la Noticia');
                }

                redirect('admin/noticias');
            } else {
                redirect('admin/noticias');
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
        $this->smarty1->assign("noticia", $noticia[0]);
        $this->smarty1->assign("button", $this->data['button']);
        $this->smarty1->assign("title", 'Eliminar Noticia');
            $this->smarty1->assign("class", "fa fa-newspaper-o");;
        $this->smarty1->view('admin/noticias/borrar_noticia');
    }

    public function do_upload($id) {
        
         if (!$id || empty($id) || !is_numeric($id)) {
            redirect('admin/noticias', 'refresh');
        }

        if (!$this->ion_auth->logged_in()) {
            redirect('admin/auth/users', 'refresh');
        }
        //Set the menu according with the type of user
        
         $noticia = $this->Noticias_model->get_by_id($id);
        if (empty($noticia)) {
            redirect('admin/noticias', 'refresh');
        }
        
        $this->data['listado'] = $this->ion_auth->menu_group($this->ion_auth->is_admin());

        $this->form_validation->set_rules('userfile', 'userfile', 'trim|required');

        
        if ($this->input->post()) {

            $config = array(
                'upload_path' => "./userfiles/uploads/",
                'allowed_types' => "gif|jpg|png|jpeg",
                'overwrite' => TRUE,
                'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                'max_height' => "768",
                'max_width' => "1024"
            );

            $config['file_name'] = $id;

            $this->upload->initialize($config);

            if ($this->upload->do_upload()) {
                $data = array('upload_data' => $this->upload->data());
          
                $nombre=$this->upload->data()['file_name'];
                
                $noticia_update = $this->Noticias_model->create_image($id, $nombre);
                
                $this->session->set_flashdata('message', 'Imagen Cargada Exitosamente');
                 redirect('admin/noticias', 'refresh');
             
            } else {

                $this->session->set_flashdata('message', $this->upload->display_errors());
                            redirect('admin/noticias', 'refresh');
                          
            }
        } 
        
         $this->data['userfile'] = array(
                'name' => 'userfile',
                'id' => 'userfile',
                'placeholder' => 'Imagen de la Noticia',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('userfile'),
            );


            $this->data['button'] = array(
                'class' => 'btn btn-success',
                'name' => 'enviar',
                'value' => 'Enviar'
            );
            $this->smarty1->assign("noticia", array_pop($noticia));            
            $this->smarty1->assign("userfile", $this->data['userfile']);
            $this->smarty1->assign("button", $this->data['button']);
            $this->smarty1->assign("title", 'Imagen de la Noticia');
            $this->smarty1->assign("class", "fa fa-newspaper-o");
            $this->smarty1->assign("listado", $this->data['listado']);

            $data['error'] = '';
            $this->smarty1->view('admin/noticias/cargaima');
            // $this->load->view('cargaima', $data);
    }

}
