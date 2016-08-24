<?php
/* Smarty version 3.1.29, created on 2016-08-21 01:46:03
  from "/www/cotizaciones_prado/application/views/templates/admin/items/master.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57b8f9cb155925_73731425',
  'file_dependency' => 
  array (
    '3c2077d3451c2158324480cfb5afcc7f3300a2fc' => 
    array (
      0 => '/www/cotizaciones_prado/application/views/templates/admin/items/master.htm',
      1 => 1471740358,
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
function content_57b8f9cb155925_73731425 ($_smarty_tpl) {
if (!is_callable('smarty_function_math')) require_once '/www/cotizaciones_prado/application/third_party/smarty/libs/plugins/function.math.php';
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
                <th> Valor por unidad </th>
                <th> Valor IVA </th>
                <th colspan="2" class="tit-opcion-admin" > <a href="<?php echo base_url();?>
admin/<?php echo $_smarty_tpl->tpl_vars['linkCrear']->value;?>
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
            <td>$<?php echo $_smarty_tpl->tpl_vars['categoria']->value->valor;?>
</td>
            <td><?php echo smarty_function_math(array('equation'=>"x * y",'x'=>$_smarty_tpl->tpl_vars['categoria']->value->impuesto,'y'=>100),$_smarty_tpl);?>
%</td>
            <td>
                <a href="<?php echo base_url();?>
admin/<?php echo $_smarty_tpl->tpl_vars['linkEditar']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['categoria']->value->id_item;?>
" class="btn btn-warning">Editar</a> <br />                        
            </td>
            <td>
                <a href="<?php echo base_url();?>
admin/<?php echo $_smarty_tpl->tpl_vars['linkEliminar']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['categoria']->value->id_item;?>
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
