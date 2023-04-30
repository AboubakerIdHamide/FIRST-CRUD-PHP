<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        *{
            margin: 0px;
            padding: 0px;
        }
        nav{
            z-index: 7;
            display: flex;
            position: fixed;
            width: 250px;
            height: calc(100vh - 100px);
            top: 100px;
            transition: all 1s;
        }
        nav li{
            list-style: none;
        }
        nav ul{
            overflow: hidden;
            height: 100%;
            width: 96%;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
        }
        nav ul span{
            width: 96%;
            height: 40px;
            background-color: #be936a;
            color: #fff;
            display: grid;
            place-items: center;
            letter-spacing: 2px;
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        nav ul li{
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
        }
        nav ul li ul li{
            transition: all .8s;
            height: 30px;
            display: grid;
            font-size: 13px;
            place-items: center;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
        nav ul li ul{
            background-color: #fff;
        }
        a img{
            width: 14px;
            height: 14px;
            margin-right: 15px;

        }
        a{
            text-decoration: none;
            color: #000;
            margin-left: 10px;
            width: 200px;
        }
        nav ul li ul li:hover{
            transform: scale(1.2) translateX(20px);
        }
        nav button{
            width: 4%;
            height: 100%;
            background-color:transparent;
            color: transparent;
            border: none;
            position: relative;
        }
        nav .actvBar{
            content: "";
            width: 11px;
            height: 11px;
            border: 3px solid #fff;
            background-color: transparent;
            position: absolute;
            border-bottom: none;
            border-left: none;
            top: 50%;
            left: -50%;
            cursor: pointer;
            transition: all 1s;
            transform: rotate(45deg) translate(-50%, -50%);
        }
        .switch{
            transform:rotate(225deg) !important;
        }

        .hideBar{
            transform: translateX(-240px);
        }
    </style>
</head>
<body>
   <nav class="hideBar">
       <ul>
           <li>
               <span>Gestion Etudiant</span>
               <ul>
                   <li><a href="index.php?path=newStudent"><img src="view/images/user-plus-solid.svg"> Nouveau Etudiant</a></li>
                   <li><a href="index.php?path=deleteStudent"><img src="view/images/user-times-solid.svg"> Suppression Etudiant</a></li>
                   <li><a href="index.php?path=editStudent"><img src="view/images/edit-solid.svg"> Modification Etudiant</a></li>
                   <li><a href="index.php?path=findStudent"><img src="view/images/magnifying-glass-solid.svg"> Recherche Etudiant</a></li>
                   <li><a href="index.php?path=showStudent"><img src="view/images/users-solid.svg"> Liste Etudient</a></li>
               </ul>
           </li>
           <li>
           <span>Gestion Livre</span>
               <ul>
                   <li><a href="index.php?path=newBook"><img src="view/images/plus-solid.svg"> Nouveau Livre</a></li>
                   <li><a href="index.php?path=deleteBook"><img src="view/images/xmark-solid.svg"> Suppression Livre</a></li>
                   <li><a href="index.php?path=editeBook"><img src="view/images/edit-solid.svg"> Modification Livre</a></li>
                   <li><a href="index.php?path=findBook"><img src="view/images/magnifying-glass-solid.svg"> Recherche Livre</a></li>
                   <li><a href="index.php?path=showbook"><img src="view/images/list-solid.svg"> Liste Livre</a></li>
               </ul>
           </li>
           <li>
           <span>Gestion Des Emprunts</span>
               <ul>
                   <li><a href="index.php?path=newEnp"><img src="view/images/plus-solid.svg"> Emprunter un livre</a></li>
                   <li><a href="index.php?path=returnE"><img src="view/images/arrow-left-solid.svg"> Retour D'un Livre</a></li>
                   <li><a href="index.php?path=showBookE"><img src="view/images/list-solid.svg"> Liste Emprunts</a></li>
               </ul>
           </li>

       </ul>
       <button><span class="actvBar"></span></button>
   </nav> 

   <script>
       let barBtn=document.querySelector("nav button");
       barBtn.addEventListener("click", ()=>{
            document.querySelector("nav").classList.toggle("hideBar");
            document.querySelector(".actvBar").classList.toggle("switch");
            document.querySelector(".actvBar").classList.remove("animateMe");
       })

       let path=window.location.href.slice(-9,);
       console.log(path)
       if(path=="index.php"){
            document.querySelector(".actvBar").classList.add("animateMe");
        }
       
   </script>
</body>
</html>