<?php
/* Smarty version 3.1.29, created on 2016-07-12 14:37:52
  from "/var/www/code_ionauth/application/views/templates/admin/categmis/crear_categmis.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57854710886289_12460583',
  'file_dependency' => 
  array (
    'a1fa93c6ae3d07df36792da012e2c4effeb14eb2' => 
    array (
      0 => '/var/www/code_ionauth/application/views/templates/admin/categmis/crear_categmis.htm',
      1 => 1468352130,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/tema/header.htm' => 1,
    'file:admin/tema/footer.htm' => 1,
  ),
),false)) {
function content_57854710886289_12460583 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<p>Crear Categoria</p><br>


<?php echo form_open("admin/categmis/crear_categmis");?>


      <p>
            <?php echo form_label('Nombre Categoria','nombre');?>
 <br />
            <?php echo form_input($_smarty_tpl->tpl_vars['nombre']->value);?>
<div id="error"><?php echo form_error('nombre');?>
</div><br>
      </p>

      

      <p><?php echo form_submit($_smarty_tpl->tpl_vars['button']->value);?>
</p>

<?php echo form_close();?>


<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
