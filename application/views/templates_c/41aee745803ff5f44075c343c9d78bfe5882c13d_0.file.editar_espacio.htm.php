<?php
/* Smarty version 3.1.29, created on 2016-08-11 10:05:03
  from "/www/cotizaciones_prado/application/views/templates/admin/espacios/editar_espacio.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57ac941fe61130_49924723',
  'file_dependency' => 
  array (
    '41aee745803ff5f44075c343c9d78bfe5882c13d' => 
    array (
      0 => '/www/cotizaciones_prado/application/views/templates/admin/espacios/editar_espacio.htm',
      1 => 1465915491,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/tema/header.htm' => 1,
    'file:admin/tema/footer.htm' => 1,
  ),
),false)) {
function content_57ac941fe61130_49924723 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<p>Crear Espacio</p><br>


<?php echo form_open(current_url());?>


<div class="form-group">
        <p>
            <?php echo form_label('Escoja el Espacio Padre','id_padre');?>
 <br />
            <?php echo form_dropdown($_smarty_tpl->tpl_vars['id_padre']->value,$_smarty_tpl->tpl_vars['padres']->value,$_smarty_tpl->tpl_vars['valor']->value);?>
<br>    
        </p>
      <p>
            <?php echo form_label('Nombre Espacio','nombre');?>
 <br />
            <?php echo form_input($_smarty_tpl->tpl_vars['nombre']->value);?>
<div id="error"><?php echo form_error('nombre');?>
</div><br>
      </p>
</div>
      

      <p><?php echo form_submit($_smarty_tpl->tpl_vars['button']->value);?>
</p>

<?php echo '<?php ';?>echo form_close();<?php echo '?>';?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
