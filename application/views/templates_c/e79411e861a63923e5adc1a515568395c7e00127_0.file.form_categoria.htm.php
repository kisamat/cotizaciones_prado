<?php
/* Smarty version 3.1.29, created on 2016-08-21 01:17:32
  from "/www/cotizaciones_prado/application/views/templates/admin/items/form_categoria.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57b8f31cbe3503_60038839',
  'file_dependency' => 
  array (
    'e79411e861a63923e5adc1a515568395c7e00127' => 
    array (
      0 => '/www/cotizaciones_prado/application/views/templates/admin/items/form_categoria.htm',
      1 => 1471738649,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/tema/header.htm' => 1,
    'file:admin/tema/footer.htm' => 1,
  ),
),false)) {
function content_57b8f31cbe3503_60038839 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php echo form_open('');?>

<div class="row">
    <div class='col-md-12'>
        <div class="form-group">
            <?php echo form_label('Nombre del item','nombre');?>
 <br />
            <?php echo form_input($_smarty_tpl->tpl_vars['nombre']->value);?>

            <div id="error"><?php echo form_error('nombre');?>
</div>
        </div>
    </div>
    <div class='col-md-12'>
        <div class="form-group">
            <?php echo form_label('Valor del item','valor');?>
 <br />
            <?php echo form_input($_smarty_tpl->tpl_vars['valor']->value);?>

            <div id="error"><?php echo form_error('valor');?>
</div>
        </div>
    </div>
    <div class='col-md-4 center'>
        <div class="form-group">
            <?php echo form_submit($_smarty_tpl->tpl_vars['button']->value);?>

        </div>
    </div>
</div>
<?php echo form_close();?>


<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
