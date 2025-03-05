<?php
class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    function add()
    {
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $email = $this->input->post('email');
            $date_birth = $this->input->post('date_birth');
            $department = $this->input->post('id_department');
            $date_contract = $this->input->post('date_contract');
            $rol = $this->input->post('id_rol');

            // calcula la edad del empleado, si es mayor de 18 años continua con el registro
            $age = $this->calculateAge($date_birth);
            if ($age < 18) {
                $this->session->set_flashdata('error', 'El empleado debe ser mayor de edad.');
                $this->load->view('user/add_user');
                return;
            }

            $data =array(
                'firstname'=>$firstname,
                'lastname'=>$lastname,
                'email'=>$email,
                'date_birth'=>$date_birth,
                'id_department'=>$department,
                'date_contract'=>$date_contract,
                'id_rol'=>$rol
            );

            $status = $this->user_model->insertUser($data);
            if($status==true)
            {
                $this->session->set_flashdata('success', 'agregado correctamente');
                redirect(base_url('user/add'));
            }
            else
            {
                $this->session->set_flashdata('error', 'Error');
                $this->load->view('user/add_user');
            }
        }
        else
        {
            $this->load->view('user/add_user');
        }
        
    }

    function index()
    {
        $data['users'] = $this->user_model->getUsers();
        $this->load->view('user/index', $data);
    }

    // funcion para calcular la edad del empleado
    private function calculateAge($date_of_birth)
    {
        $birthDate = new DateTime($date_of_birth);
        $currentDate = new DateTime('today');
        $age = $birthDate->diff($currentDate)->y; 

        return $age;
    }

    function edit($id)
    {
        $data['user'] = $this->user_model->getUser($id);
        $data['id'] = $id;
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $email = $this->input->post('email');
            $date_birth = $this->input->post('date_birth');
            $department = $this->input->post('id_department');
            $date_contract = $this->input->post('date_contract');
            $rol = $this->input->post('id_rol');
            $data =array(
                'firstname'=>$firstname,
                'lastname'=>$lastname,
                'email'=>$email,
                'date_birth'=>$date_birth,
                'id_department'=>$department,
                'date_contract'=>$date_contract,
                'id_rol'=>$rol
            );

            $status = $this->user_model->updateUser($data, $id);
            if($status==true)
            {
                $this->session->set_flashdata('success', 'actualizado correctamente');
                redirect(base_url('user/edit/'.$id));
            }
            else
            {
                $this->session->set_flashdata('error', 'Error');
                $this->load->view('user/edit_user');
            }
        }
        else
        {
            $this->load->view('user/edit_user', $data);
        }
    }

    function delete($id)
    {
        if (is_numeric($id))
        {
            $status = $this->user_model->deleteUser($id);
            if ($status == true) 
            {
                $this->session->set_flashdata('deleted', 'Eliminado correctamente');
                redirect(base_url('user/index/'));
            } 
            else 
            {
                $this->session->set_flashdata('error', 'Error');
                redirect(base_url('user/index/'));
            }
        }
    }
}