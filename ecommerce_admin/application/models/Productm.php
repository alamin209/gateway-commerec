<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Productm extends CI_Model
{

    public function getProduct()
    {
        $this->db->select('*');
        $this->db->from('products');
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

}
