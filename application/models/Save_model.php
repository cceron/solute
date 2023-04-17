<?php
    class Save_model extends CI_Model {
        public function data($table,$array_data=[]){
            $result=$this->db->insert_batch($table, $array_data);
            if($result){
                $this->array_response["new_id"]     =$this->db->insert_id();
                $this->array_response["error"]      =0;
                $this->array_response["text_error"] ="";
                $this->array_response["title"]      ="NOTIFICATION";
                $this->array_response["type"]       ="success";
                $this->array_response["text"]       ="Information saved correctly!";
            }else{
                $this->array_response["new_id"]     =-1;
                $this->array_response["error"]      =1;
                $this->array_response["text_error"] =$this->db->error(); ;
                $this->array_response["title"]      ="WARNING";
                $this->array_response["type"]       ="danger";
                $this->array_response["text"]       ="Has been a problem when saved data";  
            }
           
            return $this->array_response;  
        }

?>