<div class="container mt-25">
    <div class="row">
    <?php $CI =& get_instance(); 
        $CI->load->view('componets/side_nav');
     ?>
    <div class="col s12 m9 offset-m1">
    <h2><?php echo $heading; ?></h2>
    <div><a  href="<?php echo base_url() ?>projects/create" class="waves-effect waves-light blue btn">Add a New Project</a></div>
    <table>
        <thead>
          <tr>
              <th>Title</th>
              <th>Date</th>
              <th>Edit</th>
              <th>Publish</th>
              <th>Delete</th>
          </tr>
          <tbody>
        </thead>
    <?php if(($results)) : ?>

        <?php foreach($results as $row) : 
               $project_id = $row->project_id; 
            ?>

            <tr>
                <td><h4 ><?php echo ucfirst($row->title) ?></h4></td>
                <td><p><?php echo $row->date ?></p></td>
                <td> <a class="waves-effect waves-light btn blue" href="<?php echo base_url() . "projects/edit/" . $row->project_id;?>"><i
   class="material-icons">edit</i></a></td>
                <td class="center-align" ><i class="material-icons publishing <?php if($row->published === "0"){ echo "not_published";}else{echo "published";}?>" data-publish="<?php echo $project_id; ?>">check_circle</i> </td>
                <td class="center-align"><a  href="<?php echo base_url() . "projects/delete/" . $row->project_id;?>"><i class="material-icons  garbage" >delete</i></a></td>
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
<script>

$('document').ready(()=>{
    
    $('.publishing').click(function(){

        var project_id = $(this).data('publish');

        $.ajax({
            url: `<?php echo base_url() . "projects/publish/"?>${project_id}`,
            method: "POST",
            success: function(){
                location.reload(true);
            }
        })

    })

})

</script>    






        

      