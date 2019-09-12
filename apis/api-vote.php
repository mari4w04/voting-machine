<?php
session_start();
if( !isset($_SESSION['sUserId'] ) ){
    sendResponse(-1, __LINE__, 'You must login to use this api');
  }

if( empty( $_GET['candidate'] ) ){ sendResponse(-1, __LINE__, 'Candidate missing'); }

$sCandidate = $_GET['candidate'] ?? '';

$sData = file_get_contents('../voters.json');
$jData = json_decode( $sData );

if( $jData == null){ sendResponse(-1, __LINE__, 'Cannot convert data to JSON');  }

$jInnerData = $jData->data;

$sUser = $_SESSION['sUserId'] ;

if ($jInnerData->$sUser->hasVoted == true){
  header("Location: vote.php");
  echo 'you already voted';
  exit();
}

$jInnerData->$sUser->hasVoted = true;
$jVote = new stdClass(); //json object
$jVote->voteId = uniqid();
$jVote->candidateName = $sCandidate;

$jInnerData->$sUser->vote = $jVote;
$jInnerData->$sUser->hasVoted = true;


file_put_contents('../voters.json', json_encode($jData, JSON_PRETTY_PRINT));

sendResponse( 1, __LINE__ , 'Vote registered'  );
header('Location:vote.php');

function sendResponse($iStatus, $iLineNumber, $sMessage){
    echo '{"status":'.$iStatus.', "code":'.$iLineNumber.',"message":"'.$sMessage.'"}';
    exit;
}