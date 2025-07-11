<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_welcome', 'model');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index($id = false)
    {
        if ($id === false) {
            $data['home_post'] = $this->model->read();
            $this->load->view('header');
            $this->load->view('home', $data);
            $this->load->view('footer');
        } else {
            $data['post'] = $this->model->read($id);
            $this->load->view('header');
            $this->load->view('post', $data);
            $this->load->view('footer');
        }
    }

    public function create($id = false)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'required|max_length[30]');

        if ($this->form_validation->run() == false) {
            $this->load->view('header');
            $this->load->view('create');
            $this->load->view('footer');
        } else {
            $id = uniqid('item', true);

            $config['upload_path']      = './upload/post';
            $config['allowed_types']    = 'jpg|jpeg|png';
            $config['max_size']         = '100000';
            $config['file_ext_tolower'] = true;
            $config['file_name']        = str_replace('.', '_', $id);

            $this->load->library('upload', $config);

            if (! $this->upload->do_upload('image1')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('welcome/index');
            } else {
                $filename = $this->upload->data('file_name');
                $this->model->create($id, $filename);
                redirect('');
            }
        }
    }

    public function update($id)
{
    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('name', 'Name', 'required|max_length[30]');

    if ($this->form_validation->run() == false) {
        $data['post'] = $this->model->read($id);
        $this->load->view('header');
        $this->load->view('update', $data);
        $this->load->view('footer');
    } else {
        $post = $this->model->read($id);
        $filename = $post->filename; // default: old filename

        // Check if a new image is uploaded
        if (!empty($_FILES['image']['name'])) {
            $config['upload_path']      = './upload/post';
            $config['allowed_types']    = 'jpg|jpeg|png';
            $config['max_size']         = '100000';
            $config['file_ext_tolower'] = true;
            $config['file_name']        = str_replace('.', '_', $id); // optional: custom name

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('welcome/update/' . $id);
                return;
            } else {
                $filename = $this->upload->data('file_name');
            }
        }

        // Only update name and filename
        $name = $this->input->post('name', true);
        $this->model->update($id, $name, $filename);  // No description anymore
        redirect('');
    }
}



    public function delete($id= FALSE){
		$post = $this -> model -> read($id);

		$this -> model -> delete($id);
		unlink('./upload/post/' . $post -> filename);
		redirect('welcome');
	}
}
