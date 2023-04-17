<?php
    class Uf_model extends CI_Model {

        
        public function get_all($inidate=null,$findate=null){
            $this->db->select("id, md5(id) as id_uf,fecha,precio");
            $this->db->from("uf");
            if($inidate!==null && $findate!==null){
                //$this->db->where("fecha BETWEEN ".$inidate." AND ".$findate,NULL,FALSE);
                $this->db->where("fecha >=",$inidate);
                $this->db->where("fecha <=",$findate);
            }
            $this->db->order_by("fecha","desc");
            $query=$this->db->get();
            return $query->result();
        }

        public function save($array_data=array()){
            return $this->db->insert('uf', $array_data);
        }
        public function get_by_id($id){
            $this->db->select("md5(id) as id_uf,fecha,precio");
            $this->db->from("uf");
            $this->db->where("md5(id)",$id);
            $query=$this->db->get();
            return $query->result();
        }
        public function update($id,$array_data=array()){
            $this->db->where('md5(id)', $id);
            return $this->db->update('uf', $array_data);
        }
        public function delete($id){
            $this->db->where('md5(id)', $id);
            return $this->db->delete('uf');
        }
    }
?>