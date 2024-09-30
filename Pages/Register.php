<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- MAIN PAGE OF CCSEP_Assignment_Vulnerable WebApp -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../CSS/register.css" />
        <title>VulWeb_Register</title>
    </head>
    <body> <!-- This page is the registration page -->
        <?php
            include '../Lib/LibraryFunctions.php';
            include '../Data/dbUser.php';
            $db = new DBSQLiteUser("../Data/Database.db");
        ?>
        <div class="mainContainer">
            <header>
                <h2>G3Blog - Register</h2>
            </header>
            <main>
                <form id="register" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Confirm Password</label>
                        <input type="password" id="confirm-password" name="confirm-password" required>
                    </div>
                    <div class="form-group">
                        <button type="submit">Register</button>
                    </div>
                    <a href="../index.php" class="toggle-link">Already have an account? - Login</a>
                </form>
                <?php 
                    if($_SERVER["REQUEST_METHOD"] == "POST"){
                        $username = $_REQUEST['username'];
                        $email = $_REQUEST['email'];
                        $password = $_REQUEST['password'];
                        $conPassword = $_REQUEST['confirm-password'];
                        if($password == $conPassword){
                            $result = newUser($db, $username, $email, $password, "USER");
                            if($result == "SUCCESS"){
                                echo "<p>Account Successfully Created!</p>";
                            }
                            else{
                                echo "<p>Account Creation Failed!</p>";
                            }
                        } 
                        else{
                            echo "Password And Confirm Password do not match!";
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