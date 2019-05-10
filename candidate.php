<?php include('includes/header.php'); ?>
        <?php include('includes/navigation.php'); ?>

            <ul class="collection">
                <?php 
                if ($_SESSION['voted'] == 0) {
                    $sql = mysqli_query($conn, "SELECT * FROM candidates");
                    if (!$sql) {
                        die('query failed'.mysqli_error($conn));
                        exit();
                    } else {

                        $sql = mysqli_query($conn, "SELECT * FROM candidates");
                        while ($row = mysqli_fetch_assoc($sql)) {
                            $id = $row['id'];
                            $name = $row['name'];
                            // $faculty = $row['faculty'];
                            // $vision = $row['vision'];
                            ?>
                            <li class="collection-item avatar">
                                <a href="detail.php?id=<?= $id; ?>">
                                    <img src="images/download.png" alt="" class="circle">
                                    <span class="title"><?= $id; ?></span>
                                    <p><h6><?= $name; ?></h6></p>
                                </a>
                                
                            </li>
                            <?php
                        }
                    }
                } else {
                    ?>
                    <li class="collection-item avatar">
                       
                        <span class="title">You already voted!<a href="logout.php">Logout</a></span>
                    
                    </li>
                    <?php
                }

                


                 ?>
                
               
            </ul>

            

<?php include('includes/footer.php'); ?>