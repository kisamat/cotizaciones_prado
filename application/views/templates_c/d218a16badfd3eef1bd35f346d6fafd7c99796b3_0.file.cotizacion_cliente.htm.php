<?php
/* Smarty version 3.1.29, created on 2016-08-22 04:21:34
  from "/www/cotizaciones_prado/application/views/templates/admin/cotizaciones/cotizacion_cliente.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57ba6fbe9784a4_94616243',
  'file_dependency' => 
  array (
    'd218a16badfd3eef1bd35f346d6fafd7c99796b3' => 
    array (
      0 => '/www/cotizaciones_prado/application/views/templates/admin/cotizaciones/cotizacion_cliente.htm',
      1 => 1471836091,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57ba6fbe9784a4_94616243 ($_smarty_tpl) {
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
        </tbody>
        <tfoot>
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
        </tfoot>
    </table>
    </div>
    </body>

</html>



<?php }
}
