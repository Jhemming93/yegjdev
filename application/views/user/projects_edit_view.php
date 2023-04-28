  <?php
    if (isset($error)) {
        echo $error;
    }
    if($results){
        foreach($results as $row){
            $title = $row->title;
            $content = $row->content;
            $id = $row->project_id;
         }
    }

    ?>

<div class="container mt-25">
    <div class="row ">
     <?php $CI =& get_instance(); 
        $CI->load->view('componets/side_nav');
     ?>
     <div class="col s12 m9 offset-m1">
    <h1>Edit Project</h1>
  
    <?php echo form_open_multipart(`projects/edit/$id`); ?>
    <div class="form-group">
        <label class="flow-text" for="title">Title</label>
        <input type="text" name="title" class="form-control form-width" value="<?php echo set_value('title', $title); ?>" />
        <?php echo form_error('title'); ?>
    </div>
    <div class="form-group">
        <label class="flow-text" for="content">Project Description</label>
        <textarea name="content" class="form-control form-width textarea-height test-wig"><?php echo set_value('content', $content); ?></textarea>
        <?php echo form_error('content'); ?>
    </div>
    <div>
        <img src="<?php echo base_url()?>uploads/thumbs/<?php echo $row->filename; ?>" alt="<?php echo $title?>">
    </div>
    <div class="form-group"><input type="submit" value="Submit" class="btn" /></div>
    </form>
</div>
</div>
</div>