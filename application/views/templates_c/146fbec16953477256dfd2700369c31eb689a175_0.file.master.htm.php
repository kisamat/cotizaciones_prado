<?php
/* Smarty version 3.1.29, created on 2016-08-20 23:55:03
  from "/www/cotizaciones_prado/application/views/templates/admin/dependencias/master.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57b8dfc765bc26_59506505',
  'file_dependency' => 
  array (
    '146fbec16953477256dfd2700369c31eb689a175' => 
    array (
      0 => '/www/cotizaciones_prado/application/views/templates/admin/dependencias/master.htm',
      1 => 1471375769,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/tema/header.htm' => 1,
    'file:admin/tema/modal_delitem.htm' => 1,
    'file:admin/tema/footer.htm' => 1,
  ),
),false)) {
function content_57b8dfc765bc26_59506505 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php echo '<script'; ?>
>
    $(function () {
      $('.remove-item').click(function () {
        $("#delConfirmBtn").attr("href", $(this).attr("href"));
        $('#myModalDel').modal('show');
        return false;
      });
    });
<?php echo '</script'; ?>
>
  

<table class="table table-bordered" cellpadding=0 cellspacing=10>
	<tr>
		<th> Nombre </th>
                
                <th colspan="2" class="tit-opcion-admin" > <a href="<?php echo base_url();?>
admin/dependencias/crear/<?php echo $_smarty_tpl->tpl_vars['idmenu']->value;?>
" class="btn btn-info nuevo-item">Crear nuevo item</a></th>

	</tr>
	<?php
$_from = $_smarty_tpl->tpl_vars['data']->value;
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
admin/dependencias/editar/<?php echo $_smarty_tpl->tpl_vars['categoria']->value->id_dependencia;?>
" class="btn btn-warning">Editar</a> <br />                        
                 </td>
                 <td>
                     <a href="<?php echo base_url();?>
admin/dependencias/borrar/<?php echo $_smarty_tpl->tpl_vars['idmenu']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['categoria']->value->id_dependencia;?>
" class="remove-item btn btn-danger">Eliminar</a> <br />                        
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

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/modal_delitem.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
