

<div class="container mt-25">
    <div class="row">
    <?php $CI =& get_instance(); 
        $CI->load->view('componets/side_nav');
     ?>
    <div class="col s12 m9 offset-m1">
    <h2>Events</h2>
    <div><a  href="<?php echo base_url() ?>calendar/create_event" class="waves-effect waves-light btn">Add a New Event</a></div>
    <table>
        <thead>
          <tr>
              <th>Title</th>
              <th>Date</th>
              <th>Edit</th>
          </tr>
          <tbody>
        </thead>
    <?php if(($results)) : ?>

        <?php foreach($results as $row) : ?>
            <tr>
                <td><h4 ><?php echo ucfirst($row->title) ?></h4></td>
                <td><p><?php echo $row->start ?></p></td>
                <td> <a class="waves-effect waves-light btn" href="<?php echo base_url() . "calendar/edit_event/" . $row->event_id;?>"><i
   class="material-icons">edit</i>Edit</a></td>
                <td><a href="<?php echo base_url() . "calendar/delete_event/" . $row->event_id;?>"><i class="material-icons garbage" >delete</i></a></td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
            <div><h3>No Results</h3> </div>
                <?php endif; ?>  
            </tbody>
      </table>
    </div>
    </div>
</div>







        

      