<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cotizaciones extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation', 'pagination'));
        $this->load->helper(array('url', 'language'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->load->model(array('admin/Cotizaciones_model', 'admin/Clientes_model', 'admin/Transaccion_model','admin/Items_model','admin/Cotizacionesitems_model','admin/Salones_model','admin/Cotdep_model','admin/Dependencias_model'));
        $this->lang->load('auth');
        $this->idmenu = $this->uri->segment(4);
        $this->listado = $this->ion_auth->menu_group($this->ion_auth->user()->row());
    }

    // redirect if needed, otherwise display the user list
    function index() {
        $this->ion_auth->validate_login();
        //Set the menu according with the type of user


        $totalreg = $this->Cotizaciones_model->total_registros();
        $this->form_validation->set_rules('nombres', 'Nombres del Cliente', 'trim');
        $this->form_validation->set_rules('fechai', 'Fecha Inicial', 'trim');
        $this->form_validation->set_rules('fechaf', 'Fecha Final', 'trim');

    if ($this->input->post()) {
        
       // var_dump($this->input->post());
       
        
            $busqueda=$this->input->post('nombres');
            $fechai=$this->input->post('fechai');
            $fechaf=$this->input->post('fechaf');       
            
            if ($busqueda != '' && $fechai != '' && $fechaf != ''){        
 
                $this->smarty1->assign("data", $this->Cotizaciones_model->busquedatotal($busqueda, $fechai, $fechaf));
                
            }elseif ($busqueda == '' && $fechai == '' && $fechaf== ''){        

                $this->smarty1->assign("data", $this->Cotizaciones_model->listar_todos());

            }elseif ($busqueda != '' && $fechai == '' && $fechaf== ''){

                $this->smarty1->assign("data", $this->Cotizaciones_model->busqueda($busqueda));
                               
            }elseif ($busqueda == '' && $fechai != '' && $fechaf != '') {
      
                $this->smarty1->assign("data", $this->Cotizaciones_model->busquedafecha($fechai, $fechaf));            
                
            }elseif ($busqueda != '' && $fechai != '' && $fechaf == '') {
           
                $this->smarty1->assign("data", $this->Cotizaciones_model->busquedafechai($busqueda, $fechai)); 
                      
                       
            }elseif  ($busqueda != '' && $fechai == '' && $fechaf != '') {
               
                $this->smarty1->assign("data", $this->Cotizaciones_model->busquedafechaf($busqueda, $fechaf)); 
                
            }elseif  ($busqueda == '' && $fechai != '' && $fechaf == '') {
               
                $this->smarty1->assign("data", $this->Cotizaciones_model->fechai($fechai)); 
            
                
            }elseif  ($busqueda == '' && $fechai == '' && $fechaf != '') {
               
                $this->smarty1->assign("data", $this->Cotizaciones_model->fechaf($fechaf)); 
            }    
        
        
            
    } else {

            $this->smarty1->assign("data", $this->Cotizaciones_model->listar_todos());
        }

        
        $this->data['nombres'] = array(
                'name' => 'nombres',
                'id' => 'nombres',
                'class' => 'form-control',
                'placeholder' => 'Nombres del Cliente',
                'type' => 'text',
                'value' => $this->form_validation->set_value('nombres'),
            );

            $this->data['fechai'] = array(
                'name' => 'fechai',
                'id' => 'fechai',
                'placeholder' => 'Fecha Inicial',
                'class' => 'form-control',
                'type' => 'text',
                'value' => $this->form_validation->set_value('fechai'),
            );

            $this->data['fechaf'] = array(
                'name' => 'fechaf',
                'id' => 'fechaf',
                'placeholder' => 'Fecha Final',
                'class' => 'form-control',
                'type' => 'text',
                'value' => $this->form_validation->set_value('fechaf'),
            );

            $this->data['button'] = array(
                'class' => 'btn btn-success',
                'name' => 'enviar',
                'value' => 'Enviar'
            );

            $this->smarty1->assign("listado", $this->listado);
            $this->smarty1->assign("button", $this->data['button']);
            $this->smarty1->assign("nombres", $this->data['nombres']);
            $this->smarty1->assign("fechai", $this->data['fechai']);
            $this->smarty1->assign("fechaf", $this->data['fechaf']);
            $this->smarty1->assign("title", 'Cotizaciones Hotel el Prado');
            $this->smarty1->assign("idmenu", $this->idmenu);
            $this->smarty1->view('admin/cotizaciones/master');
       
    }

    // create a new category
    function crear() {
        $this->ion_auth->validate_login();

        //Set the menu according with the type of user


        $this->form_validation->set_rules('salon', 'Nombre del Salon', 'trim|required');
        $this->form_validation->set_rules('documento', 'Documento del Cliente', 'trim|required');
        $this->form_validation->set_rules('nombres', 'Nombres del Cliente', 'trim|required');
        $this->form_validation->set_rules('apellidos', 'Apellidos del Cliente', 'trim|required');
        $this->form_validation->set_rules('email', 'Email del Cliente', 'trim|required|valid_email');
        $this->form_validation->set_rules('telefono', 'Teléfono del Cliente', 'trim|required');
        $this->form_validation->set_rules('celular', 'Celular del Cliente', 'trim|required');
        $this->form_validation->set_rules('direccion', 'Dirección del Cliente', 'trim|required');
        $this->form_validation->set_rules('fechai', 'Fecha Inicial', 'trim|required');
        $this->form_validation->set_rules('horai', 'Hora Inicial', 'trim|required');
        $this->form_validation->set_rules('fechaf', 'Fecha Final', 'trim|required');
        $this->form_validation->set_rules('horaf', 'Hora Inicial', 'trim|required');

        if ($this->form_validation->run() == TRUE) {


            $existe_cliente = $this->Clientes_model->cliente_existe($this->input->post('documento'));

            $data['documento'] = $this->input->post('documento');
            $data['nombres'] = $this->input->post('nombres');
            $data['apellidos'] = $this->input->post('apellidos');
            $data['email'] = $this->input->post('email');
            $data['telefono'] = $this->input->post('telefono');
            $data['celular'] = $this->input->post('celular');
            $data['direccion'] = $this->input->post('direccion');

            if ($existe_cliente == null) {

                $cliente = $this->Clientes_model->set_datos($data);
                $id_insertado = $cliente->add();
            } else {

                $cliente = $this->Clientes_model->set_datos($data);
                $cliente->edit($existe_cliente->id_cliente, $data);
                $id_insertado = $existe_cliente->id_cliente;
            }

            $data1['id_salon'] = $this->input->post('salon');
            $data1['id_cliente'] = $id_insertado;
            $data1['fechai'] = $this->input->post('fechai');
            $data1['horai'] = $this->input->post('horai');
            $data1['fechaf'] = $this->input->post('fechaf');
            $data1['horaf'] = $this->input->post('horaf');

            $cotizacion = $this->Cotizaciones_model->set_datos($data1);
            $id_insertco = $cotizacion->add();


            // check to see if we are creating the group
            // redirect them back to the admin page

            if ($id_insertco) {

                $data2['id_cotizacion'] = $id_insertco;
                $data2['id_usuario'] = $this->session->user_id;
                $data2['id_operacion'] = 1;
                $transaccion = $this->Transaccion_model->set_datos($data2);
                $id_insertrans = $transaccion->add();

                //$this->session->set_flashdata('message', 'Cotizació Creada Exitósamente');
                //redirect("admin/cotizaciones/index/" . $this->idmenu, 'refresh');
                redirect("admin/cotizaciones/items/" . $this->idmenu."/".$id_insertco);
            }
        } else {
            // display the create group form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $this->data['salones'] = $this->Cotizaciones_model->listar_salones();
            $salones = array();
            $salones[""] = "Selecciona Uno...";
            foreach ($this->data['salones'] as $salon) {
                $salones[$salon->id_salon] = $salon->nombre;
            }

            $this->data['documento'] = array(
                'name' => 'documento',
                'id' => 'documento',
                'class' => 'form-control',
                'placeholder' => 'Documento del Cliente',
                'type' => 'text',
                'value' => $this->form_validation->set_value('documento'),
            );

            $this->data['nombres'] = array(
                'name' => 'nombres',
                'id' => 'nombres',
                'class' => 'form-control',
                'placeholder' => 'Nombres del Cliente',
                'type' => 'text',
                'value' => $this->form_validation->set_value('nombres'),
            );

            $this->data['apellidos'] = array(
                'name' => 'apellidos',
                'id' => 'apellidos',
                'class' => 'form-control',
                'placeholder' => 'Apellidos del Cliente',
                'type' => 'text',
                'value' => $this->form_validation->set_value('apellidos'),
            );

            $this->data['email'] = array(
                'name' => 'email',
                'id' => 'email',
                'class' => 'form-control',
                'placeholder' => 'Email del Cliente',
                'type' => 'text',
                'value' => $this->form_validation->set_value('email'),
            );

            $this->data['telefono'] = array(
                'name' => 'telefono',
                'id' => 'telefono',
                'class' => 'form-control',
                'placeholder' => 'Teléfono del Cliente',
                'type' => 'text',
                'value' => $this->form_validation->set_value('telefono'),
            );

            $this->data['celular'] = array(
                'name' => 'celular',
                'id' => 'celular',
                'class' => 'form-control',
                'placeholder' => 'Celular del Cliente',
                'type' => 'text',
                'value' => $this->form_validation->set_value('celular'),
            );

            $this->data['direccion'] = array(
                'name' => 'direccion',
                'id' => 'direccion',
                'class' => 'form-control',
                'placeholder' => 'Dirección del Cliente',
                'type' => 'text',
                'value' => $this->form_validation->set_value('direccion'),
            );

            $this->data['salon'] = array(
                'name' => 'salon',
                'id' => 'salon',
                'class' => 'form-control',
                'placeholder' => 'Nombre del Salon',
                'type' => 'text',
                'value' => $this->form_validation->set_value('salon'),
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
            $this->smarty1->assign("listado", $this->listado);
            $this->smarty1->assign("message", $this->data['message']);

            $this->smarty1->assign("salon", $this->data['salon']);
            $this->smarty1->assign("documento", $this->data['documento']);
            $this->smarty1->assign("nombres", $this->data['nombres']);
            $this->smarty1->assign("apellidos", $this->data['apellidos']);
            $this->smarty1->assign("email", $this->data['email']);
            $this->smarty1->assign("telefono", $this->data['telefono']);
            $this->smarty1->assign("celular", $this->data['celular']);
            $this->smarty1->assign("direccion", $this->data['direccion']);
            $this->smarty1->assign("salones", $salones);
            $this->smarty1->assign("fechai", $this->data['fechai']);
            $this->smarty1->assign("horai", $this->data['horai']);
            $this->smarty1->assign("fechaf", $this->data['fechaf']);
            $this->smarty1->assign("horaf", $this->data['horaf']);
            $this->smarty1->assign("button", $this->data['button']);
            $this->smarty1->assign("title", 'Crear Cotización');
            $this->smarty1->assign("idmenu", $this->idmenu);
            $this->smarty1->view('admin/cotizaciones/form_categoria');
        }
    }

    // edit a category
    function editar() {
        $this->ion_auth->validate_login();

        $iditem = $this->uri->segment(5);

        //Set the menu according with the type of user
        $this->form_validation->set_rules('salon', 'Nombre del Salon', 'trim|required');
        $this->form_validation->set_rules('documento', 'Documento del Cliente', 'trim|required');
        $this->form_validation->set_rules('nombres', 'Nombres del Cliente', 'trim|required');
        $this->form_validation->set_rules('apellidos', 'Apellidos del Cliente', 'trim|required');
        $this->form_validation->set_rules('email', 'Email del Cliente', 'trim|required|valid_email');
        $this->form_validation->set_rules('telefono', 'Teléfono del Cliente', 'trim|required');
        $this->form_validation->set_rules('celular', 'Celular del Cliente', 'trim|required');
        $this->form_validation->set_rules('direccion', 'Dirección del Cliente', 'trim|required');
        $this->form_validation->set_rules('fechai', 'Fecha Inicial', 'trim|required');
        $this->form_validation->set_rules('horai', 'Hora Inicial', 'trim|required');
        $this->form_validation->set_rules('fechaf', 'Fecha Final', 'trim|required');
        $this->form_validation->set_rules('horaf', 'Hora Inicial', 'trim|required');

        if ($this->form_validation->run() === TRUE) {

            $existe_cliente = $this->Clientes_model->cliente_existe($this->input->post('documento'));

            $data['documento'] = $this->input->post('documento');
            $data['nombres'] = $this->input->post('nombres');
            $data['apellidos'] = $this->input->post('apellidos');
            $data['email'] = $this->input->post('email');
            $data['telefono'] = $this->input->post('telefono');
            $data['celular'] = $this->input->post('celular');
            $data['direccion'] = $this->input->post('direccion');

            if ($existe_cliente == null) {

                $cliente = $this->Clientes_model->set_datos($data);
                $id_insertado = $cliente->add();
            } else {

                $cliente = $this->Clientes_model->set_datos($data);
                $id_insertado = $cliente->edit($existe_cliente->id_cliente, $data);
                //$id_insertado = $existe_cliente->id_cliente;
            }

            $data1['id_salon'] = $this->input->post('salon');
            $data1['id_cliente'] = $id_insertado;
            $data1['fechai'] = $this->input->post('fechai');
            $data1['horai'] = $this->input->post('horai');
            $data1['fechaf'] = $this->input->post('fechaf');
            $data1['horaf'] = $this->input->post('horaf');

            $cotizacion = $this->Cotizaciones_model->set_datos($data1);
            $id_insertco = $cotizacion->edit($iditem, $data1);

            if ($id_insertco) {
                $data2['id_cotizacion'] = $id_insertco;
                $data2['id_usuario'] = $this->session->user_id;
                $data2['id_operacion'] = 2;
                $transaccion = $this->Transaccion_model->set_datos($data2);
                $id_insertrans = $transaccion->add();


                $this->session->set_flashdata('message', 'item editado Exitósamente');
            } else {
                $this->session->set_flashdata('message', 'Error al editar el item');
            }

            redirect("admin/cotizaciones/items/" . $this->idmenu."/".$iditem);
        }

        $datos = $this->Cotizaciones_model->get_item($iditem);

        $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

        $this->data['salones'] = $this->Cotizaciones_model->listar_salones();
        $salones = array();
        $salones[""] = "Selecciona Uno...";
        foreach ($this->data['salones'] as $salon) {
            $salones[$salon->id_salon] = $salon->nombre;
        }

        $datos = $this->Cotizaciones_model->get_item($iditem);
        $datos1 = $this->Clientes_model->get_item($datos->id_cliente);


        $this->data['documento'] = array(
            'name' => 'documento',
            'id' => 'documento',
            'class' => 'form-control',
            'placeholder' => 'Documento del Cliente',
            'type' => 'text',
            'value' => $this->form_validation->set_value('documento', $datos1->documento),
        );

        $this->data['nombres'] = array(
            'name' => 'nombres',
            'id' => 'nombres',
            'class' => 'form-control',
            'placeholder' => 'Nombres del Cliente',
            'type' => 'text',
            'value' => $this->form_validation->set_value('nombres', $datos1->nombres),
        );

        $this->data['apellidos'] = array(
            'name' => 'apellidos',
            'id' => 'apellidos',
            'class' => 'form-control',
            'placeholder' => 'Apellidos del Cliente',
            'type' => 'text',
            'value' => $this->form_validation->set_value('apellidos', $datos1->apellidos),
        );

        $this->data['email'] = array(
            'name' => 'email',
            'id' => 'email',
            'class' => 'form-control',
            'placeholder' => 'Email del Cliente',
            'type' => 'text',
            'value' => $this->form_validation->set_value('email', $datos1->email),
        );

        $this->data['telefono'] = array(
            'name' => 'telefono',
            'id' => 'telefono',
            'class' => 'form-control',
            'placeholder' => 'Teléfono del Cliente',
            'type' => 'text',
            'value' => $this->form_validation->set_value('telefono', $datos1->telefono),
        );

        $this->data['celular'] = array(
            'name' => 'celular',
            'id' => 'celular',
            'class' => 'form-control',
            'placeholder' => 'Celular del Cliente',
            'type' => 'text',
            'value' => $this->form_validation->set_value('celular', $datos1->celular),
        );

        $this->data['direccion'] = array(
            'name' => 'direccion',
            'id' => 'direccion',
            'class' => 'form-control',
            'placeholder' => 'Dirección del Cliente',
            'type' => 'text',
            'value' => $this->form_validation->set_value('direccion', $datos1->direccion),
        );

        $this->data['salon'] = array(
            'name' => 'salon',
            'id' => 'salon',
            'class' => 'form-control',
            'placeholder' => 'Nombre del Salon',
            'type' => 'text',
            'value' => $this->form_validation->set_value('salon', $datos->id_salon),
        );

        $this->data['fechai'] = array(
            'name' => 'fechai',
            'id' => 'fechai',
            'placeholder' => 'Fecha Inicial',
            'class' => 'form-control',
            'type' => 'text',
            'value' => $this->form_validation->set_value('fechai', $datos->fechai),
        );

        $this->data['horai'] = array(
            'name' => 'horai',
            'id' => 'horai',
            'placeholder' => 'Hora Inicial',
            'class' => 'form-control',
            'type' => 'text',
            'value' => $this->form_validation->set_value('horai', $datos->horai),
        );

        $this->data['fechaf'] = array(
            'name' => 'fechaf',
            'id' => 'fechaf',
            'placeholder' => 'Fecha Final',
            'class' => 'form-control',
            'type' => 'text',
            'value' => $this->form_validation->set_value('fechaf', $datos->fechaf),
        );

        $this->data['horaf'] = array(
            'name' => 'horaf',
            'id' => 'horaf',
            'placeholder' => 'Hora Final',
            'class' => 'form-control',
            'type' => 'text',
            'value' => $this->form_validation->set_value('horaf', $datos->horaf),
        );

        $this->data['button'] = array(
            'class' => 'btn btn-success',
            'name' => 'enviar',
            'value' => 'Generar cliente cotización'
        );



        $this->smarty1->assign("listado", $this->listado);
        $this->smarty1->assign("message", $this->data['message']);
        $this->smarty1->assign("salon", $this->data['salon']);
        $this->smarty1->assign("documento", $this->data['documento']);
        $this->smarty1->assign("nombres", $this->data['nombres']);
        $this->smarty1->assign("apellidos", $this->data['apellidos']);
        $this->smarty1->assign("email", $this->data['email']);
        $this->smarty1->assign("telefono", $this->data['telefono']);
        $this->smarty1->assign("celular", $this->data['celular']);
        $this->smarty1->assign("direccion", $this->data['direccion']);
        $this->smarty1->assign("salones", $salones);
        $this->smarty1->assign("fechai", $this->data['fechai']);
        $this->smarty1->assign("horai", $this->data['horai']);
        $this->smarty1->assign("fechaf", $this->data['fechaf']);
        $this->smarty1->assign("horaf", $this->data['horaf']);
        $this->smarty1->assign("id_salon", $datos->id_salon);

        $this->smarty1->assign("button", $this->data['button']);
        $this->smarty1->assign("title", 'Editar Cotización');
        $this->smarty1->assign("idmenu", $this->idmenu);
        $this->smarty1->view('admin/cotizaciones/form_categoria');
    }

    // delete a category
    function borrar() {

        $this->ion_auth->validate_login();

        $iditem = $this->uri->segment(5);


        // bail if no category id given
        if (!$iditem || empty($iditem) || !is_numeric($iditem)) {
            redirect('admin/cotizaciones/index/'.$this->idmenu);
        }

        $categoria_delete = $this->Cotizaciones_model->delete($iditem);

        redirect('admin/cotizaciones/index/'.$this->idmenu);
    }

    function llenar($documento) {

        $existe_cliente = $this->Clientes_model->cliente_existe($documento);

        echo json_encode(array("nombres" => $existe_cliente->nombres, "apellidos" => $existe_cliente->apellidos, "email" => $existe_cliente->email, "telefono" => $existe_cliente->telefono, "celular" => $existe_cliente->celular, "direccion" => $existe_cliente->direccion));
    }
    
    function estado() {
        $this->ion_auth->validate_login();

        $iditem = $this->uri->segment(5);

        //Set the menu according with the type of user
        $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

        $this->form_validation->set_rules('estado', 'Estados', 'trim|required');


        if ($this->form_validation->run() === TRUE) {
            
            $data['id_estado'] = $this->input->post('estado');            
            $id_insertado = $this->Cotizaciones_model->edit($iditem, $data);
            
            if ($id_insertado) {
                $data2['id_cotizacion'] = $id_insertado;
                $data2['id_usuario'] = $this->session->user_id;
                $data2['id_operacion'] = 3;
                $transaccion = $this->Transaccion_model->set_datos($data2);
                $id_insertrans = $transaccion->add();
            

                $this->session->set_flashdata('message', 'item editado Exitósamente');
            } else {
                $this->session->set_flashdata('message', 'Error al editar el item');
            }

            redirect("admin/cotizaciones/index/" . $this->idmenu, 'refresh');
            
        } else {

            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $this->data['estados'] = $this->Cotizaciones_model->estados();
            $estados = array();
            $estados[""] = "Selecciona Uno...";
            foreach ($this->data['estados'] as $estado) {
                $estados[$estado->id_estado] = $estado->nombre;
            }

            $this->data['estado'] = array(
                'name' => 'estado',
                'id' => 'estado',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('estado'),
            );

            $this->data['button'] = array(
                'class' => 'btn btn-success',
                'name' => 'enviar',
                'value' => 'Enviar'
            );

            $data = $this->Cotizaciones_model->get_item_estado($iditem);
            $datos = array_shift($data);

            $this->smarty1->assign("listado", $this->listado);
            $this->smarty1->assign("datos", $datos);
            $this->smarty1->assign("message", $this->data['message']);
            $this->smarty1->assign("button", $this->data['button']);
            $this->smarty1->assign("estados", $estados);
            $this->smarty1->assign("estado", $this->data['estado']);
            $this->smarty1->assign("title", 'Cambio de Estado Cotizacioón');
            $this->smarty1->assign("idmenu", $this->idmenu);
            $this->smarty1->view('admin/cotizaciones/cambiar_estado');
        }
    }
    
    

    public function envio() {
        
        $iditem= $this->uri->segment(5);
        $this->form_validation->set_rules('descripcion', 'Debe digitar un mensaje para el cliente', 'trim|required');
        $this->form_validation->set_rules('email', 'Email no es valido', 'trim|valid_email');
        
        $datosc= $this->Cotizaciones_model->get_item($iditem);
        $datoscli = $this->Clientes_model->get_item($datosc->id_cliente);
        $nomsal=$this->Salones_model->get_item($datosc->id_salon);
        

        if ($this->form_validation->run() == TRUE) {
            

            $otromail=$this->input->post('email');
            
            //$email = "efvargasb@gmail.com";
            
            $this->smarty1->assign("datosc", $datosc);
            $this->smarty1->assign("datoscli", $datoscli);        
            $this->smarty1->assign("nomsal", $nomsal);
            $this->smarty1->assign("texto", $this->input->post('descripcion'));
            $body= $this->smarty1->fetch("admin/cotizaciones/mail_cliente.htm");

            $mail = new My_PHPMailer();
            $mail->FromName = "Hotel el Prado Barranquilla";
            $mail->Subject = "Cotización número: $datosc->id_cotizacion ";
            $mail->AddAddress($datoscli->email);
            if(!empty($otromail)){
                $mail->addCC($otromail);
            }
            $mail->AddBCC("noreply@hotelelpradobarranquilla.com");


            $mail->MsgHTML($body);

            $mail->addAttachment("userfiles/cotizacion/cotizacion".$iditem.".pdf");


            if (!$mail->Send()) {
                $this->session->set_flashdata('message', 'Error al enviar el correo');
            }else{
                $data2=array();
                $data2['id_cotizacion'] = $iditem;
                $data2['id_usuario'] = $this->session->user_id;
                $data2['id_operacion'] = 4;
                $transaccion = $this->Transaccion_model->set_datos($data2);
                $id_insertrans = $transaccion->add();
                $this->session->set_flashdata('message', 'Correo enviado satisfactoriamente');
            }
            redirect('admin/cotizaciones/index/'.$this->idmenu);
        }
        $this->data['email'] = array(
            'name' => 'email',
            'id' => 'email',
            'class' => 'form-control',
            'placeholder' => 'Email del Cliente',
            'type' => 'text',
            'value' => $this->form_validation->set_value('email'),
        );
        $descripcion = array(
            'name'        => 'descripcion',
            'id'          => 'descripcion',
            'value'       => set_value(''),
            'rows'        => '6',
            'class' => 'form-control',
            'style'       => 'width:100%',
            'value'       => $this->form_validation->set_value('descripcion')  
        );
        
        $this->data['button'] = array(
            'class' => 'btn btn-success',
            'name' => 'enviar',
            'value' => 'Enviar'
        );

        $this->smarty1->assign("listado", $this->listado);
        $this->smarty1->assign("datosc", $datosc);
        $this->smarty1->assign("datoscli", $datoscli);        
        $this->smarty1->assign("nomsal", $nomsal);
        $this->smarty1->assign("email", $this->data['email']);
        $this->smarty1->assign("descripcion", $descripcion);
        $this->smarty1->assign("button", $this->data['button']);
        $this->smarty1->assign("title", 'Enviar correo cliente');
        $this->smarty1->assign("idmenu", $this->idmenu);
        $this->smarty1->view('admin/cotizaciones/form_correo');
        
    }
    public function items(){
        $this->ion_auth->validate_login();

        $iditem = $this->uri->segment(5);
     
        // bail if no category id given
        if (!$iditem || empty($iditem) || !is_numeric($iditem)) {
            redirect('admin/cotizaciones/index/' . $this->idmenu, 'refresh');
        }        
        

        
        
        $item=$this->input->post('countryid');
        if(!empty($item)){
            //funcion para cambiar de estado los items anteriores;
            $id=$this->Cotizacionesitems_model->actualizar_estado_items($iditem);
            $iditems=$this->input->post('countryid');
            $itemcant=$this->input->post('country_cantidad');
            $itemval=$this->input->post('country_value');
            
            
            foreach ($iditems as $key=>$val){
                $data=array();
                $data['id_cotizacion']=$iditem;
                $data['id_item']=$val;
                $data['cantidad']=$itemcant[$key];
                $data['valor']=$itemval[$key];

                
                $salon = $this->Cotizacionesitems_model->set_datos($data);
                $id_insertado = $salon->add_items();
            }
            
            $data=array();
            $data['val_subtotal']=$this->input->post('stotal');;
            $data['val_ipc']=$this->input->post('tipc');
            $data['val_ival']=$this->input->post('tiva');
            $data['val_total']=$this->input->post('total');
            $data['observaciones']=$this->input->post('descripcion');
            $salon = $this->Cotizaciones_model->set_datos($data);
            $id_insertado = $salon->edit($iditem,$data);
            
            
            if ($id_insertado) {
                $this->generarCotizacionPDF($iditem);
                $this->session->set_flashdata('message', 'Cotización creada / editada Exitósamente');
            } else {
                $this->session->set_flashdata('message', 'Error al crear / editar el item');
            }
            
            redirect('admin/cotizaciones/index/' . $this->idmenu);
            
            
            
            
        }
        
        
        
        $datitems=$this->Cotizacionesitems_model->get_items($iditem);
        $datosc= $this->Cotizaciones_model->get_item($iditem);
        $datoscli = $this->Clientes_model->get_item($datosc->id_cliente);
        $nomsal=$this->Salones_model->get_item($datosc->id_salon);
        
        $descripcion = array(
            'name'        => 'descripcion',
            'id'          => 'descripcion',
            'value'       => set_value('descripcion',$datosc->observaciones),
            'rows'        => '6',
            'cols'        => '10',
            'class'       => 'form-control'
        );
        
        $this->data['button'] = array(
            'class' => 'btn btn-success',
            'name' => 'enviar',
            'value' => 'Enviar'
        );
        
        $this->smarty1->assign("listado", $this->listado);
        $this->smarty1->assign("datosc", $datosc);
        $this->smarty1->assign("datitems", $datitems);
        $this->smarty1->assign("datoscli", $datoscli);
        $this->smarty1->assign("nomsal", $nomsal);
        $this->smarty1->assign("title", 'Asignar Items');
        $this->smarty1->assign("idmenu", $this->idmenu);
        $this->smarty1->assign("button", $this->data['button']);
        $this->smarty1->assign("descripcion", $descripcion);
        $this->smarty1->assign("linkObtenerItem",base_url().'admin/cotizaciones/itemsAjax');
        $this->smarty1->assign("attributes", array('class' => 'form-login', 'id' => 'myform'));
        $this->smarty1->view('admin/cotizaciones/form_agregar_items');
        
        
    }
    public function itemsAjax(){
        
        $q=$this->input->post('name_startsWith');
        $row_num=$this->input->post('row_num');
        $row=$this->Items_model->get_items($q);
        $data=array();
        foreach ($row as $val){
            $name = $val->nombre.'|'.$val->id_item.'|'.$val->impuesto.'|'.$val->valor.'|'.$row_num;
            array_push($data, $name);
        }
        
        echo json_encode($data);
        
        
        
    }
     public function cotdep(){
        $this->ion_auth->validate_login();

        $iditem = $this->uri->segment(5);
     
        // bail if no category id given
        if (!$iditem || empty($iditem) || !is_numeric($iditem)) {
            redirect('admin/cotizaciones/index/' . $this->idmenu, 'refresh');
        }        
        
    
        $item=$this->input->post('countryid');
        if(!empty($item)){

            //funcion para cambiar de estado los items anteriores;
            $id=$this->Cotdep_model->actualizar_estado_items($iditem);
            $iditems=$this->input->post('countryid');
            $itemcant=$this->input->post('countryname');
            $itemval=$this->input->post('country_no');
            
            
            foreach ($iditems as $key=>$val){
                $data=array();
                $data['id_cotizacion']=$iditem;
                $data['id_dependencia']=$val;
                $data['observacion']=$itemval[$key];
                
                
                $salon = $this->Cotdep_model->set_datos($data);
                
                $id_insertado = $salon->add_items();

                
            }
                        
            if ($id_insertado) {
                $this->generarCotizacionInternaPDF($iditem);
                $this->session->set_flashdata('message', 'Cotización creada / editada Exitósamente');
            } else {
                $this->session->set_flashdata('message', 'Error al crear / editar el item');
            }
            redirect('admin/cotizaciones/index/' . $this->idmenu);
                                    
        }
        
        $datitems=$this->Cotdep_model->get_items($iditem);
        $datosc= $this->Cotizaciones_model->get_item($iditem);
        $datoscli = $this->Clientes_model->get_item($datosc->id_cliente);
        
        $descripcion = array(
            'name'        => 'descripcion',
            'id'          => 'descripcion',
            'value'       => set_value('descripcion',$datosc->observaciones),
            'rows'        => '50',
            'cols'        => '10',
            'class'       => 'form-control'
        );
        
        $this->data['button'] = array(
            'class' => 'btn btn-success',
            'name' => 'enviar',
            'value' => 'Enviar'
        );
        
        $this->smarty1->assign("listado", $this->listado);
        $this->smarty1->assign("datosc", $datosc);
        $this->smarty1->assign("datitems", $datitems);
        $this->smarty1->assign("datoscli", $datoscli);
        $this->smarty1->assign("title", 'Asignar Dependencias');
        $this->smarty1->assign("idmenu", $this->idmenu);
        $this->smarty1->assign("button", $this->data['button']);
        $this->smarty1->assign("descripcion", $descripcion);
        $this->smarty1->assign("linkObtenerItem",base_url().'admin/cotizaciones/CotdepAjax');
        $this->smarty1->view('admin/cotizaciones/form_agregar_dep');
        
        
    }
    
    
    public function CotdepAjax(){
        
        $q=$this->input->post('name_startsWith');
        $row_num=$this->input->post('row_num');
        $row=$this->Dependencias_model->get_items($q);
        $data=array();
        foreach ($row as $val){
            $name = $val->nombre.'|'.$val->id_dependencia.'|'.$row_num;
            array_push($data, $name);
        }
        
        echo json_encode($data);
               
        
    }

    public function generarCotizacionPDF($idCotizacion) {

        $this->ion_auth->validate_login();

        $iditem = $idCotizacion;

     
     
             
        // bail if no category id given
        if (!$iditem || empty($iditem) || !is_numeric($iditem)) {
            redirect('admin/cotizaciones/index/' . $this->idmenu, 'refresh');
        }

        $datitems=$this->Cotizacionesitems_model->get_items($iditem);
        $datosc= $this->Cotizaciones_model->get_item($iditem);
        $datoscli = $this->Clientes_model->get_item($datosc->id_cliente);
        $nomsal=$this->Salones_model->get_item($datosc->id_salon);
        
        $this->smarty1->assign("datosc", $datosc);
        $this->smarty1->assign("datitems", $datitems);
        $this->smarty1->assign("datoscli", $datoscli);
        $this->smarty1->assign("nomsal", $nomsal);
        //$this->smarty1->view('admin/cotizaciones/cotizacion_cliente');
        $html = $this->smarty1->fetch("admin/cotizaciones/cotizacion_cliente.htm");
        $header = '<table width="100%" style="border-bottom: 1px solid #000000; vertical-align: bottom; font-family: serif; font-size: 9pt; color: #000;"><tr>';
        $header.= '<td width="30%"><img style="width:50px" src="'.base_url().'assets/admin/images/logo_upn.png"> </td>';
        $header.= '<td width="50%"><div class="hotel" ><h2>Hotel el Prado</h2>
                                    <p>Carrera 54 No. 70-10 Barrio el Prado</p>
                                    <p>+57(5)3301540 </p>
                                    <p> info@hotelelpradobarranquilla.com </p>
                    </div></td>';
        $header.= '<td width="20%" align="center">Cotización:<b><br />'.$iditem.'</b></td></tr></table>';
        
        $stylesheet = file_get_contents(base_url().'assets/admin/css/estilospdf.css');

        $pdfFilePath = $this->config->item('file_path')."userfiles/cotizacion/cotizacion".$iditem.".pdf";

        $this->m_pdf->pdf->SetHTMLHeader($header);
        $this->m_pdf->pdf->WriteHTML($stylesheet,1);
        $this->m_pdf->pdf->WriteHTML($html,2);
        $this->m_pdf->pdf->Output($pdfFilePath, "F");
        

    }
    public function generarCotizacionInternaPDF($idCotizacion){

        $this->ion_auth->validate_login();

        $iditem = $idCotizacion;
        // bail if no category id given
        if (!$iditem || empty($iditem) || !is_numeric($iditem)) {
            redirect('admin/cotizaciones/index/' . $this->idmenu, 'refresh');
        }
        

        $datitems=$this->Cotizacionesitems_model->get_items($iditem);
        $datitemsdep=$this->Cotdep_model->get_items($iditem);
        $datosc= $this->Cotizaciones_model->get_item($iditem);
        $datoscli = $this->Clientes_model->get_item($datosc->id_cliente);
        $nomsal=$this->Salones_model->get_item($datosc->id_salon);

        
        $this->smarty1->assign("datosc", $datosc);
        $this->smarty1->assign("datitems", $datitems);
        $this->smarty1->assign("datitemsdep", $datitemsdep);
        $this->smarty1->assign("datoscli", $datoscli);
        $this->smarty1->assign("nomsal", $nomsal);
        //$this->smarty1->view('admin/cotizaciones/cotizacion_cliente');
        $html = $this->smarty1->fetch("admin/cotizaciones/cotizacion_interna.htm");
        $header = '<table width="100%" style="border-bottom: 1px solid #000000; vertical-align: bottom; font-family: serif; font-size: 9pt; color: #000;"><tr>';
        $header.= '<td width="30%"><img style="width:50px" src="'.base_url().'assets/admin/images/logo_upn.png"> </td>';
        $header.= '<td width="50%"><div class="hotel" ><h2>Hotel el Prado</h2>
                                    <p>Carrera 54 No. 70-10 Barrio el Prado</p>
                                    <p>+57(5)3301540 </p>
                                    <p> info@hotelelpradobarranquilla.com </p>
                    </div></td>';
        $header.= '<td width="20%" align="center">Cotización:<b><br />'.$iditem.'</b></td></tr></table>';
        
        $stylesheet = file_get_contents(base_url().'assets/admin/css/estilospdf.css');

        $pdfFilePath = $this->config->item('file_path')."userfiles/cotizacion/cotizacion_interna".$iditem.".pdf";
        $this->m_pdf->pdf->SetHTMLHeader($header);
        $this->m_pdf->pdf->WriteHTML($stylesheet,1);
        $this->m_pdf->pdf->WriteHTML($html,2);
        $this->m_pdf->pdf->Output($pdfFilePath, "F");        

    }
    public function verCotizacion() {

        $this->ion_auth->validate_login();

        $iditem = $this->uri->segment(4);

     
     
             
        // bail if no category id given
        if (!$iditem || empty($iditem) || !is_numeric($iditem)) {
            redirect('admin/cotizaciones/index/' . $this->idmenu, 'refresh');
        }

        $datitems=$this->Cotizacionesitems_model->get_items($iditem);
        $datosc= $this->Cotizaciones_model->get_item($iditem);
        $datoscli = $this->Clientes_model->get_item($datosc->id_cliente);
        $nomsal=$this->Salones_model->get_item($datosc->id_salon);
        
        $this->smarty1->assign("datosc", $datosc);
        $this->smarty1->assign("datitems", $datitems);
        $this->smarty1->assign("datoscli", $datoscli);
        $this->smarty1->assign("nomsal", $nomsal);
        //$this->smarty1->view('admin/cotizaciones/cotizacion_cliente');
        $html = $this->smarty1->fetch("admin/cotizaciones/cotizacion_cliente.htm");
        $header = '<table width="100%" style="border-bottom: 1px solid #000000; vertical-align: bottom; font-family: serif; font-size: 9pt; color: #000;"><tr>';
        $header.= '<td width="30%"><img style="width:50px" src="'.base_url().'assets/admin/images/logo_upn.png"> </td>';
        $header.= '<td width="50%"><div class="hotel" ><h2>Hotel el Prado</h2>
                                    <p>Carrera 54 No. 70-10 Barrio el Prado</p>
                                    <p>+57(5)3301540 </p>
                                    <p> info@hotelelpradobarranquilla.com </p>
                    </div></td>';
        $header.= '<td width="20%" align="center">Cotización:<b><br />'.$iditem.'</b></td></tr></table>';
        
        $stylesheet = file_get_contents(base_url().'assets/admin/css/estilospdf.css');

        $pdfFilePath = "cotizacion".$iditem.".pdf";

        
        $this->m_pdf->pdf->SetHTMLHeader($header);
        $this->m_pdf->pdf->WriteHTML($stylesheet,1);
        $this->m_pdf->pdf->WriteHTML($html,2);
        $this->m_pdf->pdf->Output($pdfFilePath, "D");
        ;

    }
    public function log(){
        
        $this->ion_auth->validate_login();
        
        $iditem = $this->uri->segment(5);
               
        //$this->smarty1->assign("transacciones", $this->Cotizaciones_model->transacciones());
        $this->smarty1->assign("listado", $this->listado);
        $total = $this->Cotizaciones_model->count_trans($iditem);
        $config['base_url'] = base_url() . 'admin/cotizaciones/log/'.$this->idmenu."/$iditem";
        $config['total_rows'] = $total;
        $config['per_page'] = 10;
        $config["uri_segment"] = 6;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(6)) ? $this->uri->segment(6) : 0;
        $this->data["transacciones"] = $this->Cotizaciones_model->fetch_cotizaciones($config["per_page"], $page,$iditem);
        $this->data["links"] = $this->pagination->create_links();
            
        $this->smarty1->assign("transacciones", $this->data["transacciones"]);   
        $this->smarty1->assign("links", $this->data["links"]);    
        $this->smarty1->assign("title", 'Log de transacciones');
        $this->smarty1->assign("idmenu", $this->idmenu);
        $this->smarty1->view('admin/cotizaciones/log');
    }

}
