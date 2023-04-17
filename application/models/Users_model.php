<?php
    class Users_model extends CI_Model {

        
        public function get_user_by_email($array_data=array()){
            
            $this->db->select("md5(id) as id_user,email,password,status,username,first_name,last_name");
            $this->db->from("users");
            $this->db->where("status!=",3); 
            $this->db->where("email",$array_data["email"]);
            $query=$this->db->get();
            return $query->result();
        }

        public function get_all(){
            $this->db->select("id, md5(id) as id_user,email,password,status,username,first_name,last_name,created_at");
            $this->db->from("users");
            $this->db->where("md5(id)!=",md5(1));
            $this->db->where("status!=",3);
            $this->db->order_by("id","asc");
            $query=$this->db->get();
            return $query->result();
        }

        public function save($array_data=array()){
            return $this->db->insert('users', $array_data);
        }
        public function get_user_by_id($id){
            $this->db->select("md5(id) as id_user,email,password,status,username,first_name,last_name");
            $this->db->from("users");
            $this->db->where("md5(id)",$id);
            $query=$this->db->get();
            return $query->result();
        }
        public function update($id,$array_data=array()){
            $this->db->where('md5(id)', $id);
            return $this->db->update('users', $array_data);
        }
        public function delete($id){
            $this->db->where('md5(id)', $id);
            return $this->db->delete('users');
        }
    }
?>