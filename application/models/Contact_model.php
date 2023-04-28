<?php
class Contact_model extends CI_Model{


    function __construct(){
        parent::__construct();
    }

    function send_message($data){
        $this->db->insert('contact_messages',$data);
    }



}