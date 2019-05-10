<?php include('includes/header.php'); ?>
        <?php include('includes/navigation.php'); ?>

            <div class="row">
                <div class="col s12 m7">
                	<?php 

                	$sql = mysqli_query($conn, "SELECT * FROM students WHERE id='".$_SESSION['id']."'");

                	while ($row = mysqli_fetch_assoc($sql)) {
                		$id = $row['id'];
                		$matric_no = $row['matric_no'];
                		$stud_name = $row['student_name'];
                		$stud_email = $row['student_email'];
                		$password = $row['password'];
                	}

                	 ?>
                    <div class="card">
                    <div class="card-content center">
                        <h4><?= $stud_name; ?></h4>
                        <h4><?= $matric_no; ?></h4>
                        <p><b><?= $stud_email; ?></b></p>
                    </div>
                    <div class="card-action center">
                        <a href="edit_profile.php" class="btn btn-primary btn-block">Edit Profile</a>
                    </div>
                    </div>
                </div>
            
            </div>

<?php include('includes/footer.php'); ?>