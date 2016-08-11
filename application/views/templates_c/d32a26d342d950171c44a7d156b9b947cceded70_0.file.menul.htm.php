<?php
/* Smarty version 3.1.29, created on 2016-07-12 17:06:55
  from "/var/www/code_ionauth/application/views/templates/admin/tema/menul.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_578569ff3d3a85_86309898',
  'file_dependency' => 
  array (
    'd32a26d342d950171c44a7d156b9b947cceded70' => 
    array (
      0 => '/var/www/code_ionauth/application/views/templates/admin/tema/menul.htm',
      1 => 1468361213,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_578569ff3d3a85_86309898 ($_smarty_tpl) {
?>
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li>
            <p style="color:#fff">::Administrador de Contenidos::</p>            
        </li>           
        <li>
            <a href="<?php echo base_url();?>
admin/auth"><i class="fa fa-fw fa-dashboard"></i> Inicio</a>
        </li>			

        <?php
$_from = $_smarty_tpl->tpl_vars['listado']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_menu_0_saved_item = isset($_smarty_tpl->tpl_vars['menu']) ? $_smarty_tpl->tpl_vars['menu'] : false;
$_smarty_tpl->tpl_vars['menu'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['menu']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['menu']->value) {
$_smarty_tpl->tpl_vars['menu']->_loop = true;
$__foreach_menu_0_saved_local_item = $_smarty_tpl->tpl_vars['menu'];
?> 
            <?php if ($_smarty_tpl->tpl_vars['menu']->value->tipo == 0) {?>
            <li>
                <a href="<?php echo base_url();?>
admin/<?php echo $_smarty_tpl->tpl_vars['menu']->value->link;?>
"><i class="<?php echo $_smarty_tpl->tpl_vars['menu']->value->class;?>
"></i> <?php echo $_smarty_tpl->tpl_vars['menu']->value->name;?>
</a>
            </li>        
            <?php } elseif ($_smarty_tpl->tpl_vars['menu']->value->tipo == 1) {?>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo<?php echo $_smarty_tpl->tpl_vars['menu']->value->menu_id;?>
"><i class="<?php echo $_smarty_tpl->tpl_vars['menu']->value->class;?>
"></i> <?php echo $_smarty_tpl->tpl_vars['menu']->value->name;?>
 <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo<?php echo $_smarty_tpl->tpl_vars['menu']->value->menu_id;?>
" class="collapse">
                    <?php
$_from = $_smarty_tpl->tpl_vars['listado']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_lista_1_saved_item = isset($_smarty_tpl->tpl_vars['lista']) ? $_smarty_tpl->tpl_vars['lista'] : false;
$_smarty_tpl->tpl_vars['lista'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['lista']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['lista']->value) {
$_smarty_tpl->tpl_vars['lista']->_loop = true;
$__foreach_lista_1_saved_local_item = $_smarty_tpl->tpl_vars['lista'];
?>
                        <?php if ($_smarty_tpl->tpl_vars['menu']->value->menu_id == $_smarty_tpl->tpl_vars['lista']->value->tipo) {?>
                        <li>
                            <a href="<?php echo base_url();?>
admin/<?php echo $_smarty_tpl->tpl_vars['lista']->value->link;?>
"><i class="<?php echo $_smarty_tpl->tpl_vars['lista']->value->class;?>
"></i> <?php echo $_smarty_tpl->tpl_vars['lista']->value->name;?>
</a>
                        </li>
                        <?php }?>
                    <?php
$_smarty_tpl->tpl_vars['lista'] = $__foreach_lista_1_saved_local_item;
}
if ($__foreach_lista_1_saved_item) {
$_smarty_tpl->tpl_vars['lista'] = $__foreach_lista_1_saved_item;
}
?>
                </ul>
            </li>
            <?php }?>
        <?php
$_smarty_tpl->tpl_vars['menu'] = $__foreach_menu_0_saved_local_item;
}
if ($__foreach_menu_0_saved_item) {
$_smarty_tpl->tpl_vars['menu'] = $__foreach_menu_0_saved_item;
}
?> 
    </ul>
</div>
<?php }
}
