<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Projects extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form'); // loading this for the entire class/controller
        $this->load->library('form_validation'); // loading this for the entire class/controller
        $this->load->database(); // ummm…ditto
    }

    public function index()
    {
        $data['heading'] = "Projects";
        $this->load->model('projects_model');
        $data['results'] = $this->projects_model->get_projects();



        $this->load->view('includes/header', $data);
        $this->load->view('projects_read_view', $data);
        $this->load->view('includes/footer');

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
    }

    public function my_projects()
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('/auth/login/');
        } else {
            $id = $this->ion_auth->user()->row()->id;
        };


        $this->load->model('projects_model');
        $data['results'] = $this->projects_model->get_my_projects($id);

        $data['heading'] = "My Projects";

        $this->load->view('includes/header', $data);
        $this->load->view('user/projects_my_article_view', $data);
        $this->load->view('includes/footer');
    }


    public function create()
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('/auth/login/');
        } else {
            $data['author_id'] = $this->ion_auth->user()->row()->id;
        }
        $this->form_validation->set_error_delimiters('<div class="red lighten-5" style="width:fit-content; padding:15px;">', '</div>');
        $this->form_validation->set_rules(
            'title',
            'Title',
            'required|min_length[3]|max_length[40]'
        );
        $this->form_validation->set_rules(
            'content',
            'Project Description',
            'required|min_length[40]|max_length[2000]'
        );



        if ($this->form_validation->run() === FALSE) {
            $this->load->view('includes/header');
            $this->load->view('user/projects_create_view');
            $this->load->view('includes/footer');
        } else {

           
            $config['upload_path'] = 'uploads/original';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '10000';
            $config['max_width'] = '4000';
            $config['max_height'] = '3000';
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload()) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('includes/header');
                $this->load->view('user/projects_create_view', $error); // this will display upload errors thruyour view
                $this->load->view('includes/footer');
            } else {
                $tmp = array('upload_data' => $this->upload->data());
                $filename = $tmp['upload_data']['file_name'];
                // resize image, and move it
                $this->load->library('image_lib');
                $config1['image_library'] = 'gd2';
                $config1['source_image'] = 'uploads/original/' . $filename;
                $config1['new_image'] = 'uploads/thumbs/' . $filename;
                $config1['create_thumb'] = FALSE;
                $config1['maintain_ratio'] = TRUE;
                $config1['width'] = 300;
                $config1['height'] = 300;
                $this->image_lib->initialize($config1);
                $this->image_lib->resize();
                $this->image_lib->clear();

                $this->load->library('image_lib');
                $config2['image_library'] = 'gd2';
                $config2['source_image'] = 'uploads/original/' . $filename;
                $config2['new_image'] = 'uploads/display/' . $filename;
                $config2['create_thumb'] = FALSE;
                $config2['maintain_ratio'] = TRUE;
                $config2['width'] = 700;
                $config2['height'] = 500;
                $this->image_lib->initialize($config2);
                $this->image_lib->resize();
                $this->image_lib->clear();

                $data['filename'] = $filename;
                $data['title'] = $this->input->post('title');
                $data['content'] = $this->input->post('content');
            
            
            $this->load->model('projects_model');
            $this->projects_model->insert_project($data);

            $this->session->set_userdata('message', 'Insert Successful');
            redirect("projects/my_projects", 'location');
        }

            }
           
    }

    public function detail($id){
        if (!is_numeric($id)) {
            redirect('/', 'loaction');
        }
        $this->load->library('typography');
        $this->load->model('projects_model');
        $data['results'] = $this->projects_model->project_detail($id);
        $this->load->view('includes/header', $data);
        $this->load->view('projects_detail_view', $data);
        $this->load->view('includes/footer');
    }

    public function edit($id){
        if (!is_numeric($id)) {
                redirect('/', 'location');
                } else {
            $data['author_id'] = $this->ion_auth->user()->row()->id;
        }
        $userId = $this->ion_auth->user()->row()->id;
        $this->load->model('projects_model');
        if(!$this->projects_model->check_event_id($id,$userId)){
            $this->session->set_userdata('message', 'Bad Hacker'); 
            redirect("home/index", 'location');
             
         }



        $this->form_validation->set_error_delimiters('<div class="red lighten-5" style="width:fit-content; padding:15px;">', '</div>');
        $this->form_validation->set_rules(
            'title',
            'Title',
            'required|min_length[3]|max_length[40]'
        );
        $this->form_validation->set_rules(
            'content',
            'Project Description',
            'required|min_length[40]|max_length[2000]'
        );

        $this->load->model('projects_model');

        if ($this->form_validation->run() == FALSE) {
            $data['results'] = $this->projects_model->project_detail($id);
            $this->load->view('includes/header');
            $this->load->view('user/projects_edit_view', $data);
            $this->load->view('includes/footer');
        } else {
                $data['title'] = $this->input->post('title');
                $data['content'] = $this->input->post('content');
            
            
            $this->projects_model->edit_project($data, $id,$userId);

            $this->session->set_userdata('message', 'Edit Successful');
            redirect("projects/my_projects", 'location');
        }

            }
            public function delete($id){
               


                if (!is_numeric($id) ) {
                    redirect('/', 'location');
                } 
                $userId = $this->ion_auth->user()->row()->id;
                $this->load->model('projects_model');
               if(!$this->projects_model->check_event_id($id,$userId)){
                  $this->session->set_userdata('message', 'Bad Hacker');
                redirect("home/index", 'location');
                    
               }
                 $this->projects_model->delete_project($id);
                $this->session->set_userdata('message', 'Delete Successful');
                redirect("projects/my_projects", 'location');       
    }

    public function publish($id){
      
            $this->load->model('projects_model');
            $this->projects_model->publish_project($id);
        

    }
}
