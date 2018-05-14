<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function index()
	{
		$this->load->view('admin/index');
	}
	public function admin_login()
	{
		$result=$this->Admin_model->admin_login();
		if($result)
		{
			$data['id']=$result->id;
			$data['email']=$result->email;
			$this->session->set_userdata($data);
			redirect('Super_admin');
		}
		else
		{
			$sdata=array();
			$sdata['exception']="Username and Password Invalid";
			$this->session->set_userdata($sdata);
			redirect('Admin');
		}
	}
}
