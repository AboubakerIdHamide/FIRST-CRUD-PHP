<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>

header{
            background-color:rgb(0, 0, 0, 0.3);
            height: 100px;
            display: flex;

            align-items: center;
            width: 100%;
            position: fixed;
            top: 0px;
            left: 0;

        }
        header ul{
            display: flex;
            width: 75%;
            align-items: center;
            justify-content: space-evenly;
        }
        header ul li{
            list-style: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            transition: .8s;
            background-color: #be936a;
            position: relative;
            opacity: 0.5;
        }
        header ul li:first-child{
            opacity: 1;
        }
        header ul li img{
            width: 25px;
            height: 25px;
            position: absolute;
            transform: translate(-50%,-50%);
            top: 50%;
            left: 50%;
        }

        header ul li:hover{
            transform: scale(1.2);
            opacity: 1;
        }

        header div{
            margin:0 10px;
            width: 25%;
        }
        .logo{
            display: flex;
            justify-content:center;
            align-items: flex-end;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #be936a;

        }
        
        .logo span{
            font-size: 90px;
        }
        .logo h1{
            margin:15px 0px;
        }
    </style>
</head>
<body>
<header>
       <div class="logo"><span>TP</span><h1> PHP CRUD</h1></div>
       <ul>
           <li><a href="index.php"><img src="view/images/home-solid.svg" alt="h"></a></li>
           <li><a href="login.php"><img src="view/images/user-solid.svg" alt="h"></a></li>
           <li><a href="register.php"><img src="view/images/user-plus-solid.svg" alt="h"></a></li>
           <li><a href="logout.php"><img src="view/images/sign-out-alt-solid.svg" alt="h"></a></li>
       </ul>
   </header>
</body>
</html>