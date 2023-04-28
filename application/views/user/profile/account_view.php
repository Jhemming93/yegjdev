<?php
if ($results) {
    foreach ($results as $row) {
        $firstname = $row->first_name;
        $lastname = $row->last_name;
        $profilePicture = $row->profile_picture;
        $description = $row->description;
        $company = $row->company;
        $school = $row->school;
        $job = $row->job_field;
        $user_id = $row->user_id;
        if($profilePicture === ""){
            $profilePicture = "default_profile.png";
        }
        if ($description === "") {
            $description = "Add Description";
        }
        if ($company === '') {
            $company = "Add Company";
        }
        if ($school === '') {
            $school = 'Add School';
        }
        if ($job === '') {
            $job = 'Add Job Field';
        }
    }
}
?>
<div class="container mt-25">
    <div class="row ">
     <?php $CI =& get_instance(); 
        $CI->load->view('componets/side_nav');
     ?>
        <div class="col s12 m9 offset-m1">
            <div class="row">
                <div class="col s12 m6">
                    <h2><?php echo ucfirst($firstname) . " " . ucfirst($lastname); ?></h2>
                    <div>
                        <h5 class="flow-text "><strong>Profile info:</strong></h5>
                        <p><?php echo $description ?></p>
                    </div>
                    <div>
                        <h5 class="flow-text"><strong>Field:</strong></h5>
                        <p><?php echo $job; ?></p>
                    </div>
                    <div>
                        <h5 class="flow-text"><strong>Company:</strong></h5>
                        <p><?php echo $company; ?></p>
                    </div>
                    <div>
                        <h5 class="flow-text"><strong>School:</strong></h5>
                        <p><?php echo $school; ?></p>
                    </div>
                    
                </div>
                <div class="col s12 m3 offset-m2 theme-profile-image" style="background-image: url('<?php echo base_url() . 'uploads/profile_images/display/' . $profilePicture; ?>');">
                </div>
            </div>


        </div>
    </div>

</div>