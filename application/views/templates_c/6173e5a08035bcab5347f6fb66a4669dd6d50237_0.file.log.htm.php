<?php
/* Smarty version 3.1.29, created on 2016-08-23 02:09:21
  from "/www/cotizaciones_prado/application/views/templates/admin/cotizaciones/log.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57bba241cb15a2_21946978',
  'file_dependency' => 
  array (
    '6173e5a08035bcab5347f6fb66a4669dd6d50237' => 
    array (
      0 => '/www/cotizaciones_prado/application/views/templates/admin/cotizaciones/log.htm',
      1 => 1471914390,
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
function content_57bba241cb15a2_21946978 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/www/cotizaciones_prado/application/third_party/smarty/libs/plugins/modifier.date_format.php';
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
		<th> Fecha</th>
                <th> Cotización No</th>
                <th> Operación</th>
                <th> Usuario</th>

	</tr>
	<?php
$_from = $_smarty_tpl->tpl_vars['transacciones']->value;
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
            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['categoria']->value->fechac,"%A, %B %e, %Y");?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['categoria']->value->id_cotizacion;?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['categoria']->value->nombre;?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['categoria']->value->username;?>
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
<?php echo $_smarty_tpl->tpl_vars['links']->value;?>


<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/modal_delitem.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


 <?php }
}
