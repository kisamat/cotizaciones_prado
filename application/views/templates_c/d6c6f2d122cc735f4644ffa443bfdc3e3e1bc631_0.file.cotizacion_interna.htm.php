<?php
/* Smarty version 3.1.29, created on 2016-08-24 02:48:46
  from "/www/cotizaciones_prado/application/views/templates/admin/cotizaciones/cotizacion_interna.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57bcfcfedc0cb2_87950551',
  'file_dependency' => 
  array (
    'd6c6f2d122cc735f4644ffa443bfdc3e3e1bc631' => 
    array (
      0 => '/www/cotizaciones_prado/application/views/templates/admin/cotizaciones/cotizacion_interna.htm',
      1 => 1472003311,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57bcfcfedc0cb2_87950551 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="es">

    <head>
       <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    </head>
    <body>

   <br />
    <div id="bloque">        
           <p>Atendiendo su amable solicitud estamos enviando cotizacion de los servicios requeridos, para nosotros es un placer poner nuestro Hotel a su Disposición.</p>
        <br />
    <table border="1" class="tbform">
        <tbody>
        <tr>
            <th>Salon:</th>
            <td colspan="3" ><b><?php echo $_smarty_tpl->tpl_vars['nomsal']->value->nombre;?>
</b></td>
        </tr>  
        <tr>
            <th>Fecha inicio del evento:</th>
            <td><?php echo $_smarty_tpl->tpl_vars['datosc']->value->fechai;?>
 <?php echo $_smarty_tpl->tpl_vars['datosc']->value->horai;?>
</td>
            <th>Fecha finalizaci&oacute;n del evento:</th>
            <td><?php echo $_smarty_tpl->tpl_vars['datosc']->value->fechaf;?>
 <?php echo $_smarty_tpl->tpl_vars['datosc']->value->horaf;?>
</td>
        </tr> 
        <tr>
            <td class="tit-intermedio" colspan="4" >DATOS DEL CLIENTE</td>
        </tr>
        <tr>
          <th>Nombre del cliente</th>
          <td><?php echo $_smarty_tpl->tpl_vars['datoscli']->value->nombres;?>
 <?php echo $_smarty_tpl->tpl_vars['datoscli']->value->apellidos;?>
</td>
          <th>NIT / Documento</th>
          <td><?php echo $_smarty_tpl->tpl_vars['datoscli']->value->documento;?>
</td>
        </tr>
        <tr>
          <th>Correo el&eacute;ctronico</th>
          <td><?php echo $_smarty_tpl->tpl_vars['datoscli']->value->email;?>
</td>
          <th>N&uacute;mero celular</th>
          <td><?php echo $_smarty_tpl->tpl_vars['datoscli']->value->celular;?>
</td>
        </tr>
        <tr>
          <th>Telefono fijo</th>
          <td><?php echo $_smarty_tpl->tpl_vars['datoscli']->value->telefono;?>
</td>
          <th>Direcci&oacute;n contacto</th>
          <td><?php echo $_smarty_tpl->tpl_vars['datoscli']->value->direccion;?>
</td>
        </tr>
        <tr>
            <td class="tit-intermedio" colspan="4" >Observaciones</td>
        </tr>
        <tr>
            <td colspan="4" class="item-text"><?php echo $_smarty_tpl->tpl_vars['datosc']->value->observaciones;?>
</td>
        <tr>
            <td class="tit-intermedio" colspan="4" >Informaci&oacute;n de la cotización</td>
        </tr>
        <tr  >
            <th style="text-align:center" >Nombre item</th>
            <th style="text-align:center">Valor</th>
            <th style="text-align:center">Cantidad</th>
            <th style="text-align:center">Total</th>
        </tr>
        <?php
$_from = $_smarty_tpl->tpl_vars['datitems']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_dato_0_saved_item = isset($_smarty_tpl->tpl_vars['dato']) ? $_smarty_tpl->tpl_vars['dato'] : false;
$_smarty_tpl->tpl_vars['dato'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['dato']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['dato']->value) {
$_smarty_tpl->tpl_vars['dato']->_loop = true;
$__foreach_dato_0_saved_local_item = $_smarty_tpl->tpl_vars['dato'];
?>
        <tr>
            <td class="item-text"><?php echo $_smarty_tpl->tpl_vars['dato']->value->nombre;?>
</td>
            <td class="item-num" ><?php echo $_smarty_tpl->tpl_vars['dato']->value->valu;?>
</td>
            <td class="item-num" ><?php echo $_smarty_tpl->tpl_vars['dato']->value->cantidad;?>
</td>
            <td class="item-num" >$<?php echo number_format($_smarty_tpl->tpl_vars['dato']->value->valor,2,".",",");?>
</td>
        </tr>
        <?php
$_smarty_tpl->tpl_vars['dato'] = $__foreach_dato_0_saved_local_item;
}
if ($__foreach_dato_0_saved_item) {
$_smarty_tpl->tpl_vars['dato'] = $__foreach_dato_0_saved_item;
}
?>
            <tr>
                <th colspan="3" style="text-align: right;" >Subtotal</th>
                <td class="item-num">$<?php echo number_format($_smarty_tpl->tpl_vars['datosc']->value->val_subtotal,2,".",",");?>
</td>
            </tr>
            <tr>
                <th colspan="3" style="text-align: right;" >Ipoconsumo</th>
                <td style="text-align: right; text-height: 700; ">$<?php echo number_format($_smarty_tpl->tpl_vars['datosc']->value->val_ipc,2,".",",");?>
</td>
            </tr>
            <tr>
                <th colspan="3" style="text-align: right;" >Iva</th>
                <td class="item-num">$<?php echo number_format($_smarty_tpl->tpl_vars['datosc']->value->val_ival,2,".",",");?>
</td>
            </tr>
            <tr>
                <th colspan="3" style="text-align: right;" >Total</th>
                <td class="item-num">$<?php echo number_format($_smarty_tpl->tpl_vars['datosc']->value->val_total,2,".",",");?>
</td>
            </tr>
            <tr>
                <td colspan="4" ><br /></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
            <td class="tit-intermedio" colspan="4" >Informaci&oacute;n para dependencias internas</td>
            </tr>
            <tr  >
                <th style="text-align:center" ></th>
                <th style="text-align:center">Dependencia</th>
                <th style="text-align:center" colspan="2" >Observaci&oacute;n</th>
            </tr>
            <?php
$_from = $_smarty_tpl->tpl_vars['datitemsdep']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_datod_1_saved_item = isset($_smarty_tpl->tpl_vars['datod']) ? $_smarty_tpl->tpl_vars['datod'] : false;
$_smarty_tpl->tpl_vars['datod'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['datod']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['datod']->value) {
$_smarty_tpl->tpl_vars['datod']->_loop = true;
$__foreach_datod_1_saved_local_item = $_smarty_tpl->tpl_vars['datod'];
?>
            <tr>
                <td class="item-text" style="text-align:center"><input type="checkbox" id="cbox1"></td>
                <td class="item-text" ><?php echo $_smarty_tpl->tpl_vars['datod']->value->nombre;?>
</td>
                <td class="item-text" colspan="2" ><?php echo $_smarty_tpl->tpl_vars['datod']->value->observacion;?>
</td>
            </tr>
            <?php
$_smarty_tpl->tpl_vars['datod'] = $__foreach_datod_1_saved_local_item;
}
if ($__foreach_datod_1_saved_item) {
$_smarty_tpl->tpl_vars['datod'] = $__foreach_datod_1_saved_item;
}
?>
        
        </tfoot>
    </table>
    </div>
    </body>

</html>



<?php }
}
