<?php
    class Modules_model extends CI_Model {

        public function get_all(){
            $this->db->select("md5(m.id) as id_module,m.group,m.module,m.icon_class");
            $this->db->from("modules m");
            $this->db->where('m.status', 1);
            $query=$this->db->get();
            return $query->result();
        }
        public function get_permissions_by_user($array_data=array()){
            //print_r($array_data);
            $this->db->select("md5(m.id) as id_module,m.group,m.module,m.icon_class,m.url,md5(p.id) as id_permissions,p.permissions");
            $this->db->from("modules m");
            $this->db->join('permissions p', 'p.id_module=m.id','inner');
            $this->db->where("md5(p.id_user)",$array_data["id_user"]);
            $this->db->order_by('m.order_group', 'ASC');
            $this->db->order_by('m.order_module', 'ASC');
            $query=$this->db->get();
            return $query->result();
            
        }
    }
?>