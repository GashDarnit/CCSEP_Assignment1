<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../CSS/newpost.css" />
        <title>VulWeb_NewPost</title>
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
                $role = $_GET['role'];
                consoleLog("$user + $role");
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
                <h1>Travel</h1>
                <form id="newPost" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                    <label for="file name">Where to go?</label>
                    <input type="text" id="filename" name="filename" required>
                    <div class="button-container">
                        <button type="submit" class="btn">Submit</button>
                    </div>
                </form>
                <?php
                    if($_SERVER["REQUEST_METHOD"] == "POST"){
			    $url = $_REQUEST['filename'];
			    $filename = basename($url);
			    $safeurl = '/Pages/' . $filename . '.php';
			    redirect($safeurl);
			    echo "<script>alert('Travel Successful')</script>";
			    if($role == 'admin'){
				redirect("Home_Admin.php?role=$role&user=$user"); 
			    
			    }
			    else{
				redirect("Home_User.php?role=$role&user=$user"); 
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
