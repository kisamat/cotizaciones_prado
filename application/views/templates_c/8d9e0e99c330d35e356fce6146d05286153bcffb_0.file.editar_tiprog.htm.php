<?php
/* Smarty version 3.1.29, created on 2016-07-12 10:44:18
  from "/var/www/code_ionauth/application/views/templates/admin/tiprog/editar_tiprog.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57851052662ca4_95783635',
  'file_dependency' => 
  array (
    '8d9e0e99c330d35e356fce6146d05286153bcffb' => 
    array (
      0 => '/var/www/code_ionauth/application/views/templates/admin/tiprog/editar_tiprog.htm',
      1 => 1465878381,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/tema/header.htm' => 1,
    'file:admin/tema/footer.htm' => 1,
  ),
),false)) {
function content_57851052662ca4_95783635 ($_smarty_tpl) {
?>
           <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<p>Editar Tipo de Programación </p><br>

<?php echo form_open(current_url());?>


     <p>
            <?php echo form_label('Nombre Tipo de Programación ','nombre');?>
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
