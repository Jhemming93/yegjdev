<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
    <h2>Event Details</h2>
    <?php if($results):
        foreach($results as $row):
        $title= $row->title;
        $description = $row->description;
        $start = $row->start;
        $end = $row->end;
        
        ?>
    <div >
        <div class="event-card-header">
            <h2><?php echo $title ?></h2>
        </div>
         <div class="event-card-body">
            <p><?php echo $description ?></p>
            <p><?php echo $start ?> - <?php echo $end ?> </p>
         </div>

    </div>

<?php endforeach; ?>
<?php else: ?>
    <div>
        <p>No Results</p>
    </div>
    <?php endif; ?>    
</div>