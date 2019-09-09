<?php
session_start();

unset($_SESSION['sUserId']);
unset($_SESSION['sUserName']);
session_destroy();

header("Location: ./../index.php");
