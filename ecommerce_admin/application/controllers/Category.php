<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends Base_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Categorym');

    }

    public function index()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $data['category'] = $this->Categorym->getAllCategory();
            $this->load->view('admin/allCategory', $data);
        }
        else
        {
            redirect('Login');
        }
    }

    public function allCategory()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $data['category'] = $this->Categorym->getAllCategory();
            $this->load->view('admin/allCategory', $data);
        }
        else
        {
            redirect('Login');
        }

    }

    public function newCategory()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $this->load->view('admin/newCategory');
        }
        else{
            redirect('Login');
        }

    }

    public  function  addCategory()
    {
        $this->load->library('form_validation');
        if ($this->session->userdata('userType') == "Admin") {


//            $this->form_validation->set_rules('catagoryname', 'Category name', 'required');

//            if($this->form_validation->run() == FALSE) {

//
//                $this->load->view('admin/newCategory');


            $categoryName = $this->input->post('catagoryname');
            $CategoryStatus = $this->input->post('CategoryStatus');
            $photo = $this->uploadPhoto();


            $userId = $this->session->userdata('id');


            $data = array(
                'name' => $categoryName,
                'fkInsertBy' => $userId,
                'CategoryStatus' => $CategoryStatus,
                'image'=>$photo

            );
            $this->data['error'] = $this->Categorym->insertCategory($data);

            if (empty($this->data['error'])) {

                $this->session->set_flashdata('successMessage', 'Category Added Successfully');
                redirect('Category');

            } else {

                $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                redirect('Category');


            }
        }
        else {
            redirect('Login');
        }

    }


    public function getCategoryById()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $cat_id = $this->input->post('id');
            $data['categoryInfo'] = $this->Categorym->getCatgoryById($cat_id);
            $this->load->view('admin/updateCategory',$data);

        } else {
            redirect('Login');
        }
    }

    public function updateCategoryById($id)
    {
        if ($this->session->userdata('userType') == "Admin") {


            if(isset($_FILES['photo']['name']) && ($_FILES['photo']['name'] != '') ) {

                $categoryName = $this->input->post('catagoryname');
                $CategoryStatus = $this->input->post('CategoryStatus');
//            $photo = $this->uploadPhoto();

                print_r($categoryName);
                print_r($CategoryStatus);

                $userId = $this->session->userdata('id');


                $photo = $this->updatePhoto();


                $data = array(
                    'name' => $categoryName,
                    'fkInsertBy' => $userId,
                    'CategoryStatus' => $CategoryStatus,
                    'image' => $photo

                );


                $this->data['error'] = $this->Categorym->updateCategoryById($id, $data);


                if (empty($this->data['error'])) {

                    $this->session->set_flashdata('successMessage', 'Category Updated Successfully');
                    redirect('Category');

                } else {

                    $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                    redirect('Category');

                }
            }
            }

         else {
            redirect('login');
        }
    }

    public function deleteCategoryById()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $id = $this->input->post('id');
            $this->Categorym->deleteCategoryById($id);

        }
        else{
            redirect('Login');
        }
    }

    public  function subCategory()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $id = $this->input->post('id');

//            $this->Categorym->deleteCategoryById($id);

        }
        else{
            redirect('Login');
        }



    }




}
