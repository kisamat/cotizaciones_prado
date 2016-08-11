<?php
/* Smarty version 3.1.29, created on 2016-07-12 14:53:30
  from "/var/www/code_ionauth/application/views/templates/admin/categmis/borrar_categmis.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57854aba9863b3_48323660',
  'file_dependency' => 
  array (
    '374c0d22eabd119f4afc2978137daedd355289e7' => 
    array (
      0 => '/var/www/code_ionauth/application/views/templates/admin/categmis/borrar_categmis.htm',
      1 => 1468353208,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/tema/header.htm' => 1,
    'file:admin/tema/footer.htm' => 1,
  ),
),false)) {
function content_57854aba9863b3_48323660 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<p><?php echo sprintf('Esta Seguro que desea Eliminar la Categoria: "%s"',sprintf("%s",$_smarty_tpl->tpl_vars['categoria']->value->nombre));?>
</p>

<?php echo form_open(("admin/categmis/borrar_categmis/").($_smarty_tpl->tpl_vars['categoria']->value->id_categmis));?>


  <p>
  	<?php echo lang('deactivate_confirm_y_label','confirm');?>

    <input type="radio" name="confirm" value="yes" checked="checked" />
    <?php echo lang('deactivate_confirm_n_label','confirm');?>

    <input type="radio" name="confirm" value="no" />
  </p>

  <?php echo form_hidden(array('id'=>$_smarty_tpl->tpl_vars['categoria']->value->id_categmis));?>



  <p><?php echo form_submit($_smarty_tpl->tpl_vars['button']->value);?>
</p>

	<?php echo form_close();?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
