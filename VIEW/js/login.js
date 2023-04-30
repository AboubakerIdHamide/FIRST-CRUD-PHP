// message configuration
let myDiv=document.querySelector(".msgBox");
if(msg!=""){
     myDiv.textContent=msg;
     myDiv.classList.remove("hide");
}else{
    myDiv.classList.add("hide");
}


// afficher | masquer mot de passe 
let showSpan=document.querySelector(".afficher"),
pwIn=document.querySelector("#pw");

pwIn.addEventListener("keyup", ()=>{
    if(pwIn.value==""){
        showSpan.style.display='none';
    }else{
        showSpan.style.display='block';
    }
})

showSpan.onclick=()=>{
    if(showSpan.classList.contains("masquer")){
        showSpan.textContent="Afficher";
        showSpan.classList.remove("masquer");
        pwIn.type="password";
    }else{
        showSpan.textContent="Masquer";
        showSpan.classList.add("masquer");
        pwIn.type="text";
    }
}