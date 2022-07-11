const form = document.querySelector(".Sign-up .form_section form"),
selectbtn = form.querySelector(".submit_area .submit");

form.onsubmit= (e)=>{
    e.preventDefault();
}

selectbtn.onclick= ()=>{
    // start Ajax

    let xhr = new XMLHttpRequest(); // creating XML object
    xhr.open("POST","./php/sign_up.php", true);
    xhr.onload= ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data == "success"){
                    location.href= "./chat_list.php";
                }
            }
        }
    }
    // we have to sent the form data through ajax to php
     // creating new formdata object
    let formData = new FormData(form);
    xhr.send(formData);
}
