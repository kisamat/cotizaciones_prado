<?php
/* Smarty version 3.1.29, created on 2016-08-10 18:08:37
  from "/www/cotizaciones_prado/application/views/templates/admin/tema/footer.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57abb3f58e7101_20822635',
  'file_dependency' => 
  array (
    '540dbd57172ff88a393a4e3ca87291f127d81c3b' => 
    array (
      0 => '/www/cotizaciones_prado/application/views/templates/admin/tema/footer.htm',
      1 => 1466107954,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/tema/modal.htm' => 1,
  ),
),false)) {
function content_57abb3f58e7101_20822635 ($_smarty_tpl) {
?>
             <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/modal.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Se deja comentariado, debido a que molesta para el uso del Full calendar en el Modulo de Agenda -->

    <!-- <?php echo '<script'; ?>
 src="<?php echo '<?php ';?>echo base_url() <?php echo '?>';?>assets/js/jquery.js"><?php echo '</script'; ?>
> -->
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
