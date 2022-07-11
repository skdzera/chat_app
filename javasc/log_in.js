const form = document.querySelector(".Sign-up .form_section form"),
selectbtn = form.querySelector(".submit_area .submit");

form.onsubmit= (e)=>{
    e.preventDefault();
}

selectbtn.onclick= ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./php/log_in.php", true);
    xhr.onload= ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data == "success"){
                    location.href = "./chat_list.php";
                    // console.log(data);
                }
            }
        }
    }

    let formdata = new FormData(form);
    xhr.send(formdata);
}