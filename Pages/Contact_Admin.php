<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../CSS/homepage.css" />
        <title>VulWeb_Admin_Contact</title>
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
                    <li><a href="Home_Admin.php?role=<?php echo $role?>&user=<?php echo $user?>">Home</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Security</a></li>
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
            <div class="blog-posts">
                <h2>Admin - Feedback Posts</h2>
                <ol class="posts-grid">
                    <?php
                        $data = getFeedBackArr($db);
                        for($i = 0; $i < count($data); $i++){
                            $postID = $data[$i][0];
                            $poster = $data[$i][1];
                            $title = $data[$i][2];
                            $content = $data[$i][3];
                            echo "
                                <li class='post'>
                                    <h3>$title</h3> - <b>$poster</b>
                                    <p>$content</p>
                                    <i class='bid'>id:$postID</i>
                                </li>
                                <button class='postBtn'>Resolve</button>
                            ";
                        }
                    ?>
                </ol>
            </div>
        </main>
        <footer>
            <p>&copy; CCSEP Group 3</p>
        </footer>
    </body>
</html>