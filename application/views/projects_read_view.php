
<div class="container">
    <h2><?php echo $heading; ?></h2>
    <?php if (($results)) : ?>
        <?php foreach ($results as $row) : ?>
        
            <div class="col s12 m7">
    
    <div class="card horizontal my-horizontal">
        
      <div class="card-image">
        
        <img src="uploads/thumbs/<?php echo $row->filename; ?>"><!-- CHANGE -->
      </div>
      
      
      <div class="card-stacked" >
        
        <div class="card-content">
            <h4 class="header"><?php echo ucfirst($row->title); ?></h4>
            <p>By <?php echo $row->username;?></p>
          <p><?php echo substr($row->content,0,200);?></p>
        </div>
       <div class="card-action">
          <a href="<?php echo base_url() . "projects/detail/" .$row->project_id; ?>" class="light-green darken-2 white-text btn">Read More</a>
        </div> 
      </div>
      
    </div>
  </div>









                <h4></h4>
                <p></p>


        <?php endforeach; ?>
          <?php else: ?>
            <h3>No Results</h3>

    <?php endif; ?>
</div>