<?php
/* Smarty version 3.1.29, created on 2016-08-11 19:06:58
  from "/www/cotizaciones_prado/application/views/templates/admin/auth/edit_user.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57ad13229307c3_24657524',
  'file_dependency' => 
  array (
    '2b0698b51e9ae512dd4afc3bac192b442f147387' => 
    array (
      0 => '/www/cotizaciones_prado/application/views/templates/admin/auth/edit_user.htm',
      1 => 1466107908,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/tema/header.htm' => 1,
    'file:admin/tema/footer.htm' => 1,
  ),
),false)) {
function content_57ad13229307c3_24657524 ($_smarty_tpl) {
?>
           <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<p><?php echo lang('edit_user_subheading');?>
</p>

<?php echo form_open(uri_string());?>


      <p>
            <?php echo lang('edit_user_fname_label','first_name');?>
 <br />
            <?php echo form_input($_smarty_tpl->tpl_vars['first_name']->value);?>
<div id="error"><?php echo form_error('first_name');?>
</div><br>
      </p>

      <p>
            <?php echo lang('edit_user_lname_label','last_name');?>
 <br />
            <?php echo form_input($_smarty_tpl->tpl_vars['last_name']->value);?>
<div id="error"><?php echo form_error('last_name');?>
</div><br>
      </p>

      <p>
            <?php echo lang('edit_user_company_label','company');?>
 <br />
            <?php echo form_input($_smarty_tpl->tpl_vars['company']->value);?>
<div id="error"><?php echo form_error('company');?>
</div><br>
      </p>

      <p>
            <?php echo lang('edit_user_phone_label','phone');?>
 <br />
            <?php echo form_input($_smarty_tpl->tpl_vars['phone']->value);?>
<div id="error"><?php echo form_error('phone');?>
</div><br>
      </p>

      <p>
            <?php echo lang('edit_user_password_label','password');?>
 <br />
            <?php echo form_input($_smarty_tpl->tpl_vars['password']->value);?>

      </p>

      <p>
            <?php echo lang('edit_user_password_confirm_label','password_confirm');?>
<br />
            <?php echo form_input($_smarty_tpl->tpl_vars['password_confirm']->value);?>

      </p>

      <?php if ($_smarty_tpl->tpl_vars['admin']->value) {?>

          <h3><?php echo lang('edit_user_groups_heading');?>
</h3>
          <?php
$_from = $_smarty_tpl->tpl_vars['groups']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_group_0_saved_item = isset($_smarty_tpl->tpl_vars['group']) ? $_smarty_tpl->tpl_vars['group'] : false;
$_smarty_tpl->tpl_vars['group'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['group']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->_loop = true;
$__foreach_group_0_saved_local_item = $_smarty_tpl->tpl_vars['group'];
?>
              <label class="checkbox">

		<?php $_smarty_tpl->tpl_vars["gID"] = new Smarty_Variable($_smarty_tpl->tpl_vars['group']->value['id'], null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "gID", 0);?>
		<?php $_smarty_tpl->tpl_vars["checked"] = new Smarty_Variable("null", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "checked", 0);?>
		<?php $_smarty_tpl->tpl_vars["item"] = new Smarty_Variable("null", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "item", 0);?>

                  <?php
$_from = $_smarty_tpl->tpl_vars['currentGroups']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_grp_1_saved_item = isset($_smarty_tpl->tpl_vars['grp']) ? $_smarty_tpl->tpl_vars['grp'] : false;
$_smarty_tpl->tpl_vars['grp'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['grp']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['grp']->value) {
$_smarty_tpl->tpl_vars['grp']->_loop = true;
$__foreach_grp_1_saved_local_item = $_smarty_tpl->tpl_vars['grp'];
?>
                      <?php if ($_smarty_tpl->tpl_vars['gID']->value == $_smarty_tpl->tpl_vars['grp']->value->id) {?> 
			<?php $_smarty_tpl->tpl_vars["checked"] = new Smarty_Variable(' checked="checked"', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "checked", 0);?>
                      <?php break 1;?> 
                      <?php }?>
                  <?php
$_smarty_tpl->tpl_vars['grp'] = $__foreach_grp_1_saved_local_item;
}
if ($__foreach_grp_1_saved_item) {
$_smarty_tpl->tpl_vars['grp'] = $__foreach_grp_1_saved_item;
}
?>

              <input type="checkbox" name="groups[]" value="<?php echo $_smarty_tpl->tpl_vars['group']->value['id'];?>
"<?php echo $_smarty_tpl->tpl_vars['checked']->value;?>
>
              <?php echo $_smarty_tpl->tpl_vars['group']->value['name'];?>

              </label>
          <?php
$_smarty_tpl->tpl_vars['group'] = $__foreach_group_0_saved_local_item;
}
if ($__foreach_group_0_saved_item) {
$_smarty_tpl->tpl_vars['group'] = $__foreach_group_0_saved_item;
}
?>

      <?php }?>

      <?php echo form_hidden('id',$_smarty_tpl->tpl_vars['user']->value->id);?>

      <?php echo form_hidden($_smarty_tpl->tpl_vars['csrf']->value);?>


      <p><?php echo form_submit($_smarty_tpl->tpl_vars['button']->value);?>
</p>

<?php echo form_close();?>


           <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
