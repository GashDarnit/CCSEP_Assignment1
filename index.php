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
        <div class="mainContainer">
            <header>
                <h2>Login</h2>
            </header>
            <main>
                <form>
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
            </main>
            <footer>
                <p>&copy; CCSEP Group 3</p>
            </footer>
        </div>
    </body>
</html>