<?php
/* Smarty version 3.1.29, created on 2016-07-12 10:44:28
  from "/var/www/code_ionauth/application/views/templates/admin/tiprog/borrar_tiprog.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5785105c093563_52065936',
  'file_dependency' => 
  array (
    'e0ca3597f42507b49ea2e823900d5b49aa40882b' => 
    array (
      0 => '/var/www/code_ionauth/application/views/templates/admin/tiprog/borrar_tiprog.htm',
      1 => 1465878327,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/tema/header.htm' => 1,
    'file:admin/tema/footer.htm' => 1,
  ),
),false)) {
function content_5785105c093563_52065936 ($_smarty_tpl) {
?>
           <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<p><?php echo sprintf('Esta Seguro que desea Eliminar el Tipo de Programación : "%s"',sprintf("%s",$_smarty_tpl->tpl_vars['tiprog']->value->nombre));?>
</p>

<?php echo form_open(("admin/tiprog/borrar_tiprog/").($_smarty_tpl->tpl_vars['tiprog']->value->id_tiprog));?>


  <p>
  	<?php echo lang('deactivate_confirm_y_label','confirm');?>

    <input type="radio" name="confirm" value="yes" checked="checked" />
    <?php echo lang('deactivate_confirm_n_label','confirm');?>

    <input type="radio" name="confirm" value="no" />
  </p>

  

  <?php echo form_hidden(array('id'=>$_smarty_tpl->tpl_vars['tiprog']->value->id_tiprog));?>



  <p><?php echo form_submit($_smarty_tpl->tpl_vars['button']->value);?>
</p>

	<?php echo form_close();?>

           <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
