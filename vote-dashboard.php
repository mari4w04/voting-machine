<?php
    session_start();
    if( !isset($_SESSION['sUserId']) ){
        header('Location: login.php');
    }

$sUserId = $_SESSION['sUserId'];

$sData = file_get_contents('voters.json');
$jData = json_decode($sData);

if( $jData == null ){
    echo 'Error, check the database';
}




//echo $jData;
$jInnerData = $jData->data;

$jCandidatesStatistics = new stdClass();
// structure:
// "candidate": {
//        "candidateName": "",
//        "votes": 
// }


$aCandidates = array();

foreach($jInnerData as $jVoter){
    $sCandidate = $jVoter->vote->candidateName;
    if( in_array($sCandidate, $aCandidates) ) { // if in array, skip iteration
        continue;
    }
    $jCandidatesStatistics->$sCandidate = new stdClass();
    $jCandidatesStatistics->$sCandidate->votes = 0;
    array_push($aCandidates, $sCandidate);
    // echo($jCandidatesStatistics->$sCandidate->votes);
}

foreach($aCandidates as $sCandidate){
    foreach($jInnerData as $jVoter){
        if($jVoter->hasVoted == true){
            if($jVoter->vote->candidateName == $sCandidate){
                $jCandidatesStatistics->$sCandidate->votes++;
                // echo($jCandidatesStatistics->$sCandidate->votes);
            }
        }
    }
}

// print_r($aCandidates);


// foreach ($jInnerData as $jVoter) {
//     $jCandidatesStatistics->candidate = $jVoter->vote->candidateName;
//     echo $jCandidatesStatistics->candidate;
// }

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
      <a href="login"><img class="logo" src="images/logo.svg"></a>
      
      <a href="apis/logout.php">Log out</a>
      <h6>Hi <?= $jInnerData->$sUserId->firstName ?></h6>
  </nav>

<div class="content">

    <?php
        $jVoteInfo = $jInnerData->$sUserId->vote->candidateName;
        $name = explode(" ", $jVoteInfo);
        $firstname = strtolower($name[0]);
        $lastname = strtolower($name[1]);
        echo "<div class='card'>
                <h1>Thank you for your vote!</h1>
                <div class='candidate'>
                    <img src='images/$firstname-$lastname.jpg'>
                    <div class='vote-results'>You voted for $jVoteInfo </div>
                </div>
            </div>"
    ?>

    <div>
    <div class='card'>

        <h1>Vote Statistics</h1>
        <div class="candidate-row">
    <?php
        foreach($aCandidates as $sCandidate=>$sName){
            $parts = explode(" ", $sName);
            $lastname = array_pop($parts);
            $firstname = implode(" ", $parts);

            $iVotes = $jCandidatesStatistics->$sName->votes;
            echo "<div class='candidate'>
                    <img src='images/$firstname-$lastname.jpg'>
                    <h2>$sName</h2>
                    <h2>$iVotes</h2>
                </div>
            ";
        }

    ?>
    </div>

    </div>

  </div>



</div>

    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/vote.js"></script>
</body>
</html>