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

        function get_detail_edit($id){

            $this->db->select('DATE(start) AS startdate, TIME(start) as starttime, DATE(end) AS enddate, TIME(end) as endtime, event_id, title, description');
            // $this->db->from('events');
            $this->db->where('event_id', $id);

            $query = $this->db->get('events');
              
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

        function update_event($id, $data){
             $this->db->where('event_id',$id);
             $this->db->update('events', $data);
        }
}