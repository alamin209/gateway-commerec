<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Slide extends Base_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('slide_model');

    }

    public function index(){

        $data['message'] = $this->session->flashdata('message');
        $data['all_slide'] = $this->slide_model->get_slides();
        $this->load->view('admin/slide', $data);
        
    }

    public function Add_Slide(){

        $this->load->view('admin/add_slide');
    }

    public function save_photo(){

        $data['photo'] = $this->uploadPhoto();
        $result = $this->slide_model->commonInsert('tbl_slide',$data);

        if($result){
            $msg = 'Slide Save successfully';
            $message = $this->msg($msg);
            redirect('Slide/index');
        }else{
            $msg =' Failed to Save!!';
            $message = $this->msg($msg);
            redirect('Slide/index');
        }

    }//save_photo

    public function Edit_Slide_Photo(){

        $SlideID = $this->input->post('id');
        $data['get_slide'] = $this->slide_model->getPhoto_ById($SlideID);
        $this->load->view('admin/edit_slide',$data);
    }

    public function update_slide(){

        $SlideID = $this->input->post('slide_id');

        if(isset($SlideID) && $SlideID != ''){

            $data = array('slide_id' => $SlideID);
            $prev_info = $this->db->get_where("tbl_slide",$data)->row();
            if(isset($_FILES['photo']['name']) && ($_FILES['photo']['name'] != '')){
                unlink($prev_info->photo);
            }
        }

        if(isset($_FILES['photo']['name']) && ($_FILES['photo']['name'] != '') ){

            $photo = $this->updatePhoto();
        }

        $result = $this->slide_model->updateSlide($SlideID);

        if($result){
            $msg = 'Slide has been updated successfully';
            $message = $this->msg($msg);
            redirect('Slide/index');

        }else{
            $msg = 'Failed to update!!';
            $message = $this->msg($msg);
            redirect('Slide/index');
        }
        

    }//update_slide

    public function Delete_Slide_Photo(){

        $SlideID = $this->input->post('id');
        $result = $this->slide_model->delete_photo_ById($SlideID);
    }


}//Slide

?>