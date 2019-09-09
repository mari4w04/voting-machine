<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
</head>
<body>
    <!-- index has login and signup option -->
    <h1>LOGIN</h1>
    <form id="frmLogin">
        <input type="text" name="txtLoginCpr" placeholder="phone"> <!-- CPR + password -->
        <input type="password" name="txtLoginPassword" placeholder="password">
        <button>login</button>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/login.js"></script>
</body>
</html>
