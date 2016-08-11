<?php
/* Smarty version 3.1.29, created on 2016-07-04 19:17:11
  from "/var/www/code_ionauth/application/views/templates/admin/notidesta/crear_notidesta.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_577afc870fefa5_82322040',
  'file_dependency' => 
  array (
    '508dbed280cd10fcc8148ae50349bae2bd797ede' => 
    array (
      0 => '/var/www/code_ionauth/application/views/templates/admin/notidesta/crear_notidesta.htm',
      1 => 1467219169,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/tema/header.htm' => 1,
    'file:admin/tema/footer.htm' => 1,
  ),
),false)) {
function content_577afc870fefa5_82322040 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<p>Agregar Noticia Destacada  para la pocision No: <?php echo $_smarty_tpl->tpl_vars['pos']->value;?>
</p><br>


<?php echo form_open(current_url());?>


      <p>
            <?php echo form_label('Escoja la noticia que desea convertir a Destacada','notidesta');?>
 <br />
            <?php echo form_dropdown($_smarty_tpl->tpl_vars['notidesta']->value,$_smarty_tpl->tpl_vars['notidestas']->value);?>
<div id="error"><?php echo form_error('notidesta');?>
</div><br>
      </p>

      <?php echo form_hidden(array('pos'=>$_smarty_tpl->tpl_vars['pos']->value));?>


      <p><?php echo form_submit($_smarty_tpl->tpl_vars['button']->value);?>
</p>

<?php echo form_close();?>


<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
