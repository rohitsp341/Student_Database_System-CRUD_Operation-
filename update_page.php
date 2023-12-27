<?php session_start(); ?>
<?php include("dbconnect.php"); ?>

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
    <h1>Student Database System <a href="logout_process.php" class="btn btn-danger">Log Out</a></h1>

    <!-- To fetch data into Input Field -->
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM `student` WHERE `id`='$id'";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("Query Failed: " . mysqli_error($conn));
        } else {
            $row = mysqli_fetch_assoc($result);
        }
    }
    ?>

    <!-- to update -->
    <?php
    if (isset($_POST['Update_students1'])) {
        if (isset($_GET['id_new'])) {
            $idnew = $_GET['id_new'];
        }
        $firstName = $_POST['first_Name'];
        $lastName = $_POST['last_Name'];
        $update_age = $_POST['age'];

        $query = "UPDATE `student` SET `first_Name`='$firstName', `last_Name`='$lastName', `age`='$update_age' WHERE `id`='$idnew'";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("Query Failed: " . mysqli_error($conn));
        } else {
            header("location: index.php?update_msg=Successfully Updated");
            exit(); // Make sure to exit after a header redirect
        }
    }
    ?>

    <form action="update_page.php?id_new=<?php echo $id; ?>" method="POST">
        <div class="form-group row">
            <label for="first_Name" class="col-sm-2 col-form-label">First Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="first_Name" value="<?php echo $row['first_Name']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="last_Name" class="col-sm-2 col-form-label">Last Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="last_Name" value="<?php echo $row['last_Name']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="age" class="col-sm-2 col-form-label">Age</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="age" value="<?php echo $row['age']; ?>">
            </div>
        </div>
        <div class="form-group">
            <input type="button" value="Cancel" class="btn btn-danger" onclick="cancelForm()">
            <input type="submit" class="btn btn-success" name="Update_students1" value="Update">
        </div>
    </form>

    <script>
        function cancelForm() {
            // Redirect to another page when cancel button is clicked
            window.location.href = 'index.php';
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7h
</body>
</html>