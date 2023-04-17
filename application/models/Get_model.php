<?php
    class Get_model extends CI_Model {
        public function data_where($table,$array_fields=[],$array_where=[]){
            $fields=implode(",",$array_fields);
           
            $this->db->select($fields);
            $this->db->from($table);
           
            foreach($array_where as $field => $value){
                $this->db->where($field,$value);
            }
           
            $result=$this->db->get()->result();
            return $result;
        }

        public function __destrict(){
            $this->db->close();
        }
    }

?>