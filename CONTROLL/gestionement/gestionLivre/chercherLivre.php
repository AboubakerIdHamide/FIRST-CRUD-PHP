<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            background-size: cover;
            background-attachment: fixed;
            overflow-y: auto;
            overflow-x: hidden;
        }
        body::-webkit-scrollbar{
            width: 5px;
            background-color: #bfa47b;
        }
        body::-webkit-scrollbar-thumb{
            background-color: #fff;
        }
        section{
            margin-top: 100px;
            width: 100%;
            min-height: calc(96vh - 100px);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .searchTable{
            border-radius: 2px;
            margin-left: 60px;
            padding:20px;
            width: 800px;
            height: 300px;
            background-color:  rgb(0,0,0,0.5);
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        input, select{
            border-radius: 2px;
            width: 300px;
            height: 40px;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            outline: none;
            border: none;
            text-indent: 20px;
        }
        input[type="submit"]{
            width: 100px;
            height: 40px;
            outline: none;
            border: none;
            text-indent: 0px;
            background-color: #fff;
            color: #000;
            border-radius: 3px;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 17px;
            transition: all 1s;
        }
        input[type="submit"]:hover{
            transform: scale(1.2);
            background-color: #000;
            color: #fff;
        }
        td{
            min-width: 130px;
            color: #fff;
            text-align: center;
        }

        .msgBox{
            height: 40px;
        }
        .invalid{
            background-color: #ff174480;
            color: #fff;
        }
        .valid{
            background-color: #3cf38780;
            color: #fff;
        }

        .hide{
            display: none;
        }

        .tResult{
            margin-left: 60px;
            border-radius: 2px;
            width: 800px;
            min-height: 150px;
            background-color: rgb(0, 0, 0, 0.5);
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        .tResult thead td{
            background-color: #3cf38780;
            color: #fff;
            text-align: center;
            min-height: 45px;
            font-family: cursive;
            font-size: 16px;
            border: 1px solid #fff;
            padding: 10px;
        }
        .tResult tbody td{
            text-align: center;
            min-height:35px;
            padding: 5px;
            background-color:rgb(0, 0, 0, 0.5);
            font-size: 14px;
            color: #fff;
            border: 1px solid #fff;
            font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }
        .tResult tbody tr{
            transition:all 1s;
        }
        .tResult tbody tr:hover{
            background-color: #bfa47b !important;
        }
    </style>
</head>
<body>
    <section>
        <table class="searchTable">
            <form action="index.php?path=findBook" method="post">
                <tr>
                    <td colspan="2"  class="msgBox hide"></td>
                </tr>
                <tr>
                    <td>Critére :</td>
                    <td><select name="critere" id="critereIn">
                        <option value="code">Code</option>
                        <option value="titre">Titre</option>
                        <option value="auteur">Auteur</option>
                        <option value="dateEdition">Date Edition</option>
                    </select>
                </td>
                </tr>
                <tr>
                    <td>Valeur :</td>
                    <td><input type="text" name="valeur" placeholder="Saisir une valeur a chercher..." required id="valeurIn"></td>
                </tr>
            </form>
        </table>
        <div id="MySection"></div>
    </section>
    <script src="VIEW/js/rechercheAjaxLivre.js"></script>
</body>
</html>