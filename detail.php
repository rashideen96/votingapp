<?php include('includes/header.php'); ?>
        <?php include('includes/navigation.php'); ?>

            <div class="row">
                <div class="col s12 m7">
                    <?php 

                    if (isset($_GET['vid'])) {
                        $vid = $_GET['vid'];

                        // update user
                        mysqli_query($conn, "UPDATE students SET voted = 1 WHERE id = '".$_SESSION['id']."'");

                        // set session
                        $_SESSION['voted'] = 1;

                        // vote increment
                        $sql_vote = mysqli_query($conn, "SELECT * FROM candidates WHERE id = $vid");

                        while ($row = mysqli_fetch_assoc($sql_vote)) {
                            $votes_now = $row['vote_totall'];

                        }

                        $votes_pres = $votes_now + 1;

                        // set vote counter increment
                        mysqli_query($conn, "UPDATE candidates SET vote_totall = $votes_pres WHERE id=$vid");

                        //header('Location: candidate.php');
                        echo "<script>window.location.href = 'candidate.php'; </script>";

                    } 



                    
                    

                    

                    // user detail query
                    $sql = mysqli_query($conn, "SELECT * FROM candidates WHERE id = '".$_GET['id']."'");

                    while ($row = mysqli_fetch_assoc($sql)) {
                        $id = $row['id'];
                        $name = $row['name'];
                        $faculty = $row['faculty'];
                        $vision = $row['vision'];
                        ?>
                        <div class="card">
                            <div class="card-image">
                                <img src="images/download.png">
                                <span class="card-title"><?= $name; ?></span>
                            </div>
                            <div class="card-content">
                                <h4><?= $name; ?></h4>
                                <p><b><?= $faculty; ?></b></p>
                                <p><?= $vision; ?></p>
                                    
                            </div>
                            <div class="card-action">
                                <a href="detail.php?vid=<?= $id; ?>" id="vote" onclick="javascript: return confirm('Are you sure you want vote this user?')">Vote</a>
                            </div>
                        </div>
                        <?php
                    }

                     ?>
                    
                </div>
                
            </div>

<?php include('includes/footer.php'); ?>