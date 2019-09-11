<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="login-page">
    <nav>
        <a href="login">Login</a>
        <div class="line-separator"></div>
        <a href="signup">Signup</a>
    </nav>
    <div class="form-container">
        <h1>Sign up for voting</h1>
        <form id="frmRegister">
            <input name="txtFirtstName" id="txtFirstName" type="text" placeholder="Your first name">
            <input name="txtLastName" id="txtLastName" type="text" placeholder="Your last name">
            <input name="txtCpr" id="txtCpr" type="text" placeholder="CPR number*" value="">
            <input name="password" id="password" type="password" placeholder="Password*" value="">
            <input name="confirmPassword" id="confirmPassword" type="password" placeholder="Type password again*" value="">
            <button class="frmButton">Sign up</button>
        </form>
    </div>


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="js/register.js"></script>

</body>
</html>