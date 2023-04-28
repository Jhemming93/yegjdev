<?php if($this->ion_auth->logged_in()):?>
    <div id="addchat_app" 
            data-baseurl="<?php echo base_url() ?>"
            data-csrfname="<?php echo $this->security->get_csrf_token_name() ?>"
            data-csrftoken="<?php echo $this->security->get_csrf_hash() ?>"
        ></div>
     <?php endif;   ?>
    <footer class="theme-bg-primary p-3">
        <div class="container footer-container  ">
           <h3 class="white-text">Yeg Junior Developers &trade;</h3>

        </div>
        
    </footer>
    <script  type="module" src="<?php echo base_url('assets/addchat/js/addchat.min.js') ?>"></script>
        <!-- Fallback support for Older browsers -->
        <script nomodule src="<?php echo base_url('assets/addchat/js/addchat-legacy.min.js') ?>"></script>
</body>
</html>