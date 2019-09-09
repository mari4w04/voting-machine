<?php

// validate CPR
$cpr = $_POST['cpr'] ?? '';
if( empty($cpr) ){ fnvSendResponse(0, __LINE__,'CPR field cant be empty');  }
if( strlen($cpr) != 10 ){ fnvSendResponse(0, __LINE__,'CPR has to be at least 10 numbers'); }
if( !ctype_digit($cpr)  ){ fnvSendResponse(0, __LINE__,'CPR can only contain digits');  }

// validate password
$password = $_POST['password'] ?? '';
if( empty($password) ){ fnvSendResponse(0, __LINE__,'Password field cant be empty');  }
if( strlen($password) < 4 ){ fnvSendResponse(0, __LINE__,'Password has to be at least 4 characters'); }
if( strlen($password) > 50 ){ fnvSendResponse(0, __LINE__,'Password cant be longer than 50 characters'); }

// validate confirm password
$confirmPassword = $_POST['confirmPassword'] ?? '';
if(empty($confirmPassword)){fnvSendResponse(0, __LINE__,'Confirm password field cant be empty');}
if($password != $confirmPassword){fnvSendResponse(0, __LINE__,'Passwords doesnt match');}


//when all is validated, open the file and check it for corruption
$sData = file_get_contents('voters.json');
$jData = json_decode($sData);
if($jData == null){fnvSendResponse(0, __LINE__,'json data corrupt'); }

$jInnerData = $jData->data; //from the data obj. - point to the obj. inside = the id/phone

$jClient = new stdClass(); // json empty obj.
$jClient->cpr = $sCpr;
$jClient->password = password_hash($sPassword, PASSWORD_DEFAULT);

$jInnerData->$cpr = $jClient; // put the jClient ID/phone inside the jInnerData


//convert the obj. back to text and check the file 
$sData = json_encode($jData, JSON_PRETTY_PRINT);
if($sData == null){fnvSendResponse(0, __LINE__,'json data corrupt'); }
//put it back in the file
file_put_contents('voters.json', $sData);


// SUCCESS
fnvSendResponse(1,__LINE__, 'You have succesfully registered');

// **************************************************
function fnvSendResponse( $iStatus, $iLineNumber, $sMessage ){
    echo '{"status":'.$iStatus.', "code":'.$iLineNumber.',"message":"'.$sMessage.'"}';
    exit;
  }



?>




