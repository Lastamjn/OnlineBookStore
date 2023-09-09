<?php
    session_start();

    $_SESSION['username']="lasta";
    $_SESSION['password']="12345";
    $_SESSION['email']="lasta@gmail.com";
    echo "Session data is saved";
?>