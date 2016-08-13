<?php
/* Smarty version 3.1.29, created on 2016-08-11 18:06:35
  from "/www/cotizaciones_prado/application/views/templates/admin/auth/create_group.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57ad04fb2d8728_20720802',
  'file_dependency' => 
  array (
    '62449d728d5180cb6b3129962e33b7aa5f97c0dd' => 
    array (
      0 => '/www/cotizaciones_prado/application/views/templates/admin/auth/create_group.htm',
      1 => 1466107930,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/tema/header.htm' => 1,
    'file:admin/tema/footer.htm' => 1,
  ),
),false)) {
function content_57ad04fb2d8728_20720802 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<p><?php echo lang('create_group_subheading');?>
</p>



<?php echo form_open("admin/auth/create_group");?>


      <p>
            <?php echo lang('create_group_name_label','group_name');?>
 <br />
            <?php echo form_input($_smarty_tpl->tpl_vars['group_name']->value);?>
<div id="error"><?php echo form_error('group_name');?>
</div><br>
      </p>

      <p>
            <?php echo lang('create_group_desc_label','description');?>
 <br />
            <?php echo form_input($_smarty_tpl->tpl_vars['description']->value);?>
<div id="error"><?php echo form_error('description');?>
</div><br>
      </p>

      <p><?php echo form_submit($_smarty_tpl->tpl_vars['button']->value);?>
</p>

<?php echo form_close();?>


  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
