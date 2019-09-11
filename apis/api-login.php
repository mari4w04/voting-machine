<?php

ini_set('display_errors',0);

$sCPR = $_POST['txtLoginCPR'] ?? '';
if( empty($sCPR) ){
    sendResponse(0,__LINE__);
}
$sPassword = $_POST['txtLoginPassword'] ?? '';

$sData = file_get_contents('../voters.json');
$jData = json_decode($sData);
if($jData ==null){
    sendResponse(0,__LINE__);
}
$jInnerData = $jData->data;

if( !password_verify( $sPassword,  $jInnerData->$sCPR->password)  ){ sendResponse(0, __LINE__); }

//SUCCESS
session_start();
$_SESSION['sUserId'] = $sCPR;
sendResponse(1,__LINE__);

//*******************************

function sendResponse($bStatus, $iLineNumber){
    echo '{"status":'.$bStatus.', "code":'.$iLineNumber.'}';
    exit;
}