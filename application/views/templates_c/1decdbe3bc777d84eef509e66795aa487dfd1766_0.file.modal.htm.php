<?php
/* Smarty version 3.1.29, created on 2016-07-04 19:14:47
  from "/var/www/code_ionauth/application/views/templates/admin/tema/modal.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_577afbf715ae41_20663534',
  'file_dependency' => 
  array (
    '1decdbe3bc777d84eef509e66795aa487dfd1766' => 
    array (
      0 => '/var/www/code_ionauth/application/views/templates/admin/tema/modal.htm',
      1 => 1466568324,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_577afbf715ae41_20663534 ($_smarty_tpl) {
?>

<div id="myModal" class="modal fade" aria-labelledby="myModalLabel" aria-hidden="true" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
          
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><b>Mensaje</b></h4>
            </div>
            
            <div class="modal-body" id="myModalBody">
                
                <?php if (empty($_SESSION['message'])) {?>
                <div id="alert-msg"></div>
                <?php } else { ?>                
                <div id="alert-msg"><?php echo $_SESSION['message'];?>
</div>
                <?php }?>
            </div>
            <div class="modal-footer">
                <input class="btn btn-default" type="button" data-dismiss="modal" value="Close" />
            </div>

        </div>
    </div>
</div>
<?php }
}
