<?php
/* Smarty version 3.1.29, created on 2016-08-23 01:16:12
  from "/www/cotizaciones_prado/application/views/templates/admin/cotizaciones/form_agregar_dep.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57bb95cc513802_60957006',
  'file_dependency' => 
  array (
    '9f6982bd832c532e39af77bab5be05b91ad3e97b' => 
    array (
      0 => '/www/cotizaciones_prado/application/views/templates/admin/cotizaciones/form_agregar_dep.htm',
      1 => 1471910622,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/tema/header.htm' => 1,
    'file:admin/tema/footer.htm' => 1,
  ),
),false)) {
function content_57bb95cc513802_60957006 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '<script'; ?>
 type="text/javascript">
    
function select_all() {
    
    $('input[class=case]:checkbox').each(function(){ 
            if($('input[class=check_all]:checkbox:checked').length == 0){ 
                    $(this).prop("checked", false); 
            } else {
                    $(this).prop("checked", true); 
            } 
    });
}

function check(){
	obj=$('table tr').find('b');
	$.each( obj, function( key, value ) {
		id=value.id;
		$('#'+id).html(key+1);
	});
}

$(function () {
    $(".delete").on('click', function() {
    $('.case:checkbox:checked').parents("tr").remove();
    $('.check_all').prop("checked", false); 
        check();
        });
    var i=$('table tr').length;

    $(".addmore").on('click',function(){
            count=$('table tr').length;

        var data="<tr><td><input type='checkbox' id='case_"+i+"' value='"+i+"' class='case'/></td>";
            data+="<td><b id='snum"+i+"'>"+count+".</b> <input type='hidden' data-type='countryid' id='iddependencia_"+i+"' name='countryid[]'/></td>";
            data+="<td><input class='form-control autocomplete_txt' type='text' data-type='countryname' id='nombredep_"+i+"' name='countryname[]'/></td>";
            data+="<td><input class='form-control autocomplete_txt' type='text' data-type='country_no' id='country_no_"+i+"' name='country_no[]'/></td></tr>";
            
            $('table').append(data);
            row = i ;
            i++;
    });
    
    //autocomplete script
    $(document).on('focus','.autocomplete_txt',function(){
        type = $(this).data('type');

        if(type =='countryname' )autoTypeNo=0;
        

        $(this).autocomplete({
        minLength: 0,
        source: function( request, response ) {
            $.ajax({
                url : '<?php echo $_smarty_tpl->tpl_vars['linkObtenerItem']->value;?>
',
                dataType: "json",
                type : 'post',
                data: {
                   name_startsWith: request.term,
                   type: 'country_table',
                   row_num : 1
                },
                 success: function( data ) {
                         response( $.map( data, function( item ) {
                                var code = item.split("|");
                                return {
                                        label: code[0],
                                        value: code[0],
                                        data : item
                                }
                        }));
                }
            });
        },
        focus: function() {
            // prevent value inserted on focus
            return false;
        },
        select: function( event, ui ) {
            var names = ui.item.data.split("|");						
            id_arr = $(this).attr('id');
            id = id_arr.split("_");
            elementId = id[id.length-1];
            $('#nombredep_'+elementId).val(names[0]);
            $('#iddependencia_'+elementId).val(names[1]);

            //$('#country_code_'+elementId).val();
        }
        });
    });
      
        
});    

<?php echo '</script'; ?>
>
<?php echo form_open('');?>

<div class="row">
    <div class='col-md-6'>
        <p><b>Cotización No: </b><?php echo $_smarty_tpl->tpl_vars['datosc']->value->id_cotizacion;?>
</p>
        <p><b>Fecha del evento No: </b><?php echo $_smarty_tpl->tpl_vars['datosc']->value->fechai;?>
 <?php echo $_smarty_tpl->tpl_vars['datosc']->value->horai;?>
 A  <?php echo $_smarty_tpl->tpl_vars['datosc']->value->fechaf;?>
 <?php echo $_smarty_tpl->tpl_vars['datosc']->value->horaf;?>
</p>
    </div>
    <div class='col-md-6'>
        <p><b>Cliente: </b><?php echo $_smarty_tpl->tpl_vars['datoscli']->value->nombres;?>
 <?php echo $_smarty_tpl->tpl_vars['datoscli']->value->apellidos;?>
</p>
        <p><b>NIT/Documento: </b><?php echo $_smarty_tpl->tpl_vars['datoscli']->value->documento;?>
</p>
    </div>    
</div>
<button type="button" class="btn btn-danger delete">- Borrar</button>
<button type="button" class="btn btn-success addmore">+ Agregar otra Dependencia</button>

<br><br>
<div class="table-responsive">
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th>
                    
                </th>
            </tr>
            <tr>
                <th><input class="check_all" onclick="select_all()" type="checkbox"></th>
                <th>No</th>
                <th>Nombre Dependencia</th>
                <th>Observación</th>
               
            </tr>
            <?php if (!empty($_smarty_tpl->tpl_vars['datitems']->value)) {?>
            <?php
$_from = $_smarty_tpl->tpl_vars['datitems']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_dato_0_saved_item = isset($_smarty_tpl->tpl_vars['dato']) ? $_smarty_tpl->tpl_vars['dato'] : false;
$_smarty_tpl->tpl_vars['dato'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['dato']->iteration=0;
$_smarty_tpl->tpl_vars['dato']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['dato']->value) {
$_smarty_tpl->tpl_vars['dato']->_loop = true;
$_smarty_tpl->tpl_vars['dato']->iteration++;
$__foreach_dato_0_saved_local_item = $_smarty_tpl->tpl_vars['dato'];
?>
            <tr>
                <td><input class="case" id="case_<?php echo $_smarty_tpl->tpl_vars['dato']->iteration;?>
" value="<?php echo $_smarty_tpl->tpl_vars['dato']->iteration;?>
" type="checkbox"></td>
                <td><b id="snum"><?php echo $_smarty_tpl->tpl_vars['dato']->iteration;?>
.</b><input type='hidden' value="<?php echo $_smarty_tpl->tpl_vars['dato']->value->id_dependencia;?>
" data-type='countryid' id='iddependencia_<?php echo $_smarty_tpl->tpl_vars['dato']->iteration;?>
' name='countryid[]' ></td>
                <td><input class="form-control autocomplete_txt" value="<?php echo $_smarty_tpl->tpl_vars['dato']->value->nombre;?>
" data-type="countryname" id="nombredep_<?php echo $_smarty_tpl->tpl_vars['dato']->iteration;?>
" name="countryname[]" type="text"></td>
                <td><input class="form-control autocomplete_txt" value="<?php echo $_smarty_tpl->tpl_vars['dato']->value->observacion;?>
" data-type="country_no" id="country_no_<?php echo $_smarty_tpl->tpl_vars['dato']->iteration;?>
" name="country_no[]" type="text"></td>
                
            </tr>
            <?php
$_smarty_tpl->tpl_vars['dato'] = $__foreach_dato_0_saved_local_item;
}
if ($__foreach_dato_0_saved_item) {
$_smarty_tpl->tpl_vars['dato'] = $__foreach_dato_0_saved_item;
}
?>
            <?php } else { ?>
            <tr>
                <td><input class="case" id="case_1" value="1" type="checkbox"></td>
                <td><b id="snum">1.</b><input type='hidden' data-type='countryid' id='iddependencia_1' name='countryid[]'/></td>
                <td><input class="form-control autocomplete_txt" data-type="countryname" id="nombredep_1" name="countryname[]" type="text"></td>
                <td><input class="form-control autocomplete_txt" data-type="country_no" id="country_no_1" name="country_no[]" type="text"></td>
              
            </tr>
            <?php }?>
            
        </tbody>
        
    </table>
     
</div>       
<div class='col-md-12 right'>
        <div class="form-group">
            <?php echo form_submit($_smarty_tpl->tpl_vars['button']->value);?>

        </div>
    </div>        
</div>
    
<?php echo form_close();?>



<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php }
}
