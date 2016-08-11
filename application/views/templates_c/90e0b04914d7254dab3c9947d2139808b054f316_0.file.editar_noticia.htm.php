<?php
/* Smarty version 3.1.29, created on 2016-07-11 09:48:25
  from "/var/www/code_ionauth/application/views/templates/admin/noticias/editar_noticia.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5783b1b94e5c67_78974624',
  'file_dependency' => 
  array (
    '90e0b04914d7254dab3c9947d2139808b054f316' => 
    array (
      0 => '/var/www/code_ionauth/application/views/templates/admin/noticias/editar_noticia.htm',
      1 => 1467064388,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/tema/header.htm' => 1,
    'file:admin/tema/footer.htm' => 1,
  ),
),false)) {
function content_5783b1b94e5c67_78974624 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php echo form_open(current_url());?>


<span>
    <?php echo form_label('Seleccione la Categoria de la Noticia','categnot');?>
 <br />
    <?php echo form_dropdown($_smarty_tpl->tpl_vars['categnot']->value,$_smarty_tpl->tpl_vars['categnots']->value,$_smarty_tpl->tpl_vars['noticia']->value->id_categnot);?>
<div id="error"><?php echo form_error('categnot');?>
</div><br>
</span>

<span>
    <?php echo form_label('Seleccione la Opcion de Presentación la Noticia','opcion');?>
 <br />
    <?php echo form_dropdown($_smarty_tpl->tpl_vars['opcion']->value,$_smarty_tpl->tpl_vars['opciones']->value,$_smarty_tpl->tpl_vars['noticia']->value->opcion);?>
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
