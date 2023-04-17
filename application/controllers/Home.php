<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	private $array_response=array();
	// public function __construct(){
		
	// 	if(!$this->session->has_userdata("platform")){
	// 		header("Location:".base_url());
	// 	}
	// }
	public function index(){
		if(!$this->session->has_userdata("platform")){
			header("Location:".base_url());
		}
		// echo json_encode(array(1,2,3,4));
		$array_session=$this->session->userdata["platform"];
		// print_r($array_session);
		$array_data_get["id_user"]=$array_session["data"]["id"];

		$this->load->model("Modules_model","modules");
		$result_permissions=$this->modules->get_permissions_by_user($array_data_get);

		// echo "<pre>";
		// print_r($result_permissions);
		// echo "</pre>";
		$arrray_permissions=array();
		foreach($result_permissions as $idx => $obj_permissions){
			$arrray_permissions["by_module"][$obj_permissions->id_module]["module"] 		=$obj_permissions->module;
			$arrray_permissions["by_module"][$obj_permissions->id_module]["group"]			=$obj_permissions->group;
			$arrray_permissions["by_module"][$obj_permissions->id_module]["icon_class"]		=$obj_permissions->icon_class;
			$arrray_permissions["by_module"][$obj_permissions->id_module]["url"]			=$obj_permissions->url;
			$arrray_permissions["by_module"][$obj_permissions->id_module]["id_permissions"]	=$obj_permissions->id_permissions;
			$arrray_permissions["by_module"][$obj_permissions->id_module]["permissions"]	=$obj_permissions->permissions;

			$arrray_permissions["by_group"][$obj_permissions->group][$obj_permissions->id_module]["module"] 			=$obj_permissions->module;
			$arrray_permissions["by_group"][$obj_permissions->group][$obj_permissions->id_module]["icon_class"] 		=$obj_permissions->icon_class;
			$arrray_permissions["by_group"][$obj_permissions->group][$obj_permissions->id_module]["url"] 				=$obj_permissions->url;
			$arrray_permissions["by_group"][$obj_permissions->group][$obj_permissions->id_module]["id_permissions"] 	=$obj_permissions->id_permissions;
			$arrray_permissions["by_group"][$obj_permissions->group][$obj_permissions->id_module]["permissions"] 		=$obj_permissions->permissions;

		}

		$array_session_data["platform"]["data"] 		=$array_session["data"];
		$array_session_data["platform"]["permissions"]	=$arrray_permissions;
		

		$this->session->set_userdata($array_session_data);
		// echo "<pre>";
		// print_r($arrray_permissions);
		// echo "</pre>";
		$this->array_response["array_session_data"]	=$array_session_data;
		$this->array_response["arrray_permissions"]	=$arrray_permissions;

		$this->load->view('home/index',$this->array_response);
		//$this->load->view('home/header');
	}
	public function dashboard($ref=null,$inidate=null,$findate=null){
		
		if($inidate==null && $findate==null){
			$date    	= new DateTime();               // Creates new DatimeTime for today
			$inidate 	= $date->modify( '- 30 days' );  // Adds 5 days
			$inidate 	= $inidate->format('Y-m-d');
			$findate	= date("Y-m-d");

		}
		// echo $inidate;
		// echo $findate;
		// $this->load->model("Uf_model","uf");

		// $obj_list_uf=$this->uf->get_all($inidate,$findate);
		// echo "<pre>";
		// print_r($obj_list_uf);
		// echo "</pre>";
		// $ci=&get_instance();
		// echo "<pre>";
		// print_r($ci);
		// echo "</pre>";
		//$xx=new Uf_maintainer();
		// echo$xx=$ci::Uf_maintainer->uf();
		//$this->load->library('../controllers/Uf_maintainer');
		//$x=$this->Uf_maintainer->uf();

		$this->array_response["inidate"]=$inidate;
		$this->array_response["findate"]=$findate;

		$this->load->view('home/dashboard',$this->array_response);	
	}
	public function log_out(){
		
		$this->session->sess_destroy();
		header("Location:".base_url());
		
	}
}
