<div class="container">
    <h1>Calendar</h1>
    <?php
    if (isset($error)) {
        echo $error;
    }

        if($result){
        foreach($result as $row){
            $title = $row->title;
            $description =$row->description;
            $event_id = $row->event_id;
            $start_date = $row->startdate;
            $start_time = $row->starttime;
            $end_date = $row->enddate;
            $end_time = $row->endtime;
                    
         }

       
    }



    ?>
    <div class="row">
    <?php echo form_open_multipart(`calendar/edit_event/$event_id`); ?>
    <div class="col s12 m9 offset-m1">
    <div class="form-group class col s12 m7">
        <label class="flow-text" for="title">Title</label>
        <input type="text" name="title" class="form-control form-width" value="<?php echo set_value('title', $title); ?>" />
        <?php echo form_error('title'); ?>
    </div>
    <div class="form-group col s12">
        <label class="flow-text" for="description">Project Description</label>
        <textarea name="description" class="form-control form-width textarea-height test-wig"><?php echo set_value('content',$description); ?></textarea>
        <?php echo form_error('description'); ?>
    </div>
    <div class="form-group col s6">
        <label class="flow-text" for="start-date">Start Date</label>
        <input type="text" name="start-date" class="form-control form-width datepicker" value="<?php echo set_value('start-date', $start_date); ?>">
        <?php echo form_error('start-date'); ?>
    </div>
    <div class="form-group col s6">
        <label class="flow-text" for="end-date">End Date</label>
        <input type="text" name="end-date" class="form-control form-width datepicker" value="<?php echo set_value('end-date', $end_date); ?>">
        <?php echo form_error('end-date'); ?>
    </div>
    <div class="form-group col s6">
        <label class="flow-text" for="start-time">Start Time</label>
        <input type="text" name="start-time" class="form-control form-width timepicker" value="<?php echo set_value('start-time',$start_time); ?>">
        <?php echo form_error('start-time'); ?>
    </div>
    <div class="form-group col s6">
        <label class="flow-text" for="end-time">End Time</label>
        <input type="text" name="end-time" class="form-control form-width timepicker" value="<?php echo set_value('end-time', $end_time); ?>">
        <?php echo form_error('end-time'); ?>
    </div>
    <div class="form-group col s2 offset-s10"><input type="submit" value="Submit" class="btn" /></div>
    </form>
</div>
</div>
</div>