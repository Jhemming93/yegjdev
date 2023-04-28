


<div class="container mt-25">
    <div class="row ">
        <?php $CI = &get_instance();
        $CI->load->view('componets/side_nav');
        ?>
        <div class="col s12 m9 offset-m1">
        <table>
        <thead>
          <tr>
              <th>User ID</th>
              <th>User Name</th>
              <th>Edit</th>
          </tr>
          <tbody>
        </thead>
    <?php if(($results)) : ?>
        <?php foreach($results as $row) : ?>
            <tr>
                <td><h4 ><?php echo ucfirst($row->id) ?></h4></td>
                <td><p><?php echo $row->username ?></p></td>
                <td> <a class="waves-effect waves-light btn blue" href="<?php echo base_url() . "admin/user_edit/" . $row->id;?>"><i
   class="material-icons">edit</i>Edit</a></td>
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