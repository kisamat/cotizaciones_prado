<?php
/* Smarty version 3.1.29, created on 2016-08-10 18:08:45
  from "/www/cotizaciones_prado/application/views/templates/admin/agenda/calendario.htm" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57abb3fd7747d8_70195399',
  'file_dependency' => 
  array (
    '6a296820988896ba64c170904da4b11befd0c3c9' => 
    array (
      0 => '/www/cotizaciones_prado/application/views/templates/admin/agenda/calendario.htm',
      1 => 1465935911,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57abb3fd7747d8_70195399 ($_smarty_tpl) {
echo '<script'; ?>
 type='text/javascript'>

function editarEvento(ide){
window.open("agenda/editar_evento/"+ide,"_self")
}

<?php echo '</script'; ?>
>

<link rel="stylesheet" href="<?php echo base_url();?>
assets/admin/calendar/lib/cupertino/jquery-ui.min.css" />
	<link href="<?php echo base_url();?>
assets/admin/calendar/fullcalendar.css" rel="stylesheet" />
	<link href="<?php echo base_url();?>
assets/admin/calendar/fullcalendar.print.css" rel="stylesheet" media="print" />
	<?php echo '<script'; ?>
 src="<?php echo base_url();?>
assets/admin/calendar/fullcalendar.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo base_url();?>
assets/admin/calendar/lib/moment.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo base_url();?>
assets/admin/calendar/lang-all.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>

	$(document).ready(function() {
		

		var currentLangCode = 'es';

		function renderCalendar() {
			$('#calendar').fullCalendar({
				header: {
					left: 'prev,next today',
					center: 'title',
					right: 'month,agendaWeek,agendaDay'
				},
				//defaultDate: '2016-06-12',
				 
				selectable: true,
				selectHelper: true,
				select: function(start, end) {	
											
				
				window.open("agenda/crear_evento","_self")

						
				var eventData;
				if (title) {
					eventData = {
						title: title,
						start: start,
						end: end
					};
					$('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
				}
				$('#calendar').fullCalendar('unselect');
			},
				lang: currentLangCode,
				buttonIcons: false, // show the prev/next text
				weekNumbers: true,
				editable: true,
				eventLimit: true, // allow "more" link when too many events
				events: <?php echo $_smarty_tpl->tpl_vars['jason']->value;?>

			});
		}

		renderCalendar();
	});

<?php echo '</script'; ?>
>
<style>

	

	#calendar {
		max-width: 900px;
		margin: 40px auto;
		padding: 0 10px;
	}

</style>

	

	<div id='calendar'></div>



<?php }
}
