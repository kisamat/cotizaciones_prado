<?php
/* Smarty version 3.1.29, created on 2016-08-11 09:28:08
  from "/www/cotizaciones_prado/application/views/templates/admin/espacios/espacios.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57ac8b788409a6_55012184',
  'file_dependency' => 
  array (
    'c4e548a5df92ebf3c7c5fcf58f9f6b459fcab968' => 
    array (
      0 => '/www/cotizaciones_prado/application/views/templates/admin/espacios/espacios.htm',
      1 => 1465915458,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/tema/header.htm' => 1,
    'file:admin/tema/footer.htm' => 1,
  ),
),false)) {
function content_57ac8b788409a6_55012184 ($_smarty_tpl) {
?>
           <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  

<table class="table table-bordered" cellpadding=0 cellspacing=10>
    <tr>
        <th>Espacio</th>
        <th>Editar</th>
        <th>Eliminar</th>

    </tr>
	<?php
$_from = $_smarty_tpl->tpl_vars['padres']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_padre_0_saved_item = isset($_smarty_tpl->tpl_vars['padre']) ? $_smarty_tpl->tpl_vars['padre'] : false;
$_smarty_tpl->tpl_vars['padre'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['padre']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['padre']->value) {
$_smarty_tpl->tpl_vars['padre']->_loop = true;
$__foreach_padre_0_saved_local_item = $_smarty_tpl->tpl_vars['padre'];
?>
		<tr>
          
          
                <td bgcolor= "#d2cbcb"><b><?php echo $_smarty_tpl->tpl_vars['padre']->value->nombre;?>
</b></td>
                <td>
                   <a href="<?php echo base_url();?>
admin/espacios/editar_espacio/<?php echo $_smarty_tpl->tpl_vars['padre']->value->id_espacio;?>
" class="btn btn-warning">Editar</a> <br />                        
                </td>
                <td>        
                   <a href="<?php echo base_url();?>
admin/espacios/borrar_espacio/<?php echo $_smarty_tpl->tpl_vars['padre']->value->id_espacio;?>
" class="btn btn-danger">Eliminar</a> <br />                                   
                </td>   
                 
             <?php
$_from = $_smarty_tpl->tpl_vars['hijos']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_hijo_1_saved_item = isset($_smarty_tpl->tpl_vars['hijo']) ? $_smarty_tpl->tpl_vars['hijo'] : false;
$_smarty_tpl->tpl_vars['hijo'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['hijo']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['hijo']->value) {
$_smarty_tpl->tpl_vars['hijo']->_loop = true;
$__foreach_hijo_1_saved_local_item = $_smarty_tpl->tpl_vars['hijo'];
?>
            
            <?php if ($_smarty_tpl->tpl_vars['padre']->value->id_espacio == $_smarty_tpl->tpl_vars['hijo']->value->id_padre) {?>
                <tr>
                  
                <td><?php echo $_smarty_tpl->tpl_vars['hijo']->value->nombre;?>
</td>         
           <td>
                     <a href="<?php echo base_url();?>
admin/espacios/editar_espacio/<?php echo $_smarty_tpl->tpl_vars['hijo']->value->id_espacio;?>
" class="btn btn-warning">Editar</a> <br />                        
                 </td>
                 <td>
                     <a href="<?php echo base_url();?>
admin/espacios/borrar_espacio/<?php echo $_smarty_tpl->tpl_vars['hijo']->value->id_espacio;?>
" class="btn btn-danger">Eliminar</a> <br />                        
                 </td>
                </tr>
                
            <?php }?>
                
            <?php
$_smarty_tpl->tpl_vars['hijo'] = $__foreach_hijo_1_saved_local_item;
}
if ($__foreach_hijo_1_saved_item) {
$_smarty_tpl->tpl_vars['hijo'] = $__foreach_hijo_1_saved_item;
}
?>    
                 
		</tr>
	<?php
$_smarty_tpl->tpl_vars['padre'] = $__foreach_padre_0_saved_local_item;
}
if ($__foreach_padre_0_saved_item) {
$_smarty_tpl->tpl_vars['padre'] = $__foreach_padre_0_saved_item;
}
?>
</table>

<p><a href="<?php echo base_url();?>
admin/espacios/crear_espacio" class="btn btn-info">Crear Nuevo Espacio</a> 
           <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
