<?php
/* Smarty version 3.1.29, created on 2016-07-08 10:21:03
  from "/var/www/code_ionauth/application/views/templates/admin/notidesta/notidesta.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_577fc4df5336c5_37333723',
  'file_dependency' => 
  array (
    'da69ef8b23a2aa3b9614bd6497ce250195c9b9f1' => 
    array (
      0 => '/var/www/code_ionauth/application/views/templates/admin/notidesta/notidesta.htm',
      1 => 1467991261,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/tema/header.htm' => 1,
    'file:admin/tema/footer.htm' => 1,
  ),
),false)) {
function content_577fc4df5336c5_37333723 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<style type="text/css">
    #full{
        width:100%;
        height:100%;
        align-items: left;
    }
    
    #cuerpo {
        width:450px;
        height:450px;
        float:left;
    }

    #antiguas {
        width:450px;
       
        float:right;
        align-items: right;
        text-align: right;
    }
    
    #espacio {
        width:200px;
        height:200px;
        float:left;
    }

    #caja32{
        border-style: solid;
        background-color: #d2cbcb;
        float:left;        
        width:150px;
        height:150px;
        align-items: center;
        text-align: center;
        
    }
    #caja33{

        float:left;        
        width:150px;
        height:150px;
        align-items: center;
        text-align: center;
        
    }
 #botones {
        width:100%;
        height:auto;
        float:right;
    }

</style>

<h3>Noticias Destacadas</h3>
<div class="table-responsive">

  <table style="width: 100%"  class="table">
      <tbody>
        <tr>
          <td>
          
<h3>Por favor Cree las Noticias en el orden de la secuencia de 2 a 8</h3>
<br>

<div id="full">
    
<div id="cuerpo">
  
    <?php
$_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int) ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? 9+1 - (1) : 1-(9)+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0) {
for ($_smarty_tpl->tpl_vars['foo']->value = 1, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++) {
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration == 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration == $_smarty_tpl->tpl_vars['foo']->total;?>   
        <?php if ($_smarty_tpl->tpl_vars['foo']->value%2 == 0) {?>
        
            <?php if ($_smarty_tpl->tpl_vars['foo']->value == 2) {?>
            
               
                <?php if (isset($_smarty_tpl->tpl_vars['notides']->value[0])) {?>            
                    <div id="caja32" onclick="location.href = '<?php echo base_url();?>
admin/notidesta/crear_notidesta/<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
'" style="cursor:pointer;">
                    <div id="cabeza_caja"><?php echo $_smarty_tpl->tpl_vars['notides']->value[0]['titulo'];?>
</div>
                    <div id="cuerpo_caja"> <img src="<?php echo base_url();?>
userfiles/uploads/<?php echo $_smarty_tpl->tpl_vars['notides']->value[0]['imagen'];?>
" border="0" width="120" height="120"></div>                
                    </div>
                <?php } else { ?>    
                    <div id="caja32" onclick="location.href = '<?php echo base_url();?>
admin/notidesta/crear_notidesta/<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
'" style="cursor:pointer;">
                    <div id="cabeza_caja"> &nbsp</div>
                    <div id="cuerpo_caja"> <h1><?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
</h1></div>
                    </div>
                <?php }?>
            <?php } elseif ($_smarty_tpl->tpl_vars['foo']->value == 4) {?>
                <?php if (isset($_smarty_tpl->tpl_vars['notides']->value[1])) {?> 
                    <div id="caja32" onclick="location.href = '<?php echo base_url();?>
admin/notidesta/crear_notidesta/<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
'" style="cursor:pointer;">
                    <div id="cabeza_caja"><?php echo $_smarty_tpl->tpl_vars['notides']->value[1]['titulo'];?>
</div>
                    <div id="cuerpo_caja"> <img src="<?php echo base_url();?>
userfiles/uploads/<?php echo $_smarty_tpl->tpl_vars['notides']->value[1]['imagen'];?>
" border="0" width="120" height="120"></div>                                
                    </div>
                <?php } else { ?>    
                    <div id="caja32" onclick="location.href = '<?php echo base_url();?>
admin/notidesta/crear_notidesta/<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
'" style="cursor:pointer;">
                    <div id="cabeza_caja"> &nbsp</div>
                    <div id="cuerpo_caja"> <h1><?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
</h1></div>
                    </div>
                <?php }?>
            <?php } elseif ($_smarty_tpl->tpl_vars['foo']->value == 6) {?>
                <?php if (isset($_smarty_tpl->tpl_vars['notides']->value[2])) {?> 
                    <div id="caja32" onclick="location.href = '<?php echo base_url();?>
admin/notidesta/crear_notidesta/<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
'" style="cursor:pointer;">
                    <div id="cabeza_caja"><?php echo $_smarty_tpl->tpl_vars['notides']->value[2]['titulo'];?>
</div>
                    <div id="cuerpo_caja"> <img src="<?php echo base_url();?>
userfiles/uploads/<?php echo $_smarty_tpl->tpl_vars['notides']->value[2]['imagen'];?>
" border="0" width="120" height="120"></div>                
                    </div>
                <?php } else { ?>    
                    <div id="caja32" onclick="location.href = '<?php echo base_url();?>
admin/notidesta/crear_notidesta/<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
'" style="cursor:pointer;">
                    <div id="cabeza_caja"> &nbsp</div>
                    <div id="cuerpo_caja"> <h1><?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
</h1></div>
                    </div>
                <?php }?>
            <?php } elseif ($_smarty_tpl->tpl_vars['foo']->value == 8) {?>
                <?php if (isset($_smarty_tpl->tpl_vars['notides']->value[3])) {?> 
                    <div id="caja32" onclick="location.href = '<?php echo base_url();?>
admin/notidesta/crear_notidesta/<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
'" style="cursor:pointer;">
                    <div id="cabeza_caja"><?php echo $_smarty_tpl->tpl_vars['notides']->value[3]['titulo'];?>
</div>
                    <div id="cuerpo_caja"> <img src="<?php echo base_url();?>
userfiles/uploads/<?php echo $_smarty_tpl->tpl_vars['notides']->value[3]['imagen'];?>
" border="0" width="120" height="120"></div>                
                    </div>
                <?php } else { ?>    
                    <div id="caja32" onclick="location.href = '<?php echo base_url();?>
admin/notidesta/crear_notidesta/<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
'" style="cursor:pointer;">
                    <div id="cabeza_caja"> &nbsp</div>
                    <div id="cuerpo_caja"> <h1><?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
</h1></div>
                    </div>
                <?php }?>
            <?php } else { ?>
                    <div id="caja32" onclick="location.href = '<?php echo base_url();?>
admin/notidesta/crear_notidesta/<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
'" style="cursor:pointer;">
                    <div id="cabeza_caja"> &nbsp</div>
                    <div id="cuerpo_caja"> <h1><?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
</h1></div>
                    </div>                
            <?php }?>
       
        <?php } else { ?>
        
            <?php if ($_smarty_tpl->tpl_vars['foo']->value == 1) {?>
                <?php if (isset($_smarty_tpl->tpl_vars['fijas']->value[0])) {?>            
                    <div id="caja33">
                    <div id="cabeza_caja"><?php echo $_smarty_tpl->tpl_vars['fijas']->value[0]['titulo'];?>
</div>
                    <div id="cuerpo_caja"> <img src="<?php echo base_url();?>
userfiles/uploads/<?php echo $_smarty_tpl->tpl_vars['fijas']->value[0]['imagen'];?>
" border="0" width="120" height="120"></div>                
                    </div>
                <?php } else { ?>    
                    <div id="caja33">
                    <div id="cabeza_caja"> &nbsp</div>
                    <div id="cuerpo_caja"> &nbsp</div>
                    </div>
                <?php }?>
            <?php } elseif ($_smarty_tpl->tpl_vars['foo']->value == 3) {?>
                <?php if (isset($_smarty_tpl->tpl_vars['fijas']->value[1])) {?> 
                    <div id="caja33">
                    <div id="cabeza_caja"><?php echo $_smarty_tpl->tpl_vars['fijas']->value[1]['titulo'];?>
</div>
                    <div id="cuerpo_caja"> <img src="<?php echo base_url();?>
userfiles/uploads/<?php echo $_smarty_tpl->tpl_vars['fijas']->value[1]['imagen'];?>
" border="0" width="120" height="120"></div>                                
                    </div>
                <?php } else { ?>    
                    <div id="caja33">
                    <div id="cabeza_caja"> &nbsp</div>
                    <div id="cuerpo_caja"> &nbsp</div>
                    </div>
                <?php }?>
            <?php } elseif ($_smarty_tpl->tpl_vars['foo']->value == 5) {?>
                <?php if (isset($_smarty_tpl->tpl_vars['fijas']->value[2])) {?> 
                    <div id="caja33">
                    <div id="cabeza_caja"><?php echo $_smarty_tpl->tpl_vars['fijas']->value[2]['titulo'];?>
</div>
                    <div id="cuerpo_caja"> <img src="<?php echo base_url();?>
userfiles/uploads/<?php echo $_smarty_tpl->tpl_vars['fijas']->value[2]['imagen'];?>
" border="0" width="120" height="120"></div>                
                    </div>
                <?php } else { ?>    
                    <div id="caja33">
                    <div id="cabeza_caja"> &nbsp</div>
                    <div id="cuerpo_caja"> &nbsp</div>
                    </div>
                <?php }?>
            <?php } elseif ($_smarty_tpl->tpl_vars['foo']->value == 7) {?>
                <?php if (isset($_smarty_tpl->tpl_vars['fijas']->value[3])) {?> 
                    <div id="caja33">
                    <div id="cabeza_caja"><?php echo $_smarty_tpl->tpl_vars['fijas']->value[3]['titulo'];?>
</div>
                    <div id="cuerpo_caja"> <img src="<?php echo base_url();?>
userfiles/uploads/<?php echo $_smarty_tpl->tpl_vars['fijas']->value[3]['imagen'];?>
" border="0" width="120" height="120"></div>                
                    </div>
                <?php } else { ?>    
                    <div id="caja33">
                    <div id="cabeza_caja"> &nbsp</div>
                    <div id="cuerpo_caja"> &nbsp</div>
                    </div>
                <?php }?>
                
            <?php } elseif ($_smarty_tpl->tpl_vars['foo']->value == 9) {?>
                <?php if (isset($_smarty_tpl->tpl_vars['fijas']->value[4])) {?> 
                    <div id="caja33">
                    <div id="cabeza_caja"><?php echo $_smarty_tpl->tpl_vars['fijas']->value[4]['titulo'];?>
</div>
                    <div id="cuerpo_caja"> <img src="<?php echo base_url();?>
userfiles/uploads/<?php echo $_smarty_tpl->tpl_vars['fijas']->value[4]['imagen'];?>
" border="0" width="120" height="120"></div>                
                    </div>
                <?php } else { ?>    
                    <div id="caja33">
                    <div id="cabeza_caja"> &nbsp</div>
                    <div id="cuerpo_caja"> &nbsp</div>
                    </div>
                <?php }?>
                
            <?php } else { ?>
                    <div id="caja33">
            <div id="cabeza_caja"> &nbsp</div>
            <div id="cuerpo_caja"> &nbsp</div>
            </div>               
            <?php }?>
       
        
        <?php }?>   
    <?php }
}
?>
   
</div>
  </td>
          <td>
    
    
<?php if (isset($_smarty_tpl->tpl_vars['antiguas']->value)) {?> 
    
    <div id="antiguas">
        <h3>Modulo Noticias</h3>
    <br>
        <?php
$_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int) ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? 8+1 - (0) : 0-(8)+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0) {
for ($_smarty_tpl->tpl_vars['foo']->value = 0, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++) {
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration == 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration == $_smarty_tpl->tpl_vars['foo']->total;?> 
            <div id="caja33">
            <div id="cabeza_caja"> <?php echo $_smarty_tpl->tpl_vars['antiguas']->value[$_smarty_tpl->tpl_vars['foo']->value]['titulo'];?>
</div>
            <div id="cuerpo_caja"> <img src="<?php echo base_url();?>
userfiles/uploads/<?php echo $_smarty_tpl->tpl_vars['antiguas']->value[$_smarty_tpl->tpl_vars['foo']->value]['imagen'];?>
" border="0" width="120" height="120"></div>
            </div>
        <?php }
}
?>
 
    </div>
    

<?php }?> 
</div>
  </td>
        </tr>
      </tbody>
    </table>
    
</div>    
<div id="botones">
    <br>
<a href="<?php echo base_url();?>
admin/notidesta/limpiar" class="btn btn-lg btn-info">Limpiar</a> | 
<a href="<?php echo base_url();?>
admin/notidesta/completar" class="btn btn-lg btn-primary">Completar</a> |
<a href="<?php echo base_url();?>
admin/notidesta/aplicar" class="btn btn-lg btn-success">Aplicar</a> 
</div>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
