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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h1>Student Database Suystem <a href="logout_process.php" class="btn btn-danger ">Log Out</a></h1>
    <div class="container">

        <h5>All Students</h5>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">ADD
            STUDENT</button>



        <table class="table table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $query = "select * from `student` ";
                $result = mysqli_query($conn, $query);
                if (!$result) {
                    die("query Faild" . mysqli_error());
                } else {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>

                        <tr>
                            <td>
                                <?php echo $row['id']; ?>
                            </td>
                            <td>
                                <?php echo $row['first_Name']; ?>
                            </td>
                            <td>
                                <?php echo $row['last_Name']; ?>
                            </td>
                            <td>
                                <?php echo $row['age']; ?>
                            </td>
                            <td>
                                <a href="update_page.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Update</a>
                            </td>
                            <td>
                                <a href="Delete_page.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>

                        <?php



                    }

                }

                ?>




            </tbody>
        </table>


        <?php
        //  not inserted the first_name sucessful 
        if (isset($_GET['message'])) {
            echo "<h6>" . $_GET['message'] . "</h6>";

        }
        ?>

        <!-- inserted sucessful from clicking Add Student  button -->

        <?php
        if (isset($_GET['insert_message'])) {
            echo "<p style='color: green; font-size: 28px;'>" . $_GET['insert_message'] . "</p>";
        }
        ?>

        <!-- updated sucessful -->
        <?php
        if (isset($_GET['update_msg'])) {
            echo "<p style='color: green; font-size: 28px;'>" . $_GET['update_msg'] . "</p>";
        }
        ?>


        <!-- deleted record -->

        <?php
        if (isset($_GET['delete_message'])) {
            echo "<p style='color: green; font-size: 28px;'>" . $_GET['delete_message'] . "</p>";
        }
        ?>

        <!-- Modal -->


        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">

            <form class="form" action="insert_data.php" method="POST">
                <div class="form-group">
                    <label for="first_Name">First Name</label>
                    <input type="text" name="first_Name" class="form-control">

                </div>
                <div class="form-group">
                    <label for="last_Name">Last Name</label>
                    <input type="text" name="last_Name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="text" name="age" class="form-control">
                </div>

                <div class="form-group">
                    <input type="button" value="Cancel" class="btn btn-danger" onclick="cancelForm()">
                    <input type="submit" class="btn btn-success" name="add_students" value="Add">

                </div>

            </form>


        </div>



    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script>
        function cancelForm() {
            // Redirect to another page when cancel button is clicked
            window.location.href = 'index.php';
        }
    </script>


</body>

</html>