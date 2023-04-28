<div class="container">
    <?php if (($results)) : ?>
        <?php foreach ($results as $row) : 
            ?>
        
    <h1><?php echo $row->title ?></h1>
    <p>Created on <?php
    $date = date_create($row->date); 
    echo date_format($date, "F d, Y"); 
    ?>
    </p>
    
            <div class="article-single-content">
            <div class="lime lighten-5 myauther">By : <a href="<?php echo base_url() . "portfolio/detail_view/" . $row->author_id;?>"> <?php echo $row->username; ?></a></div>
                <div class="article-single-image">
                    <img src="<?php echo base_url() ?>uploads/display/<?php echo $row->filename; ?>" alt="<?php echo $row->title?>">
                </div>
                <div class="article-single-content">
                    <div><p><?php echo $row->content; ?></p></div>
                </div>
                <?php if($this->ion_auth->logged_in() && $this->ion_auth->user()->row()->id === $row->id): ?>
   
   <a class="waves-effect waves-light btn-large blue" href="<?php echo base_url() . "projects/edit/" . $row->project_id;?>"><i
   class="material-icons">edit</i>Edit</a>
   <a class="waves-effect waves-light btn-large red" href="<?php echo base_url() . "projects/delete/" . $row->project_id;?>"><i
   class="material-icons">delete</i>Delete</a>
   
   <?php endif; ?>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p>No results</p>
    <?php endif; ?>

</div>