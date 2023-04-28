<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_us extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form'); 
        $this->load->library('form_validation'); 
        $this->load->database();
        $this->load->model('contact_model');
    }

    public function index(){


        $this->form_validation->set_error_delimiters('<div class="red lighten-5" style="width:fit-content; padding:15px;">', '</div>');
        $this->form_validation->set_rules(
            'name',
            'Name',
            'required|min_length[3]|max_length[40]'
        );
        $this->form_validation->set_rules(
            'sender',
            'Contact Email',
            'required|valid_email'
        );
        $this->form_validation->set_rules(
            'subject',
            'Subject',
            'required|min_length[3]|max_length[40]'
        );
        $this->form_validation->set_rules(
            'message',
            'Message',
            'required|min_length[3]|max_length[500]'
        );

        if ($this->form_validation->run() === FALSE) {

            $this->load->view('includes/header');
            $this->load->view('contact_us_form');
            $this->load->view('includes/footer');
        }else{

            $data['name'] = $this->input->post('name');
            $data['contact_sender'] = $this->input->post('sender');
            $data['subject'] = $this->input->post('subject');
            $data['message'] = $this->input->post('message');

            $this->contact_model->send_message($data);
            $this->session->set_userdata('message', 'Message Sent Successfully');
            redirect("/", 'location');
        }







    }

}