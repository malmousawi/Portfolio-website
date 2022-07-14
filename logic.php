<?php  

$host = "localhost:8889";  
$user = "root";  
$password = 'root';  
$db_name = "ecs417";  
        
$conn = mysqli_connect($host, $user, $password, $db_name);  
if(mysqli_connect_errno()) {  
    die("Failed to connect with MySQL: ". mysqli_connect_error());  
}


$sql = " SELECT * FROM posts " ; 
$query = mysqli_query($conn , $sql);

?>