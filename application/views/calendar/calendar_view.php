<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
	<h1><?php echo $heading ?></h1>
           <div id="calendar"></div>
</div>
   
<script type="text/javascript">
	
    var events = <?php echo json_encode($data) ?>;
    
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
           
    $('#calendar').fullCalendar({
		events    : events,
	  contentHeight:'auto',
	  displayEventTime : false,
	  header: {
		left:'today prev,next',
		center: 'title',
		right: 'month, agendaDay'
	  },
	  buttonText:{
		month: 'month',
		day: 'day'
	  },
	  dayClick: function(date, jsEvent, view) {
  if(view.name == 'month' || view.name == 'basicWeek') {
    $('#calendar').fullCalendar('changeView', 'agendaDay');
    $('#calendar').fullCalendar('gotoDate', date);      
  }
	  }
    })
</script>