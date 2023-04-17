<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
    private $xxx=array();
    public function get_name(){

        $ape=$_POST["ape"];
        //AHORA
        $ape=$this->input->post("ape");

       $this->xxx="juanssadasda";

        echo $this->xxx;
    }

}