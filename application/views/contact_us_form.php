<div class="container">
    <div>
        <h2>Contact Us</h2>
        <p>We would love to hear from you, so please reach out and sombbody from our team will reach out to you.</p>
    </div>
    <?php
    if (isset($error)) {
        echo $error;
    }
    ?>
    <div class="row">
    <?php echo form_open_multipart('contact_us/index'); ?>
    <div class="form-group col s12 m6">
        <label class="flow-text" for="name">Name</label>
        <input type="text" name="name" class="form-control form-width" value="<?php echo set_value('name'); ?>" />
        <?php echo form_error('name'); ?>
    </div>
    <div class="form-group col s12 m6">
        <label class="flow-text" for="sender">Your Email</label>
        <input type="text" name="sender" class="form-control form-width" value="<?php echo set_value('sender'); ?>"/>
        <?php echo form_error('sender'); ?>
    </div>
    <div class="form-group col s12 m6">
        <label class="flow-text" for="subject">Your Subject</label>
        <input type="text" name="subject" class="form-control form-width" value="<?php echo set_value('subject'); ?>"/>
        <?php echo form_error('subject'); ?>
    </div>
    <div class="form-group col s12 m7">
        <label class="flow-text" for="message">Message</label>
        <textarea name="message" class="form-control form-width textarea-height" value=""><?php echo set_value('message'); ?></textarea>
        <?php echo form_error('message'); ?>
    </div>
    <div class="col s12">
<div class="form-group">
        <input type="submit" value="Submit" class="btn" />
    </div>
    </div>
    
    </form>
</div>
</div>