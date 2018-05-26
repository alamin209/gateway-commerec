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
        if ($this->session->userdata('userType') == "Admin") {

            $categoryName = $this->input->post('catagoryname');
            $CategoryStatus = $this->input->post('CategoryStatus');
            $path='./assets/admin/uploads/';
            $photo = $this->uploadPhoto($path);
            $userId = $this->session->userdata('id');
            $data = array(
                'name' => $categoryName,
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

    public function updateCategoryById()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $categoryName = $this->input->post('catagoryname');
            $CategoryStatus = $this->input->post('CategoryStatus');
            $userId = $this->session->userdata('id');
            $UserID = $this->input->post('id1');
            $path = './assets/admin/uploads/';
//                $photo = $this->updateCatagegoryPhoto($path);
            $this->db->set('name', $categoryName);
            $this->db->set('fkInsertBy', $userId);
            $this->db->set('CategoryStatus', $CategoryStatus);

            if (isset($UserID) && $UserID != '') {
                $data = array('category_id' => $UserID);
                $prev_info = $this->db->get_where("catagory", $data)->row();
                if (isset($_FILES['photo']['name']) && ($_FILES['photo']['name'] != '')) {
                    unlink($prev_info->image);
                }
            }

            if (isset($_FILES['photo']['name']) && ($_FILES['photo']['name'] != '')) {
                $path = './assets/admin/uploads/';
                $photo = $this->updateCatagegoryPhoto($path);
            }


            $this->data['error'] = $this->Categorym->catgorynUpdate($UserID, 'catagory');

            if (empty($this->data['error'])) {
                $this->session->set_flashdata('successMessage', 'Category   Update Successfully');
                redirect('Category');
            } else {
                $this->session->set_flashdata('successMessage', 'Category  Update Successfully');
                redirect('Category');
            }
        }


else {
            redirect('login');
        }
    }
    public function updateCatagegoryPhoto($path){
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 1024;
        // $config['max_width'] = 300;
        // $config['max_height'] = 300;
        $this->load->library('upload', $config);
        $error='';
        $fdata=array();
        if ( ! $this->upload->do_upload('photo')){
            $error = $this->upload->display_errors();
            $dt['message'] = $error;
            $this->session->set_userdata($dt);
            redirect(current_url());
        }else{
            $fdata=$this->upload->data();
            $img = $config['upload_path'] . $fdata['file_name'];
            $this->db->set('image', $img);
        }
    }//updatePhoto

    public  function subCategory()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $id = $this->input->post('id');

            $data['subcategory'] = $this->Categorym->getAllSubCategoryNameId();
            $this->load->view('admin/allSubCategory', $data);


        }
        else{
            redirect('Login');
        }

    }

    public  function newSubCategory()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $id = $this->input->post('id');
            $data['category'] = $this->Categorym->getAllCategory();


            $this->load->view('admin/addNewSubCategory',$data);


        }
        else{
            redirect('Login');
        }



    }

    public  function  addSubCategory()
    {
        if ($this->session->userdata('userType') == "Admin") {
            $categoryName = $this->input->post('subcatagoryname');
            $categoryid = $this->input->post('categoryid');
            $subCategoryStatus = $this->input->post('subCategoryStatus');
//            $path = './assets/admin/uploads/subCatogory/';
            $path= './assets/admin/uploads/subCatogory/';
            $photo = $this->uploadPhoto($path);
            $userId = $this->session->userdata('id');
            $data = array(
                'InsertBy' => $userId,
                'cat_id' => $categoryid,
                'subCatoryName' => $categoryName,
                'cat_id' => $categoryid,
                'image' => $photo,
                'status' => $subCategoryStatus
            );


            $this->data['error'] = $this->Categorym->insertSubCategory($data);
            if (empty($this->data['error'])) {

                $this->session->set_flashdata('successMessage', ' Sub Category Added Successfully');
                redirect('Category/subCategory');

            } else {

                $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                redirect('Category/subCategory');


            }
        } else {
            redirect('Login');
        }


    }

    public function getSubCategoryById()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $sub_cat_id = $this->input->post('id');
            $data['category'] = $this->Categorym->getAllCategory();
            $data['subcategoryInfo'] = $this->Categorym->getSubCatgoryById($sub_cat_id);
            $this->load->view('admin/updatesubCategory',$data);

        } else {
            redirect('Login');
        }
    }


    public  function  updateSubCategory()
    {
        if ($this->session->userdata('userType') == "Admin") {
            $categoryName = $this->input->post('subcatagoryname');
            $categoryid = $this->input->post('categoryid');
            $subCategoryStatus = $this->input->post('subCategoryStatus');
            $userId = $this->session->userdata('id');
            $UserID = $this->input->post('id1');


            $this->db->set('InsertBy', $userId);
            $this->db->set('cat_id', $categoryid);
            $this->db->set('status', $subCategoryStatus);
            $this->db->set('subCatoryName', $categoryName);
            if(isset($UserID) && $UserID != ''){
                $data = array('sub_catgoryId'=>$UserID);
                $prev_info = $this->db->get_where("subcatgory",$data)->row();
                if(isset($_FILES['photo']['name']) && ($_FILES['photo']['name'] != '')){
                    unlink($prev_info->p_image);
                }
            }

            if(isset($_FILES['photo']['name']) && ($_FILES['photo']['name'] != '') ){
            $path= './assets/admin/uploads/subCatogory/';
                $photo = $this->updatePhoto($path);
            }
            $this->data['error'] = $this->Categorym->subCategoryUpdate( $UserID,'subcatgory');

            if (empty($this->data['error'])) {
                $this->session->set_flashdata('successMessage', 'SubCategory  Update Successfully');
                redirect('Category/subCategory');
            } else {
                $this->session->set_flashdata('successMessage', 'SubCategory  Update Successfully');
                redirect('Category/subCategory');
            }

        }
            else  {
                    redirect('Login');
                  }



    }
    public function deleteCategoryById()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $id = $this->input->post('id');
            $this->Categorym->deleteCategoryById($id);
            $this->session->set_flashdata('successMessage','Category Delete Successfully');


        }
        else{
            redirect('Login');
        }
    }
    public function deletesubCategoryById()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $id = $this->input->post('id');
            $this->Categorym->deletesubCategoryById($id);
            $this->session->set_flashdata('successMessage','Sub Category Delete Successfully');


        }
        else{
            redirect('Login');
        }
    }

}
