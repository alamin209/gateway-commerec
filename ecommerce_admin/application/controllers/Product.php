<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Productm');

    }

    public  function index()
    {

        $this->data['product']=$this->Productm->getProduct();
        $this->load->view('admin/allProducts',$this->data);


    }


}