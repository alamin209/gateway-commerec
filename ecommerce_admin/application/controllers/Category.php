<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

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
        if ($this->session->userdata('userType') == "Admin")
        {

            $categoryName = $this->input->post('catagoryname');
            $description = $this->input->post('description');

            $userId=$this->session->userdata('id');

            $data = array(
                'name' => $categoryName,
                'fkInsertBy' =>$userId,
                'description'=>$description

            );
            $this->data['error'] = $this->Categorym->insertCategory($data);

            if (empty($this->data['error'])) {

                $this->session->set_flashdata('successMessage','Category Added Successfully');
                redirect('admin/allCategory');

            } else {

                $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                redirect('admin/allCategory');

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
            $this->load->view('Category/updateCategory',$data);

        } else {
            redirect('Login');
        }
    }

    public function updateCategoryById($id)
    {
        if ($this->session->userdata('userType') == "Admin") {

            $data = array(
                'name'=> $this->input->post('catagoryname'),
                'description'=> $this->input->post('description')

            );

            $this->data['error'] = $this->Categorym->updateCategoryById($id, $data);

            if (empty($this->data['error'])) {

                $this->session->set_flashdata('successMessage','Category Updated Successfully');
                redirect('Admin-Category');

            } else {

                $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                redirect('Admin-Category');

            }

        } else {
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

}
