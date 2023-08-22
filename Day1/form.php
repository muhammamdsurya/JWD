<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Form Login</title>
</head>

<body>
      <div class="container" style="text-align:center; background-color:burlywood; padding:1rem">
            <h2>Form Login</h2>
            <form action="proses.php" method="POST">
                  <label for="username"> Username : </label> <br>
                  <input type="text" name="username"> <br>
                  <label for="password"> Password : </label> <br>
                  <input type="password" name="password"> <br> <br>
                  <button type="submit" name="login" style="padding: 0.1rem 1rem; background-color: green; color: white; cursor: pointer; border-radius: 6px">Login</button>
            </form>
      </div>
</body>

</html>