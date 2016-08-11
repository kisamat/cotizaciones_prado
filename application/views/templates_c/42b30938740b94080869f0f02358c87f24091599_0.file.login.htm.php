<?php
/* Smarty version 3.1.29, created on 2016-07-04 21:03:37
  from "/var/www/code_ionauth/application/views/templates/admin/auth/login.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_577b1579f11300_85243894',
  'file_dependency' => 
  array (
    '42b30938740b94080869f0f02358c87f24091599' => 
    array (
      0 => '/var/www/code_ionauth/application/views/templates/admin/auth/login.htm',
      1 => 1466107887,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/auth/header.htm' => 1,
    'file:admin/auth/footer.htm' => 1,
  ),
),false)) {
function content_577b1579f11300_85243894 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/auth/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



		<h2 class='form-signin-heading'>Administrador de Contenidos</h2><br><br>
		<p><?php echo lang('login_subheading');?>
</p>



		<?php echo form_open("auth/login");?>


		  <p>
		    <?php echo lang('login_identity_label','identity');?>

		    <?php echo form_input($_smarty_tpl->tpl_vars['identity']->value);?>
<div id="error"><?php echo form_error('identity');?>
</div><br>
		  </p>

		  <p>
		    <?php echo lang('login_password_label','password');?>

		    <?php echo form_input($_smarty_tpl->tpl_vars['password']->value);?>
<div id="error"><?php echo form_error('password');?>
</div><br>
		  </p>

		  <p>
		    <?php echo lang('login_remember_label','remember');?>

		    <?php echo form_checkbox('remember','1',FALSE,'id="remember"');?>

		  </p>


		  <p><?php echo form_submit($_smarty_tpl->tpl_vars['button']->value);?>
</p>

		<?php echo form_close();?>


		<p><a href="forgot_password"><?php echo lang('login_forgot_password');?>
</a></p>

  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/auth/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
