<?php
/* Smarty version 3.1.29, created on 2016-08-24 02:08:37
  from "/www/cotizaciones_prado/application/views/templates/admin/cotizaciones/form_agregar_items.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57bcf3950c0b48_04589319',
  'file_dependency' => 
  array (
    '2fbe6999e0ec16891d55bf46de68d5c195a9f77f' => 
    array (
      0 => '/www/cotizaciones_prado/application/views/templates/admin/cotizaciones/form_agregar_items.htm',
      1 => 1472000912,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/tema/header.htm' => 1,
    'file:admin/tema/footer.htm' => 1,
  ),
),false)) {
function content_57bcf3950c0b48_04589319 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '<script'; ?>
 type="text/javascript">
    var ipc=<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datosc']->value->val_ipc)===null||$tmp==='' ? 0 : $tmp);?>
;
    var iva=<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datosc']->value->val_ival)===null||$tmp==='' ? 0 : $tmp);?>
;
    var subtot= <?php echo (($tmp = @$_smarty_tpl->tpl_vars['datosc']->value->val_subtotal)===null||$tmp==='' ? 0 : $tmp);?>
;
    var totn= <?php echo (($tmp = @$_smarty_tpl->tpl_vars['datosc']->value->val_total)===null||$tmp==='' ? 0 : $tmp);?>
;
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
function calcal(id){
    //alert(id);
    var tipoimp=$('#phone_code_'+id).val();
    
    var cant=$('#country_cantidad_'+id).val();
    //alert(cant);
    var price=$('#country_no_'+id).val();
    //alert(price);
    var total=cant*price;
    if(tipoimp>0.08){
        iva=iva+(total*tipoimp);
    }else{
        ipc=ipc+(total*tipoimp);
    }
    subtot=subtot+total;
    totn= subtot+ipc+iva;

    //alert(total);
    $('#country_value_'+id).val(total);
    $('#stotal').val(subtot);
    $('#tipc').val(ipc);
    $('#tiva').val(iva);
    $('#total').val(totn);
}
function restartot(id){

    var tipoimp=$('#phone_code_'+id).val();

    var cant=$('#country_cantidad_'+id).val();
    //alert(cant);
    var price=$('#country_no_'+id).val();
    //alert(price);

    var total=cant*price;
    if(tipoimp>0.08){
        iva=iva-(total*tipoimp);
    }else{
        ipc=ipc-(total*tipoimp);
    }
    subtot=subtot-total;
    totn= subtot-ipc-iva;

    //alert(total);
    $('#country_value_'+id).val(total);
    $('#stotal').val(subtot);
    $('#tipc').val(ipc);
    $('#tiva').val(iva);
    $('#total').val(totn);
    if($('.check_all').is(':checked')){
        //alert($('.check_all:checkbox:checked'));
        $('#stotal').val(0);
        $('#tipc').val(0);
        $('#tiva').val(0);
        $('#total').val(0);
    }
    $('.case:checkbox:checked').parents("tr").remove();
    $('.check_all').prop("checked", false); 
    check();
    
    
}
$(function () {
    $(".delete").on('click', function() {
        restartot($('.case:checkbox:checked').val());
    });
    var i=$('table tr').length;

    $(".addmore").on('click',function(){
            count=$('table tr').length;

        var data="<tr><td><input type='checkbox' id='case_"+i+"' value='"+i+"' class='case'/></td>";
            data+="<td><b id='snum"+i+"'>"+count+".</b> <input type='hidden' data-type='countryid' id='countryid_"+i+"' name='countryid[]'/></td>";
            data+="<td><input class='form-control autocomplete_txt' type='text' data-type='countryname' id='countryname_"+i+"' name='countryname[]'/></td>";
            data+="<td><input class='form-control' readonly type='text' data-type='country_no' id='country_no_"+i+"' name='country_no[]'/></td>";
            data+="<td><input class='form-control' readonly type='text' data-type='phone_code' id='phone_code_"+i+"'  name='phone_code[]'/></td>";
            data+="<td><input class='form-control' type='text' data-type='country_code' id='country_cantidad_"+i+"' onchange='calcal("+i+")' name='country_cantidad[]'/></td>";
            data+="<td><input class='form-control' readonly type='text' data-type='country_code' id='country_value_"+i+"' name='country_value[]'/></td></tr>";
            $('table').append(data);
            row = i ;
            i++;
    });
    /*$('#countryname_1').autocomplete({
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
            autoFocus: true,	      	
            minLength: 0,
            select: function( event, ui ) {
                    var names = ui.item.data.split("|");						
                    $('#country_no_1').val(names[1]);
                    $('#phone_code_1').val(names[2]);
                    $('#country_code_1').val(names[3]);
            }		      	
    });  
				
*/
    //autocomplete script
    $(document).on('focus','.autocomplete_txt',function(){
        type = $(this).data('type');

        if(type =='countryname' )autoTypeNo=0;
        if(type =='country_no' )autoTypeNo=1; 
        if(type =='phone_code' )autoTypeNo=2; 
        if(type =='country_code' )autoTypeNo=3; 

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
            $('#countryname_'+elementId).val(names[0]);
            $('#countryid_'+elementId).val(names[1]);
            $('#country_no_'+elementId).val(names[3]);
            $('#phone_code_'+elementId).val(names[2]);
            //$('#country_code_'+elementId).val();
        }
        });
    });
    $("#myform").validate({
        event: "submit",
        rules: {
        },
        messages: {
        },
        debug: false
                       /*errorElement: 'div',*/
                       //errorContainer: $('#errores'),
    });
      
        
});    

