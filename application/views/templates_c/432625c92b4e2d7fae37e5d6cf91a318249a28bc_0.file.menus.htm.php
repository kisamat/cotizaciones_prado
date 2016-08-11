<?php
/* Smarty version 3.1.29, created on 2016-08-10 18:08:37
  from "/www/cotizaciones_prado/application/views/templates/admin/tema/menus.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57abb3f58c2835_08108600',
  'file_dependency' => 
  array (
    '432625c92b4e2d7fae37e5d6cf91a318249a28bc' => 
    array (
      0 => '/www/cotizaciones_prado/application/views/templates/admin/tema/menus.htm',
      1 => 1465874152,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57abb3f58c2835_08108600 ($_smarty_tpl) {
?>
<ul class="nav navbar-right top-nav">
                
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
<?php echo $_SESSION['email'];?>

<b class="caret"></b></a>
                    <ul class="dropdown-menu">                        
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url();?>
admin/auth/logout"><i class="fa fa-fw fa-power-off"></i> Salir</a>
                        </li>
                    </ul>
                </li>
            </ul>
<?php }
}
