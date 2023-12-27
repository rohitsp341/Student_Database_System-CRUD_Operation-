<?php include("dbconnect.php"); ?>
<?php session_start(); ?>

<?php


if(isset($_POST["login"])){
    $username = $_POST["uname"];
    $email = $_POST["email"];
}

$query="select * from `login` where `user_name`='$username' and `email`='$email' ";


$result=mysqli_query($conn,$query);
if(!$result){
    die(" Query Failed".mysqli_error());
}
else
{
    $row=mysqli_num_rows($result);


    if($row==1){
        $_SESSION['uname']=$username;
        header('location:index.php');
    }
    else{
        header('location:login_From.php?message=Sorry your information is invalid ');


    }
}

?>
