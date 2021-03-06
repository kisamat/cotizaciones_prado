<?php
/* Smarty version 3.1.29, created on 2016-07-05 22:51:10
  from "/var/www/code_ionauth/application/views/templates/admin/agenda/editar_evento.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_577c802e74de52_52671528',
  'file_dependency' => 
  array (
    '190e329bf8d89b2fd7f7f613214a6d96754aa5cd' => 
    array (
      0 => '/var/www/code_ionauth/application/views/templates/admin/agenda/editar_evento.htm',
      1 => 1465921693,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/tema/header.htm' => 1,
    'file:admin/tema/footer.htm' => 1,
  ),
),false)) {
function content_577c802e74de52_52671528 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '<script'; ?>
 type="text/javascript">
window.addEventListener('load', espacio, false);

    function espacio() {
        var esp_selected = '<?php echo $_smarty_tpl->tpl_vars['id_instalacion']->value;?>
';
        var espacio = '<?php echo $_smarty_tpl->tpl_vars['id_espacio']->value;?>
';
        var path = '<?php echo base_url();?>
';
        $.ajax({
            data: {
                esp_selected: esp_selected,
                espacio: espacio 
            },
            type: 'POST',
            url: path + 'admin/agenda/espacios/' + esp_selected + '/' + espacio,
            success: function (data) {
                console.log(data);
                $('.subespacio').html(data);
            }
        })
    }

<?php echo '</script'; ?>
>



<?php echo '<script'; ?>
 type="text/javascript">

    function espacios() {
        var esp_selected = $('select[name=instalacion]').val();
        var path = '<?php echo base_url();?>
';
        $.ajax({
            data: {
                esp_selected: esp_selected,
            },
            type: 'POST',
            url: path + 'agenda/espacio/' + esp_selected,
            success: function (data) {
                console.log(data);
                $('.subespacio').html(data);
            }
        })
    }

<?php echo '</script'; ?>
>




<?php echo form_open(current_url());?>


<p>
    <?php echo form_label('Seleccione la Categoria','categoria');?>
 <br />
    <?php echo form_dropdown($_smarty_tpl->tpl_vars['categoria']->value,$_smarty_tpl->tpl_vars['categorias']->value,$_smarty_tpl->tpl_vars['id_categoria']->value);?>
<div id="error"><?php echo form_error('categoria');?>
</div><br>
</p>

<p>
    <?php echo form_label('Escoja la Dependencia','dependencia');?>
 <br />
    <?php echo form_dropdown($_smarty_tpl->tpl_vars['dependencia']->value,$_smarty_tpl->tpl_vars['dependencias']->value,$_smarty_tpl->tpl_vars['id_dependencia']->value);?>
<div id="error"><?php echo form_error('dependencia');?>
</div><br> 
</p>
<p>
    <?php echo form_label('Escoja Tipos de Programación','tiprog');?>
 <br />
    <?php echo form_dropdown($_smarty_tpl->tpl_vars['tiprog']->value,$_smarty_tpl->tpl_vars['tiprogs']->value,$_smarty_tpl->tpl_vars['id_tiprog']->value);?>
<div id="error"><?php echo form_error('tiprog');?>
</div><br> 
</p>

<p>
    <?php echo form_label('Escoja la Instalacion','instalacion');?>
 <br />
    <?php echo form_dropdown($_smarty_tpl->tpl_vars['instalacion']->value,$_smarty_tpl->tpl_vars['instalaciones']->value,$_smarty_tpl->tpl_vars['id_instalacion']->value);?>
<div id="error"><?php echo form_error('instalacion');?>
</div><br>
</p>

<div class="subespacio"></div><div id='error'><?php echo form_error('espacio');?>
</div><br />


<p>
    <?php echo form_label('Escriba el Titulo del Evento','titulo');?>
 <br />
    <?php echo form_input($_smarty_tpl->tpl_vars['titulo']->value);?>
<div id="error"><?php echo form_error('titulo');?>
</div><br>
</p>


<div class="row">    
    <div class='col-md-7'>
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

    <div class='col-md-5'>
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



    <div class='col-md-7'>
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


    <div class='col-md-5'>
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
<div class="form-group">
    <?php echo form_label('Descripción del Evento','description');?>

    <?php echo form_textarea($_smarty_tpl->tpl_vars['descripcion']->value);?>
<div id="error"><?php echo form_error('descripcion');?>
</div><br>
</div>		

<p><?php echo form_submit($_smarty_tpl->tpl_vars['button']->value);?>
| <a href="<?php echo base_url();?>
admin/agenda/borrar_evento/<?php echo $_smarty_tpl->tpl_vars['id_evento']->value;?>
" class="btn btn-danger">Eliminar Evento </a> <br /></p>

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
  //<![CDATA[
    CKEDITOR.replace('descripcion', {"toolbar": "Full", 
"language": "es", 
"filebrowserBrowseUrl": "<?php echo base_url();?>
lib/ckfinder/ckfinder.html", 
"filebrowserImageBrowseUrl": "<?php echo base_url();?>
libs/ckfinder/ckfinder.html?type=Images", 
"filebrowserFlashBrowseUrl": "<?php echo base_url();?>
libs/ckfinder/ckfinder.html?type=Flash", 
"filebrowserUploadUrl": "<?php echo base_url();?>
libs/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files", 
"filebrowserImageUploadUrl": "<?php echo base_url();?>
libs/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images", 
"filebrowserFlashUploadUrl": "<?php echo base_url();?>
libs/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash"});
//]]>
<?php echo '</script'; ?>
>
<?php }
}
