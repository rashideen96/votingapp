

<?php 
session_start();
include('api/db.php');
if(isset($_POST['btn_login'])){

    $matric_no = mysqli_real_escape_string($conn, $_POST['matric_no']);
    $password  = mysqli_real_escape_string($conn, $_POST['password']);

    $query = mysqli_query($conn, "SELECT * FROM students WHERE matric_no = '$matric_no' AND password = '$password'");

    if(!$query){
        die('query failed'.mysqli_error($conn));
        exit();
    }

    $user_exist = mysqli_num_rows($query);

    if($user_exist == 0){
        echo "<script>alert('invalid username or password')</script>";
    } else{
        $sql = mysqli_query($conn, "SELECT * FROM students WHERE matric_no = '$matric_no' AND password = '$password'");

        while ($row = mysqli_fetch_assoc($sql)) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['student_name'];
            $_SESSION['voted'] = $row['voted'];
        }
        
        echo "<script>window.location.href = 'index.php'; </script>";
    }
}




?>

<!DOCTYPE html>
<html>

<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <div class="navbar-fixed">
        <nav class="orange">
            <div class="nav-wrapper">
                <a href="#!" class="brand-logo">Login</a>
                
            </div>
        </nav>
    </div>


    
    <div class="container">
        <p class="center"><img src="images/logo.png" alt=""></p>
        
            <form class="col s12" action="" method="post" id="loginForm">
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="icon_prefix" type="text" class="validate" name="matric_no" id="matric_no">
                        <label for="icon_prefix">Matric No</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix">vpn_key</i>
                        <input id="icon_telephone" type="password" class="validate" name="password" id="password">
                        <label for="icon_telephone">Password</label>
                    </div>
                    <div class="input-field col s12">
                        <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect orange'>Login</button>
                    </div>
                </div>
            </form>
    </div>
    

    <!--JavaScript at end of body for optimized loading-->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="./js/materialize.min.js"></script>
    <script src="./js/materialize.js"></script>
</body>
<script>
    // document.addEventListener('DOMContentLoaded', function() {
    //     var elems = document.querySelectorAll('.sidenav');
    //     var instances = M.Sidenav.init(elems, options);
    // });

    // Or with jQuery

    $(document).ready(function () {
        $('.sidenav').sidenav();

    });
</script>

</html>