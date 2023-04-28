<?php
class Events extends CI_Model{

        function get_events(){
          $query=  $this->db->get('events');

          if($query->num_rows()> 0){
            return $query->result(); 
        }else{
            return FALSE;
        }

        }

        function get_event_detail($id){
            $this->db->join('users', 'events.author_id=users.id');
            $this->db->where('event_id', $id);
            $query= $this->db->get('events');
            if($query->num_rows()> 0){
                return $query->result(); 
            }else{
                return FALSE;
            }
        }

        function create_event($data){

            $this->db->insert('events', $data);
        }

        function delete_event($id){
            $this->db->where('event_id',$id);
            $this->db->delete('events');
        }
}