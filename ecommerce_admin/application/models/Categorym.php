<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Categorym extends CI_Model
{
    public  function getAllCategory()
    {
        $this->db->order_by('id','DESC');
        $query=$this->db->get('catagory');
        return $query->result();
    }

    public  function getAllCategoryNameId()
    {
        $this->db->select('id,name');
        $this->db->from('catagory');
        $query=$this->db->get();
        return $query->result();
    }


    public function insertCategory($data)
    {
        $this->security->xss_clean($data);
        $error=$this->db->insert('catagory', $data);

        if (empty($error))
        {
            return $this->db->error();
        }
        else {

            return $error = null;
        }
    }

    public function getCatgoryById($cat_id)
    {
        $this->db->from('catagory');
        $this->db->where('id',$cat_id)->select(['id','name','description']);
        $query = $this->db->get();

        return $query->result();
    }


    public function updateCategoryById($id, $data)
    {
        $error=$this->db->where('id',$id)->update('catagory',$data);

        if (empty($error))
        {
            return $this->db->error();
        }
        else {

            return $error = null;
        }
    }


    public function deleteCategoryById($id)
    {
        $this->db->where('id',$id)->delete('catagory');

    }




}