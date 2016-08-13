<?php
/* Smarty version 3.1.29, created on 2016-08-11 18:05:38
  from "/www/cotizaciones_prado/application/views/templates/admin/catperuser/crear_catperuser.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57ad04c29bdff7_03819111',
  'file_dependency' => 
  array (
    'b5aa0a5588c467ad83fe985a2b9a330678d490ef' => 
    array (
      0 => '/www/cotizaciones_prado/application/views/templates/admin/catperuser/crear_catperuser.htm',
      1 => 1468360576,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/tema/header.htm' => 1,
    'file:admin/tema/footer.htm' => 1,
  ),
),false)) {
function content_57ad04c29bdff7_03819111 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<p>Crear Categoria</p><br>


<?php echo form_open("admin/catperuser/crear_catperuser");?>


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
