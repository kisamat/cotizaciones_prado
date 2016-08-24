<?php
/* Smarty version 3.1.29, created on 2016-08-21 23:55:24
  from "/www/cotizaciones_prado/application/views/templates/admin/cotizaciones/prueba.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57ba315c4f8e85_45935917',
  'file_dependency' => 
  array (
    '76a64548c320e2fadac947f3dba23067acd8b359' => 
    array (
      0 => '/www/cotizaciones_prado/application/views/templates/admin/cotizaciones/prueba.htm',
      1 => 1471820077,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57ba315c4f8e85_45935917 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="es">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>::Cotización Hotel El Prado::</title>
        <link rel="shortcut icon" href="<?php echo base_url();?>
assets/admin/images/favicon.gif" type="image/jpg"/>
        <!-- Bootstrap Core CSS -->
        <!--    <link href="<?php echo '<?php ';?>echo base_url() <?php echo '?>';?>assets/css/bootstrap.min.css" rel="stylesheet">-->

        <link href="<?php echo base_url();?>
assets/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>
assets/admin/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>
assets/admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <style TYPE="text/css">
            .bloque{
                width: 100%;
                float: left;
            }
            .logo{
                width: 25%;
                float: left;
            }
            .hotel{
                width: 60%;
                float: left;
            }
            .coti{
                width: 12%;
                float: left;
            }
            .tabla{
                width: 100%;
                float: left;
                text-align: center;
            }
            .tabla th{
                text-align: center;
                background-color: #0b4683;
                color: #FFFFFF;
            }
            
        </style>
    </head>
    <body>

        <div class="bloque">
            <div class="logo" >
                <img title="Hotel El Prado" alt="Hotel El Prado" src="<?php echo base_url();?>
assets/admin/images/logo_upn.png"> 
            </div>
            <div class="hotel" >
                <h2>Hotel el Prado</h2>
                <p>Carrera 54 No. 70-10 Barrio el Prado</p>
                <p>+57(5)3301540 </p>
                <p> info@hotelelpradobarranquilla.com </p>
            </div>
            <div class="coti">

                <p style="background-color: #0b4683;color: #FFFFFF"><b> Cotización</b></p>
                <p>No:  </p>
            </div>
        </div>  
        <br><br><br>
        <div class="bloque">
           <p>Atendiendo su amable solicitud estamos enviando cotizacion de los servicios requeridos, para nosotros es un placer poner nuestro Hotel a su Disposición.</p>
        </div>
        <br><br><br>
        <div class="bloque">
            <table border="1" class="tabla">
      <tbody>
        <tr>
          <th>Documento</th>
          <th>Cliente</th>
          <th>Telefono</th>
          <th>Celular</th>
          <th>Direccion</th>
        </tr>
        <tr>
          <td></td>
          <td><br></td>
          <td><br></td>
          <td><br></td>
          <td><br></td>
        </tr>
        <tr>
          <th>Correo</th>
          <th>Fecha Inicio</th>
          <th>Hora Inicio</th>
          <th>Fecha Final</th>
          <th>Hora Final</th>
        </tr>
        <tr>
          <td><br></td>
          <td><br></td>
          <td><br></td>
          <td><br></td>
          <td><br></td>
        </tr>
      </tbody>
    </table>
        </div>    
        
     <br>
        <div class="bloque">
            <table border="1" class="tabla">
      <tbody>
        <tr>
          <th>Item</th>
          <th>Codigo</th>
          <th>Descripción</th>
          <th>Cantidad</th>
          <th>Valor Unitario</th>
          <th>Valor Total</th>
        </tr>        
        <tr>
          <td><br></td>
          <td><br></td>
          <td><br></td>
          <td><br></td>
          <td><br></td>
          <td><br></td>
        </tr>
      </tbody>
    </table>
        </div>   
    <br>
        <div class="bloque">
             <table style="width: 100%" border="1">
      <tbody>
        <tr>
          <td style="width: 60%; background-color: #0b4683;" colspan="1" rowspan="4" ></td>
          <td style="background-color: #0b4683;color: #FFFFFF">Gran Total</td>
          <td><br></td>
        </tr>
        
        <tr>
          <td style="width: 20%; background-color: #0b4683;color: #FFFFFF">SubTotal</td>
          <td style="width: 20%;"><br></td>
        </tr>
        <tr>
          <td style="background-color: #0b4683;color: #FFFFFF">Iva 16%</td>
          <td><br></td>
        </tr>
        <tr>
          <td style="background-color: #0b4683;color: #FFFFFF">Valor Total</td>
          <td><br></td>
        </tr>
      </tbody>
    </table>
        </div>    
     
     
     
        <?php echo '<script'; ?>
 src="<?php echo base_url();?>
assets/admin/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    </body>

</html>



<?php }
}
