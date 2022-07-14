<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="reset.css">
        <link rel="stylesheet" href="login.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mohammad Al-Mousawi</title>
    </head>
    <body>
        <?php     

        // creates a session, makes a connection then retrieves the email and pass entered by the user.
        session_start();
        include 'connection.php'; 
        $inputEmail = $_POST["email"];
        $inputPass = $_POST["password"];

        // checks database to see if the inputs from the user matches.
        // if so, you will be redirected to the blog homepage.
        // otherwise you will have to retry.
        $query="SELECT * From user where email='$inputEmail' and password='$inputPass'";
        $result=mysqli_query($conn,$query);
        if(mysqli_num_rows($result)==1){

            $queryName = mysqli_query($conn, "SELECT email FROM user WHERE email = '$inputEmail'");
            $result = mysqli_fetch_array($queryName);
            $_SESSION['email'] = $result;
            header('location:blog.html');
        }
        
        else{
            header('location:loginF.html');
        }

        ?>


    </body>
</html>