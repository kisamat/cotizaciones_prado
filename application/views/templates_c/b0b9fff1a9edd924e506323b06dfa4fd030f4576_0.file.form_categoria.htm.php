<?php
/* Smarty version 3.1.29, created on 2016-08-20 23:54:04
  from "/www/cotizaciones_prado/application/views/templates/admin/cotizaciones/form_categoria.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57b8df8d000253_11994841',
  'file_dependency' => 
  array (
    'b0b9fff1a9edd924e506323b06dfa4fd030f4576' => 
    array (
      0 => '/www/cotizaciones_prado/application/views/templates/admin/cotizaciones/form_categoria.htm',
      1 => 1471484099,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/tema/header.htm' => 1,
    'file:admin/tema/footer.htm' => 1,
  ),
),false)) {
function content_57b8df8d000253_11994841 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php echo form_open('');?>



<?php if (isset($_smarty_tpl->tpl_vars['id_salon']->value)) {?>
      <p>
    <?php echo form_label('Escoja el Salon','salon');?>
 <br />
    <?php echo form_dropdown($_smarty_tpl->tpl_vars['salon']->value,$_smarty_tpl->tpl_vars['salones']->value,$_smarty_tpl->tpl_vars['id_salon']->value);?>
<div id="error"><?php echo form_error('salon');?>
</div><br> 
</p>
<?php } else { ?>
 <p>
    <?php echo form_label('Escoja el Salon','salon');?>
 <br />
    <?php echo form_dropdown($_smarty_tpl->tpl_vars['salon']->value,$_smarty_tpl->tpl_vars['salones']->value);?>
<div id="error"><?php echo form_error('salon');?>
</div><br> 
</p>
<?php }?>


      <div class="row">    
    <div class='col-md-3'>
        <div class="form-group">
            <?php echo form_label('Escoja la Fecha Inicial','fechai');?>

            <div class='input-group date' id='datetimepicker6'>                
                <?php echo form_input($_smarty_tpl->tpl_vars['fechai']->value);?>

                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>                
            </div>
            <div id="error"><?php echo form_error('fechai');?>
</div><br>
        </div>
    </div>

    <div class='col-md-3'>
        <div class="form-group">
            <?php echo form_label('Escoja la Hora Inicial','horai');?>

            <div class='input-group date' id='datetimepicker8'>
                <?php echo form_input($_smarty_tpl->tpl_vars['horai']->value);?>
            
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
            <div id="error"><?php echo form_error('horai');?>
</div><br>
        </div>
    </div>



    <div class='col-md-3'>
        <div class="form-group">
            <?php echo form_label('Escoja la Fecha Final','fechaf');?>

            <div class='input-group date' id='datetimepicker7'>
                <?php echo form_input($_smarty_tpl->tpl_vars['fechaf']->value);?>
 
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
            <div id="error"><?php echo form_error('fechaf');?>
</div><br>
        </div>
    </div>


    <div class='col-md-3'>
        <div class="form-group">
            <?php echo form_label('Escoja la Hora Final','horaf');?>

            <div class='input-group date' id='datetimepicker9'>
                <?php echo form_input($_smarty_tpl->tpl_vars['horaf']->value);?>
     
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
            <div id="error"><?php echo form_error('horaf');?>
</div><br>
        </div>
    </div>
</div>


    <p>
            <?php echo form_label('Documento del Cliente','documento');?>
 <br />
            <?php echo form_input($_smarty_tpl->tpl_vars['documento']->value);?>
<div id="error"><?php echo form_error('documento');?>
</div><br>
    </p>

      <p>
            <?php echo form_label('Nombres del Cliente','nombres');?>
 <br />
            <?php echo form_input($_smarty_tpl->tpl_vars['nombres']->value);?>
<div id="error"><?php echo form_error('nombres');?>
</div><br>
      </p>
      
       <p>
            <?php echo form_label('Apellidos del Cliente','apellidos');?>
 <br />
            <?php echo form_input($_smarty_tpl->tpl_vars['apellidos']->value);?>
<div id="error"><?php echo form_error('apellidos');?>
</div><br>
      </p>
 
       <p>
            <?php echo form_label('Email del Cliente','email');?>
 <br />
            <?php echo form_input($_smarty_tpl->tpl_vars['email']->value);?>
<div id="error"><?php echo form_error('email');?>
</div><br>
      </p>     

       <p>
            <?php echo form_label('Teléfono del Cliente','telefono');?>
 <br />
            <?php echo form_input($_smarty_tpl->tpl_vars['telefono']->value);?>
<div id="error"><?php echo form_error('telefono');?>
</div><br>
      </p>
      
      <p>
            <?php echo form_label('Celular del Cliente','celular');?>
 <br />
            <?php echo form_input($_smarty_tpl->tpl_vars['celular']->value);?>
<div id="error"><?php echo form_error('celular');?>
</div><br>
      </p>
      <p>
            <?php echo form_label('Dirección del Cliente','direccion');?>
 <br />
            <?php echo form_input($_smarty_tpl->tpl_vars['direccion']->value);?>
<div id="error"><?php echo form_error('direccion');?>
</div><br>
      </p>
      
      <p><?php echo form_submit($_smarty_tpl->tpl_vars['button']->value);?>
</p>

<?php echo form_close();?>


<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php echo '<script'; ?>
 type="text/javascript">
    $(function () {
        $('#datetimepicker6').datetimepicker({
            locale: 'es',
            format: 'YYYY-MM-DD',
        });

        $('#datetimepicker7').datetimepicker({
            useCurrent: false, //Important! See issue #1075
            locale: 'es',
            format: 'YYYY-MM-DD',
        });

        $('#datetimepicker8').datetimepicker({
            locale: 'es',
            format: 'LT',
        });

        $('#datetimepicker9').datetimepicker({
            useCurrent: false, //Important! See issue #1075
            locale: 'es',
            format: 'LT',
        });


        $("#datetimepicker6").on("dp.change", function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker7").on("dp.change", function (e) {
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        });


        $("#datetimepicker8").on("dp.change", function (e) {
            $('#datetimepicker9').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker9").on("dp.change", function (e) {
            $('#datetimepicker8').data("DateTimePicker").maxDate(e.date);
        });



    });
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
	$(document).ready(function(){
	
		// generamos un evento cada vez que se pulse una tecla
		$("#documento").change(function(){
                        var doc= $("#documento").val();
                        var path= "<?php echo base_url();?>
";
			// enviamos una petición al servidor mediante AJAX enviando el id
			// introducido por el usuario mediante POST
			$.post(path + "admin/cotizaciones/llenar/" + doc, {"documento":$("#documento").val()}, function(data){
			
				// Si devuelve un nombre lo mostramos, si no, vaciamos la casilla
				        
                                if(data.nombres)
					$("#nombres").val(data.nombres);
				else
					$("#nombres").val("");
					
				// Si devuelve un apellido lo mostramos, si no, vaciamos la casilla
				if(data.apellidos)
					$("#apellidos").val(data.apellidos);
				else
					$("#apellidos").val("");
                                    
                                if(data.email)
					$("#email").val(data.email);
				else
					$("#email").val("");
                                    
                                if(data.telefono)
					$("#telefono").val(data.telefono);
				else
					$("#telefono").val(""); 
                                    
                                if(data.celular)
					$("#celular").val(data.celular);
				else
					$("#celular").val("");
                                
                                if(data.direccion)
					$("#direccion").val(data.direccion);
				else
					$("#direccion").val("");

			},"json");
		});
	});
	<?php echo '</script'; ?>
><?php }
}
