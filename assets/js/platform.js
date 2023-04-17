window.addEventListener('load', function () {
    let frm_login   =document.getElementById("frm-login");
    let main_content=document.getElementsByClassName("content");
    if(frm_login!==null){
        let btn_submit=frm_login.querySelector("button");

        frm_login.addEventListener("submit",function(evt){
            btn_submit_ori=btn_submit.innerHTML;
            btn_submit.setAttribute("disabled",true);
            btn_submit.innerHTML="<span class='spinner-border text-light' style='height:1rem;width:1rem;'></span> Verificando...";
            let json_data={};
            let frm_data=Utils.enc_form_data("frm-login");
            json_data.data=frm_data;
            
            Utils.send_data('login/verify_login', json_data).then(response => {
                btn_submit.removeAttribute("disabled");
                btn_submit.innerHTML=btn_submit_ori
                Utils.notification(response.type,response.text)
                if(response.error==0){
                    window.location.href=response.next;
                }
                
            });

            evt.preventDefault()
        })
    }else if(main_content!==null){
        let node_menu=document.querySelectorAll("ul.sidebar-nav>li.sidebar-item");
        let sidebar_left=document.getElementById("sidebar");//.classList.contains("collapsed")
        node_menu.forEach(element=>{
            if(element.querySelector("a").getAttribute("data-bs-target")!==""){
                element.addEventListener("click",function(){
                    document.querySelectorAll("ul.sidebar-nav>li.sidebar-item.active")[0].classList.remove("active");
                    element.classList.add("active");
                    Utils.load_url(".content",element.querySelector("a").getAttribute("data-bs-target"))
                    if(sidebar_left.classList.contains("collapsed")){
                        sidebar_left.classList.remove("collapsed") 
                    }
                })
            }
        })
    }

    
})

document.addEventListener("DOMContentLoaded", function() {})