<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg bg-body-tertiary bg-primary">
                <div class="dropdown" style="padding-left: 10px; padding-top: 10px;">
                    <button class="btn btn-secondary dropdown-toggle;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Register
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item">Register</a></li>
                      <li><a class="dropdown-item" href="login.php">Login</a></li>
                    </ul>
                  </div>
              </nav>
    </header>
        <div class="container">
            <h1 style="margin-top:70px;">Enhanced GPT : Sign Up</h1>
            <form method="post" id="registerForm" action="process_register.php">
                <div class="form-group mb-4">
                    <label for="name">User Name :</label>
                    <input class="form-control" type="text" id="name" name="name" required>
                </div>
                <div class="form-group mb-4">
                    <label for="email">Email :</label>
                    <input class="form-control" type="email" id="email" name="email" required>
                </div>
                <div class="form-group mb-4">
                    <label for="password">Password :</label>
                    <input class="form-control" type="password" id="password" name="password"
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                    title="Must contain at least one number, one uppercase and lowercase letter, and at least 8 or more characters"
                    required>
                </div>
                <div class="form-group mb-4">
                    <label for="password_confirm">Password :</label>
                    <input class="form-control" type="password" id="password_confirm" name="password_confirm"
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                    title="Must contain at least one number, one uppercase and lowercase letter, and at least 8 or more characters"
                    required>
                </div>
                <button class="btn btn-secondary mb-4" type="submit">Register</button>
                <div style="display:none" id="error-message" class="alert alert-danger">

                </div>
            </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
        <script>
            document.getElementById('registerForm').addEventListener('submit', function(event) {
                var password = document.getElementById('password').value;
                var passwordConfirm = document.getElementById('password_confirm').value;

                if (password !== passwordConfirm) {
                    event.preventDefault();
                    var errorMessage = document.getElementById('error-message');
                    errorMessage.textContent = '🔴 Passwords do not match.';
                    errorMessage.style.display = 'block';
                }
            });
        </script>
    </body>
</html>