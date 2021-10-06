<!DOCTYPE HTML>
<html>
    <head>
        <title>Halaman Login</title>
        <link rel="stylesheet" href="style_login.css">
    </head>

    <body>
        <div style="color:black; position: absolute; left: 400px; top: 120px; font-size: 30px;">
            ADMIN PERPUSTAKAAN SUKA BACA
        </div>
        <div class="container">
            <h1>Login</h1>
            <form method="post" action="cek_login.php">
                <label>Username</label><br>
                <input type="text" name="user"><br>
                <label>Password</label><br>
                <input type="password" name="pass"><br>
                <button type="submit" name="submit">Log in</button>
            </form>
        </div>
    </body>
</html>