<?php
class Person_model extends CI_Model {
    public function get_person($search) {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->like('prod_name',$search);
        $query = $this->db->get();
        $result=$query->result();
        return $result;
    }
}
?>