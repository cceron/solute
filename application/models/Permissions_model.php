<?php
    class Permissions_model extends CI_Model {

        public function get_all(){
            $this->db->select("p.id, md5(p.id) as id_permission,m.module,m.icon_class,u.email,u.username,p.permissions");
            $this->db->from("permissions p");
            $this->db->join('users u', 'p.id_user = u.id', 'inner');
            $this->db->join('modules m', 'p.id_module = m.id', 'inner');
            $this->db->where("md5(u.id)!=",md5(1));
            //$this->db->where("status!=",3);
            $this->db->order_by("p.id","asc");
            $query=$this->db->get();
            return $query->result();
        }

        public function get_data_by($array=[]){
            if(count($array)>0){
                $this->db->select("p.id, md5(p.id) as id_permission,m.module,m.icon_class,u.email,u.username,p.permissions");
                $this->db->from("permissions p");
                $this->db->join('users u', 'p.id_user = u.id', 'inner');
                $this->db->join('modules m', 'p.id_module = m.id', 'inner');

                if(isset($array["id"])){
                    $this->db->where("md5(p.id)",$array["id"]);
                }

                $query=$this->db->get();
                return $query->result();
            }else{
                echo "no";
            }
        }
    }
?>