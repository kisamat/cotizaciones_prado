<?php
/* Smarty version 3.1.29, created on 2016-08-24 17:26:36
  from "/www/cotizaciones_prado/application/views/templates/admin/tema/modal_delitem.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57bdcabcc40e62_56587373',
  'file_dependency' => 
  array (
    '66aa032e87b7e1e03ee853608caa562714d21522' => 
    array (
      0 => '/www/cotizaciones_prado/application/views/templates/admin/tema/modal_delitem.htm',
      1 => 1472053858,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57bdcabcc40e62_56587373 ($_smarty_tpl) {
?>
<div id="myModalDel" class="modal fade" aria-labelledby="myModalLabel" aria-hidden="true" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
          
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><b>Mensaje</b></h4>
            </div>
            
            <div class="modal-body" id="myModalBody">
                
                <div id="alert-msg">¿Desea eliminr este item?</div>

            </div>
            <div class="modal-footer">
                <input class="btn btn-default" type="button" data-dismiss="modal" value="Cancelar" />
                <a href="#" id="delConfirmBtn" class="btn btn-danger"><i class="icon-trash"></i> Eliminar</a>
            </div>

        </div>
    </div>
</div>
<?php }
}
