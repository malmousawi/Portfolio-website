<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="reset.css">
        <link rel="stylesheet" href="miniProject.css">
        <link rel="stylesheet" href="viewBlog.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mohammad Al-Mousawi</title>
    </head>
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
                    <li><a href="viewBlog.php">Blog</a></li>
                </ul>
            </nav>
        </header>
        <?php  

        include 'connection.php';
        if(mysqli_connect_errno()) {  
            die("Failed to connect with MySQL: ". mysqli_connect_error());  
        }



        // selects data from 'posts' table and uses an algorithim to order them by most recent first.
        $sql = " SELECT * FROM posts " ; 
        $query = mysqli_query($conn , $sql);

        while($row = mysqli_fetch_array($query)){
            $arr[] = array('date' => $row['date'], 'title' => $row['title'], 'text' => $row['text']);
        }

        $len = count($arr);
        for($i=0;$i<$len;$i++){
            for($j=0;$j<$len-1;$j++){
                if(strtotime($arr[$j]['date'])<strtotime($arr[$j+1]['date'])){
                    $t = $arr[$j];
                    $arr[$j] = $arr[$j+1];
                    $arr[$j+1] = $t;

                }
            }
        }

        foreach ($arr as $q){ ?>
        <div class="blogBox">
            <h1><?php echo $q['title'];?></h1>
            <br>
            <p> <?php echo $q['text'];?><p>
            <br>
            <h3><?php echo "Posted on: ", $q['date'], " (UTC)"; ?></h3>
            <br>
        </div>
        <br>
    
        
        <?php }
        $conn -> close();

        ?>
        <br>
        <br>
        <footer>
            <br>
            <p>Copyright &copy; Mohammad Al-Mousawi 2022</p>
        </footer>
    </body>
</html>