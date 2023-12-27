
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h1>Login Form</h1>
    <div class="container">

        <form class="form" action="login_process.php" method="POST">
            <div class="form-group">
                <label for="uname">User Name</label>
                <input type="text" name="uname" class="form-control">
            </div><br>
            <div class="form-group">
                <label for="email">User Email</label>
                <input type="email" name="email" class="form-control">
            </div><br>
            <div class="form-group">

                <input type="submit" name="login" value="Login" class="btn btn-success">
            </div>
            <br>
            <?php

                if (isset($_GET['message'])) {
                    echo "<h6>" . $_GET['message'] . "</h6>";
                }

            ?>
        </form>

        </div>
</body>

</html>