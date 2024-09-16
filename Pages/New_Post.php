<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../CSS/newpost.css" />
        <title>CCSEP_VulWeb_NewPost</title>
    </head>
    <body>
        <input type="hidden" value="">
        <header>
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
                <form>
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" required>

                    <label for="author">Author</label>
                    <input type="text" id="author" name="author" required>

                    <label for="content">Content</label>
                    <textarea id="content" name="content" required></textarea>

                    <div class="button-container">
                        <button type="submit" class="btn">Submit</button>
                    </div>
                </form>
            </div>
        </main>
        <footer>
            <p>&copy; CCSEP Group 3</p>
        </footer>
    </body>
</html>