<?php echo '</script'; ?>
>
<?php echo form_open('',$_smarty_tpl->tpl_vars['attributes']->value);?>

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
<button type="button" class="btn btn-success addmore">+ Agregar otro item</button>
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
                <th>Nombre item</th>
                <th>Valor</th>
                <th>IVA / IPC </th>
                <th>Cantidad</th>
                <th>Total</th>
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
.</b><input type='hidden' value="<?php echo $_smarty_tpl->tpl_vars['dato']->value->id_item;?>
" data-type='countryid' id='countryid_<?php echo $_smarty_tpl->tpl_vars['dato']->iteration;?>
' name='countryid[]' ></td>
                <td><input class="form-control autocomplete_txt" value="<?php echo $_smarty_tpl->tpl_vars['dato']->value->nombre;?>
" data-type="countryname" id="countryname_<?php echo $_smarty_tpl->tpl_vars['dato']->iteration;?>
" name="countryname[]" type="text" required></td>
                <td><input class="form-control" readonly value="<?php echo $_smarty_tpl->tpl_vars['dato']->value->valu;?>
" data-type="country_no" id="country_no_<?php echo $_smarty_tpl->tpl_vars['dato']->iteration;?>
" name="country_no[]" type="text"></td>
                <td><input class="form-control" readonly value="<?php echo $_smarty_tpl->tpl_vars['dato']->value->impuesto;?>
" data-type="phone_code" id="phone_code_<?php echo $_smarty_tpl->tpl_vars['dato']->iteration;?>
" name="phone_code[]" type="text"></td>
                <td><input class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['dato']->value->cantidad;?>
" data-type="country_code" id="country_cantidad_<?php echo $_smarty_tpl->tpl_vars['dato']->iteration;?>
" onchange="calcal(<?php echo $_smarty_tpl->tpl_vars['dato']->iteration;?>
)" name="country_cantidad[]" type="text"> </td>
                <td><input class="form-control" readonly value="<?php echo $_smarty_tpl->tpl_vars['dato']->value->valor;?>
" data-type="country_code" id="country_value_<?php echo $_smarty_tpl->tpl_vars['dato']->iteration;?>
" name="country_value[]" type="text"> </td>
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
                <td><b id="snum">1.</b><input type='hidden' data-type='countryid' id='countryid_1' name='countryid[]'/></td>
                <td><input class="form-control autocomplete_txt" data-type="countryname" id="countryname_1" name="countryname[]" type="text"></td>
                <td><input class="form-control " readonly data-type="country_no" id="country_no_1" name="country_no[]" type="text"></td>
                <td><input class="form-control " readonly data-type="phone_code" id="phone_code_1" name="phone_code[]" type="text"></td>
                <td><input class="form-control " data-type="country_code" id="country_cantidad_1" onchange="calcal(1)" name="country_cantidad[]" type="text"> </td>
                <td><input class="form-control " readonly data-type="country_code" id="country_value_1" name="country_value[]" type="text"> </td>
            </tr>
            <?php }?>
            
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6" style="text-align: right;" >Subtotal</td>
                <td><input type="text" class="form-control " readonly id="stotal" name="stotal" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datosc']->value->val_subtotal)===null||$tmp==='' ? 0 : $tmp);?>
"></td>
            </tr>
            <tr>
                <td colspan="6" style="text-align: right;" >Impoconsumo</td>
                <td><input type="text" class="form-control " readonly id="tipc" name="tipc" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datosc']->value->val_ipc)===null||$tmp==='' ? 0 : $tmp);?>
"></td>
            </tr>
            <tr>
                <td colspan="6" style="text-align: right;" >Iva</td>
                <td><input type="text" class="form-control " readonly id="tiva" name="tiva" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datosc']->value->val_ival)===null||$tmp==='' ? 0 : $tmp);?>
" ></td>
            </tr>
            <tr>
                <td colspan="6" style="text-align: right;" >Total</td>
                <td><input type="text" class="form-control " readonly id="total" name="total" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datosc']->value->val_total)===null||$tmp==='' ? 0 : $tmp);?>
"></td>
            </tr>
        </tfoot>
    </table>
<div class='col-md-12 right'>
        <?php echo form_label('Observaciones generales');?>

        <?php echo form_textarea($_smarty_tpl->tpl_vars['descripcion']->value);?>

    </div>        
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
