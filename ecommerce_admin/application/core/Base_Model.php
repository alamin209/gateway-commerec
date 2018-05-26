<?php

class Base_Model extends CI_Model{

    public function debug($data){

        echo "<pre>";
        print_r($data);
        exit();
    }

    public function commonInsert($tbl, $data){

        return $this->db->insert($tbl, $data);
    }

    public function commonUpdate($UserID, $tbl){

        return $this->db->where('product_id', $UserID)->update($tbl);

    }
    public function subCategoryUpdate($UserID, $tbl){

        return $this->db->where('sub_catgoryId', $UserID)->update($tbl);

    }

}//Base_Model

?>