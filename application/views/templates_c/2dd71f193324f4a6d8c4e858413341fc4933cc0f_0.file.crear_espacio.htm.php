<?php
/* Smarty version 3.1.29, created on 2016-08-11 10:04:28
  from "/www/cotizaciones_prado/application/views/templates/admin/espacios/crear_espacio.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57ac93fce590d6_43925101',
  'file_dependency' => 
  array (
    '2dd71f193324f4a6d8c4e858413341fc4933cc0f' => 
    array (
      0 => '/www/cotizaciones_prado/application/views/templates/admin/espacios/crear_espacio.htm',
      1 => 1465921227,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/tema/header.htm' => 1,
    'file:admin/tema/footer.htm' => 1,
  ),
),false)) {
function content_57ac93fce590d6_43925101 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<p>Crear Espacio</p><br>


<?php echo form_open("admin/espacios/crear_espacio");?>



<div class="form-group">
        <p>
            <?php echo form_label('Escoja el Espacio Padre','id_padre');?>
 <br />
            <?php echo form_dropdown($_smarty_tpl->tpl_vars['id_padre']->value,$_smarty_tpl->tpl_vars['padres']->value);?>
<br>    
        </p>
      <p>
            <?php echo form_label('Nombre Espacio','nombre');?>
 <br />
            <?php echo form_input($_smarty_tpl->tpl_vars['nombre']->value);?>
<div id="error"><?php echo form_error('nombre');?>
</div><br>
      </p>
</div>
      

      <p><?php echo form_submit($_smarty_tpl->tpl_vars['button']->value);?>
</p>

<?php echo '<?php ';?>echo form_close();<?php echo '?>';?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
