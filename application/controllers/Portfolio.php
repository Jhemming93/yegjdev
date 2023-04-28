<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Portfolio extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form'); // loading this for the entire class/controller
        $this->load->library('form_validation'); // loading this for the entire class/controller
        $this->load->database(); // ummm…ditto
        $this->load->model('portfolio_model');
        $this->load->helper('text');
    }


    public function index(){

        $data['results'] = $this->portfolio_model->get_all_user_details();

        $this->load->view('includes/header');
        $this->load->view('portfolio/portfolio_all_view',$data);
        $this->load->view('includes/footer');
    }

    public function detail_view($id){
        
        $data['profile'] = $this->portfolio_model->get_user_detail($id);
        $data['projects'] = $this->portfolio_model->get_user_projects($id);

        $this->load->view('includes/header');
        $this->load->view('portfolio/portfolio_detail_view',$data);
        $this->load->view('includes/footer');

    }

}