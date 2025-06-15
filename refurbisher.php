<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap');
    </style>
    <style>
        *{
            margin :0;
            padding:0;
            box-sizing : border-box;
        }
        .container{
            height : 80vh;
            display : flex;
            justify-content : center;
            align-items : center;
        }
        body{
            background: linear-gradient(to right, #e2e2e2,rgb(137, 156, 216));
            font-family: "Oswald", sans-serif;
        } 
        a{
            font-size : 50px;
            text-decoration : none;
            color : black;
            padding : 20px;
            margin : 15px;
            border: solid 3px rgba(0, 0, 0, 0.29);
            background : rgba(117, 233, 107, 0.81);
            border-radius : 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        a:hover{
            background : rgba(86, 172, 78, 0.81);
        }
        .logout{
            margin:1rem;
            display : flex;
            flex-direction : row-reverse;
        }
        .log{
            background-color:rgb(202, 66, 66);
            border: none;
            padding: 10px 15px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
            text-decoration : none;
            color : white;
        }
        .log:hover {
            background-color:rgb(171, 15, 15);
        }
    </style>
</head>
<body>
    <div class="logout">
            <a class="log" href="logout.php">Logout</a>
    </div>
    <div class="container">
        <a href="refurb_buy.php">Buy E-Waste</a>
        <a href="refurb_listing.php">Sell refurbished tech</a>
    </div>
    
</body>
</html>