<?php
/* Smarty version 3.1.29, created on 2016-08-11 09:53:34
  from "/www/cotizaciones_prado/application/views/templates/admin/catperuser/catperuser.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57ac916e79e941_98979122',
  'file_dependency' => 
  array (
    '26ec59d0bb1711631902ec5ff74134f28ae8dc17' => 
    array (
      0 => '/www/cotizaciones_prado/application/views/templates/admin/catperuser/catperuser.htm',
      1 => 1468360554,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/tema/header.htm' => 1,
    'file:admin/tema/footer.htm' => 1,
  ),
),false)) {
function content_57ac916e79e941_98979122 ($_smarty_tpl) {
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
$_from = $_smarty_tpl->tpl_vars['categorias']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_categoria_0_saved_item = isset($_smarty_tpl->tpl_vars['categoria']) ? $_smarty_tpl->tpl_vars['categoria'] : false;
$_smarty_tpl->tpl_vars['categoria'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['categoria']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['categoria']->value) {
$_smarty_tpl->tpl_vars['categoria']->_loop = true;
$__foreach_categoria_0_saved_local_item = $_smarty_tpl->tpl_vars['categoria'];
?>
		<tr>
            <td><?php echo $_smarty_tpl->tpl_vars['categoria']->value->nombre;?>
</td>
          
                 <td>
                     <a href="<?php echo base_url();?>
admin/catperuser/editar_catperuser/<?php echo $_smarty_tpl->tpl_vars['categoria']->value->id_catperuser;?>
" class="btn btn-warning">Editar</a> <br />                        
                 </td>
                 <td>
                     <a href="<?php echo base_url();?>
admin/catperuser/borrar_catperuser/<?php echo $_smarty_tpl->tpl_vars['categoria']->value->id_catperuser;?>
" class="btn btn-danger">Eliminar</a> <br />                        
                 </td>

		</tr>
	<?php
$_smarty_tpl->tpl_vars['categoria'] = $__foreach_categoria_0_saved_local_item;
}
if ($__foreach_categoria_0_saved_item) {
$_smarty_tpl->tpl_vars['categoria'] = $__foreach_categoria_0_saved_item;
}
?>
</table>

<p><a href="<?php echo base_url();?>
admin/catperuser/crear_catperuser" class="btn btn-info">Crear Nueva Categoria</a> 
           <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
