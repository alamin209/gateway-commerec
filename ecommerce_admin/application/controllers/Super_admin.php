<?php
defined('BASEPATH') OR exit('Super Admin error');
/**
* 
*/
class Super_admin extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('id')==NULL)
		{
			 redirect('Admin');
		}
	}
	public function index()
	{
		$data['result']=$this->Admin_model->product();
		$this->load->view('admin/master',$data);
	}
		
	public function product()
	{
		$data=array();
		$data['result']=$this->Admin_model->product(); 
		$this->load->view('admin/products',$data,'true');
	}
	public function add_product()
	{
		$data=array();
		$this->load->view('admin/add_product','','true');
	}
	public function product_save()
	{
		$data=array();
		$data['name']=$this->input->post('name');
		$data['category']=$this->input->post('category');
		$data['description']=$this->input->post('description');
		$data['price']=$this->input->post('price');

		$config['upload_path']          = 'assets/img/product_image';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        // $config['max_size']             = 500;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);
        $error='';
        $fdata=array();
        if ( ! $this->upload->do_upload('image'))
        {
                $error = array('error' => $this->upload->display_errors());
                // $this->load->view('upload_form', $error);
                print $error;
        }
        else
        {
        		$fdata=$this->upload->data();
        		//print_r($fdata);exit;
                 $data['image'] =$fdata['file_name'];
                 //print_r($data);exit;
               // $this->load->view('upload_success', $data);
        }
        $this->Admin_model->product_save($data);
        $sdata=array();
		$sdata["message"]="Product Add Successfully";
		$this->session->set_userdata($sdata);
        redirect('add_product');
	}
	public function delete_product($id)
	{
		$this->Admin_model->delete_product($id);
		$sdata=array();
		$sdata["delete"]="Product Delete Successfully";
		$this->session->set_userdata($sdata);
		redirect('products');
	}
    public function cpassword()
    {
    	$this->load->view('admin/change_password');
    }
    public function change_password()
    {
    	$this->Admin_model->change_password();
    }
	public function logout()
	{
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('email');
		redirect('Admin');
	}
}
?>