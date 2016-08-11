<?php
/* Smarty version 3.1.29, created on 2016-07-04 21:03:38
  from "/var/www/code_ionauth/application/views/templates/admin/auth/footer.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_577b157a044fa7_99663666',
  'file_dependency' => 
  array (
    'b60604a6b8beb79463bd22c49a6fdab1cb71e0ca' => 
    array (
      0 => '/var/www/code_ionauth/application/views/templates/admin/auth/footer.htm',
      1 => 1466107865,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/tema/modal.htm' => 1,
  ),
),false)) {
function content_577b157a044fa7_99663666 ($_smarty_tpl) {
?>
</div>
             <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/modal.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container col-xs-2 col-md-4 col-lg-4">
    </div>
  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <?php echo '<script'; ?>
 src="<?php echo base_url();?>
assets/admin/js/jquery.js"><?php echo '</script'; ?>
>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <?php echo '<script'; ?>
 src="<?php echo base_url();?>
assets/admin/js/bootstrap.min.js"><?php echo '</script'; ?>
>

   <?php if (isset($_SESSION['message'])) {
echo '<script'; ?>
 type="text/javascript">

    $(window).load(function(){
        $('#myModal').modal('show');
    });

 
<?php echo '</script'; ?>
>

<?php }?>
  </body>
</html>

<?php }
}
