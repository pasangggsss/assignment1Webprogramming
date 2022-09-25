<?php
require('conectiondatabaseassignment.php');
// the functions is execute in the conectiondatabaseassignment.php
adminPage();

//isset get vannu vaneko mathi url ma id deko chhaina vane ke lai delete garnu vanera kei nagari arko page ma puryako
if(isset($_GET['id']) == false) {
    header('Location:index.php');
    exit;
}
// gets the id from the datbase and deletes it 
$news = $conectiondatabaseassignment->prepare('delete from article where id=?');
$news->execute([$_GET['id']]);


header('Location:adminArticles.php');
exit;

?>