<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

	function index()
	{
		$this->load->view('login/register');
	}
	
    function register()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $this->form_validation->set_rules('username', 'username', 'required');
            $this->form_validation->set_rules('email', 'email', 'required');
            $this->form_validation->set_rules('password', 'password', 'required');

            if($this->form_validation->run()==TRUE)
            {
                $username = $this->input->post('username');
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $data =array(
                    'username'=>$username,
                    'email'=>$email,
                    'password'=>sha1($password),
                    'status'=>'1'
                );

                $this->user_model->registerUser($data);
                $this->session->set_flashdata('success', 'Usuario creado correctamente');
                redirect(base_url('login/index'));
            }
        }
	}

    function login()
    {
        $this->load->view('login/login');
    }
    
    function loginNow()
    {
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $this->form_validation->set_rules('email', 'email', 'required');
            $this->form_validation->set_rules('password', 'password', 'required');

            if($this->form_validation->run()==TRUE)
            {
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $password = sha1($password);

                $status = $this->user_model->checkPassword($password, $email);
                if ($status!=false)
                {
                    $username =  $status->username;
                    $email =  $status->email;

                    $session_data = array(
                        'username'=>$username,
                        'email'=>$email,
                        'status'=>$status
                    );

                    $this->session->set_userdata('UserLoginSession', $session_data);
                    redirect(base_url('user/index')); 
                }
                else
                {
                    $this->session->set_flashdata('error', 'Email o contraseña incorrectos');
                    redirect(base_url('login/login'));
                }
            }
            else
            {
                $this->session->set_flashdata('error', 'Todos los campos son requeridos');
                redirect(base_url('login/login'));
            }
        }
    }

    function logout()
    {
        session_destroy();
        redirect(base_url('login/login'));
    }
}
