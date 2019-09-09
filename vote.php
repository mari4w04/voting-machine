<?php
    session_start();
    if( !isset($_SESSION['sUserId']) ){
        header('Location: login.php');
    }

    $sUserId = $_SESSION['sUserId'];

$sData = file_get_contents('voters.json');
$jData = json_decode($sData);
//echo $jData;
$jInnerData = $jData->data;
//$sUserId = $jInnerData->
//$jClient = $jInnerData->$sUserId;
$jVoteInfo = $jInnerData->cpr->vote->candidateName;
echo json_encode($jVoteInfo);
if( $jData == null ){
  echo 'Error, check the database';
}
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
   <?php

if ($jInnerData->cpr->hasVoted == true){
  echo '<h1>You have already voted for this election</h1>

  <div>You voted for <?= $jVoteInfo ?> </div> ';
}else{
  echo 'you need to vote';
}

?>

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