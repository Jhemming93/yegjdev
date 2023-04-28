
<?php 



?>

<div class="container">
<h2>Junior Devs Portfolio's</h2>
<div class="row">
    <?php if($results):
            foreach($results as $row): 
            if($row->job_field === "" || $row->description === ""){

            }else{
            
            
            
            ?>

    <div class="col s12 m3">
      <div class="card small theme-bg-third">
        <div class="card-image">
          <img src="<?php echo base_url() . "uploads/profile_images/display/" . $row->profile_picture; ?>" alt="<?php echo $row->first_name ?>">
          <span class="card-title"><?php echo $row->job_field; ?></span>
        </div>
        <div class="card-content">
          <p><?php echo substr($row->description, 0 , 30); ?></p>
          <a class="theme-text-primary" href="<?php echo base_url() .'portfolio/detail_view/' .  $row->user_id; ;?>"> More about <?php echo ucfirst($row->first_name); ?></a>
        </div>
      </div>
    </div>

    <?php } endforeach; endif; ?>
</div>

<!-- <ul class="pagination">
    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
    <li class="active"><a href="#!">1</a></li>
    <li class="waves-effect"><a href="#!">2</a></li>
    <li class="waves-effect"><a href="#!">3</a></li>
    <li class="waves-effect"><a href="#!">4</a></li>
    <li class="waves-effect"><a href="#!">5</a></li>
    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
  </ul> -->
</div>