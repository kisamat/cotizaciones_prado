<?php
/* Smarty version 3.1.29, created on 2016-08-11 16:38:16
  from "/www/cotizaciones_prado/application/views/templates/admin/salones/form_categoria.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57acf04820bf18_30040122',
  'file_dependency' => 
  array (
    '4bc8366bb27afc4cd8111b871b99803b3bcf6ad3' => 
    array (
      0 => '/www/cotizaciones_prado/application/views/templates/admin/salones/form_categoria.htm',
      1 => 1470944750,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/tema/header.htm' => 1,
    'file:admin/tema/footer.htm' => 1,
  ),
),false)) {
function content_57acf04820bf18_30040122 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php echo form_open('');?>


      <p>
            <?php echo form_label('Nombre del salon','nombre');?>
 <br />
            <?php echo form_input($_smarty_tpl->tpl_vars['nombre']->value);?>
<div id="error"><?php echo form_error('nombre');?>
</div><br>
      </p>
      <p>
          <?php echo form_label('Descripción del salon','descripcion');?>
 <br />
          <?php echo form_textarea($_smarty_tpl->tpl_vars['descripcion']->value);?>
<div id="error"><?php echo form_error('descripcion');?>
</div><br>
      </p>

      

      <p><?php echo form_submit($_smarty_tpl->tpl_vars['button']->value);?>
</p>

<?php echo form_close();?>


<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
