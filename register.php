<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Halaman Login</title>
        <link rel="stylesheet" href="style/style-login.css">
    </head>

    <body>
        <div class="container">
          <h1>Register</h1>
            <form method="post" action="registrasiAction.php">
                <label>Username</label>
                <br>
                <input type="text" name="username">
                <br>
                <label>Email</label>
                <br>
                <input type="email" name="email">
                <br>
                <label>Password</label>
                <br>
                <input type="password" name="password">
                <br>
                <button>Register</button>
                <p> Sudah punya akun?
                  <a href="login.php">Login di sini</a>
                </p>
            </form>
        </div>
    </body>
</html>