<?php
class Portfolio_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }


    function get_all_user_details(){
       $query = $this->db->get('profile_info');

       if($query->result()>0){
        return $query->result();
       }else{
        return FALSE;
       }
    }


    function get_user_detail($id){

        $this->db->where('user_id', $id);
        $query = $this->db->get('profile_info');

        if($query->result()>0){
            return $query->result();
           }else{
            return FALSE;
           }

    }
    function get_user_projects($id){
            $this->db->where('author_id', $id);
            $query = $this->db->get('projects');
    
            if($query->result()>0){
                return $query->result();
               }else{
                return FALSE;
               }
    }
}