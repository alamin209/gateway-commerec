<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Userm');

    }


    public function index()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $data['user'] = $this->Userm->getUser();

//            print_r($data['user'] );
            $this->load->view('admin/allUser', $data);
        }
        else
        {
            redirect('Login');
        }
    }


    public function getUserById()
    {
        if ($this->session->userdata('userType') == "Admin") {
            $userid = $this->input->post('id');
            $data['userInfo'] = $this->Userm->getuserById($userid);
            $this->load->view("admin/editUser",$data);
        } else {
            redirect('Login');
        }
    }

    public function checkEmail()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $email = $this->input->post('email');

            $user=$this->Userm->checkEmail($email);
            if (!empty($user))
            {
                echo 0;
            }
            else{
                echo 1;
            }

        } else {
            redirect('Login');
        }
    }

//Updating Particular User Detail
    public function updateUserById($id)
    {
        if ($this->session->userdata('userType') == "Admin") {


            $username = $this->input->post('name');
            $address = $this->input->post('address');
            $email = $this->input->post('email');
            $password = $this->input->post('Password');
            $city = $this->input->post('fkCity');
            //$membercardnumber = $this->input->post('membercardnumber');
            $postalCode = $this->input->post('postalCode');
            $contactNo = $this->input->post('contactNo');
            $usertype = $this->input->post('fkUserType');
            $userActivationStatus = $this->input->post('userActivationStatus');
            $Country = $this->input->post('Country');
            $data = array(
                'name' => $username,
                'address' => $address,
                'postalCode' => $postalCode,
                'fkCity' => $city,
                'contactNo' => $contactNo,
                //'memberCardNo' => $membercardnumber,
                'postalCode' => $postalCode,
                'email' => $email,
                'password' => $password,
                'userActivationStatus' => $userActivationStatus,
                'fkUserType' => $usertype,
                'Country'=>$Country
            );



            $data['error']= $this->Userm->updateUserById($id, $data);

            if (empty($this->data['error'])) {

                $this->session->set_flashdata('successMessage','User Updated Successfully');
                redirect('User');

            } else {

                $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                redirect('User');
            }
        } else {
            redirect('login');
        }

    }

//Deleting Particular User id
    public function deleteUseryById()
    {


        if ($this->session->userdata('userType') == "Admin") {

            $id = $this->input->post('id');
            $this->Userm->deleteUserById($id);
        }
        else{
            redirect('Login');
        }
    }


    public function  allAdmin()
    {
        if ($this->session->userdata('userType') == "Admin") {
            $data['city']=$this->Userm->getAllCity();
            $data['userTypeinfo']=$this->Userm->getuserType();
            $data['user'] = $this->Userm-> getAdmin();
            $this->load->view('Admin/allAdmin', $data);
        }

        else{
            redirect('Login');
        }
    }

    public  function allCustomer()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $data['city']=$this->Userm->getAllCity();
            $data['userTypeinfo']=$this->Userm->getuserType();
            $data['user'] = $this->Userm->getCustomer();
            $this->load->view('Admin/allcustomer', $data);
        }

        else{
            redirect('Login');
        }

    }
///new user registation info daily update /////////////////////////////////
    public function getTotalUser()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $result = $this->Userm->getTotalUser();
            echo $result;
        }
        else
        {
            redirect('Login');
        }


    }

}