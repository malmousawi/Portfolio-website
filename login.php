<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="reset.css">
        <link rel="stylesheet" href="login.css">
        <link rel="stylesheet" href="login.php">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mohammad Al-Mousawi</title>
    </head>

    <?php //start session to login
   session_start();
   ?>
    <body>
        <header>
            <nav>
                <ul class="nameLink"><li><a href="index.html"><strong>Mohammad Al-Mousawi</strong></a></li></ul>
                <ul class="otherLink">
                    <li><a href="aboutMe.html">About Me</a></li>
                    <li><a href="experience.html">Experience</a></li>
                    <li><a href="education.html">Education</a></li>
                    <li><a href="skills.html">Skills</a></li>
                    <li><a href="portfolio.html">Portfolio</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="login.html">Blog</a></li>
                </ul>
            </nav>
  
        </header>

        <form method="POST" action="blog.html" <?php echo $_SERVER['PHP_SELF']?>>
            <legend>Login</legend>
    
            <input type="email" name="email" placeholder="Email">
            
            <input type="password" name="password" placeholder="Password">

            <?php //send login form to database

               
                $servername = "127.0.0.1";
                $username = "root";
                $password = "";
                $dbname = "ecs417";

                $conn = mysqli_connect($servername, $username, $password, $dbname);

                if (!$conn){
                die("Connection failed: ".mysqli_connect_errno());
                }else{
                echo "connection successful";
                }

                mysqli_close($conn);
                

        require "connectdb.php";

        if($_SERVER['REQUEST_METHOD'] == "POST") {
            $inputEmail = $_POST["email"];
            $inputPass = $_POST["password"];

            $check = "SELECT * FROM USERS WHERE email = '$inputEmail' and password = '$inputPass'";

            $result = $conn->query($check);
            $row = mysqli_fetch_assoc($result);
            $count = mysqli_num_rows($result);

                if($count == 1) { //check if session data matches database
                    $_SESSION['email'] = $row["email"];
                    $_SESSION['fName'] = $row["firstName"];
                    $_SESSION['lName'] = $row["lastName"];

                    if ($row['firstName'] == "mohammad@gmail.com") { //if name == owner, redirect to addpost
                        header("Location: blog.html");
                        exit;
                    } else {
                        header ("Location: blog.php"); //if other user, then redirect to blog main page
                        exit;
                    }
                } else {
                    echo "<p>Wrong username/password. Please try again.";
                }
            $conn->close();
        }

        ?>
                    
            <a href="blog.html"><input type="submit" value="Login"></a>
    
        </form>
    
        <footer>
            <br>
            <p>Copyright &copy; Mohammad Al-Mousawi 2022</p>
        </footer>

    </body>
</html>