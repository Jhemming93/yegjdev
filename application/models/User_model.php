<?php

class User_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    function get_detail($id){
        $this->db->where('user_id', $id);
        $query = $this->db->get('profile_info');


        if($query->result()>0){
            return $query->result();
        }else{
            return FALSE;
        }
    }

    function check_profile($id){
        $this->db->select($id);
        $this->db->where('user_id', $id);
        $query = $this->db->get('profile_info');

        if($query->num_rows()>0){
         return TRUE;
       }else{
           return FALSE;
       }
    }
    function add_profile($data,$id){
        $this->db->where('id',$id);
        $query = $this->db->get('users');

        foreach($query->result() as $row){
            $data['first_name'] = $row->first_name;
            $data['last_name'] = $row->last_name;
        }



        $this->db->insert('profile_info', $data); 
    }

    function get_theme(){
        if($this->ion_auth->logged_in()){
          $id = $this->ion_auth->user()->row()->id;  
        }else{
            return FALSE;
        };
        

        $this->db->select('theme');
        $this->db->where('user_id',$id);
       $query = $this->db->get('profile_info');

       if($query->num_rows()>0){
        return $query->result();
       }else{
        return FALSE;
       }

    }


    function update_profile($data,$id){
        $this->db->where('user_id', $id);
        $this->db->update('profile_info',$data);
    }

    function update_usergroup($data,$id){
        $this->db->where('user_id',$id);
        $this->db->update('users_groups', $data);
    }








    function check_default_image($id){
        $this->db->select('profile_picture');
        $this->db->where('user_id',$id);
        $query = $this->db->get('profile_info');

        if($query->result()>0){
            foreach($query->result() as $row){
                $filename = $row->profile_picture;
            }
        if($filename != 'default_profile.png'){
            unlink("uploads/profile_images/orginal/$filename");
            unlink("uploads/profile_images/display/$filename");
            unlink("uploads/profile_images/port/$filename");
        }

        }else{
            return FALSE;
        }
    }

    function check_if_logged_in($id){
        $this->db->where('id', $id);
        $data = array('last_seen'=> NOW());
        $this->db->update('user');
    }

}