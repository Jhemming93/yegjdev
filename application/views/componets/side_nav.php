
<?php if($this->ion_auth->logged_in()): ?>

<?php 
      $user_id = $this->ion_auth->user()->row()->id;?>

<div class="col s12 m2 theme-box">
            <div>
            <h3 class="flow-text theme-font-color">User Settings</h3>
            <ul>
            <li class="theme-menu-item"><a href="<?php echo base_url(); ?>user">My Account</a></li>
                <li class="theme-menu-item"><a href="<?php echo base_url(); ?>user/update_profile/<?php echo $user_id ?>">Update Profile Info</a></li>
                <li class="theme-menu-item"><a href="<?php echo base_url(); ?>auth/change_password">Change Password</a></li>
            </ul>
        </div>
        <div>
            <h3 class="flow-text theme-font-color">My Stuff</h3>
            <ul>
                <li class="theme-menu-item"><a href="<?php echo base_url(); ?>portfolio/detail_view/<?php echo $user_id; ?>">My Portfolio View</a></li>
                <li class="theme-menu-item"><a href="<?php echo base_url(); ?>projects/my_projects">My Projects</a></li>
                <li class="theme-menu-item"><a href="<?php echo base_url(); ?>portfolio/detail/<?php echo $user_id ?>"></a></li>
            </ul> 
        </div>
        <?php 
        if($this->ion_auth->in_group(1)): ?>
        <div>
            <h3 class="flow-text theme-font-color">Admin</h3>
            <ul>
                <li class="theme-menu-item"><a href="<?php echo base_url(); ?>admin/users">Edit Users</a></li>
                <li class="theme-menu-item"><a href="<?php echo base_url(); ?>admin/view_events">Manage Events</a></li>
                <li class="theme-menu-item"><a href="<?php echo base_url(); ?>admin/contact">Contact Messages</a></li>

            </ul>
        </div>
        <?php endif; ?> 
        </div>
        <?php endif; ?>