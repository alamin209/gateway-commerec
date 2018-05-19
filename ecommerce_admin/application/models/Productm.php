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

}
