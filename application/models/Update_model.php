<?php
    class Update_model extends CI_Model {
        public function data_where($table,$array_update,$array_where){
            foreach($array_where as $field => $value){
                $this->db->where($field,$value);
            }
            return $this->db->update($table,$array_update);
        }
    }

?>