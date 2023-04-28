<div class="container mt-25">
    <div class="row ">
     <?php $CI =& get_instance(); 
        $CI->load->view('componets/side_nav');
     ?>
     <div class="col s12 m9 offset-m1">
    <h1>New Project</h1>
    <?php
    if (isset($error)) {
        echo $error;
    }
    ?>
    <?php echo form_open_multipart('projects/create'); ?>
    <div class="form-group">
        <label class="flow-text" for="title">Title</label>
        <input type="text" name="title" class="form-control form-width" value="<?php echo set_value('title'); ?>" />
        <?php echo form_error('title'); ?>
    </div>
    <div class="form-group">
        <label class="flow-text" for="content">Project Description</label>
        <textarea name="content" class="form-control form-width textarea-height test-wig"><?php echo set_value('content'); ?></textarea>
        <?php echo form_error('content'); ?>
    </div>
    <div class="form-group">
        <label class="flow-text" for="picture">Picture</label>
        <input type="file" name="userfile" class="form-control form-width" value="<?php echo set_value('userfile'); ?>">
        <?php echo form_error('userfile'); ?>
    </div>
   
    <div class="form-group"><input type="submit" value="Submit" class="btn" /></div>
    </form>
</div>
</div>
</div>