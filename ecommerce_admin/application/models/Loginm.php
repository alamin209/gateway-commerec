<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Loginm extends CI_Model{

    public function validate_user($data){

        $userEmail=$this->input->post('email');
        $password=$this->input->post('password');
        $this->db->select('u.id as userId,u.name,u.email,u.fkUserType as userType');
        $this->db->where('email',$userEmail);
        $this->db->where('password',$password);
        $this->db->where('fkUserType',"Admin");
//        $this->db->where('fkUserType',"Admin");
        $this->db->from('user u');

        $query = $this->db->get();

        return $query->row();

    }

    public function loginInfo($data1){

        $this->db->insert('logininfo',$data1);
        $insert_id = $this->db->insert_id();
        return $insert_id;


    }



    public function logout($id,$data)
    {
        $this->db->where('id',$id);
        $this->db->update('logininfo',$data);

    }







}