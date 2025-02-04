<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    // Display the registration form
    public function register() {
        // $this->load->view('register_form');
        $this->load->view('register_form_nonAjax');
    }

    // Handle AJAX form submission
    public function register_ajax() {
        // Set validation rules
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        // Run validation
        if ($this->form_validation->run() == FALSE) {
            // Validation failed
            $response = [
                'status' => 'error',
                'message' => validation_errors()
            ];
        } else {
            // Validation passed (simulate saving data)
            $response = [
                'status' => 'success',
                'message' => 'Registration successful!'
            ];
        }

        // Return JSON response
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function register_action() 
    {
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
        } else {
            $this->session->set_flashdata('success', 'Registration successful!');
        }

        redirect(site_url('user/register'));
    }
}