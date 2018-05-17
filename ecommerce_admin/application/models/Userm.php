<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Userm extends CI_Model
{

    public function getUser()
    {
        $this->db->select('*');
        $this->db->from('user');
//        $this->db->order_by('u.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }





    public function getuserById($userid)
    {
        $this->db->from('user ');
        $this->db->where('id', $userid)->select('*');
        $query = $this->db->get();
        return $query->result();
    }


    public function updateUserById($id, $data)
    {

        $error = $this->db->where('id', $id)->update('user', $data);

        if (empty($error)) {
            return $this->db->error();
        } else {

            return $error = null;
        }
    }


    public function deleteUserById($id)
    {
        $this->db->where('id', $id)->delete('user');

    }


    public function getAdmin()

    {
        $this->db->select('u.id,u.name,u.address,u.postalCode,u.fkCity as city,u.memberCardNo,u.contactNo,u.email,u.password,u.userActivationStatus,u.fkUserType, c.name as fkcity');
        $this->db->from('users u');
        $this->db->join('city c', 'c.id = u.fkCity', 'left');
        $this->db->where("fkUserType=", 'Admin');
        $query = $this->db->get();
        return $query->result();

    }


    public function getCustomer()
    {
        $this->db->select('u.id,u.name,u.address,u.postalCode,u.fkCity as city,u.memberCardNo,u.contactNo,u.email,u.password,u.userActivationStatus,u.fkUserType, c.name as fkcity');
        $this->db->from('users u');
        $this->db->join('city c', 'c.id = u.fkCity', 'left');
        $this->db->where("fkUserType", 'cus');
        $this->db->order_by('u.id', 'desc');
        $query = $this->db->get();
        return $query->result();

    }

    public  function getTotalUser()
    {

        $date= date('Y-m-d');
        $this->db->where('fkUserType','cus');
        $this->db->where('DATE(insertDate)',$date);
        $query = $this->db->get('users');
        return $query->num_rows();

    }

    public function getAllInfoUser($userId)

    {
        $this->db->select('u.id,u.name,u.address,u.postalCode,u.fkCity as city,u.memberCardNo,u.contactNo,u.email, c.name as cityName');
        $this->db->from('users u');
        $this->db->where('u.id',$userId);
        $this->db->join('city c', 'c.id = u.fkCity', 'left');
        $query = $this->db->get();
        return $query->result();

    }


}