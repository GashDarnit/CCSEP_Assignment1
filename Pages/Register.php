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
        <div class="mainContainer">
            <header>
                <h2>Register</h2>
            </header>
            <main>
                <form>
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
            </main>
            <footer>
                <p>&copy; CCSEP Group 3</p>
            </footer>
        </div>
    </body>
</html>