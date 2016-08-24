<?php
/* Smarty version 3.1.29, created on 2016-08-21 18:10:49
  from "/www/cotizaciones_prado/application/views/templates/admin/cotizaciones/cambiar_estado.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57b9e099389893_27644197',
  'file_dependency' => 
  array (
    'c0db8636c70b08930c683a0160b700fe50a7f9c1' => 
    array (
      0 => '/www/cotizaciones_prado/application/views/templates/admin/cotizaciones/cambiar_estado.htm',
      1 => 1471798678,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/tema/header.htm' => 1,
    'file:admin/tema/footer.htm' => 1,
  ),
),false)) {
function content_57b9e099389893_27644197 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>




<p>El estado actual de su Cotización es: <b><?php echo $_smarty_tpl->tpl_vars['datos']->value->nombre;?>
</b></p> <br><br> 

<?php echo form_open('');?>


 <p>
    <?php echo form_label('Escoja el Estado de la Cotización','estado');?>
 <br />
    <?php echo form_dropdown($_smarty_tpl->tpl_vars['estado']->value,$_smarty_tpl->tpl_vars['estados']->value);?>
<div id="error"><?php echo form_error('estado');?>
</div><br> 
</p>


  <p><?php echo form_submit($_smarty_tpl->tpl_vars['button']->value);?>
</p>

	<?php echo form_close();?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
