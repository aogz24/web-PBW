<!DOCTYPE HTML>
<html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Login</title>
      <link rel="stylesheet" href="style/style-login.css">
    </head>

    <body>
        <div class="container">
          <h1>Login</h1>
            <form id="login-form" action="proses_login.php" method="post">
                <label style="padding-top:13px">&nbsp;Email</label>
                <input
                 id="email"
                 class="form-content"
                 type="email"
                 name="email"
                 autocomplete="on"
                 required >
                <div class="form-border"></div>
              <label for="user-password" style="padding-top:22px">&nbsp;Password</label>
                <input
                 id="user-password"
                 class="form-content"
                 type="password"
                 name="password"
                 required >
                <div class="form-border"></div>
                <button id="submit-btn" type="submit" name="submit" value="LOGIN">Log in</button>
                <p> Belum punya akun?
                  <a href="register.php">Register di sini</a>
                </p>
            </form>
        </div>
        <script src="asset/js/scrpt-login.js"></script>
    </body>
</html>