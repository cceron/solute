async function postData(type='url', url = '', data = {}) {
    if(type=="url"){
        const response = await fetch(url, {
            method: 'POST', // *GET, POST, PUT, DELETE, etc.
            mode: 'cors', // no-cors, *cors, same-origin
            cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
            credentials: 'same-origin', // include, *same-origin, omit
            headers: {
              'Content-Type': 'text/html'
              // 'Content-Type': 'application/x-www-form-urlencoded',
            },
            redirect: 'follow', // manual, *follow, error
            referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
            body: JSON.stringify(data) // body data type must match "Content-Type" header
          });
          return response; // parses JSON response into native JavaScript objects
    }else{
        const response = await fetch(url, {
            method: 'POST', // *GET, POST, PUT, DELETE, etc.
            mode: 'cors', // no-cors, *cors, same-origin
            cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
            credentials: 'same-origin', // include, *same-origin, omit
            headers: {
              'Content-Type': 'application/json'
              // 'Content-Type': 'application/x-www-form-urlencoded',
            },
            redirect: 'follow', // manual, *follow, error
            referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
            body: JSON.stringify(data) // body data type must match "Content-Type" header
          });
          return response.json(); // parses JSON response into native JavaScript objects
    }
    // Default options are marked with *
    
  }
  

