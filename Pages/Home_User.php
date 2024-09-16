<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../CSS/homepage.css" />
        <title>VulWeb_Home</title>
    </head>
    <body> <!-- This page is the admin home page -->
        <?php
            include '../Lib/LibraryFunctions.php';
            include '../Data/dbUser.php';
            $db = new DBSQLiteUser("../Data/Database.db");
        ?>
        <header>
            <nav>
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">About</a></li>
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
            <div class="blog-posts">
                <h2>Blog Posts</h2>
                <a href="New_Post.php">
                    <button class="new-post-button">New Blog Post</button>
                </a>
                <ol class="posts-grid">
                    <?php
                        $data = getBlogPostsArr($db);
                        for($i = 0; $i < count($data); $i++){
                            $blogID = $data[$i][0];
                            $poster = $data[$i][1];
                            $title = $data[$i][2];
                            $content = $data[$i][3];
                            echo "
                                <li class='post'>
                                    <h3>$title</h3> - <b>$poster</b>
                                    <p>$content</p>
                                    <i class='bid'>id:$blogID</i>
                                </li>
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