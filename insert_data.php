<?php include("dbconnect.php"); ?>
<?php

if(isset($_POST['add_students'])){
    
    $first_Name=$_POST['first_Name'];
    $last_Name=$_POST['last_Name'];
    $age=$_POST['age'];

    if($first_Name== "" || empty($first_Name)){
        header('location:index.php?message=You Need to Fill the First Name');
       
    }
    else{
        $query="insert into `student`(`first_Name`,`last_Name`,`age`) values ('$first_Name','$last_Name','$age')";
        $result=mysqli_query($conn,$query);

        if(!$result){
            die("Query Failed".mysqli_error());
        }
        else{
            header('location:index.php?insert_message=Inserted Sucessfully');
        }
    }
    

}



?>