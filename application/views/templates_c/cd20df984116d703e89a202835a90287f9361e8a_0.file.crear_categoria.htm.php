<?php
/* Smarty version 3.1.29, created on 2016-07-12 14:35:32
  from "/var/www/code_ionauth/application/views/templates/admin/categorias/crear_categoria.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_578546841027b3_56131040',
  'file_dependency' => 
  array (
    'cd20df984116d703e89a202835a90287f9361e8a' => 
    array (
      0 => '/var/www/code_ionauth/application/views/templates/admin/categorias/crear_categoria.htm',
      1 => 1467214016,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/tema/header.htm' => 1,
    'file:admin/tema/footer.htm' => 1,
  ),
),false)) {
function content_578546841027b3_56131040 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<p>Crear Categoria</p><br>


<?php echo form_open("admin/categorias/crear_categoria");?>


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
