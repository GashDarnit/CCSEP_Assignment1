<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../CSS/newpost.css" />
        <title>CCSEP_VulWeb_NewPost</title>
    </head>
    <body>
        <?php
            include '../Lib/LibraryFunctions.php';
            include '../Data/dbUser.php';
            $db = new DBSQLiteUser("../Data/Database.db");
        ?>
        <header>
            <?php
                $user = $_GET['user'];
                consoleLog($user);
            ?>
            <nav>
                <ul>
                    <li><a href="javascript:history.back()">Back</a></li>
                </ul>
                <div>
                    <h2>G3Blog</h2>
                </div>
                <div class="account-buttons">
                    <button>Profile</button>
                    <a href="../index.php">
                        <button>Log Out</button>
                    </a>
                </div>
            </nav>
        </header>
        <main>
            <div class="container">
                <h1>Create New Blog Post</h1>
                <form id="newPost" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" required>

                    <label for="author">Author</label>
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
                        $result = newBlogPost($db, $title, $author, $content);
                        if($result == "SUCCESS"){
                            echo "<script>alert('New Post Successfully Created!')</script>";
                            redirect("Home_Admin.php?user=$user"); // Need to implement redirect by user or admin!
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