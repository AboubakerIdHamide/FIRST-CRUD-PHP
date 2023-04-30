// global variables
let msgBox=document.querySelector(".msgBox");
let valeurIn=document.querySelector("#valeurIn"),
critereIn=document.querySelector("#critereIn"),
MySection=document.querySelector("#MySection");

valeurIn.addEventListener("keyup", function(){
    let requestObj=new XMLHttpRequest();
    requestObj.onreadystatechange=function(){
        if(this.status=200 && this.readyState==4){
            console.log(this.responseText)
            if(this.responseText!="Aucun resultat."){
                msgBox.textContent="Voici les resultat ."
                if(msgBox.classList.contains("invalid")){
                    msgBox.classList.remove("invalid");
                }
                msgBox.classList.add("valid");
                MySection.innerHTML=this.responseText;
            }else{
                msgBox.textContent="Aucun resultat.";
                MySection.innerHTML="";
                if(msgBox.classList.contains("valid")){
                    msgBox.classList.remove("valid");
                }
                msgBox.classList.add("invalid");
            }
            msgBox.classList.remove("hide");
        }
    }
    
    requestObj.open("POST","CONTROLL/rechercheAjax.php", true);
    requestObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    if(critereIn.value!=""  && valeurIn.value!=""){
        requestObj.send(`critere=${critereIn.value}&valeur=${valeurIn.value}&searchType=etudient`)
    }
})