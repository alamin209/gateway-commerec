<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Productm');
        $this->load->model('Categorym');


    }

    public  function index()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $this->data['product'] = $this->Productm->getProduct();
            $this->load->view('admin/allProducts', $this->data);
        }
        else
        {
            redirect('Login');

        }

    }



  public function addProduct()
  {
      if ($this->session->userdata('userType') == "Admin") {


          $result = $this->input->post('id');
          $data['category'] = $this->Categorym->getAllCategory();


          $this->load->view('admin/addProduct', $data);
      }
      else
      {
          redirect('Login');

      }
  }

    public function addProducts()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $p_id = $this->input->post('id');
            $data['categoryInfo'] = $this->Productm->getProductById($p_id);
            $this->load->view('admin/dropdown', $data);
        }
        else
        {
            redirect('Login');

        }

    }

    public  function newProduct()
    {

        if ($this->session->userdata('userType') == "Admin") {
        $userId = $this->session->userdata('id');
        $name = $this->input->post('name');
        $categoryid = $this->input->post('categoryid');
        $subcategoryid = $this->input->post('subcategoryid');
        $p_desc = $this->input->post('p_desc');
        $status = $this->input->post('status');

        $data = array
        (
            'category_id' => $categoryid,
            'subcat_id' => $subcategoryid,
            'name' => $name,
            'product_desc' => $p_desc,
            'status' => $status,
            'insertby' => $userId

        );

        print_r($data);


    }

    else
        {
            redirect('Login');

        }


    }


}