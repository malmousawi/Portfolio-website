<!--PHP file to send blog posts to database-->
<?php

session_start();

if(!($_SESSION['email'])){
    header('location:index.html');
}else{
    include 'connection.php';
    $title = $_POST['titleEntry'];
    $text = $_POST['textEntry'];
    $stitle = mysqli_real_escape_string($conn,$title);
    $stext = mysqli_real_escape_string($conn,$text);

    date_default_timezone_set("Europe/London");
    $datePost = date("Y/m/d H:i:s");

    $postBlog = "INSERT INTO posts (title,text,date) VALUES ('$title','$text','$datePost')";
    mysqli_query($conn,$postBlog);
    header('location:viewBlog.php');
}


?>