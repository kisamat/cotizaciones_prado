<?php
/* Smarty version 3.1.29, created on 2016-08-10 18:08:45
  from "/www/cotizaciones_prado/application/views/templates/admin/agenda/index.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57abb3fd76db68_25820308',
  'file_dependency' => 
  array (
    'f91282f5ad8d0c3684fb0e40ae518ebfd514bbd4' => 
    array (
      0 => '/www/cotizaciones_prado/application/views/templates/admin/agenda/index.htm',
      1 => 1465935445,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/tema/header.htm' => 1,
    'file:admin/agenda/calendario.htm' => 1,
    'file:admin/tema/footer.htm' => 1,
  ),
),false)) {
function content_57abb3fd76db68_25820308 ($_smarty_tpl) {
?>
           <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


           <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/agenda/calendario.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


           <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
