<?php

// validate name
$firstName = $_POST['firstName'] ?? '';
if( empty($firstName) ){ fnvSendResponse(0, __LINE__,'Name field cant be empty');  }
if( strlen($firstName) < 2 ){ fnvSendResponse(0, __LINE__,'Name has to be at least 2 characters'); }
if( strlen($firstName) > 20 ){ fnvSendResponse(0, __LINE__,'Name cant be longer than 20 characters'); }

// validate last name
$lastName = $_POST['lastName'] ?? '';
if( empty($lastName) ){ fnvSendResponse(0, __LINE__,'Last name field cant be empty');  }
if( strlen($lastName) < 2 ){ fnvSendResponse(0, __LINE__,'Last name has to be at least 2 characters'); }
if( strlen($lastName) > 20 ){ fnvSendResponse(0, __LINE__,'Last name cant be longer than 20 characters'); }

// validate email
$email = $_POST['email'] ?? '';
if( empty($email) ){ fnvSendResponse(0, __LINE__,'Email field cant be empty'); }
if( !filter_var( $email, FILTER_VALIDATE_EMAIL ) ){ fnvSendResponse(0, __LINE__,'Not a valid email'); }

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
if( empty($confirmPassword) ){ fnvSendResponse(0, __LINE__,'Confirm password field cant be empty');  }
if( $password != $confirmPassword ){ fnvSendResponse(0, __LINE__,'Passwords doesnt match');  }










