<?php
/* Smarty version 3.1.29, created on 2016-08-11 17:34:55
  from "/www/cotizaciones_prado/application/views/templates/admin/tema/modal.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57acfd8f0e4c85_86195564',
  'file_dependency' => 
  array (
    '850bcac7fd13fa0cd0f97ada9e58c3d5b4c0e558' => 
    array (
      0 => '/www/cotizaciones_prado/application/views/templates/admin/tema/modal.htm',
      1 => 1470954780,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57acfd8f0e4c85_86195564 ($_smarty_tpl) {
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
                <input class="btn btn-default" id="delConfirmBtn" type="button" data-dismiss="modal" value="Close" />
            </div>

        </div>
    </div>
</div>
<?php }
}
