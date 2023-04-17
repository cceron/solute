<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uf_maintainer extends CI_Controller {
	private $array_response=array();
	
	public function list($id_module){
        
        // Array
        // (
        //     [module] => usuarios
        //     [group] => gestión
        //     [icon_class] => key
        //     [url] => user_maintainer/list
        //     [id_permissions] => eccbc87e4b5ce2fe28308fd9f2a7baf3
        //     [permissions] => [1,2,3,4]
        // )
        $this->array_response["array_module_permissions"]=$this->session->userdata["platform"]["permissions"]["by_module"][$id_module];
        
        // echo"<pre>";
        // print_r($this->session->userdata["platform"]["permissions"]["by_module"][$id_module]);
        // print_r($this->session->userdata["platform"]);
        $this->session->userdata["platform"]=$this->session->userdata["platform"];
        $this->session->userdata["platform"]["array_current_module"]=$this->array_response["array_module_permissions"];
        // print_r($this->session->userdata["platform"]);
        // echo"</pre>";

        $this->load->view('maintainer/uf/list',$this->array_response);
    }
    public function uf(){
        // echo "<pre>";
        //print_r($this->session->userdata("platform"));
        //$array_permissions_module=json_decode($this->session->userdata("platform")["array_current_module"]["permissions"]);
        $array_permissions_module=[1,2,3,4];
        // echo "</pre>";
        
        $this->load->model("Uf_model","uf");
        
        $json_data=$this->security->xss_clean($this->input->raw_input_stream);
        if(empty($json_data)){
            $obj_list_uf=$this->uf->get_all();
        }else{
            $obj_data=@json_decode($json_data);
            $json_data=$this->security->xss_clean($obj_data->data);
            $json_data=decrypt_data($json_data);
            $obj_data=@json_decode($json_data);
            // print_r($obj_data);

            $inidate=$obj_data[0]->value;
            $findate=$obj_data[1]->value;

            $obj_list_uf=$this->uf->get_all($inidate,$findate);    
        }
		
        //print_r($obj_list_uf);
        $array=[];
        foreach($obj_list_uf as $k => $array_uf){
            $buttons="";
            if(in_array(3,$array_permissions_module)){
                $buttons.='<button class="btn btn-warning m-0 btn-edit" data-ref="'.$array_uf->id_uf.'" onclick="javascript:Utils.option_event(this)"><i class="align-middle fas fa-solid fa-pen-to-square fa-lg"></i></button>';
            }
            
            if(in_array(4,$array_permissions_module)){
                $buttons.='<button class="btn btn-danger m-0 btn-del" data-ref="'.$array_uf->id_uf.'" onclick="javascript:Utils.option_event(this)"><i class="align-middle fas fa-fw fa-trash-alt fa-lg"></i></button>';
            }
        
            $array[$k]=array(
                date("d-m-Y",strtotime($array_uf->fecha)),
                $array_uf->precio,
                $buttons
            );
        }
        
        $this->output->set_content_type('application/json')->set_output(json_encode($array));
    }
    public function form_new(){
        $this->load->view('maintainer/uf/new',$this->array_response);
    }
    public function save(){
        $json_data=$this->security->xss_clean($this->input->raw_input_stream);
        //print_r($json_data);

        if(!empty($json_data)){
			$obj_data=@json_decode($json_data);
			if(json_last_error() === JSON_ERROR_NONE){
				//$this->load->helder("utils");
				$json_data=$this->security->xss_clean($obj_data->data);
				$json_data=decrypt_data($json_data);
				$obj_data=@json_decode($json_data);
				
				if(json_last_error() === JSON_ERROR_NONE){
                    // print_r($obj_data);
                    $array_data=array(
                        'fecha'     => $this->security->xss_clean($obj_data[0]->value),
                        'precio'    => $this->security->xss_clean($obj_data[1]->value)
                        
                    );
                    $this->load->model("Uf_model","uf");

		            $result=$this->uf->save($array_data);
                    // print_r($result);
                    if($result){
                        $this->array_response["error"] 			=0;
                        $this->array_response["message_error"]	="";
                        $this->array_response["title"]			="NOTIFICACION!";
                        $this->array_response["type"]			="success";
                        $this->array_response["text"]			="Uf creada correctamente";	
                    }else{
                        $this->array_response["error"] 			=1;
                        $this->array_response["message_error"]	="";
                        $this->array_response["title"]			="WARNING!";
                        $this->array_response["type"]			="danger";
                        $this->array_response["text"]			="ha ocurrido un inconveniente en la accion de crear";	
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
    public function form_edit($id){
        $this->load->model("Uf_model","uf");

		$obj_uf_data=$this->uf->get_by_id($id);
        // print_r($obj_uf_data);
        $this->array_response["obj_uf"]=$obj_uf_data[0];
        $this->load->view('maintainer/uf/edit',$this->array_response);  
    }

    public function update(){
        $json_data=$this->security->xss_clean($this->input->raw_input_stream);
        //print_r($json_data);

        if(!empty($json_data)){
			$obj_data=@json_decode($json_data);
			if(json_last_error() === JSON_ERROR_NONE){
				//$this->load->helder("utils");
				$json_data=$this->security->xss_clean($obj_data->data);
				$json_data=decrypt_data($json_data);
				$obj_data=@json_decode($json_data);
				// print_r($obj_data);
				if(json_last_error() === JSON_ERROR_NONE){ 
                    $array_data=array(
                        'fecha'     => $this->security->xss_clean($obj_data[1]->value),
                        'precio'    => $this->security->xss_clean($obj_data[2]->value)
                        
                    );
                   
                    $this->load->model("Uf_model","uf");

		            $result=$this->uf->update($obj_data[0]->value,$array_data);
                    // print_r($result);
                    if($result){
                        $this->array_response["error"] 			=0;
                        $this->array_response["message_error"]	="";
                        $this->array_response["title"]			="NOTIFICACION!";
                        $this->array_response["type"]			="success";
                        $this->array_response["text"]			="Usuario actualizado correctamente";	
                    }else{
                        $this->array_response["error"] 			=1;
                        $this->array_response["message_error"]	="";
                        $this->array_response["title"]			="WARNING!";
                        $this->array_response["type"]			="danger";
                        $this->array_response["text"]			="ha ocurrido un inconveniente en la accion de actualizar";	
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
    public function delete(){
        $json_data=$this->security->xss_clean($this->input->raw_input_stream);
		//print_r($json_data);
		if(!empty($json_data)){
			$obj_data=@json_decode($json_data);
            
			if(json_last_error() === JSON_ERROR_NONE){
				//$this->load->helder("utils");
				$json_data=$this->security->xss_clean($obj_data->ref);
				//print_r($json_data);
                //$json_data=decrypt_data($json_data);
                // print_r($json_data);
				//$obj_data=@json_decode($json_data);
                //print_r($obj_data);
                $id=$json_data;
                $this->load->model("Uf_model","uf");

		        $result=$this->uf->delete($id);
                if($result){
                    $this->array_response["error"] 			=0;
                    $this->array_response["message_error"]	="";
                    $this->array_response["title"]			="NOTIFICACION!";
                    $this->array_response["type"]			="success";
                    $this->array_response["text"]			="Usuario eliminado correctamente";	
                }else{
                    $this->array_response["error"] 			=1;
                    $this->array_response["message_error"]	="";
                    $this->array_response["title"]			="WARNING!";
                    $this->array_response["type"]			="danger";
                    $this->array_response["text"]			="ha ocurrido un inconveniente en la accion de actualizar";	
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
        // if(json_last_error() === JSON_ERROR_NONE){
        //     //$this->load->helder("utils");
        //     //echo "asd";
        //     $json_data=$this->security->xss_clean($obj_data->ref);
        //     $json_data=decrypt_data($json_data);
        //     $obj_data=@json_decode($json_data);
        //     //print_r($obj_data);
        // }else{
		// 	$this->array_response["error"] 			=1;
		// 	$this->array_response["message_error"]	="";
		// 	$this->array_response["title"]			="WARNING!";
		// 	$this->array_response["type"]			="danger";
		// 	$this->array_response["text"]			="ha ocurrido un inconveniente con la informacion recibida";
		// }
    }

    
}   

?>