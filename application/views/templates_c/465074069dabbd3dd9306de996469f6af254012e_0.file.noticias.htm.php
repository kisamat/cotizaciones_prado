<?php
/* Smarty version 3.1.29, created on 2016-07-04 19:39:44
  from "/var/www/code_ionauth/application/views/templates/admin/noticias/noticias.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_577b01d03214c5_25879123',
  'file_dependency' => 
  array (
    '465074069dabbd3dd9306de996469f6af254012e' => 
    array (
      0 => '/var/www/code_ionauth/application/views/templates/admin/noticias/noticias.htm',
      1 => 1467060173,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/tema/header.htm' => 1,
    'file:admin/tema/footer.htm' => 1,
  ),
),false)) {
function content_577b01d03214c5_25879123 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<table class="table table-bordered" cellpadding=0 cellspacing=10>
    <tr>
        <th> Titulo</th>
        <th> Agregar Imagen</th>		           
        <th> Editar</th>
        <th> Eliminar</th>

    </tr>
    <?php if ($_smarty_tpl->tpl_vars['noticias']->value != false) {?>
    <?php
$_from = $_smarty_tpl->tpl_vars['noticias']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_noticia_0_saved_item = isset($_smarty_tpl->tpl_vars['noticia']) ? $_smarty_tpl->tpl_vars['noticia'] : false;
$_smarty_tpl->tpl_vars['noticia'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['noticia']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['noticia']->value) {
$_smarty_tpl->tpl_vars['noticia']->_loop = true;
$__foreach_noticia_0_saved_local_item = $_smarty_tpl->tpl_vars['noticia'];
?>
    <tr>
        <td>
            <p><?php echo $_smarty_tpl->tpl_vars['noticia']->value->titulo;?>
</p>
        </td>  
        <td>
            <a href="<?php echo base_url();?>
admin/noticias/do_upload/<?php echo $_smarty_tpl->tpl_vars['noticia']->value->id_noticia;?>
" class="btn btn-primary">Agregar Imagen</a> <br />                        
        </td>  
        <td>  
            <a href="<?php echo base_url();?>
admin/noticias/editar_noticia/<?php echo $_smarty_tpl->tpl_vars['noticia']->value->id_noticia;?>
" class="btn btn-warning">Editar</a> <br />                        
        </td>
        <td>
            <a href="<?php echo base_url();?>
admin/noticias/borrar_noticia/<?php echo $_smarty_tpl->tpl_vars['noticia']->value->id_noticia;?>
" class="btn btn-danger">Eliminar</a> <br />                        
        </td>

    </tr>    
    <?php
$_smarty_tpl->tpl_vars['noticia'] = $__foreach_noticia_0_saved_local_item;
}
if ($__foreach_noticia_0_saved_item) {
$_smarty_tpl->tpl_vars['noticia'] = $__foreach_noticia_0_saved_item;
}
?>

<?php } else { ?>
    <tr>
        <td>
            <h4>No hay Noticias</h4>
        </td>
    </tr> 
 <?php }?>   
    
</table>
<?php echo $_smarty_tpl->tpl_vars['links']->value;?>

<p><a href="<?php echo base_url();?>
admin/noticias/crear_noticia" class="btn btn-info">Crear Nueva Noticia</a> 

    <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
