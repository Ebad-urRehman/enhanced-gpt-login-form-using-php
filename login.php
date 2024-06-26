<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg bg-body-tertiary bg-primary">
                <div class="dropdown" style="padding-left: 10px; padding-top: 10px;">
                    <button class="btn btn-secondary dropdown-toggle;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Login
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="register.php">Register</a></li>
                      <li><a class="dropdown-item">Login</a></li>
                    </ul>
                  </div>
              </nav>
    </header>
        <div class="container">
            <h1 style="margin-top:70px;">Enhanced GPT : Log in</h1>
            <form method="post" id="registerForm" action="process_login.php">
                <div class="form-group mb-4">
                    <label for="name">User Name :</label>
                    <input class="form-control" type="text" id="name" name="name" required>
                </div>
                <div class="form-group mb-4">
                    <label for="password">Password :</label>
                    <input class="form-control" type="password" id="password" name="password"
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                    title="Must contain at least one number, one uppercase and lowercase letter, and at least 8 or more characters"
                    required>
                </div>
                <button class="btn btn-secondary mb-4" type="submit">Login</button>
            </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    </body>
</html>