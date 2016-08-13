<?php
/* Smarty version 3.1.29, created on 2016-08-11 18:56:44
  from "/www/cotizaciones_prado/application/views/templates/admin/auth/create_user.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57ad10bc6dad52_93941164',
  'file_dependency' => 
  array (
    '7bf93d9eae0a52183de520159af35655c1828e86' => 
    array (
      0 => '/www/cotizaciones_prado/application/views/templates/admin/auth/create_user.htm',
      1 => 1466107924,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/tema/header.htm' => 1,
    'file:admin/tema/footer.htm' => 1,
  ),
),false)) {
function content_57ad10bc6dad52_93941164 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<p><?php echo lang('create_user_subheading');?>
</p>


<?php echo form_open("admin/auth/create_user");?>


      <p>
            <?php echo lang('create_user_fname_label','first_name');?>
 <br />
            <?php echo form_input($_smarty_tpl->tpl_vars['first_name']->value);?>
<div id="error"><?php echo form_error('first_name');?>
</div><br>
      </p>

      <p>
            <?php echo lang('create_user_lname_label','last_name');?>
<br />
            <?php echo form_input($_smarty_tpl->tpl_vars['last_name']->value);?>
<div id="error"><?php echo form_error('last_name');?>
</div><br>
      </p>
      
      <?php if ($_smarty_tpl->tpl_vars['identity_column']->value !== 'email') {?>
          <p>
          <?php echo lang('create_user_identity_label','identity');?>

          <br />
          <?php echo form_error('identity');?>

          <?php echo form_input($_smarty_tpl->tpl_vars['identity']->value);?>

          </p>
      <?php }?>

      <p>
            <?php echo lang('create_user_company_label','company');?>
 <br />
            <?php echo form_input($_smarty_tpl->tpl_vars['company']->value);?>
<div id="error"><?php echo form_error('company');?>
</div><br>
      </p>

      <p>
            <?php echo lang('create_user_email_label','email');?>
<br />
            <?php echo form_input($_smarty_tpl->tpl_vars['email']->value);?>
<div id="error"><?php echo form_error('email');?>
</div><br>
      </p>

      <p>
            <?php echo lang('create_user_phone_label','phone');?>
 <br />
            <?php echo form_input($_smarty_tpl->tpl_vars['phone']->value);?>
<div id="error"><?php echo form_error('phone');?>
</div><br>
      </p>

      <p>
            <?php echo lang('create_user_password_label','password');?>
 <br />
            <?php echo form_input($_smarty_tpl->tpl_vars['password']->value);?>
<div id="error"><?php echo form_error('password');?>
</div><br>
      </p>

      <p>
            <?php echo lang('create_user_password_confirm_label','password_confirm');?>
 <br />
            <?php echo form_input($_smarty_tpl->tpl_vars['password_confirm']->value);?>
<div id="error"><?php echo form_error('password_confirm');?>
</div><br>
      </p>

      <p><?php echo form_submit($_smarty_tpl->tpl_vars['button']->value);?>
</p>

<?php echo '<?php ';?>echo form_close();<?php echo '?>';?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
