userlist = document.querySelector(".page .friend_list .all_friend"),
searchbar = document.querySelector(".page .friend_list .search input"),
searchbtn = document.querySelector(".page .friend_list .search button");

searchbar.onkeyup =()=>{
    let search_val = searchbar.value;

    if(search_val != ""){
        searchbar.classList.add("active");
    }else{
        searchbar.classList.remove("active");
    }

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./php/search.php");
    xhr.onload =()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                // console.log(data);
                userlist.innerHTML =  data;
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("search_val="+search_val);
}



setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "./php/chat_list.php");
    xhr.onload =()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(!searchbar.classList.contains("active")){
                    userlist.innerHTML =  data;
                }
                // console.log("Hello");
            }
        }
    }

    xhr.send();

},500);