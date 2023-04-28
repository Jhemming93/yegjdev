<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form'); 
        $this->load->library('form_validation'); 
        $this->load->database();
        $this->load->model('user_model');
        $this->load->library('typography');


    }

    public function index(){

        if (!$this->ion_auth->logged_in()) {
            redirect('/auth/login/');
        } else {
            $id = $this->ion_auth->user()->row()->id;
        };

        if(!$this->user_model->check_profile($id)){
            $data['user_id'] = $id;
            $this->user_model->add_profile($data,$id);
        };

        $data['results'] = $this->user_model->get_detail($id);
        
     

        $this->load->view('includes/header');
        $this->load->view('user/profile/account_view',$data);
        $this->load->view('includes/footer');
    }

    public function update_profile($id){
        if (!$this->ion_auth->logged_in()) {
            redirect('/auth/login/');
        } elseif($this->ion_auth->user()->row()->id != $id) {
            
            redirect('/user');
        }elseif(!is_numeric($id)){
            redirect('/user');
        }else{
            $id = $this->ion_auth->user()->row()->id;
        }

      

        $this->form_validation->set_error_delimiters('<div class="red lighten-5" style="width:fit-content; padding:15px;">', '</div>');

        $this->form_validation->set_rules(
            'description',
            'Profile Info',
            'min_length[3]|max_length[500]'
        );
        $this->form_validation->set_rules(
            'field',
            'Field',
            'min_length[3]|max_length[255]'
        );
        $this->form_validation->set_rules(
            'company',
            'Company',
            'min_length[3]|max_length[255]'
        );
        $this->form_validation->set_rules(
            'school',
            'School',
            'min_length[3]|max_length[255]'
        );
        $this->form_validation->set_rules(
            'url',
            'Url',
            'trim|valid_url');
        
        if($this->form_validation->run() === FALSE){
            $data['results']= $this->user_model->get_detail($id);
            $this->load->view('includes/header');
            $this->load->view('user/profile/edit_profile_view', $data);
            $this->load->view('includes/footer');
        }else{
            
            $config['upload_path'] = 'uploads/profile_images/orginal';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '5000';
            $config['max_width'] = '2000';
            $config['max_height'] = '1500';
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload()) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('includes/header');
                $this->load->view('user/admin/user_edit_view', $error); // this will display upload errors thruyour view
                $this->load->view('includes/footer');
            }else{
                
                


                $this->user_model->check_default_image($id);
                $tmp = array('upload_data' => $this->upload->data());
                $filename = $tmp['upload_data']['file_name'];
            
                $this->load->library('image_lib');
                $config1['image_library'] = 'gd2';
                $config1['source_image'] = 'uploads/profile_images/orginal/' . $filename;
                $config1['new_image'] = 'uploads/profile_images/display/' . $filename;
                $config1['create_thumb'] = FALSE;
                $config1['maintain_ratio'] = TRUE;
                $config1['width'] = 400;
                $config1['height'] = 400;
                $this->image_lib->initialize($config1);
                $this->image_lib->resize();
                $this->image_lib->clear();


                $config2['image_library'] = 'gd2';
                $config2['source_image'] = 'uploads/profile_images/orginal/' . $filename;
                $config2['new_image'] = 'uploads/profile_images/port/' . $filename;
                $config2['create_thumb'] = FALSE;
                $config2['maintain_ratio'] = TRUE;
                $config2['width'] = 250;
                $config2['height'] = 400;
                $this->image_lib->initialize($config2);
                $this->image_lib->resize();
                $this->image_lib->clear();
            
                $data['profile_picture'] = $filename;
            }

            $data['port_url'] = $this->input->post('url');
            $data['description'] = $this->input->post('description');
            $data['job_field'] = $this->input->post('field');
            $data['company'] = $this->input->post('company');
            $data['school'] = $this->input->post('school');
            $data['theme'] = $this->input->post('theme');
            $this->user_model->update_profile($data,$id);
            
            $this->session->set_userdata('message', 'Edit Successful');
            redirect("user", 'location');

            }



            
         
            
        }



    }

