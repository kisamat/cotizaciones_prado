<?php
/* Smarty version 3.1.29, created on 2016-08-11 09:54:32
  from "/www/cotizaciones_prado/application/views/templates/admin/dependencias/crear_dependencia.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57ac91a87bc038_58751489',
  'file_dependency' => 
  array (
    '136457e9ff20a4efd149a0b5ff0fff93fa94c64f' => 
    array (
      0 => '/www/cotizaciones_prado/application/views/templates/admin/dependencias/crear_dependencia.htm',
      1 => 1465921199,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/tema/header.htm' => 1,
    'file:admin/tema/footer.htm' => 1,
  ),
),false)) {
function content_57ac91a87bc038_58751489 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<p>Crear Dependencia</p><br>


<?php echo form_open("admin/dependencias/crear_dependencia");?>


      <p>
            <?php echo form_label('Nombre Dependencia','nombre');?>
 <br />
            <?php echo form_input($_smarty_tpl->tpl_vars['nombre']->value);?>
<div id="error"><?php echo form_error('nombre');?>
</div><br>
      </p>

      

      <p><?php echo form_submit($_smarty_tpl->tpl_vars['button']->value);?>
</p>

<?php echo '<?php ';?>echo form_close();<?php echo '?>';?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
