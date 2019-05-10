<?php include('includes/header.php'); ?>
	<?php include('includes/navigation.php'); ?>


	<div class="container">
		<?php 

		$sql = mysqli_query($conn, "SELECT * FROM students WHERE id = '".$_SESSION['id']."'");

		while ($row = mysqli_fetch_assoc($sql)) {
			$id = $row['id'];
			$student_name = $row['student_name'];
			$student_email = $row['student_email'];
			$student_pass = $row['password'];
		}

		if (isset($_POST['btn_login'])) {
			
			$sname = $_POST['student_name'];
			$semail = $_POST['email'];
			$spass = $_POST['password'];

			//update user query
			$sql = mysqli_query($conn, "UPDATE students SET student_name='$sname', student_email='$semail', password='$spass' WHERE id='".$_SESSION['id']."'");

			if (!$sql) {
				echo "<script>alert('please try again')</script>";
			} else {
				echo "<script>alert('profile update successfully')</script>";
			}

		}


		 ?>
		<form class="col s12" action="edit_profile.php" method="post" id="loginForm">
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="icon_prefix" type="text" class="validate" name="student_name" id="student_name" value="<?= $student_name; ?>">
                    <label for="icon_prefix">Student Name</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">email</i>
                    <input id="icon_prefix" type="email" class="validate" name="email" id="email" value="<?= $student_email; ?>">
                    <label for="icon_prefix">Email</label>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">vpn_key</i>
                    <input id="icon_telephone" type="password" class="validate" name="password" id="password" value="<?= $student_pass; ?>">
                    <label for="icon_telephone">Password</label>
                </div>
                <div class="input-field col s12">
                    <button type='submit' name='btn_login' class='col s12 btn orange'>Update</button>
                </div>
            </div>
        </form>
	</div>


<?php include('includes/footer.php'); ?>	