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

// $jVoteInfo = $jInnerData->$sUserId->vote->candidateName;
// echo json_encode($jVoteInfo, JSON_PRETTY_PRINT );

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
    <link rel="stylesheet" href="css/white-theme.css">
</head>
<body>
  <nav>  
      <h6>Hi, <?= $jInnerData->$sUserId->firstName, ' ', $jInnerData->$sUserId->lastName?></h6>
      <div class="line-separator"></div>
      <a href="apis/logout.php">Log out</a>
  </nav>

<div class="content">
  
   <?php

if ($jInnerData->$sUserId->hasVoted == true){
  $jVoteInfo = $jInnerData->$sUserId->vote->candidateName;
  $name = explode(" ", $jVoteInfo);
  $firstname = strtolower($name[0]);
  $lastname = strtolower($name[1]);

  echo "
  <div class='card'>
    <h1>Thank you for your vote!</h1>

    <div class='candidate'>
      <img src='images/$firstname-$lastname.jpg'>
      <div>You voted for $jVoteInfo </div>
      <div><a href='vote-dashboard.php'><button>See vote statistics</button></a><div>
    </div>

  </div>
  ";
} else {
  echo '
  <div class="card">
  <h1>Select your candidate</h1>
    <div class="candidate-row">
      <div class="candidate">
        <img src="images/cory-booker.jpg">
        <div class="name-container">
          <div class="name-tag">Cory Booker</div>
        </div>
        <button class="vote-btn" data-cand="Cory Booker">Vote</button>
      </div>

      <div class="candidate">
        <img src="images/joe-biden.jpg">
        <div class="name-container">
          <div class="name-tag">Joe Biden</div>
        </div>
        <button class="vote-btn" data-cand="Joe Biden">Vote</button>
      </div>

      <div class="candidate">
        <img src="images/kirsten-gillibrand.jpg">
        <div class="name-container">
          <div class="name-tag">Kirsten Gillibrand</div>
        </div>
        <button class="vote-btn" data-cand="Kirsten Gillibrand">Vote</button>
      </div>

      <div class="candidate">
        <img src="images/michael-bennet.jpg">
        <div class="name-container">
          <div class="name-tag">Michael Bennet</div>
        </div>
        <button class="vote-btn" data-cand="Michael Bennet">Vote</button>
      </div>

      <div class="candidate">
        <img src="images/tulsi-gabbard.jpg">
        <div class="name-container">
          <div class="name-tag">Tulsi Gabbard</div>
        </div>
        <button class="vote-btn" data-cand="Tulsi Gabbard">Vote</button>
      </div>
    </div>
  </div>';
      
}

?>
</div>

    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/vote.js"></script>
</body>
</html>