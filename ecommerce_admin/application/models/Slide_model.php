<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Slide_model extends Base_Model{
	
	function __construct(){
		parent::__construct();
	}

	public function get_slides(){

		return $this->db->select('*')->from('tbl_slide')->get()->result();
	}

	public function getPhoto_ById($SlideID){

		return $this->db->select('*')->from('tbl_slide')->where('slide_id', $SlideID)->get()->row();	
	}

	public function updateSlide($SlideID){

		return $this->db->where('slide_id', $SlideID)->update('tbl_slide');
	}

	public function delete_photo_ById($SlideID){

		$data = array('slide_id'=>$SlideID);
		$photo = $this->db->get_where('tbl_slide',$data)->row();
		unlink($photo->photo);
		$result = $this->db->where('slide_id',$SlideID)->delete('tbl_slide');
		return $result;
	}

}//Slide_model

?>