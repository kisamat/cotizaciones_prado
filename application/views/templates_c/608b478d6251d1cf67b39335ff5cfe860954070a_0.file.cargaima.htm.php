<?php
/* Smarty version 3.1.29, created on 2016-07-04 19:39:48
  from "/var/www/code_ionauth/application/views/templates/admin/noticias/cargaima.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_577b01d45f66e7_93713913',
  'file_dependency' => 
  array (
    '608b478d6251d1cf67b39335ff5cfe860954070a' => 
    array (
      0 => '/var/www/code_ionauth/application/views/templates/admin/noticias/cargaima.htm',
      1 => 1467061252,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/tema/header.htm' => 1,
    'file:admin/tema/footer.htm' => 1,
  ),
),false)) {
function content_577b01d45f66e7_93713913 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


 <!-- Error Message will show up here -->
<?php echo form_open_multipart(current_url());?>


<span>
    <?php echo form_label('Agregue la imagen de la Noticia','userfile');?>
 <br /><br />
    <?php echo form_upload($_smarty_tpl->tpl_vars['userfile']->value);?>
<div id="error"><?php echo form_error('userfile');?>
</div><br>
</span><br>

<span><?php echo form_submit($_smarty_tpl->tpl_vars['button']->value);?>
</span>

<?php echo form_close();?>


<br><br>
<h5>Esta es la Imagen asignada</h5> <br>
<img src="<?php echo base_url();?>
userfiles/uploads/<?php echo $_smarty_tpl->tpl_vars['noticia']->value->archivo;?>
" width="100" height="100">

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>






<?php }
}
