<?php
    function generate_password($password=null){
        return password_hash($password, PASSWORD_BCRYPT);
    }

    function encrypt_data($str){
        return base64_encode(strrev(base64_encode(strrev(base64_encode($str)))));
    }

    function decrypt_data($str){
        return base64_decode(strrev(base64_decode(strrev(base64_decode($str)))));
    }

    function parse_str_url($str_data_obj){
        //print_r($str_data_obj);
        $array_data=[];
        foreach($str_data_obj as $idx => $data){
            //print_r($data);
            if(stristr($data->name,"[]")){
                $name=str_replace("[]","",$data->name);
                // if(!isset($array_data[$name])){
                //     $array_data[$name][]=$data->value;
                // }else{
                //     $array_data[$name][]=$data->value;
                // }
                $array_data[$name][]=$data->value;
            }else{
                $array_data[$data->name]=$data->value;
            }
        }
        return $array_data;
        //return $data;
    }

    
?>