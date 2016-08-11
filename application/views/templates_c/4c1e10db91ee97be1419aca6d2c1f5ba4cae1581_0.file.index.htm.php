<?php
/* Smarty version 3.1.29, created on 2016-07-05 22:45:50
  from "/var/www/code_ionauth/application/views/templates/admin/agenda/index.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_577c7eee1defc1_98375305',
  'file_dependency' => 
  array (
    '4c1e10db91ee97be1419aca6d2c1f5ba4cae1581' => 
    array (
      0 => '/var/www/code_ionauth/application/views/templates/admin/agenda/index.htm',
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
function content_577c7eee1defc1_98375305 ($_smarty_tpl) {
?>
           <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


           <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/agenda/calendario.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


           <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
