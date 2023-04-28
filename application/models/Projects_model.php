<?php
class Projects_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function get_projects(){
        $this->db->join('users', 'users.id=projects.author_id');
        $query=$this->db->get('projects');

        if($query->num_rows()> 0){
            return $query->result(); 
        }else{
            return FALSE;
        }
    }
    function get_my_projects($id){

        $this->db->join('users', 'users.id=projects.author_id');
        $this->db->where('author_id',$id);
        $query=$this->db->get('projects');
        
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return FALSE;
        }
        
    }



    function insert_project($data){
        $this->db->insert("projects", $data);
        
    }
    function project_detail($id){

        $this->db->join('users', 'users.id=projects.author_id');
        $this->db->where('project_id',$id);
        $query=$this->db->get('projects');
        
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return FALSE;
        }
        
    }

    function edit_project($data,$id){
        $this->db->where('project_id', $id);
        $this->db->update('projects', $data);
    }

    function delete_project($id){
        // $this->db->select('filename');
        $this->db->where('project_id', $id);
       $query = $this->db->get('projects');

       foreach($query->result() as $row){
        $filename = $row->filename;
        unlink("uploads/original/" . $filename);
        unlink("uploads/display/" . $filename);
        unlink("uploads/thumbs/" . $filename);
       }
     


        $this->db->where('project_id', $id);
        $this->db->delete('projects');
    }
    function check_event_id($id,$userid){
        $this->db->select('*');
        $this->db->where("author_id", $userid);
        $this->db->where("project_id",$id);
        $query = $this->db->get("projects");

        if($query->num_rows()>0){
            return $query->result();
        }else{
            return FALSE;
        }
    } 

    function publish_project($id){
        $this->db->where('project_id', $id);
        $query= $this->db->get('projects');

        if($query->result()>0){
            foreach($query->result() as $row){
                if($row->published === "0"){
                    $this->db->where('project_id', $id);
                    $data['published'] = "1";
                    $this->db->update('projects',$data);
                }else{
                    $this->db->where('project_id', $id);
                    $data['published'] = "0";
                    $this->db->update('projects',$data);
                }
            }
        }
    }
  
}