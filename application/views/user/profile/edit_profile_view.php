<?php
    if (isset($error)) {
        echo $error;
    }
 
    
    if($results){
        foreach($results as $row){
            $description = $row->description;
            $theme =$row->theme;
            $user_id = $row->user_id;
            $field = $row->job_field;
            $school = $row->school;
            $company = $row->company;
            $url = $row->port_url;
            
         }
    }
    
    ?>



<div class="container mt-25">
    <div class="row">

    <?php $CI =& get_instance(); 
        $CI->load->view('componets/side_nav');
     ?>
    <div class="col s12 m9 offset-m1">
    <h1>Update Profile Info</h1>
    <div class="row">
    <?php echo form_open_multipart(`user/update_profile/$user_id`); ?>
    <div class="form-group col s12">
        <label class="flow-text" for="description">Profile Info</label>
        <textarea name="description" class="form-control form-width test-wig"><?php echo set_value('description', $description); ?></textarea>
        <?php echo form_error('description'); ?>
    </div>
    <div class="form-group col s12 m6">
        <label class="flow-text" for="field">Job Field</label>
        <input name="field" class="form-control form-width" value="<?php echo set_value('field', $field); ?>"/>
        <?php echo form_error('field'); ?>
    </div>
    <div class="form-group col s12 m6">
        <label class="flow-text" for="company">Company</label>
        <input name="company" class="form-control form-width" value="<?php echo set_value('company', $company); ?>"/>
        <?php echo form_error('company'); ?>
    </div>
    <div class="form-group col s12 m6">
        <label class="flow-text" for="company">School</label>
        <input name="school" class="form-control form-width" value="<?php echo set_value('school', $school); ?>"/>
        <?php echo form_error('school'); ?>
    </div>
    <div class="form-group col s12 m6">
        <label class="flow-text" for="url">Portfolio Link</label>
        <input name="url" class="form-control form-width" value="<?php echo set_value('url', $url); ?>"/>
        <?php echo form_error('url'); ?>
    </div>

    <div class="col s12 m6">
        <label class="flow-text" for="theme">Theme</label>
        <div class="input-field">
        <select name="theme" id="theme">
            <option value="default" <?php if($theme === 'defualt'){echo 'selected';} ?>>Default</option>
            <option value="blue" <?php if($theme === 'blue'){echo 'selected';} ?>>Blue</option>
            <option value="sunny" <?php if($theme === 'sunny'){echo 'selected';} ?>>Sunny</option>
            <option value="cool_man" <?php if($theme === 'cool_man'){echo 'selected';} ?>>Cool Man</option>
        </select>
        <?php echo form_error('theme'); ?>
    </div>
    </div>

    <div class="form-group col s12 m6">
        <label class="flow-text" for="picture">Picture</label>
        <input type="file" name="userfile" class="form-control form-width" value="<?php echo set_value('userfile'); ?>">
        <?php echo form_error('userfile'); ?>
    </div>
    <div class="form-group"><input type="submit" value="Save Changes" class="btn col s12" /></div>
    </form>
</div>
</div>
</div>
</div>