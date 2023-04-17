<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	private $array_response=array();

	public function index(){
		$this->load->view('login/login');
	}
	public function verify_login(){
		//echo json_encode(array("a"=>11));
		$json_data=$this->security->xss_clean($this->input->raw_input_stream);
		
		if(!empty($json_data)){
			$obj_data=@json_decode($json_data);
			if(json_last_error() === JSON_ERROR_NONE){
				//$this->load->helder("utils");
				$json_data=$this->security->xss_clean($obj_data->data);
				$json_data=decrypt_data($json_data);
				$obj_data=@json_decode($json_data);
				
				if(json_last_error() === JSON_ERROR_NONE){
					//print_r($obj_data);
					$obj_data=(json_decode(json_encode(parse_str_url($obj_data))));
					$array_data["email"]	=$this->security->xss_clean($obj_data->email);
					//$array_data["password"]	=utf8_encode($this->security->xss_clean($obj_data->password));
					$array_data["password"]	=$obj_data->password;
					
					$this->load->model("Users_model","users");
					$result=$this->users->get_user_by_email($array_data);
					
					if(count($result)==1){
						
						if(password_verify($array_data["password"],$result[0]->password)){
							/*
							$curl = curl_init();

							curl_setopt_array($curl, array(
							  	CURLOPT_URL => 'https://postulaciones.solutoria.cl/api/acceso',
							  	CURLOPT_RETURNTRANSFER => true,
							  	CURLOPT_ENCODING => '',
							  	CURLOPT_MAXREDIRS => 10,
							  	CURLOPT_TIMEOUT => 0,
							  	CURLOPT_FOLLOWLOCATION => true,
							  	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
							  	CURLOPT_CUSTOMREQUEST => 'POST',
							  	CURLOPT_POSTFIELDS =>'{
									"userName": "cristianceronbarrera8_rsj@indeedemail.com",
									"flagJson": true
								}',
							  	CURLOPT_HTTPHEADER => array(
							    	'Content-Type: application/json'
							  	),
							));

							$response = curl_exec($curl);

							curl_close($curl);
							print_r($response);
							*/

							// exit;
							$array_session["platform"]["data"]=array(
								"id"=>$result[0]->id_user,
								"email"=>$result[0]->email,
								"username"=>$result[0]->username,
								"first_name"=>$result[0]->first_name,
								"last_name"=>$result[0]->last_name,
							);
							$this->session->set_userdata($array_session);

							$this->array_response["error"] 			=0;
							$this->array_response["message_error"]	="";
							$this->array_response["title"]			="NOTIFICATION";
							$this->array_response["type"]			="success";
							$this->array_response["text"]			="Verificacion correcta!";		
							$this->array_response["next"]			="home";
						}else{
							$this->array_response["error"] 			=1;
							$this->array_response["message_error"]	="";
							$this->array_response["title"]			="WARNING!";
							$this->array_response["type"]			="warning";
							$this->array_response["text"]			="Contraseña incorrecta!";		
						}
					}elseif(count($result)==0){
						$this->array_response["error"] 			=1;
						$this->array_response["message_error"]	="";
						$this->array_response["title"]			="WARNING!";
						$this->array_response["type"]			="warning";
						$this->array_response["text"]			="Email incorrecto!";		
					}else{
						$this->array_response["error"] 			=1;
						$this->array_response["message_error"]	="";
						$this->array_response["title"]			="WARNING!";
						$this->array_response["type"]			="warning";
						$this->array_response["text"]			="Email duplicado!";		
					}
				}else{
					$this->array_response["error"] 			=1;
					$this->array_response["message_error"]	="";
					$this->array_response["title"]			="WARNING!";
					$this->array_response["type"]			="danger";
					$this->array_response["text"]			="[2]ha ocurrido un inconveniente con la informacion del formulario";	
				}
			}else{
				$this->array_response["error"] 			=1;
				$this->array_response["message_error"]	="";
				$this->array_response["title"]			="WARNING!";
				$this->array_response["type"]			="danger";
				$this->array_response["text"]			="[1]ha ocurrido un inconveniente con la informacion del formulario";
			}
		}else{
			$this->array_response["error"] 			=1;
			$this->array_response["message_error"]	="";
			$this->array_response["title"]			="WARNING!";
			$this->array_response["type"]			="danger";
			$this->array_response["text"]			="ha ocurrido un inconveniente con la informacion recibida";
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($this->array_response));
	}
}
