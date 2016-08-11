<?php
/* Smarty version 3.1.29, created on 2016-07-12 16:46:51
  from "/var/www/code_ionauth/application/views/templates/admin/catmenuprin/borrar_catmenuprin.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5785654b265478_66266507',
  'file_dependency' => 
  array (
    '84cb3819e7b5ec543681735afc5199f9b0d68d32' => 
    array (
      0 => '/var/www/code_ionauth/application/views/templates/admin/catmenuprin/borrar_catmenuprin.htm',
      1 => 1468359823,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/tema/header.htm' => 1,
    'file:admin/tema/footer.htm' => 1,
  ),
),false)) {
function content_5785654b265478_66266507 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<p><?php echo sprintf('Esta Seguro que desea Eliminar la Categoria: "%s"',sprintf("%s",$_smarty_tpl->tpl_vars['categoria']->value->nombre));?>
</p>

<?php echo form_open(("admin/catmenuprin/borrar_catmenuprin/").($_smarty_tpl->tpl_vars['categoria']->value->id_catmenuprin));?>


  <p>
  	<?php echo lang('deactivate_confirm_y_label','confirm');?>

    <input type="radio" name="confirm" value="yes" checked="checked" />
    <?php echo lang('deactivate_confirm_n_label','confirm');?>

    <input type="radio" name="confirm" value="no" />
  </p>


  <?php echo form_hidden(array('id'=>$_smarty_tpl->tpl_vars['categoria']->value->id_catmenuprin));?>



  <p><?php echo form_submit($_smarty_tpl->tpl_vars['button']->value);?>
</p>

	<?php echo form_close();?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
