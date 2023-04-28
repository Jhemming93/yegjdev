<?php
if (isset($error)) {
    echo $error;
}


if ($results) {
    foreach ($results as $row) {
        $description = $row->description;
        $theme = $row->theme;
        $user_id = $row->user_id;
        $field = $row->job_field;
        $school = $row->school;
        $company = $row->company;
        $fullname = $row->first_name . " " . $row->last_name;
        $user_group = $row->group_id;
        $url = $row->port_url;
    }
}

?>




<div class="container mt-25">
    <div class="row">
        <?php $CI = &get_instance();
        $CI->load->view('componets/side_nav');
        ?>
        <div class="col s12 m9 offset-m1">
            <h1>Update Profile Info for <?php echo $fullname ?></h1>
            <div class="row">
                <?php echo form_open_multipart(`admin/user_edit/$user_id`); ?>
                <div class="form-group col s12">
                    <label class="flow-text" for="description">Profile Info</label>
                    <textarea name="description" class="form-control form-width test-wig"><?php echo set_value('description', $description); ?></textarea>
                    <?php echo form_error('description'); ?>
                </div>
                <div class="form-group col s12 m6">
                    <label class="flow-text" for="field">Job Field</label>
                    <input name="field" class="form-control form-width" value="<?php echo set_value('field', $field); ?>" />
                    <?php echo form_error('field'); ?>
                </div>
                <div class="form-group col s12 m6">
                    <label class="flow-text" for="company">Company</label>
                    <input name="company" class="form-control form-width" value="<?php echo set_value('company', $company); ?>" />
                    <?php echo form_error('company'); ?>
                </div>
                <div class="form-group col s12 m6">
                    <label class="flow-text" for="company">School</label>
                    <input name="school" class="form-control form-width" value="<?php echo set_value('school', $school); ?>" />
                    <?php echo form_error('school'); ?>
                </div>
                <div class="form-group col s12 m6">
                    <label class="flow-text" for="url">Portfolio Link</label>
                    <input name="url" class="form-control form-width" value="<?php echo set_value('url', $url); ?>" />
                    <?php echo form_error('url'); ?>
                </div>

                <div class="col s12 m6">
                    <label class="flow-text" for="theme">Theme</label>
                    <div class="input-field">
                        <select name="theme" id="theme">
                            <option value="default" <?php if ($theme === 'defualt') {
                                                        echo 'selected';
                                                    } ?>>Default</option>
                            <option value="blue" <?php if ($theme === 'blue') {
                                                        echo 'selected';
                                                    } ?>>Blue</option>
                            <option value="sunny" <?php if ($theme === 'sunny') {
                                                        echo 'selected';
                                                    } ?>>Sunny</option>
                            <option value="cool_man" <?php if ($theme === 'cool_man') {
                                                            echo 'selected';
                                                        } ?>>Cool Man</option>
                        </select>
                        <?php echo form_error('theme'); ?>
                    </div>
                </div>
                <div class="col s12 m6">
                    <label class="flow-text" for="user-group">User-Group</label>
                    <div class="input-field">
                        <select name="user-group" id="user-group">
                            <option value="1" <?php if ($user_group === '1') {
                                                    echo 'selected';
                                                } ?>>Admin</option>
                            <option value="2" <?php if ($user_group === '2') {
                                                    echo 'selected';
                                                } ?>>User</option>
                        </select>
                    </div>
                </div>

                <div class="form-group col s12 m6">
                    <label class="flow-text" for="picture">Picture</label>
                    <input type="file" name="userfile" class="form-control form-width" value="<?php echo set_value('userfile'); ?>">
                    <?php echo form_error('userfile'); ?>
                </div>
                <div class="form-group flow-text col s12 row mt-25">
                    <a class="waves-effect waves-light btn red col s4 offset-s2" onclick="return confirm('Are you sure you want to delete the User?')" href="<?php echo base_url() . "admin/user_delete/" . $user_id; ?>"><i class="material-icons">delete</i>Delete</a>
                    <input type="submit" value="Save Changes" class="btn col s4 offset-s2" />
                </div>
                </form>
            </div>
        </div>
    </div>
</div>