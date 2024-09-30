<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../CSS/newpost.css" />
        <title>VulWeb_Contact</title>
    </head>
    <body> <!-- This page is the admin home page -->
        <?php
            include '../Lib/LibraryFunctions.php';
            include '../Data/dbUser.php';
            $db = new DBSQLiteUser("../Data/Database.db");
        ?>
        <header>
            <?php
                $user = $_GET['user'];
                $role = $_GET['role'];
                consoleLog("$user + $role");
            ?>
            <nav>
                <ul>
                    <li><a href="Home_User.php?role=<?php echo $role?>&user=<?php echo $user?>">Home</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Feedback</a></li>
                </ul>
                <div>
                    <h2>G3Blog</h2>
                </div>
                <div class="account-buttons">
                    <?php echo "<p><b>Logged: </b>$user</p>"?>
                    <button>Profile</button>
                    <a href="../index.php">
                        <button>Log Out</button>
                    </a>
                </div>
            </nav>
        </header>
        <main>
        <div class="container">
                <h1>Admin Feedback Form</h1>
                <form id="newPost" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" required>

                    <label for="author">Poster</label>
                    <input type="text" id="author" name="author" value=<?php echo "$user" ?> required>

                    <label for="content">Content</label>
                    <textarea id="content" name="content" required></textarea>

                    <div class="button-container">
                        <button type="submit" class="btn">Submit</button>
                    </div>
                </form>
                <?php
                    if($_SERVER["REQUEST_METHOD"] == "POST"){
                        $title = $_REQUEST['title'];
                        $author = $_REQUEST['author'];
                        $content = $_REQUEST['content'];
                        $result = newFeedback($db, $title, $author, $content);
                        if($result){
                            echo "<script>alert('New Post Successfully Created!')</script>";
                            redirect("Home_User.php?role=$role&user=$user"); 
                        }
                        else{
                            echo "<script>alert('New Post Creation Failed!')</script>";
                        }
                    }
                ?>
            </div>
        </main>
        <footer>
            <p>&copy; CCSEP Group 3</p>
        </footer>
    </body>
</html>