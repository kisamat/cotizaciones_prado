<?php
/* Smarty version 3.1.29, created on 2016-07-05 22:45:42
  from "/var/www/code_ionauth/application/views/templates/admin/categnot/categnot.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_577c7ee6df2150_94215145',
  'file_dependency' => 
  array (
    'ad174118173db01ae8057ceeb3a8b11690f972c3' => 
    array (
      0 => '/var/www/code_ionauth/application/views/templates/admin/categnot/categnot.htm',
      1 => 1466477376,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/tema/header.htm' => 1,
    'file:admin/tema/footer.htm' => 1,
  ),
),false)) {
function content_577c7ee6df2150_94215145 ($_smarty_tpl) {
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
$_from = $_smarty_tpl->tpl_vars['categnots']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_categnot_0_saved_item = isset($_smarty_tpl->tpl_vars['categnot']) ? $_smarty_tpl->tpl_vars['categnot'] : false;
$_smarty_tpl->tpl_vars['categnot'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['categnot']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['categnot']->value) {
$_smarty_tpl->tpl_vars['categnot']->_loop = true;
$__foreach_categnot_0_saved_local_item = $_smarty_tpl->tpl_vars['categnot'];
?>
		<tr>
            <td><?php echo $_smarty_tpl->tpl_vars['categnot']->value->nombre;?>
</td>
          
                 <td>
                     <a href="<?php echo base_url();?>
admin/categnot/editar_categnot/<?php echo $_smarty_tpl->tpl_vars['categnot']->value->id_categnot;?>
" class="btn btn-warning">Editar</a> <br />                        
                 </td>
                 <td>
                     <a href="<?php echo base_url();?>
admin/categnot/borrar_categnot/<?php echo $_smarty_tpl->tpl_vars['categnot']->value->id_categnot;?>
" class="btn btn-danger">Eliminar</a> <br />                        
                 </td>

		</tr>
	<?php
$_smarty_tpl->tpl_vars['categnot'] = $__foreach_categnot_0_saved_local_item;
}
if ($__foreach_categnot_0_saved_item) {
$_smarty_tpl->tpl_vars['categnot'] = $__foreach_categnot_0_saved_item;
}
?>
</table>

<p><a href="<?php echo base_url();?>
admin/categnot/crear_categnot" class="btn btn-info">Crear Nueva Categoria</a> 
           <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
