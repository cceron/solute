<?php
class Test_model extends CI_Model{

    public function get_usernames(){
        //QUERY BUILDER
        $this->db->select("username");
        $this->db->from("users");

        $query=$this->db->get();
        return $query->result();

        return $result;
    }
}

?>