<?php
/* Smarty version 3.1.29, created on 2016-07-11 09:48:37
  from "/var/www/code_ionauth/application/views/templates/admin/noticias/borrar_noticia.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5783b1c57dfc59_24633465',
  'file_dependency' => 
  array (
    '437a625a036f32b9954da958081290b59a79e9bc' => 
    array (
      0 => '/var/www/code_ionauth/application/views/templates/admin/noticias/borrar_noticia.htm',
      1 => 1467064746,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/tema/header.htm' => 1,
    'file:admin/tema/footer.htm' => 1,
  ),
),false)) {
function content_5783b1c57dfc59_24633465 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<p><?php echo sprintf('Esta Seguro que desea Eliminar la Noticia: "%s"',sprintf("%s",$_smarty_tpl->tpl_vars['noticia']->value->titulo));?>
</p>

<?php echo form_open(("admin/noticias/borrar_noticia/").($_smarty_tpl->tpl_vars['noticia']->value->id_noticia));?>


  <p>
  	<?php echo lang('deactivate_confirm_y_label','confirm');?>

    <input type="radio" name="confirm" value="yes" checked="checked" />
    <?php echo lang('deactivate_confirm_n_label','confirm');?>

    <input type="radio" name="confirm" value="no" />
  </p>

  <?php echo form_hidden(array('id'=>$_smarty_tpl->tpl_vars['noticia']->value->id_noticia));?>



  <p><?php echo form_submit($_smarty_tpl->tpl_vars['button']->value);?>
</p>

	<?php echo form_close();?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
