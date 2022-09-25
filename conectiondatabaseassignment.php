<?php
session_start();

$conectiondatabaseassignment = new PDO("mysql:dbname=assignment1;host=db", 'root','pasang',[PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION]);


//helps us to submit the data to the database
function isSubmitted() {
if(isset($_POST['submit'])) {
    return true;
}
else {
    return false;
}
}

// checks whether user is logged or not .
function loggedIn(){
if(isset($_SESSION['using'])&& $_SESSION['using']) {
    return true;
}
else {
    false;
}
}

//only the admin fro some additionals fucnitons 
function  adminPage() {
if(!isset($_SESSION['using'])) {
    header('Location:index.php');
    exit;
}
if(!$_SESSION['isAdmin']) {
    header('Location:index.php');
    exit;
}
}

//helps to add articles in the databse 
function articleAddIntoDatabase() {
    global $conectiondatabaseassignment;
    $pdo_radio = $conectiondatabaseassignment->prepare("INSERT INTO article (title, content, categoryId, publishDate) values(?,?,?,?)");
    $where_clause = [$_POST['title'],$_POST['content'],$_POST['category'], date('Y-m-d h:i:s')];
    $pdo_radio->execute($where_clause);
}
// add category in hte datbase 
function addCategoryIntoDatabase() {
    global $conectiondatabaseassignment;
    $pdo_radio = $conectiondatabaseassignment->prepare("INSERT INTO category (name) values(?)");
    $where_clause = [$_POST['name']];
    $pdo_radio->execute($where_clause);
}
//  edit the articels of database 
function editArticleOfDatabase() {
    global $conectiondatabaseassignment;
    $pdo_radio = $conectiondatabaseassignment->prepare("update article set title=?, content=?");
    $where_clause = [$_POST['title'],$_POST['content']];
    $pdo_radio->execute($where_clause);
}
// edit the category 
function editCategoryIntoDatabase() {
    global $conectiondatabaseassignment;
    $pdo_radio = $conectiondatabaseassignment->prepare("update category set name=?");
    $where_clause = [$_POST['name']];
    $pdo_radio->execute($where_clause);
}

//fetch the user id & pass in order to log in the uesr 
function loginUserInWebsite() {
    global $conectiondatabaseassignment;
    $pdo_radio = $conectiondatabaseassignment->prepare('SELECT id, email, name, password,isAdmin FROM users WHERE email=:emm AND password=:pass');
    $where_clause = ['emm'=> $_POST['email'], 'pass'=> $_POST['password']];
    $pdo_radio->execute($where_clause);
    if($user = $pdo_radio->fetch()) {
        $_SESSION['using'] = true;
        $_SESSION['user'] = $user['id'];
        $_SESSION['isAdmin'] = $user['isAdmin'];
        header('Location:index.php');
        exit;
    }
}
// register the user in the datbase 
function registerUserInWebsite() {
    global $conectiondatabaseassignment;
    $pdo_radio = $conectiondatabaseassignment->prepare("INSERT INTO users (email, name, password) values(?,?,?)");
    $where_clause = [$_POST['email'], $_POST['name'],$_POST['password'] ];
    $pdo_radio->execute($where_clause);
    header('Location:login.php');
    exit;
}

// the add comments fro the article
function addCommentInArticle() {
    global $conectiondatabaseassignment;
    $cmt = $conectiondatabaseassignment->prepare("INSERT INTO comment (comment, article, user) values(?,?,?)");
    $where_clause = [$_POST['commentText'],$_GET['id'],$_SESSION['user']];
    $cmt->execute($where_clause);
}

//listing category fucntion after fetching from the database 
function listCategory() {
    global $conectiondatabaseassignment;
    $categories = $conectiondatabaseassignment->prepare('select id, name from category');
    $categories->execute();

    while($category = $categories->fetch())
    {
        $name = $category['name'];
        $id = $category['id'];

        echo '<li><a href="categories.php?id='.$id.'">'.$name.'</a>';
    }
                        
}

//lists the comment along with the user name 
function listCommentWithUsername() {
    global $conectiondatabaseassignment;
    $comments =  $conectiondatabaseassignment->prepare('SELECT comment, article, user FROM comment where article=?');
    $comments->execute([$_GET['id']]);

    while($rw = $comments->fetch()) {
        echo '<li>'. $rw['comment']. '</li>';
    }
}


?>