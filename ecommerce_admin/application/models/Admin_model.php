<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Admin_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function admin_login()
	{
		$name=$this->input->post('name');
		$password=md5($this->input->post('password'));
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('email',$name);
		$this->db->where('password',$password);
		$get=$this->db->get();
		$get2=$get->row();
		return $get2;
	}
	
	public function add_category($data)
	{
		$this->db->insert('category',$data);
	}
	public function category()
	{
		$this->db->select('*');
		$this->db->from('category');
		$query = $this->db->get(); 
		return $query->result();
	}
	public function edit_category($id)
	{
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('cat_id',$id);
		$query = $this->db->get(); 
		return $query->row();
	}
	public function edit_category_save($id,$category)
	{
		$this->db->where('cat_id',$id);
		$this->db->update('category',$category);
	}
	public function delete_category($id)
	{
		$this->db->where('cat_id',$id);
		$this->db->delete('category');
	}

	public function product()
	{
		$this->db->select('*');
		$this->db->from('product'); 
		$query = $this->db->get(); 
		return $query->result();
	}
	public function product_save($data)
	{
		$this->db->insert('product',$data);
	}
	public function delete_product($id)
	{
		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('id',$id);
		$photo=$this->db->get();
		$old_photo=$photo->row();		
		unlink('assets/img/product_image/'.$old_photo->image);

		$this->db->where('id',$id);
		$this->db->delete('product');
	}
}
?>