const Utils={
    isNumeric:function(val){
        return /^-?\d+$/.test(val);
    },
    strrev:function(str){
        return str.split("").reverse().join("");
    },
    encrypt_data:function(json){
        return btoa(Utils.strrev(btoa(Utils.strrev(btoa(json)))));
    },
    enc_form_data:function(id,has_file=null){
        //console.log(id)
        if(has_file==null){
            if(id.indexOf("frm-new-user")!==-1 || id.indexOf("frm-edit-user")!==-1){
                const formEntries = new FormData(document.getElementById(id)).entries();
                const json = Object.assign(...Array.from(formEntries, ([x,y]) => ({[x]:y})));
                //console.log(json)
                return Utils.encrypt_data(JSON.stringify(json));
            }else{
                //const frm_data=new FormData();
                const node_elements=document.forms[0].querySelectorAll("[name]");
                let obj_data=[];
                node_elements.forEach(elem=>{
                    // console.log(elem.type)
                    // console.log(elem.checked)
                    let apply=1;
                    if( (elem.type=="checkbox" & !elem.checked) ){
                        apply=0;
                    }

                    if(apply==1){
                        obj_data.push({name:elem.name,value:elem.value})
                    }
                    
                });
                return Utils.encrypt_data(JSON.stringify(obj_data));
                
            }
        }else{
            console.log("has file")
        }
        
        
    },
    confirmation:function(title_confirm,message_confirm,url,data){
        Notify.confirm({
            title :title_confirm,
            html :'<b>'+message_confirm+'</b>',
            ok :function(){
                Utils.send_data(url, data).then(response => {
                    // console.log(response)
                    Utils.notification(response.type,response.text)
                    // btn_submit.removeAttribute("disabled");
                    // btn_submit.innerHTML=btn_submit_ori
                    // Utils.notification(response.type,response.text)
                    // if(response.error==0){
                    //     window.location.href=response.next;
                    // }
                    
                });
                // Utils.send_data(url,data)
                // Notify.suc({
                //     title :'Success Title',
                //     text :'Success Message here'
                // });
            },
            cancel :function(){
                //Notify.alert('cancel');
            }
        });
            
    },
    notification:function(type,message){
        const notyf = new Notyf({
             duration: 3000,
            position: {
                x: 'right',
                y: 'top',
            },
            types: [
                {
                    type: 'warning',
                    background: 'orange',
                    dismissible: true,
                    duration: 3000,
                },
                {
                    type: 'error',
                    background: 'indianred',
                    dismissible: true,
                    duration: 3000,
                },
                {
                    type: 'success',
                    background: 'green',
                    dismissible: true,
                    duration: 3000,
                }
            ]
        });
        
        notyf.open({type:type,message:message});
        
        
    },
    send_data:async function(url = '', data = {}) {
        // Default options are marked with *
        const response = await fetch(url, {
            method: 'POST', // *GET, POST, PUT, DELETE, etc.
            mode: 'cors', // no-cors, *cors, same-origin
            cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
            credentials: 'same-origin', // include, *same-origin, omit
            headers: {
                'Content-Type': 'application/json'
                // 'Content-Type': 'application/x-www-form-urlencoded',
            },
            redirect: 'follow', // manual, *follow, error
            referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
            body: JSON.stringify(data) // body data type must match "Content-Type" header
            
        });
        //console.log(response.text())
        return response.json(); // parses JSON response into native JavaScript objects
        //return response;
    },
    show_modal:function(url,title){
        document.querySelector("#myModal > div > div > div.modal-body").innerHTML='';
        document.querySelector("#myModal > div > div > div.modal-header.bg-primary > h3").innerHTML=title;

        var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
            keyboard: false,
            backdrop:"static"
        })
        
        myModal.show()
        $("#myModal > div > div > div.modal-body").html('<div class="spinner-border text-success" style="width: 5rem; height: 5rem;" role="status"><span class="visually-hidden">Loading...</span></div>');
        $("#myModal > div > div > div.modal-body").load(url,function(){
            Utils.prepare_submit(document.getElementsByTagName("form")[0].id);
            Utils.prepare_modal_actions(document.getElementsByTagName("form")[0].id);
        })
        
        $('#myModal').on('hide.bs.modal', function () {
            Utils.clean_modal();
        })

        
    },
    clean_modal:function(){
        document.querySelector("#myModal > div > div > div.modal-body").innerHTML='';
        document.querySelector("#myModal > div > div > div.modal-header.bg-primary > h3").innerHTML='';
    },
    close_modal:function(){
        $("#myModal").modal("hide");
        document.querySelector("#myModal > div > div > div.modal-body").innerHTML='';
        document.querySelector("#myModal > div > div > div.modal-header.bg-primary > h3").innerHTML='';
    },
    init_select2:function(onModal=true){
        $("select[data-toggle='select2']").select2({
            dropdownParent: $('#myModal')
        })  
    },
    prepare_modal_actions:function(frm){
        
        if(frm=="frm-new-permission"){
            // Utils.init_select2();
            let modules=document.getElementsByName("module")[0];
            let dv_permissions=document.getElementsByClassName("dv-modules-permissions")[0];
            
            let module_permission=function(ref,module){
                return  '<div class="col-md-12 "><div class="row"><div class="col-md-3"><label >'+module+'</label></div><div class="col-md-1"><input type="checkbox" class="btn-check" id="'+module+'-chk-permission-see" name="permission[]" value="'+ref+'&1" checked="checked" onclick="javascript:return false;"><label class="btn btn-outline-primary" for="'+module+'-chk-permission-see"><i class="align-middle fas fa-solid fa-eye fa-lg"></i></label></div><div class="col-md-1"><input type="checkbox" class="btn-check" id="'+module+'-chk-permission-add" name="permission[]" value="'+ref+'&2" ><label class="btn btn-outline-primary" for="'+module+'-chk-permission-add"><i class="align-middle fas fa-solid fa-plus fa-lg"></i></label></div><div class="col-md-1"><input type="checkbox" class="btn-check" id="'+module+'-chk-permission-edit" name="permission[]" value="'+ref+'&3" ><label class="btn btn-outline-primary" for="'+module+'-chk-permission-edit"><i class="align-middle fas fa-solid fa-pen-to-square fa-lg"></i></label></div><div class="col-md-1"><input type="checkbox" class="btn-check" id="'+module+'-chk-permission-del" name="permission[]" value="'+ref+'&4" ><label class="btn btn-outline-primary" for="'+module+'-chk-permission-del"><i class="align-middle fas fa-solid fa-trash fa-lg"></i></label></div><div class="col-md-5"></div></div></div>'
            };
            modules=document.getElementsByName("module")[0]
            let opts_selected=[];
            
            modules.addEventListener("click",function(){
                [...modules.selectedOptions].map(option=>{
                    if(!opts_selected.includes(option.value)){
                        $(dv_permissions).append(module_permission(option.value,option.innerHTML));
                        opts_selected.push(option.value)
                    }
                })
            });
             
        }else if(frm=="frm-edit-permission"){
            console.log("aaa")
        }


    },
    prepare_submit:function(form_ref){
        let frm=document.getElementById(form_ref);
        if(form_ref.indexOf("new-user")!==-1 || form_ref.indexOf("edit-user")!==-1){
            
            let url=(form_ref.indexOf("new-user")!==-1)?'user_maintainer/save_user':'user_maintainer/update_user';
            //let loading=(form_ref.indexOf("new-user")!==-1)?'user_maintainer/save_user':'user_maintainer/update_user';
            frm.addEventListener("submit",function(evt){
                let btn_submit=frm.querySelector("button[type='submit']");
                btn_submit_ori=btn_submit.innerHTML;
                btn_submit.setAttribute("disabled",true);
                btn_submit.innerHTML="<span class='spinner-border text-light' style='height:1rem;width:1rem;'></span> Procesando...";

                let json_data={};
                let frm_data=Utils.enc_form_data(form_ref);
                // console.log(frm_data)
                json_data.data=frm_data;
                // console.log(json_data)
                Utils.send_data(url, json_data).then(response => {
                    // console.log(response)
                    btn_submit.removeAttribute("disabled");
                    btn_submit.innerHTML=btn_submit_ori
                    Utils.notification(response.type,response.text)
                    $(".tbl-users").DataTable().ajax.reload();
                    if(response.error==0){
                        Utils.close_modal();
                        //window.location.href=response.next;
                    }
                    
                });
                evt.preventDefault();
            })
        }else if(form_ref.indexOf("new-permission")!==-1 || form_ref.indexOf("edit-permission")!==-1){
            let url=(form_ref.indexOf("new-permission")!==-1)?'permissions_maintainer/save_permissions':'permissions_maintainer/update_permissions'; 
            frm.addEventListener("submit",function(evt){
                
                if(document.querySelectorAll(".dv-modules-permissions>div").length>0){
                    let btn_submit=frm.querySelector("button[type='submit']");
                    btn_submit_ori=btn_submit.innerHTML;
                    btn_submit.setAttribute("disabled",true);
                    btn_submit.innerHTML="<span class='spinner-border text-light' style='height:1rem;width:1rem;'></span> Procesando...";

                    let json_data={};
                    let frm_data=Utils.enc_form_data(form_ref);

                    // console.log(frm_data)
                    json_data.data=frm_data;

                    Utils.send_data(url, json_data).then(response => {
                        console.log(response)
                        btn_submit.removeAttribute("disabled");
                        btn_submit.innerHTML=btn_submit_ori
                        Utils.notification(response.type,response.text)
                        $(".tbl-permissions").DataTable().ajax.reload();
                        if(response.error==0){
                            Utils.close_modal();
                            //window.location.href=response.next;
                        }
                        
                    });

                    // btn_submit.innerHTML=btn_submit_ori;
                    // btn_submit.removeAttribute("disabled");
                }else{
                    Utils.notification("warning","Debe seleccionar al menos un modulo para generar permisos")
                }
                evt.preventDefault();
            })
        }else if(form_ref.indexOf("new-uf")!==-1 || form_ref.indexOf("edit-uf")!==-1){
            let url=(form_ref.indexOf("new-uf")!==-1)?'uf_maintainer/save':'uf_maintainer/update'; 
            frm.addEventListener("submit",function(evt){
                
                if(document.querySelectorAll(".dv-uf>div").length>0){
                    let btn_submit=frm.querySelector("button[type='submit']");
                    btn_submit_ori=btn_submit.innerHTML;
                    btn_submit.setAttribute("disabled",true);
                    btn_submit.innerHTML="<span class='spinner-border text-light' style='height:1rem;width:1rem;'></span> Procesando...";

                    let json_data={};
                    let frm_data=Utils.enc_form_data(form_ref);

                    // console.log(frm_data)
                    json_data.data=frm_data;

                    Utils.send_data(url, json_data).then(response => {
                        console.log(response)
                        btn_submit.removeAttribute("disabled");
                        btn_submit.innerHTML=btn_submit_ori
                        Utils.notification(response.type,response.text)
                        $(".tbl-uf").DataTable().ajax.reload();
                        if(response.error==0){
                            Utils.close_modal();
                            //window.location.href=response.next;
                        }
                        
                    });

                    // btn_submit.innerHTML=btn_submit_ori;
                    // btn_submit.removeAttribute("disabled");
                }else{
                    Utils.notification("warning","Debe llenar los campos")
                }
                evt.preventDefault();
            })
        }else{
            console.log("otro form")
        }
        
    },
    load_url:function(elem,url){
        $(elem).html('<div class="spinner-border text-success" style="width: 5rem; height: 5rem;" role="status"><span class="visually-hidden">Loading...</span></div>');
        $(elem).load(url,function(){
            let tbl_users       =document.getElementsByClassName("tbl-users");
            let tbl_permissions =document.getElementsByClassName("tbl-permissions");
            let tbl_uf          =document.getElementsByClassName("tbl-uf");
            
            if(tbl_uf.length==1){
                let html_button_new='<button class="btn btn-primary btn-new"><i class="align-middle me-2 fas fa-fw fa-plus"></i> Nueva UF</button>';
                
                $('.tbl-uf').DataTable({
                    responsive: true,
                    "lengthMenu": [ 10],
                    "bLengthChange": false,
                    processing: true,
	                order: [[1, 'desc']],
                    "language": {
                        "url": "assets/template/js/spanish.json"
                    },
                    ajax: {
                        url:"uf_maintainer/uf",
                        dataSrc: ''
                    },
                    "columnDefs": [ 
                        {
                            "targets": 0,
                            "orderable": false
                        },
                        {
                            "targets": 1,
                            "orderable": false
                        },
                        {
                            "targets": 2,
                            "orderable": false
                        }
                    ],
                    "initComplete": function(settings, json) {
                        // console.log(tbl_uf[0].getAttribute("data-permissions"))
                        let module_permissions=tbl_uf[0].getAttribute("data-permissions");
                        tbl_uf[0].removeAttribute("data-permissions");
                        let json_permissions=JSON.parse(atob(module_permissions));
                        let can_add=json_permissions.filter(permission => permission===2);
                        if(can_add.length==1){
                            $(".dataTables_wrapper > div:nth-child(1) > div:nth-child(1)").html(html_button_new);
                        }
                        
                        document.getElementsByClassName("btn-new")[0].addEventListener("click",function(){
                            Utils.show_modal("uf_maintainer/form_new",'<i class="align-middle me-2 fas fa-fw fa-plus"></i> Nueva UF');    
                        })

                        
                    },
                    
                });
               
            }else if(tbl_permissions.length==1){
                let html_button_new='<button class="btn btn-primary btn-new"><i class="align-middle me-2 fas fa-fw fa-plus"></i> Nuevo Permiso</button>';
                
                $('.tbl-permissions').DataTable({
                    responsive: true,
                    "lengthMenu": [ 10],
                    "bLengthChange": false,
                    processing: true,
	                order: [[3, 'desc']],
                    "language": {
                        "url": "assets/template/js/spanish.json"
                    },
                    ajax: {
                        url:"permissions_maintainer/permissions",
                        dataSrc: ''
                    },
                    
                    "initComplete": function(settings, json) {
                        // console.log(tbl_permissions[0].getAttribute("data-permissions"))
                        let module_permissions=tbl_permissions[0].getAttribute("data-permissions");
                        tbl_permissions[0].removeAttribute("data-permissions");
                        let json_permissions=JSON.parse(atob(module_permissions));
                        let can_add=json_permissions.filter(permission => permission===2);
                        if(can_add.length==1){
                            $(".dataTables_wrapper > div:nth-child(1) > div:nth-child(1)").html(html_button_new);
                        }
                        
                        document.getElementsByClassName("btn-new")[0].addEventListener("click",function(){
                            Utils.show_modal("permissions_maintainer/form_new_permission",'<i class="align-middle me-2 fas fa-fw fa-plus"></i> Nuevo Permiso');    
                        })

                        
                    },
                    
                });
            }
        })
        
    },
    option_event:function(option){
        let url;
        let action;
        let title;
        let message;
        let data;

        //console.log(option);
        let action_option=option.classList;

        if(document.getElementsByClassName("tbl-users").length==1){
            
            //let action_option=option.classList;
            if(action_option.contains("btn-edit")){
                title='<i class="align-middle me-2 fas fa-fw fa-edit"></i> Editar Usuario';
                url="user_maintainer/form_edit_user/"+option.getAttribute("data-ref");
                action="edit";
            }else if(action_option.contains("btn-del")){
                title="CONFIRMACION"
                message="Seguro que desea eliminar este usuario?";
                url="user_maintainer/delete_user/";
                data={"ref":option.getAttribute("data-ref")};
                action="del";
            }else{
                console.log("other action user");
            }
        }else if(document.getElementsByClassName("tbl-permissions").length>0){
            if(action_option.contains("btn-edit")){
                let a_btn=action_option[4].split("-");
                if(a_btn.length==2){
                    
                    if(Utils.isNumeric(a_btn[1])){
                        title='<i class="align-middle me-2 fas fa-fw fa-edit"></i> Editar Permiso';
                        url="permissions_maintainer/form_edit_permission/"+Utils.encrypt_data(a_btn[1]);
                        action="edit";
                    }
                    
                }
                
            }else if(action_option.contains("btn-del")){
                title="CONFIRMACION"
                message="Seguro que desea eliminar este usuario?";
                url="user_maintainer/delete_user/";
                data={"ref":option.getAttribute("data-ref")};
                action="del";
            }else{
                console.log("other action user");
            }
        }else if(document.getElementsByClassName("tbl-uf").length==1){
            
            //let action_option=option.classList;
            if(action_option.contains("btn-edit")){
                title='<i class="align-middle me-2 fas fa-fw fa-edit"></i> Editar UF';
                url="uf_maintainer/form_edit/"+option.getAttribute("data-ref");
                action="edit";
            }else if(action_option.contains("btn-del")){
                title="CONFIRMACION"
                message="Seguro que desea eliminar esta uf?";
                url="uf_maintainer/delete/";
                data={"ref":option.getAttribute("data-ref")};
                action="del";
            }else{
                console.log("other action user");
            }
        }else{
            console.log("otra tbl")
        }
        
        if(action=="edit"){
            Utils.show_modal(url,title)
        }else if(action=="del"){
            Utils.confirmation(title,message,url,data)
        }else{
            console.log("other action2")
        }
        
    }
}