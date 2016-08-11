<?php
/* Smarty version 3.1.29, created on 2016-08-10 18:08:37
  from "/www/cotizaciones_prado/application/views/templates/admin/tema/header.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57abb3f58bc511_92101303',
  'file_dependency' => 
  array (
    '376decbb2c0989f6a19fd134dcb0a1d6de8d5a55' => 
    array (
      0 => '/www/cotizaciones_prado/application/views/templates/admin/tema/header.htm',
      1 => 1465954716,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/tema/menus.htm' => 1,
    'file:admin/tema/menul.htm' => 1,
    'file:admin/tema/miga.htm' => 1,
  ),
),false)) {
function content_57abb3f58bc511_92101303 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>::Administrador de Contenidos::</title>
<link rel="shortcut icon" href="<?php echo base_url();?>
assets/admin/images/favicon.gif" type="image/jpg"/>
    <!-- Bootstrap Core CSS -->
    <!--    <link href="<?php echo '<?php ';?>echo base_url() <?php echo '?>';?>assets/css/bootstrap.min.css" rel="stylesheet">-->
    <link href="<?php echo base_url();?>
assets/admin/css/bootstrap-datetimepicker.css" rel="stylesheet" />	

    <link href="<?php echo base_url();?>
assets/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>
assets/admin/css/bootstrap.css" rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>
assets/admin/css/sb-admin.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>
assets/admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<?php echo '<script'; ?>
 src="<?php echo base_url();?>
assets/admin/calendar/lib/jquery.min.js"><?php echo '</script'; ?>
>

	<?php echo '<script'; ?>
 src="<?php echo base_url();?>
assets/admin/js/moment.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo base_url();?>
assets/admin/js/bootstrap-datetimepicker.min.js"><?php echo '</script'; ?>
>
	
	<?php echo '<script'; ?>
 src="<?php echo base_url();?>
libs/ckeditor/ckeditor.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo base_url();?>
libs/ckfinder/ckfinder.js"><?php echo '</script'; ?>
>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
    <![endif]-->

<style type="text/css">
	#error {   
	    color:#FF0000;   
	}
	</style>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
              <a  href="<?php echo base_url();?>
admin/auth/"><img src="<?php echo base_url();?>
assets/admin/images/logo_upn.png" align="left"></a>
             
            </div>
            <!-- Top Menu Items -->
			 <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/menus.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                        
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
			 <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/menul.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                        

            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

			 <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/tema/miga.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                        
<?php }
}
