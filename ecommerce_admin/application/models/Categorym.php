<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Categorym extends Base_Model
{
    public function getAllCategory()
    {
//        $this->db->select('*','DESC');
        $this->db->order_by("category_id", "desc");
        $query = $this->db->get('catagory');
        return $query->result();
    }

    public function getAllCategoryNameId()
    {
        $this->db->select('id,name');
        $this->db->from('catagory');
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllSubCategoryNameId()
    {
        $this->db->select('*');
        $this->db->from('subcatgory');
        $query = $this->db->get();
        return $query->result();
    }


    public function insertCategory($data)
    {
        $this->security->xss_clean($data);
        $error = $this->db->insert('catagory', $data);

        if (empty($error)) {
            return $this->db->error();
        } else {

            return $error = null;
        }
    }

    public function insertSubCategory($data)
    {
        $this->security->xss_clean($data);
        $error = $this->db->insert('subcatgory', $data);

        if (empty($error)) {
            return $this->db->error();
        } else {

            return $error = null;
        }
    }

    public function getCatgoryById($cat_id)
    {
        $this->db->from('catagory');
        $this->db->where('category_id', $cat_id)->select(['category_id', 'name', 'CategoryStatus', 'image']);
        $query = $this->db->get();

        return $query->result();
    }

//    public function updateCategoryById($id, $data)
//    {
//        $error = $this->db->where('category_id', $id)->update('catagory', $data);
//
//        if (empty($error)) {
//            return $this->db->error();
//        } else {
//
//            return $error = null;
//        }
//    }

    public function catgorynUpdate($UserID, $tbl){

        return $this->db->where('category_id', $UserID)->update($tbl);

    }
    public function getSubCatgoryById($sub_cat_id)
    {

        $this->db->from('subcatgory');
        $this->db->where('sub_catgoryId', $sub_cat_id)->select('*');
        $query = $this->db->get();
        return $query->result();
    }


    public function updateSubCategory($id, $data)
    {
        $error = $this->db->where('sub_catgoryId', $id)->update('subcatgory', $data);

        if (empty($error)) {
            return $this->db->error();
        } else {

            return $error = null;
        }
    }


    public function deleteCategoryById($id)
    {
        $this->db->where('category_id', $id)->delete('catagory');

    }


        public function deletesubCategoryById($id)
        {
            $this->db->where('sub_catgoryId',$id)->delete('subcatgory');

        }

    }
