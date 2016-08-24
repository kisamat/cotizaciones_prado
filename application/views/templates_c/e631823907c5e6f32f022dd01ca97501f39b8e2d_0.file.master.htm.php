<?php
/* Smarty version 3.1.29, created on 2016-08-24 02:32:48
  from "/www/cotizaciones_prado/application/views/templates/admin/cotizaciones/master.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57bcf94026ea20_22812028',
  'file_dependency' => 
  array (
    'e631823907c5e6f32f022dd01ca97501f39b8e2d' => 
    array (
      0 => '/www/cotizaciones_prado/application/views/templates/admin/cotizaciones/master.htm',
      1 => 1472002365,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/tema/header.htm' => 1,
    'file:admin/tema/modal_delitem.htm' => 1,
    'file:admin/tema/footer.htm' => 1,
  ),
),false)) {
function content_57bcf94026ea20_22812028 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/www/cotizaciones_prado/application/third_party/smarty/libs/plugins/modifier.date_format.php';
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php echo '<script'; ?>
>
    $(function () {
      $('.remove-item').click(function () {
        $("#delConfirmBtn").attr("href", $(this).attr("href"));
        $('#myModalDel').modal('show');
        return false;
      });
    });
<?php echo '</script'; ?>
>
  
    
<h2>Busqueda </h2>

<?php echo form_open('');?>


<div class='col-md-12'>
    <div class="row">    
    <div class='col-md-5'>
    <span>
        <?php echo form_label('Nombres del Cliente','nombres');?>
 <br />
        <?php echo form_input($_smarty_tpl->tpl_vars['nombres']->value);?>
<div id="error"><?php echo form_error('nombres');?>
</div><br>
    </span>
    </div>
    
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
        <div class='col-md-1' style="padding-top: 25px;" ><span><?php echo form_submit($_smarty_tpl->tpl_vars['button']->value);?>
</span></div><br>

    </div>  
    
</div> 



<?php echo form_close();?>

<table class="table table-bordered" cellpadding=0 cellspacing=10>
	<tr>
		<th> Nombre Cliente</th>
                <th> Fecha Creación</th>
                <th class="tit-opcion-admin" > <a href="<?php echo base_url();?>
admin/cotizaciones/crear/<?php echo $_smarty_tpl->tpl_vars['idmenu']->value;?>
" class="btn btn-info nuevo-item">Crear nuevo item</a></th>

	</tr>
	<?php
$_from = $_smarty_tpl->tpl_vars['data']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_categoria_0_saved_item = isset($_smarty_tpl->tpl_vars['categoria']) ? $_smarty_tpl->tpl_vars['categoria'] : false;
$_smarty_tpl->tpl_vars['categoria'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['categoria']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['categoria']->value) {
$_smarty_tpl->tpl_vars['categoria']->_loop = true;
$__foreach_categoria_0_saved_local_item = $_smarty_tpl->tpl_vars['categoria'];
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['categoria']->value->nombres;?>
 <?php echo $_smarty_tpl->tpl_vars['categoria']->value->apellidos;?>
</td>
            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['categoria']->value->fechai,"%A, %B %e, %Y");?>
</td>
            <td >
                <a href="<?php echo base_url();?>
admin/cotizaciones/verCotizacion/<?php echo $_smarty_tpl->tpl_vars['categoria']->value->id_cotizacion;?>
" class="btn" target="_blank"><i class="fa fa-eye opcion" title="Ver cotización" style="font-size:36px;"></i></a>
                <a href="<?php echo base_url();?>
admin/cotizaciones/editar/<?php echo $_smarty_tpl->tpl_vars['idmenu']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['categoria']->value->id_cotizacion;?>
" class="btn "><i class="fa fa-edit opcion" title="Editar cotización" style="font-size:36px;"></i></a>
                <a href="<?php echo base_url();?>
admin/cotizaciones/estado/<?php echo $_smarty_tpl->tpl_vars['idmenu']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['categoria']->value->id_cotizacion;?>
" class="btn"><i class="fa fa-cog" title="Cambiar estado" style="font-size:36px;"></i></a>
                <a href="<?php echo base_url();?>
admin/cotizaciones/envio/<?php echo $_smarty_tpl->tpl_vars['idmenu']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['categoria']->value->id_cotizacion;?>
" class="btn"><i class="fa fa-send" title="Enviar cotización correo eléctronico" style="font-size:36px;"></i></a>
                <?php if ($_smarty_tpl->tpl_vars['categoria']->value->id_estado == 2) {?>
                <a href="<?php echo base_url();?>
admin/cotizaciones/cotdep/<?php echo $_smarty_tpl->tpl_vars['idmenu']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['categoria']->value->id_cotizacion;?>
" class="btn"><i class="fa fa-group" title="Agregar dependencias a la cotización" style="font-size:36px;"></i></a>
                <a href="<?php echo base_url();?>
userfiles/cotizacion/cotizacion_interna<?php echo $_smarty_tpl->tpl_vars['categoria']->value->id_cotizacion;?>
.pdf" class="btn" target="_blank" ><i class="fa fa-file-pdf-o" title="Ver pdf interno" style="font-size:36px;"></i></a>
                <?php }?>
                <a href="<?php echo base_url();?>
admin/cotizaciones/log/<?php echo $_smarty_tpl->tpl_vars['idmenu']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['categoria']->value->id_cotizacion;?>
" class="btn"><i class="fa fa-binoculars" title="Ver log de eventos cotización" style="font-size:36px;"></i></a>
            </td>

		</tr>
	<?php
$_smarty_tpl->tpl_vars['categoria'] = $__foreach_categoria_0_saved_local_item;
}
if ($__foreach_categoria_0_saved_item) {
$_smarty_tpl->tpl_vars['categoria'] = $__foreach_categoria_0_saved_item;
}
?>
</table>


<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/modal_delitem.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

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

        $("#datetimepicker6").on("dp.change", function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker7").on("dp.change", function (e) {
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        });
        
    });
<?php echo '</script'; ?>
><?php }
}
