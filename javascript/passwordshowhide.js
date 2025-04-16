let eyeicon = document.getElementById("eyeicon");
let password = document.getElementById("password");
eyeicon.onclick =()=>{
    if(password.type == "password"){
        password.type = "text";
        eyeicon.classList.add("active");  
    }
    else{
        password.type ="password";
        eyeicon.classList.remove("active");  
    }
} 