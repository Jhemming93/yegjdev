
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
      <div class="card medium">
        <div class="card-image">
          <img src="<?php echo base_url() . "uploads/profile_images/display/" . $row->profile_picture; ?>">
          <span class="card-title"><?php echo $row->job_field; ?></span>
        </div>
        <div class="card-content">
          <p><?php echo substr($row->description, 0 , 30); ?></p>
        </div>
        <div class="card-action">
          <a href="<?php echo base_url() .'portfolio/detail_view' .  $row->user_id; ;?>"> More about <?php echo strtoupper($row->first_name); ?></a>
        </div>
      </div>
    </div>

    <?php } endforeach; endif; ?>
</div>


</div>