<?php
/* Smarty version 3.1.29, created on 2016-08-11 18:48:37
  from "/www/cotizaciones_prado/application/views/templates/admin/auth/deactivate_user.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57ad0ed501c842_85104331',
  'file_dependency' => 
  array (
    '961d694e9ad963ce5409f13231401cf9b79ac725' => 
    array (
      0 => '/www/cotizaciones_prado/application/views/templates/admin/auth/deactivate_user.htm',
      1 => 1466107936,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/tema/header.htm' => 1,
    'file:admin/tema/footer.htm' => 1,
  ),
),false)) {
function content_57ad0ed501c842_85104331 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<p><?php echo sprintf(lang('deactivate_subheading'),sprintf("%s",$_smarty_tpl->tpl_vars['user']->value->username));?>
</p>

<?php echo form_open(("admin/auth/deactivate/").($_smarty_tpl->tpl_vars['user']->value->id));?>


  <p>
  	<?php echo lang('deactivate_confirm_y_label','confirm');?>

    <input type="radio" name="confirm" value="yes" checked="checked" />
    <?php echo lang('deactivate_confirm_n_label','confirm');?>

    <input type="radio" name="confirm" value="no" />
  </p>

  <?php echo form_hidden($_smarty_tpl->tpl_vars['csrf']->value);?>

  

  <?php echo form_hidden(array('id'=>$_smarty_tpl->tpl_vars['user']->value->id));?>



  <p><?php echo form_submit($_smarty_tpl->tpl_vars['button']->value);?>
</p>

	<?php echo form_close();?>


<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
