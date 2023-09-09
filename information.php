<?php
    session_start();
    if(isset($_SESSION['username'])){
    echo "Welcome ".$_SESSION['username'];
    echo "Welcome ".$_SESSION['password'];
    echo "Welcome ".$_SESSION['email'];        
    }else{
        echo "Please login again to continue";
    }
?>