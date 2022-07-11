const form = document.querySelector(".msg_send"),
inputfield = form.querySelector(".type_msg input"),
sendbtn = form.querySelector(".msg_send_img button"),
msgfield = document.querySelector(".chat_page .chat_space");

form.onsubmit = (e)=>{
    e.preventDefault();
}

sendbtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/chat.php", true);
    xhr.onload =()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                // console.log(data);
                inputfield.value= "";
            }
        }
    }

    let formdata = new FormData(form);
    xhr.send(formdata);
} 


setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/do_chat.php", true);
    xhr.onload =()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                msgfield.innerHTML = data;
            }
        }
    }
    let formdata = new FormData(form);
    xhr.send(formdata);
},500);
