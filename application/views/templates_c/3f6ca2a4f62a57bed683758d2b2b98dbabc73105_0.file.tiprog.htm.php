<?php
/* Smarty version 3.1.29, created on 2016-08-11 09:55:05
  from "/www/cotizaciones_prado/application/views/templates/admin/tiprog/tiprog.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57ac91c9ba16f8_31096038',
  'file_dependency' => 
  array (
    '3f6ca2a4f62a57bed683758d2b2b98dbabc73105' => 
    array (
      0 => '/www/cotizaciones_prado/application/views/templates/admin/tiprog/tiprog.htm',
      1 => 1465878253,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/tema/header.htm' => 1,
    'file:admin/tema/footer.htm' => 1,
  ),
),false)) {
function content_57ac91c9ba16f8_31096038 ($_smarty_tpl) {
?>
           <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  

<table class="table table-bordered" cellpadding=0 cellspacing=10>
	<tr>
		<th> Nombre</th>
		<th> Editar</th>
		<th> Eliminar</th>

	</tr>
	<?php
$_from = $_smarty_tpl->tpl_vars['tiprogs']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_tiprog_0_saved_item = isset($_smarty_tpl->tpl_vars['tiprog']) ? $_smarty_tpl->tpl_vars['tiprog'] : false;
$_smarty_tpl->tpl_vars['tiprog'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['tiprog']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['tiprog']->value) {
$_smarty_tpl->tpl_vars['tiprog']->_loop = true;
$__foreach_tiprog_0_saved_local_item = $_smarty_tpl->tpl_vars['tiprog'];
?>
		<tr>
            <td><?php echo $_smarty_tpl->tpl_vars['tiprog']->value->nombre;?>
</td>
          
                 <td>
                     <a href="<?php echo base_url();?>
admin/tiprog/editar_tiprog/<?php echo $_smarty_tpl->tpl_vars['tiprog']->value->id_tiprog;?>
" class="btn btn-warning">Editar</a> <br />                        
                 </td>
                 <td>
                     <a href="<?php echo base_url();?>
admin/tiprog/borrar_tiprog/<?php echo $_smarty_tpl->tpl_vars['tiprog']->value->id_tiprog;?>
" class="btn btn-danger">Eliminar</a> <br />                        
                 </td>

		</tr>
	<?php
$_smarty_tpl->tpl_vars['tiprog'] = $__foreach_tiprog_0_saved_local_item;
}
if ($__foreach_tiprog_0_saved_item) {
$_smarty_tpl->tpl_vars['tiprog'] = $__foreach_tiprog_0_saved_item;
}
?>
</table>

<p><a href="<?php echo base_url();?>
admin/tiprog/crear_tiprog" class="btn btn-info">Crear Nuevo Tipo de Programación</a> 
           <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
