<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Abel&display=swap');
    </style> 
    <style>
        *{
            margin : 0;
            padding : 0;
            box-sizing : border-box;
        }
        .container{
            height : 100px;
            display : flex;
            justify-content : center;
            align-items : center;
        }
        h1{
            font-family: "Oswald", sans-serif;
        }
        body {
            background: linear-gradient(to right, #e2e2e2,rgb(137, 156, 216));
            font-family: "Abel", sans-serif;
        }
        .navbar{
            display:flex;
            justify-content : center;
        }
        a{
            border : 2px solid rgba(0, 0, 0, 0.26);
            background-color:rgb(65, 120, 215);
            margin : 2px;
            padding: 10px 15px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
            text-decoration : none;
            color : white;
        }
        a:hover {
            background-color:rgb(42, 70, 118);
        }
        
    </style>
</head>
<body>
    <div class="container">
        <h1>THANKS FOR SUBMITTING!!</h1>
    </div>
    <div class="navbar">
        <a href="sellerhomepage.php">HomePage</a>
    </div>
</body>
</html>