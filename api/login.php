<?php 
include('db.php');
if(!empty($_GET['matric_no'])){

    // Get Parameter
    $matric_no = $_GET['matric_no'];
    $password = $_GET['password'];


    $query = mysqli_query($conn, "SELECT * FROM students WHERE matric_no = '$matric_no' AND password = '$password'");

    $user_exist = mysqli_num_rows($query);

    if($user_exist == 1){
        //json_encode('Login');
        echo 'Login';
    } 
    
} else {
    $error = 'Error please try again later';
    // json_encode($error);
    echo $error;
}





?>