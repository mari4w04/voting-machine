<?php

ini_set('display_errors', 0);

// validate first name
$sFirstName = $_POST['txtFirtstName'] ?? '';
if( empty($sFirstName) ){ fnvSendResponse(0, __LINE__, 'First name field cant be empty');  }
if( strlen($sFirstName) < 2 ){ fnvSendResponse(0, __LINE__, 'First name has to contain at least 2 letters'); }
if( strlen($sFirstName) > 20 ){ fnvSendResponsee(0, __LINE__, 'First name cannot contain more than 20 letters'); }

// validate last name
$sLastName = $_POST['txtLastName'] ?? '';
if( empty($sLastName) ){ fnvSendResponse(0, __LINE__, 'Last name field cant be empty');  }
if( strlen($sLastName) < 2 ){ fnvSendResponse(0, __LINE__, 'Last name has to contain at least 2 letters'); }
if( strlen($sLastName) > 20 ){ fnvSendResponse(0, __LINE__, 'Last name cannot contain more than 20 letters'); }

// validate CPR
$iCPR = $_POST['txtCpr'] ?? '';
if( empty($iCPR) ){ fnvSendResponse(0, __LINE__,'CPR field cant be empty');  }
if( strlen($iCPR) != 10 ){ fnvSendResponse(0, __LINE__,'CPR has to be at least 10 numbers'); }
if( !ctype_digit($iCPR)  ){ fnvSendResponse(0, __LINE__,'CPR can only contain digits');  }

// validate password
$password = $_POST['password'] ?? '';
if( empty($password) ){ fnvSendResponse(0, __LINE__,'Password field cant be empty');  }
if( strlen($password) < 4 ){ fnvSendResponse(0, __LINE__,'Password has to be at least 4 characters'); }
if( strlen($password) > 50 ){ fnvSendResponse(0, __LINE__,'Password cant be longer than 50 characters'); }

// validate confirm password
$confirmPassword = $_POST['confirmPassword'] ?? '';
if(empty($confirmPassword)){fnvSendResponse(0, __LINE__,'Confirm password field cant be empty');}
if($password != $confirmPassword){fnvSendResponse(0, __LINE__,'Passwords doesnt match');}
$sData = file_get_contents('../voters.json');
$jData = json_decode($sData);

if($jData == null){fnvSendResponse(0, __LINE__,'json data corrupt'); }
$jInnerData = $jData->data; //from the data obj. - point to the obj. inside = the id/phone
$jClient = new stdClass(); // json empty obj.
$jClient->firstName = $sFirstName;
$jClient->lastName = $sLastName;
$jClient->password = password_hash($password, PASSWORD_DEFAULT);
$jClient->hasVoted = false;
$jInnerData->$iCPR = $jClient; // put the jClient ID/phone inside the jInnerData

//convert the obj. back to text and check the file 
$sData = json_encode($jData, JSON_PRETTY_PRINT);

if($sData == null){fnvSendResponse(0, __LINE__,'json data corrupt'); }
//put it back in the file
file_put_contents('../voters.json', $sData);
fnvSendResponse(1,__LINE__, 'You have succesfully registered');
header("Location:../login.php");

// **************************************************
function fnvSendResponse( $iStatus, $iLineNumber, $sMessage ){
    echo '{"status":'.$iStatus.', "code":'.$iLineNumber.',"message":"'.$sMessage.'"}';
    exit;
  }