<?php
class Admin_model extends CI_Model{


    function __construct(){
        parent::__construct();
    }

    function get_all_users(){
        $query = $this->db->get('users');

        if($query->result()>0){

            return $query->result();
        }else{
            return FALSE;
        }
    }
    function get_all_user_info($id){
        $this->db->join('users_groups', 'users.id=users_groups.user_id');
        $this->db->join('profile_info', 'users.id=profile_info.user_id');
        $this->db->where('users.id',$id);
        $query = $this->db->get('users');

        if($query->result()>0){
            return $query->result();
        }else{
            return FALSE;
        }
    }

    function delete_user($id){
        $this->db->where('user_id', $id);
        $query = $this->db->get('profile_info');
 
        foreach($query->result() as $row){
         $filename = $row->profile_picture;
         if($filename != "default_profile.png"){
            unlink("uploads/profile_images/original/" . $filename);
            unlink("uploads/profile_images/display/" . $filename);
            unlink("uploads/profile_images/port/" . $filename);
         }
         
        }
       
        $this->db->where('user_id',$id);
        $this->db->delete('profile_info');
        $this->db->where('id',$id);
        $this->db->delete('users');
    }

    function get_all_events(){
       $this->db->order_by('start', 'asc'); 
      $query = $this->db->get('events');

      if($query->result()>0){
        return $query->result();
    }else{
        return FALSE;
    }

    }

    function get_messages(){
        $this->db->order_by('sent_when', 'asc');
        $query= $this->db->get('contact_messages');
 
        if($query->result()>0){
         return $query->result();
        }else{
         return FALSE;
        }
     }
     function message_detail($postData=array()){
        $response = array();
        if(isset($postData['contact_id'])){
          $data['message_read'] = 1;
          $this->db->where('contact_id', $postData['contact_id']);
          $this->db->update('contact_messages', $data);


          $this->db->where('contact_id', $postData['contact_id']);
          $record = $this->db->get('contact_messages');
          $response = $record->result_array();
        }

        return $response;



     }
}