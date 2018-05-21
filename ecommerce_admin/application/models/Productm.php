<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Productm extends CI_Model
{

    public function getProduct()
    {
        $this->db->select('*');
        $this->db->from('products');
//        $this->db->join('catagory','catagory.category_id=products.category_id');
        $this->db->join('catagory','catagory.category_id=products.category_id');
        $this->db->join('products_details','products_details.product_id=products.product_id');
        $query = $this->db->get();
        return $query->result();
    }


    public function getProductById($p_id)
    {
        $this->db->from('subcatgory');
        $this->db->where('cat_id', $p_id)->select('*');
        $query = $this->db->get();
        return $query->result();


    }


    public  function  insertItemdata($data)
   {
        $this->db->insert('products', $data);
        $product_id=$this->db->insert_id();
        return $product_id;

     }

 public  function insertproductSizedata($productSizedata)
  {
      $this->security->xss_clean($$productSizedata);
      $error = $this->db->insert('products_details', $productSizedata);

      if (empty($error)) {
          return $this->db->error();
      } else {

          return $error = null;
      }


  }
}
