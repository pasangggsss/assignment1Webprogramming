<?php 
require('conectiondatabaseassignment.php');


if(isset($_GET['id']) == false) {
    header('Location:index.php');
    exit;
}
adminPage();


$classify = $conectiondatabaseassignment->prepare('delete from category where id=?');
$classify->execute([$_GET['id']]);

header('Location:adminCategories.php');
exit;


?>