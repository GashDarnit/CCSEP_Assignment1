<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- START PAGE OF CCSEP_Assignment_Vulnerable WebApp -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/index.css" />
        <title>CCSEP_VulWeb</title>
    </head>
    <body> <!-- This page is the login page -->
        <?php
            include 'Data/dbUser.php';
        ?>
        <div class="mainContainer">
            <header>
                <h2>Login</h2>
            </header>
            <main>
                <form id="login" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <button type="submit">Login</button>
                    </div>
                    <a href="Pages/Register.php" class="toggle-link">Don't have an account? - Register</a>
                </form>
                <?php 
                    //rawQuery($db ,"SHOW TABLES;");
                    if($_SERVER["REQUEST_METHOD"] == "POST"){
                        $username = $_REQUEST['username'];
                        $password = $_REQUEST['password'];
                        $result = validateUser($db, $username, $password);
                        switch($result){
                            case 0: 
                                echo "<p>Login Failed</p>";
                                break;
                            case 1:
                                echo "<p>Login Successful!</p>";
                                // go to logged in page
                                redirect('Pages/Home_User.php');
                                break;
                            case 2:
                                echo "<p>Login Successful!</p>";
                                // go into admin page
                                redirect('Pages/Home_Admin.php');
                                break;
                            case -1:
                                echo "<p>Username is Invalid!</p>";
                                break;
                            case -2:
                                echo "<p>Password is Invalid!</p>";
                                break;
                            default:
                                echo "How...";
                        }
                    }
                ?>
            </main>
            <footer>
                <p>&copy; CCSEP Group 3</p>
            </footer>
        </div>
    </body>
</html>