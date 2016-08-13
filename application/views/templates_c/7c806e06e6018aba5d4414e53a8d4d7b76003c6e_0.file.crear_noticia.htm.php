<?php
/* Smarty version 3.1.29, created on 2016-08-11 07:45:01
  from "/www/cotizaciones_prado/application/views/templates/admin/noticias/crear_noticia.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57ac734d4b8853_46282275',
  'file_dependency' => 
  array (
    '7c806e06e6018aba5d4414e53a8d4d7b76003c6e' => 
    array (
      0 => '/www/cotizaciones_prado/application/views/templates/admin/noticias/crear_noticia.htm',
      1 => 1466700046,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/tema/header.htm' => 1,
    'file:admin/tema/footer.htm' => 1,
  ),
),false)) {
function content_57ac734d4b8853_46282275 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php echo form_open("admin/noticias/crear_noticia");?>


<span>
    <?php echo form_label('Seleccione la Categoria de la Noticia','categnot');?>
 <br />
    <?php echo form_dropdown($_smarty_tpl->tpl_vars['categnot']->value,$_smarty_tpl->tpl_vars['categnots']->value);?>
<div id="error"><?php echo form_error('categnot');?>
</div><br>
</span>

<span>
    <?php echo form_label('Seleccione la Opcion de Presentación la Noticia','opcion');?>
 <br />
    <?php echo form_dropdown($_smarty_tpl->tpl_vars['opcion']->value,$_smarty_tpl->tpl_vars['opciones']->value);?>
<div id="error"><?php echo form_error('opcion');?>
</div><br>
</span>

<span>
    <?php echo form_label('Escriba el Titulo de la Noticia','titulo');?>
 <br />
    <?php echo form_input($_smarty_tpl->tpl_vars['titulo']->value);?>
<div id="error"><?php echo form_error('titulo');?>
</div><br>
</span>

<span>
    <?php echo form_label('Escriba la URL de la Noticia','url');?>
 <br />
    <?php echo form_input($_smarty_tpl->tpl_vars['url']->value);?>
<div id="error"><?php echo form_error('url');?>
</div><br>
</span>

<div class="form-group">
    <?php echo form_label('Descripción de la Noticia','description');?>

    <?php echo form_input($_smarty_tpl->tpl_vars['descripcion']->value);?>
<div id="error"><?php echo form_error('descripcion');?>
</div><br>
</div>	    

<span><?php echo form_submit($_smarty_tpl->tpl_vars['button']->value);?>
</span>

<?php echo form_close();?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
