<?php
    session_start();
    if( !isset($_SESSION['sUserId']) ){
        header('Location: login.php');
    }

    $sUserId = $_SESSION['sUserId'];
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    Welcome to voting

    <div class="candidate-row">
        <div class="candidate">
        Candidate 1
        <button class='vote-btn' data-cand='cand1'>Vote for candidate 1</button>
        </div>

        <div class="candidate">
        Candidate 2
        <button class='vote-btn' data-cand='cand2'>Vote for candidate 2</button>
        </div>

        <div class="candidate">
        Candidate 3
        <button class='vote-btn' data-cand='cand3'>Vote for candidate 3</button>
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/vote.js"></script>
</body>
</html>