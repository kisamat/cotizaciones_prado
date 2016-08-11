<?php
/* Smarty version 3.1.29, created on 2016-07-04 19:14:47
  from "/var/www/code_ionauth/application/views/templates/admin/tema/menus.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_577afbf70762b4_19766592',
  'file_dependency' => 
  array (
    'cad2f00b3fab78fadef3ea03adfcc7484593c350' => 
    array (
      0 => '/var/www/code_ionauth/application/views/templates/admin/tema/menus.htm',
      1 => 1465874152,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_577afbf70762b4_19766592 ($_smarty_tpl) {
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
