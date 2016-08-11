<?php
/* Smarty version 3.1.29, created on 2016-07-05 17:09:10
  from "/var/www/code_ionauth/application/views/templates/admin/dependencias/dependencias.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_577c3006d21e90_64128952',
  'file_dependency' => 
  array (
    '58102ded4c5918a56c2d97466012256eb26533bb' => 
    array (
      0 => '/var/www/code_ionauth/application/views/templates/admin/dependencias/dependencias.htm',
      1 => 1466541669,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/tema/header.htm' => 1,
    'file:admin/tema/footer.htm' => 1,
  ),
),false)) {
function content_577c3006d21e90_64128952 ($_smarty_tpl) {
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
$_from = $_smarty_tpl->tpl_vars['dependencias']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_dependencia_0_saved_item = isset($_smarty_tpl->tpl_vars['dependencia']) ? $_smarty_tpl->tpl_vars['dependencia'] : false;
$_smarty_tpl->tpl_vars['dependencia'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['dependencia']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['dependencia']->value) {
$_smarty_tpl->tpl_vars['dependencia']->_loop = true;
$__foreach_dependencia_0_saved_local_item = $_smarty_tpl->tpl_vars['dependencia'];
?>
		<tr>
            <td><?php echo $_smarty_tpl->tpl_vars['dependencia']->value->nombre;?>
</td>
          
                 <td>
                     <a href="<?php echo base_url();?>
admin/dependencias/editar_dependencia/<?php echo $_smarty_tpl->tpl_vars['dependencia']->value->id_dependencia;?>
" class="btn btn-warning">Editar</a> <br />                        
                 </td>
                 <td>
                     <a href="<?php echo base_url();?>
admin/dependencias/borrar_dependencia/<?php echo $_smarty_tpl->tpl_vars['dependencia']->value->id_dependencia;?>
" class="btn btn-danger">Eliminar</a> <br />                        
                 </td>

		</tr>
	<?php
$_smarty_tpl->tpl_vars['dependencia'] = $__foreach_dependencia_0_saved_local_item;
}
if ($__foreach_dependencia_0_saved_item) {
$_smarty_tpl->tpl_vars['dependencia'] = $__foreach_dependencia_0_saved_item;
}
?>
</table>



<p><a href="<?php echo base_url();?>
admin/dependencias/crear_dependencia" class="btn btn-info">Crear Nueva Dependencia</a> 
           <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
