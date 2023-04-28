

<div class="container">
<div>
    <?php foreach($profile as $row): ?>

    <h3><?php echo ucfirst($row->first_name) ." ".  ucfirst($row->last_name); ?></h3>
    <div class="row">
        <div class="port-image col s12 m4">
            <img src="<?php echo base_url(). "uploads/profile_images/port/" .$row->profile_picture; ?>" alt="<?php echo $row->first_name; ?>">
        </div>
        <div class="profile-content col s12 m7 offset-m1">
            <div class="row">
                <div class="col s12 m6">
                    <h5>Job Title</h5>
                    <p><?php echo $row->job_field; ?></p>
                </div>
                <div class="col s12 m6">
                    <h5>Company</h5>
                    <p><?php echo $row->company; ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m6">
                    <h5>School</h5>
                    <p><?php echo $row->school; ?></p>
                </div>
            </div>
        </div>
</div>
<div class="row">
            <div class="col s12">
                    <h5>About Me</h5>
                    <p><?php echo $row->description; ?></p>
                </div>
                <?php if($row->port_url != ""): ?>
                <div class="col s12">
                <a href="<?php echo $row->port_url;?>" target="_blank" class="waves-effect waves-light btn theme-bg-primary">My Portfolio Website</a>
                </div>
                <?php endif; ?>
            </div>
    <?php endforeach; ?>
</div>
<div class="">
    <h3>My Projects</h3>
    <div class="row theme-box-fourth">
<?php foreach($projects as $row): ?>
    <?php if($row->published != 0): ?>
    <div class="col s12 m4">
      <div class="card">
        <div class="card-image">
          <img src="<?php echo base_url() . "uploads/display/" . $row->filename; ?>" alt="<?php echo $row->title?>">
          <span class="card-title tx-bold "><?php echo $row->title ?></span>
        </div>
        <div class="card-action">
          <a   href="<?php echo base_url() . "projects/detail/" . $row->project_id; ?>">Check it Out</a>
        </div>
      </div>
    </div>
    <?php endif; endforeach; ?>
  </div>
</div>
</div>