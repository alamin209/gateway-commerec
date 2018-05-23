<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Productm extends CI_Model
{

    public function getProduct()
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->join('catagory','catagory.category_id=products.category_id');
        $query = $this->db->get();
        return $query->result();
    }
    public function getproductInfoById($product_id)
    {
        $this->db->from('products');
        $this->db->where('product_id', $product_id)->select('*');
        $query = $this->db->get();
        return $query->result();

    }

   public  function getProductDetails()
   {
       $this->db->select('*','DESC');
       $this->db->from('products_details');
//       $this->bd->where('product_id');
       $query = $this->db->get();
       return $query->result();

   }



   public  function getOptionalProductId($optional_id)
   {

       $this->db->from('products_details');
       $this->db->where('id', $optional_id)->select('*');
       $query = $this->db->get();
       return $query->result();
   }


   public function updateoptional($id, $productSizedata)
   {
       $error = $this->db->where('id', $id)->update('products_details', $productSizedata);

       if (empty($error)) {
           return $this->db->error();
       } else {

           return $error = null;
       }
   }

    public function deleteOptional($id)
    {
        $this->db->where('id', $id)->delete('products_details');

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
       $this->security->xss_clean($data);

       $this->db->insert('products', $data);
        $product_id=$this->db->insert_id();
        return $product_id;

     }

 public  function insertproductSizedata($productSizedata)
  {
      $this->security->xss_clean($productSizedata);
      $error = $this->db->insert('products_details', $productSizedata);
      if (empty($error)) {
          return $this->db->error();
      } else {

          return $error = null;
      }


  }
}
