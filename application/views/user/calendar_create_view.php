<div class="container">
    <h1>Calendar</h1>
    <?php
    if (isset($error)) {
        echo $error;
    }
    ?>
    <?php echo form_open_multipart('calendar/create'); ?>
    <div class="form-group">
        <label class="flow-text" for="title">Title</label>
        <input type="text" name="title" class="form-control form-width" value="<?php echo set_value('title'); ?>" />
        <?php echo form_error('title'); ?>
    </div>
    <div class="form-group">
        <label class="flow-text" for="content">Project Description</label>
        <textarea name="content" class="form-control form-width textarea-height"><?php echo set_value('content'); ?></textarea>
        <?php echo form_error('content'); ?>
    </div>
    <div class="form-group">
        <label class="flow-text" for="start-date">Start Date</label>
        <input type="date" name="start-date" class="form-control form-width" value="<?php echo set_value('start-date'); ?>">
        <?php echo form_error('start-date'); ?>
    </div>
    <div class="form-group">
        <label class="flow-text" for="end-date">End Date</label>
        <input type="date" name="end-date" class="form-control form-width" value="<?php echo set_value('end-date'); ?>">
        <?php echo form_error('end-date'); ?>
    </div>
    <div class="form-group"><input type="submit" value="Submit" class="btn" /></div>
    </form>
</div>