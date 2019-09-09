<?php
//session_start();
//if( !isset($_SESSION['sUserId'] ) ){
//  header('Location: login');
//}
//$sUserId = $_SESSION['sUserId'];

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

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <?php

if ($jInnerData->cpr->hasVoted == true){
  echo '<h1>You have already voted for this election</h1>

  <div>You voted for <?= $jVoteInfo ?> </div> ';
}else{
  echo 'you need to vote';
}

?>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
// swal("Thank you!", "Your vote has been added", "success");




</script>


</html>