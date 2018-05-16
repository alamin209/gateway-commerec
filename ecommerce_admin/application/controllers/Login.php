<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('loginm');
    }


    public function index()
    {
        $this->load->view('login');
    }


    public function check_user()
    {

        $this->load->library('user_agent');
        $result = $this->loginm->validate_user($_POST);

        if (!empty($result)) {

            $data1 = array(

                'sourceIp' => $this->input->ip_address(),
                'fkUserId' => $result->userId,
                'browser' => $this->agent->browser()

            );
            $loginId = $this->loginm->loginInfo($data1);

            $data = array(
                'name' => $result->name,
                'email' => $result->email,
                'id' => $result->userId,
                'userType' => $result->userType,
                'loggedin' => "true",
                'loginId' => $loginId,
            );

            $this->session->set_userdata($data);

            if ($this->session->userdata('userType') == "Admin") {
                redirect('admin/index');
            }

//            elseif ($this->session->userdata('userType') == "cus")
//            {
//                redirect('../Items');
//            }
            //print_r($result);


            else {
                echo "<script>
                        alert('wrong username or password');
                     window.location.href='" . base_url() . "';
                     
					
                </script>";

                redirect('login');



            }
        }

    }
    public function logout()
    {
        $data = array(
            'logOutTime'=>date('Y-m-d H:i:s')
        );

        $id=$this->session->userdata('loginId');
        $this->loginm->logout($id,$data);
        $this->session->sess_destroy();

        redirect('Login');
    }







}



