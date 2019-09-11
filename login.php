<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Login</h1>
    
    <form id="frmLogin" action='apis/api-login' method="POST">
        <input name="txtLoginCPR" type="text" placeholder="Your CPR" >
        <input name="txtLoginPassword" type="password" placeholder="password">
        <button>Login</button>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/login.js"></script>
</body>
</html>