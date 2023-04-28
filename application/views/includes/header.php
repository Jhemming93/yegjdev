<?php 
if($this->ion_auth->logged_in()){

  $CI =& get_instance();
  $CI->load->model('user_model');
  $data = $CI->user_model->get_theme();
  foreach($data as $row){
    $theme = $row->theme;
  }


}else{
  $theme = "default";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
          if (APP_NAME) {
            $title = APP_NAME;
          }
          if (isset($heading)) {
            $title = $title . " - " . $heading;
          }
          echo $title;
        ?>
    </title>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" /> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
   
  
      <?php 
            if(isset($theme)):?>
            <?php if($theme === 'default') :?>
            <link rel="stylesheet" href="<?php echo base_url() ?>css/themes/default.css">
            <?php  else: ?>
            <link rel="stylesheet" href="<?php echo base_url() ?>css/themes/<?php echo $theme ?>.css">
            <?php endif;
                  endif;
                  ?>
    <script src="<?php echo base_url(); ?>js/material.js"></script>
    <script src="<?php echo base_url(); ?>js/main.js"></script>
  <link href="<?php echo base_url(); ?>css/materliaze.css" rel="stylesheet">
  <!-- wisgwyg  -->
  <script src="<?php echo base_url(); ?>trumbowyg/dist/trumbowyg.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>trumbowyg/dist/ui/trumbowyg.min.css">

  
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="<?php echo base_url(); ?>css/styles.css" rel="stylesheet">
  <!-- addchat -->
  <link href="<?php echo base_url('assets/addchat/css/addchat.min.css') ?>" rel="stylesheet">
  <script>
        $(document).ready(function(){
        // fade #message if exists
        if($('#message').length){
        $( "#message" ).delay(3000).fadeOut({}, 3000);
        }

        function getCalendar(target_div, year, month){
    $.get( '<?php echo base_url('calendar/eventCalendar/'); ?>'+year+'/'+month, function( html ) {
        $('#'+target_div).html(html);
    });
}

function getEvents(date){
    $.get( '<?php echo base_url('calendar/getEvents/'); ?>'+date, function( html ) {
        $('#event_list').html(html);
    });



}
$(document).on("change", ".month-dropdown", function(){
    getCalendar('calendar_div', $('.year-dropdown').val(), $('.month-dropdown').val());
});
$(document).on("change", ".year-dropdown", function(){
    getCalendar('calendar_div', $('.year-dropdown').val(), $('.month-dropdown').val());
});
    
    $('select').formSelect();

    $('.timepicker').timepicker();
    $('.datepicker').datepicker({
      format: "yyyy-mm-dd"
    });

    $('.test-wig').trumbowyg();




    });
  </script>
</head>
<body>
  
<nav class="theme-bg-secondary">
    <div class="nav-wrapper container">
      <a href="<?php echo base_url(); ?>" class="brand-logo left"><i class="material-icons" class="home-logo">api</i><?php if(APP_NAME){echo APP_NAME; }?></a>
      <a href="#" class="sidenav-trigger right"  data-target="slide-out"><i class="material-icons">menu</i></a>
      
      


      <ul id="nav-mobile" class="right hide-on-med-and-down">
      <li><a href="<?php echo base_url(); ?>portfolio">Portfolios</a></li>
        <li><a  href="<?php echo base_url(); ?>calendar">Events</a></li>
        <li><a  href="<?php echo base_url(); ?>contact_us">Contact Us</a></li>
        <?php if($this->ion_auth->logged_in()): ?>
      <?php 
            $user_id = $this->ion_auth->user()->row()->id;
            $username = $this->ion_auth->user()->row()->username;
      ?>
        <li><a class=" theme-bg-primary" href="<?php echo base_url(); ?>user">My Account</a></li>
        <li><a class="" href="<?php echo base_url(); ?>auth/logout">Logout</a></li>
      </li>
      <?php else: ?>  


      <li><a class="waves-effect waves-light btn" href="<?php echo base_url(); ?>auth/login">Login</a></li>
      <?php endif;  ?>
      </ul>
      
    </div>
    
  </nav>
  
  <ul id="slide-out" class="sidenav">
        <li><a class="flow-text" href="<?php echo base_url(); ?>portfolio">Portfolios</a></li>
        <li><a class="flow-text" href="<?php echo base_url(); ?>calendar">Events</a></li>
        <li><a class="flow-text" href="<?php echo base_url(); ?>contact_us">Contact Us</a></li>

        <?php if($this->ion_auth->logged_in()): ?>

      <?php 
            $user_id = $this->ion_auth->user()->row()->id;
            $username = $this->ion_auth->user()->row()->username;
      ?>
      
      <li class="theme-bg-primary center"><a href="<?php echo base_url(); ?>user">My Account</a></li>

      <li><a class="flow-text" href="<?php echo base_url(); ?>auth/logout">Logout</a></li>
      <?php else: ?>  


      <li><a class="waves-effect waves-light btn" href="<?php echo base_url(); ?>auth/login">Login</a></li>
      <?php endif;  ?>
        </ul>
  <?php $message = $this->session->userdata('message'); ?>
 <?php if(isset($message)): ?>
 <h3 class="blue lighten-4 container" id="message"><i class="material-icons">thumbs_up</i><?php echo $message; ?></h3>
 <?php endif; ?>
 <?php $this->session->unset_userdata('message'); ?>
