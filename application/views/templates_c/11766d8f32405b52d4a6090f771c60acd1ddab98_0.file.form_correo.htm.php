<?php
/* Smarty version 3.1.29, created on 2016-08-22 12:25:26
  from "/www/cotizaciones_prado/application/views/templates/admin/cotizaciones/form_correo.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57bae1264cc722_25148705',
  'file_dependency' => 
  array (
    '11766d8f32405b52d4a6090f771c60acd1ddab98' => 
    array (
      0 => '/www/cotizaciones_prado/application/views/templates/admin/cotizaciones/form_correo.htm',
      1 => 1471865121,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/tema/header.htm' => 1,
    'file:admin/tema/footer.htm' => 1,
  ),
),false)) {
function content_57bae1264cc722_25148705 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php echo form_open('');?>


<div class="row">
    <div class='col-md-12'>
        <p>Salon: <b><?php echo $_smarty_tpl->tpl_vars['nomsal']->value->nombre;?>
</b></p>
    </div>
    
    <div class='col-md-6'>
        <p><b>Cotización No: </b><?php echo $_smarty_tpl->tpl_vars['datosc']->value->id_cotizacion;?>
</p>
        <p><b>Fecha del evento No: </b><?php echo $_smarty_tpl->tpl_vars['datosc']->value->fechai;?>
 <?php echo $_smarty_tpl->tpl_vars['datosc']->value->horai;?>
 A  <?php echo $_smarty_tpl->tpl_vars['datosc']->value->fechaf;?>
 <?php echo $_smarty_tpl->tpl_vars['datosc']->value->horaf;?>
</p>
    </div>
    <div class='col-md-6'>
        <p><b>Cliente: </b><?php echo $_smarty_tpl->tpl_vars['datoscli']->value->nombres;?>
 <?php echo $_smarty_tpl->tpl_vars['datoscli']->value->apellidos;?>
</p>
        <p><b>NIT/Documento: </b><?php echo $_smarty_tpl->tpl_vars['datoscli']->value->documento;?>
</p>
        <p><b>Correo eléctronico: </b><?php echo $_smarty_tpl->tpl_vars['datoscli']->value->email;?>
</p>
    </div>    
</div>
<div class="row">
    <div class='col-md-12'>
        <?php echo form_label('Correo electronico secundario');?>

        <div class="form-group">
        <?php echo form_input($_smarty_tpl->tpl_vars['email']->value);?>

        </div>
        <div id="error"><?php echo form_error('email');?>
</div>
    </div>
    <div class='col-md-12'>
        <?php echo form_label('Cuerpo del correo');?>

        <div class="form-group">
        <?php echo form_textarea($_smarty_tpl->tpl_vars['descripcion']->value);?>

        </div>
        <div id="error"><?php echo form_error('descripcion');?>
</div>
    </div>        
</div>       
<div class="row">
<div class='col-md-12 right'>
        <div class="form-group">
            <?php echo form_submit($_smarty_tpl->tpl_vars['button']->value);?>

        </div>
    </div>        
</div>
    
<?php echo form_close();?>



<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php }
}
