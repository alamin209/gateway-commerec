<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends Base_Controller
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
        $textbox = $this->input->post('textbox[]');
        $textprice = $this->input->post('textprice[]');
        $price  = $this->input->post('itemPrice');
        $itemsizeStatus = $this->input->post('itemsizeStatus[]');
        $qty  = $this->input->post('qty');
        $code  = $this->input->post('code');

            $path='./assets/admin/uploads/ProductImage/';
            $photo = $this->uploadPhoto($path);



            $data = array
        (
            'category_id' => $categoryid,
            'subcat_id' => $subcategoryid,
            'p_name' => $name,
            'insertby'=>$userId,
            'status' => $status,
            'pro_code'=>$code,
            'image'=>$photo

        );

            $product= $this->Productm->insertItemdata($data);

            if(array_filter($textbox)==null && array_filter($textprice) ==null) {
                $productSizedata = array(
                    'product_id'=>$product,
                    'price' => $price,
                    'desc'=>$p_desc,
                    'qty'=>$qty
                );


                $this->data['error'] = $this->Productm->insertproductSizedata($productSizedata);
            }

            else {
                for ($i = 0; $i < count($textbox); $i++) {

                    $productSizedata = array(
                        'product_id'=>$product,
                        'price' => $textprice[$i],
                        'desc'=>$textbox[$i],
                        'status'=>$itemsizeStatus[$i],
                        'qty'=>$qty
                    );



                       $this->data['error'] = $this->Productm->insertproductSizedata($productSizedata);
                }
            }



            if (empty($this->data['error'])) {
                $this->session->set_flashdata('successMessage','Product  Added Successfully');
                redirect('Product/addProduct');
            } else {
                $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                redirect('Product/addProduct');
            }


    }

    else
        {
            redirect('Login');

        }


    }


}