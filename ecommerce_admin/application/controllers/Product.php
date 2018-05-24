<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends Base_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Productm');
        $this->load->model('Categorym');


    }

    public function index()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $this->data['product_d'] = $this->Productm->getProductDetails();
            $this->data['product'] = $this->Productm->getProduct();
            $this->load->view('admin/allProducts', $this->data);
        } else {
            redirect('Login');

        }

    }


    public function addProduct()
    {
        if ($this->session->userdata('userType') == "Admin") {


            $result = $this->input->post('id');
            $data['category'] = $this->Categorym->getAllCategory();


            $this->load->view('admin/addProduct', $data);
        } else {
            redirect('Login');

        }
    }

    public function addProducts()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $p_id = $this->input->post('id');
            $data['categoryInfo'] = $this->Productm->getProductById($p_id);
            $this->load->view('admin/dropdown', $data);
        } else {
            redirect('Login');

        }

    }
///////////////////////////////////// product ///////////////////////

    public function newProduct()
    {

        if ($this->session->userdata('userType') == "Admin") {
            $userId = $this->session->userdata('id');
            $name = $this->input->post('name');
            $categoryid = $this->input->post('categoryid');
            $subcategoryid = $this->input->post('subcategoryid');
            $p_desc = $this->input->post('p_desc');
            $status = $this->input->post('status');
            $textbox = $this->input->post('textbox[]');
            $price = $this->input->post('itemPrice');
            $qty = $this->input->post('qty');
            $code = $this->input->post('code');

            $path = './assets/admin/uploads/ProductImage/';
            $photo = $this->uploadPhoto($path);


            $data = array
            (
                'category_id' => $categoryid,
                'subcat_id' => $subcategoryid,
                'p_name' => $name,
                'insertby' => $userId,
                'status' => $status,
                'pro_code' => $code,
                'p_desc' => $p_desc,
                'product_price' =>$price,
                'qty' => $qty,
                'p_image' => $photo,

            );

            $product = $this->Productm->insertItemdata($data);

            if (array_filter($textbox) == null) {
                $productSizedata = array(
                    'product_id' => $product,

                );


                $this->data['error'] = $this->Productm->insertproductSizedata($productSizedata);
            } else {
                for ($i = 0; $i < count($textbox); $i++) {

                    $productSizedata = array(
                        'product_id' => $product,
//                        'price' => $textprice[$i],
                        'optional' => $textbox[$i],
                    );


                    $this->data['error'] = $this->Productm->insertproductSizedata($productSizedata);
                }
            }


            if (empty($this->data['error'])) {
                $this->session->set_flashdata('successMessage', 'Product  Added Successfully');
                redirect('Product/addProduct');
            } else {
                $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                redirect('Product/addProduct');
            }


        } else {
            redirect('Login');

        }


    }


    public  function getproductInfoById()
     {
         $product_id= $this->input->post('id');
         $data['category'] = $this->Categorym->getAllCategory();
         $data['subcategory'] = $this->Categorym->getAllSubCategoryNameId();
         $data['productinfo'] = $this->Productm->getproductInfoById($product_id);
         $this->load->view('admin/updateProduct', $data);

     }


   public function updateProduct()
   {

       if ($this->session->userdata('userType') == "Admin") {

           $UserID = $this->input->post('id1');
           $userId = $this->session->userdata('id');
           $name = $this->input->post('name');
           $categoryid = $this->input->post('categoryid');
           $subcategoryid = $this->input->post('subcategoryid');
           $p_desc = $this->input->post('p_desc');
           $status = $this->input->post('status');
           $qty = $this->input->post('qty');
           $code = $this->input->post('code');
           $price = $this->input->post('itemPrice');
           $this->db->set('category_id', $categoryid);
           $this->db->set('subcat_id', $subcategoryid);
           $this->db->set('p_name', $name);
           $this->db->set('pro_code', $code);
           $this->db->set('p_desc', $p_desc);
           $this->db->set('product_price', $price);
           $this->db->set('qty', $qty);
           $this->db->set('insertby',$userId);
           if(isset($UserID) && $UserID != ''){

               $data = array('product_id'=>$UserID);
               $prev_info = $this->db->get_where("products",$data)->row();
               if(isset($_FILES['photo']['name']) && ($_FILES['photo']['name'] != '')){
                   unlink($prev_info->p_image);
               }
           }

           if(isset($_FILES['photo']['name']) && ($_FILES['photo']['name'] != '') ){
               $path = './assets/admin/uploads/ProductImage/';
               $photo = $this->updatePhoto($path);
           }
           $this->data['error'] = $this->Productm->commonUpdate( $UserID,'products');

           if (empty($this->data['error'])) {
               $this->session->set_flashdata('successMessage', 'Product  Added Successfully');
               redirect('Product');
           } else {
               $this->session->set_flashdata('successMessage', 'Product  Added Successfully');
               redirect('Product');
           }


       } else {
           redirect('Login');

       }




   }

   public function deleteProduct()
   {
       if ($this->session->userdata('userType') == "Admin") {

           $id = $this->input->post('id');
           $this->Productm->deleteProduct($id);
           $this->session->set_flashdata('successMessage', 'Product Delete Successfully');

       } else {
           redirect('Login');
       }
   }

    /////////////////optionla part////////////////////////////


    public function newOptionalProduct()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $data['prduct_id'] = $this->input->post('id');
            $this->load->view('admin/addNewOptional', $data);
        } else {
            redirect('Login');
        }

    }

    public function addOptional()
    {
        if ($this->session->userdata('userType') == "Admin") {
            $optional = $this->input->post('optional');
            $product_id = $this->input->post('product_id');

            $productSizedata = array(
                'optional' => $optional,
                'product_id' => $product_id

            );
            $this->data['error'] = $this->Productm->insertproductSizedata($productSizedata);


            if (empty($this->data['error'])) {
                $this->session->set_flashdata('successMessage', 'Extra   Added Successfully');
                redirect('Product');
            } else {
                $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                redirect('Product');
            }

        }
    else{
        redirect('Login');
    }

    }

    public  function getOptionalProductId()
    {
        $optional_id = $this->input->post('id');
        $data['optionaInfo'] = $this->Productm->getOptionalProductId($optional_id);
        $this->load->view('admin/updateOptional',$data);

    }

    public function  updateoptional($id)
    {
        if ($this->session->userdata('userType') == "Admin") {

            $optional = $this->input->post('optional');
            $product_id = $this->input->post('product_id');

            $productSizedata = array(
                'optional' => $optional,
                'product_id' => $product_id

            );

            $this->data['error'] = $this->Productm->updateoptional($id, $productSizedata);


            if (empty($this->data['error'])) {

                $this->session->set_flashdata('successMessage', ' Optional Info Updated Successfully');
                redirect('Product');

            } else {

                $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                redirect('Product');

            }
        }

    else{
        redirect('Login');
    }

    }
    public function deleteOptional()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $id = $this->input->post('id');
            $this->Productm->deleteOptional($id);
            $this->session->set_flashdata('successMessage','Extra Delete Successfully');


        }
        else{
            redirect('Login');
        }
    }



}