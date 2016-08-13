<?php
/* Smarty version 3.1.29, created on 2016-08-11 18:48:09
  from "/www/cotizaciones_prado/application/views/templates/admin/auth/users.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57ad0eb9d47c66_88194005',
  'file_dependency' => 
  array (
    '1adbf50f5d96ace4f2c8ed24e85b2e682e4f021d' => 
    array (
      0 => '/www/cotizaciones_prado/application/views/templates/admin/auth/users.htm',
      1 => 1470959285,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/tema/header.htm' => 1,
    'file:admin/tema/footer.htm' => 1,
  ),
),false)) {
function content_57ad0eb9d47c66_88194005 ($_smarty_tpl) {
?>
           <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  

<table class="table table-bordered" cellpadding=0 cellspacing=10>
	<tr>
		<th> <?php echo lang('index_fname_th');?>
</th>
		<th> <?php echo lang('index_lname_th');?>
</th>
		<th> <?php echo lang('index_email_th');?>
</th>
		<th> <?php echo lang('index_groups_th');?>
</th>
		<th> <?php echo lang('index_status_th');?>
</th>
		<th> <?php echo lang('index_action_th');?>
</th>
	</tr>
	<?php
$_from = $_smarty_tpl->tpl_vars['users']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_user_0_saved_item = isset($_smarty_tpl->tpl_vars['user']) ? $_smarty_tpl->tpl_vars['user'] : false;
$__foreach_user_0_saved_key = isset($_smarty_tpl->tpl_vars['id']) ? $_smarty_tpl->tpl_vars['id'] : false;
$_smarty_tpl->tpl_vars['user'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['id'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['user']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->_loop = true;
$__foreach_user_0_saved_local_item = $_smarty_tpl->tpl_vars['user'];
?>
		<tr>
            <td><?php echo $_smarty_tpl->tpl_vars['user']->value->first_name;?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['user']->value->last_name;?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['user']->value->email;?>
</td>
            
           
		<td>
                            <?php
$_from = $_smarty_tpl->tpl_vars['user']->value->groups;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_group_1_saved_item = isset($_smarty_tpl->tpl_vars['group']) ? $_smarty_tpl->tpl_vars['group'] : false;
$_smarty_tpl->tpl_vars['group'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['group']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->_loop = true;
$__foreach_group_1_saved_local_item = $_smarty_tpl->tpl_vars['group'];
?>
                              <a href="<?php echo base_url();?>
admin/auth/edit_group/<?php echo $_smarty_tpl->tpl_vars['group']->value->id;?>
/<?php echo $_smarty_tpl->tpl_vars['idmenu']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['group']->value->name;?>
 </a> <br />                                        
                            <?php
$_smarty_tpl->tpl_vars['group'] = $__foreach_group_1_saved_local_item;
}
if ($__foreach_group_1_saved_item) {
$_smarty_tpl->tpl_vars['group'] = $__foreach_group_1_saved_item;
}
?>
                </td>
                <td><?php if ($_smarty_tpl->tpl_vars['user']->value->active) {?>                         
                            <a href="<?php echo base_url();?>
admin/auth/deactivate/<?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
/<?php echo $_smarty_tpl->tpl_vars['idmenu']->value;?>
" class="btn btn-success"><?php echo lang('index_active_link');?>
 </a> <br />     
                        <?php } else { ?>
                            <a href="<?php echo base_url();?>
admin/auth/activate/<?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
/<?php echo $_smarty_tpl->tpl_vars['idmenu']->value;?>
" class="btn btn-danger"><?php echo lang('index_inactive_link');?>
 </a> <br />                                 
                        <?php }?>
                 <td>
                        <a href="<?php echo base_url();?>
admin/auth/edit_user/<?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
/<?php echo $_smarty_tpl->tpl_vars['idmenu']->value;?>
" class="btn btn-warning">Edit</a> <br />                                 
                        
                    </td>
		</tr>
	<?php
$_smarty_tpl->tpl_vars['user'] = $__foreach_user_0_saved_local_item;
}
if ($__foreach_user_0_saved_item) {
$_smarty_tpl->tpl_vars['user'] = $__foreach_user_0_saved_item;
}
if ($__foreach_user_0_saved_key) {
$_smarty_tpl->tpl_vars['id'] = $__foreach_user_0_saved_key;
}
?>
</table>

<p><a href="<?php echo base_url();?>
admin/auth/create_user/<?php echo $_smarty_tpl->tpl_vars['idmenu']->value;?>
" class="btn btn-info"><?php echo lang('index_create_user_link');?>
</a> | <a href="<?php echo base_url();?>
admin/auth/create_group/<?php echo $_smarty_tpl->tpl_vars['idmenu']->value;?>
" class="btn btn-primary"><?php echo lang('index_create_group_link');?>
</a></p>

           <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
