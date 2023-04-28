<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->database();
        $this->load->model('events');


    }
	
	public function index()
	{
        

        

		$data['result'] = $this->events->get_events();
     
        foreach ($data['result'] as $key => $value) {
            $data['data'][$key]['title'] = $value->title;
            $data['data'][$key]['start'] = $value->start;
            $data['data'][$key]['end'] = $value->end;
            $data['data'][$key]['url']= base_url() . "calendar/detail/" . $value->event_id;
            $data['data'][$key]['className'] = "theme-bg-primary";

            $eventEnd = new DateTime($value->end);
            $today = new DateTime('now'); 
            if($eventEnd <= $today){
              $data['data'][$key]['className'] = ['event-over'];  
            }
            
        }



		$data['heading'] = "Calendar";

		$this->load->view('includes/header');
		$this->load->view('calendar/calendar_view', $data);
		$this->load->view('includes/footer');
	}

    public function detail($id){

        $data['results'] = $this->events->get_event_detail($id);

        $this->load->view('includes/header');
		$this->load->view('calendar/calendar_detail', $data);
		$this->load->view('includes/footer');

    }
	
    public function create_event(){
        if (!$this->ion_auth->logged_in() && !$this->ion_auth->in_group(1)) {
            redirect('/user');
        } else {
            $id = $this->ion_auth->user()->row()->id;
        };

        $this->form_validation->set_error_delimiters('<div class="red lighten-5" style="width:fit-content; padding:15px;">', '</div>');
        $this->form_validation->set_rules(
            'title',
            'Title',
            'required|min_length[3]|max_length[50]'
        );
        $this->form_validation->set_rules(
            'start-date',
            'Start Date',
            'required'
        );
        $this->form_validation->set_rules(
            'end-date',
            'End Date',
            'required'
        );
        $this->form_validation->set_rules(
            'start-time',
            'Start Time',
            'required'
        );
        $this->form_validation->set_rules(
            'end-time',
            'End Time',
            'required'
        );
        $this->form_validation->set_rules(
            'description',
            'Event Description',
            'required|min_length[40]|max_length[2000]'
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('includes/header');
		$this->load->view('user/admin/calendar_create_view');
		$this->load->view('includes/footer');
        } else {
            $start_date = new DateTimeImmutable($this->input->post('start-date') . " " . $this->input->post('start-time'));
            $end_date = new DateTimeImmutable($this->input->post('end-date') . " " . $this->input->post('end-time'));


            $data['title'] = $this->input->post('title');
            $data['description']= $this->input->post('description');
            $data['author_id'] = $id;
            $data['start'] =  $start_date->format("Y-m-d H:i:s");
            $data['end'] =  $end_date->format("Y-m-d H:i:s");  
            
          
            $this->events->create_event($data);
            $this->session->set_userdata('message', 'Event Successfully Added');
            redirect("admin/view_events", 'location');
        }

        


    }
    public function edit_event($id){
       
    }
    public function delete_event($id){
    $this->events->delete_event($id);
            $this->session->set_userdata('message', 'Delete Successful');
            redirect("admin/view_events", 'location');
    }

}
