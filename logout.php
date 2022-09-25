<?php 
//contians all the connections and fucnitons with the databse 
require('conectiondatabaseassignment.php');

//this helps to logout the user and go the index page 
if(loggedIn()) {
    session_destroy();
    header('Location:login.php');
    exit();
} else {
    header('Location:index.php');
    exit;
}

?>