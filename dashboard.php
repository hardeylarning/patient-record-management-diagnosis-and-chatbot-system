<!--header include -->
<?php include "includes/header.php";
if (!isset($_SESSION['user_id']) && !isset($_SESSION['phone'])){
    header("Location: ./index.php");
}
?>
<!--Navigation include -->
<?php include "includes/navigation.php"; ?>
<div class="container-fluid mt-4 mb-5">
    <div class="row justify-content-between">
        <div class="col-md-3">
<!--            sidebar-->
            <?php include "includes/sidebar.php"; ?>
        </div>
        <div class="col-md shadow justify-content-around">
            <div class="container">
                <p class="lead mt-2 display-4 large-font lm-bold orange mb-4">
                    Welcome to your Dashboard <small class="text-muted"><?php if (isset($_SESSION['name'])){echo $_SESSION['name']; }?></small> </p>
                <?php
                if (isset($_SESSION['user_id'])){
                    $the_m_id =$_SESSION['user_id'];
                    $query = "SELECT * FROM users WHERE user_id= {$the_m_id}";
                    $select_user = mysqli_query($connection, $query);
                    }

                    while ($row = mysqli_fetch_assoc($select_user)) {
                        $user_id = $row['user_id'];
                        $genotype = $row['genotype'];
                        $blood_group = $row['blood_group'];
                        $firstname = $row['firstname'];
                        $surname = $row['surname'];
                        $gender = $row['gender'];
                        $picture = $row['picture'];
                        $phone_no = $row['phone_no'];
                        $address = $row['address'];
                        $registered_date = $row['registered_date'];
                        ?>
                        <hr>
                        <div class="col-sm-12 col-md p-5">
                            <div class="container mb-3 justify-content-center" >
                                <img src="images/<?php echo  $picture; ?>" alt="" class="card-img img-fluid" style="height: 128px; width: 128px;">
                            </div>
                            <div class="container border-left border-secondary justify-content-center">
                                <p class=" text-muted">Full Name: &nbsp; <span class="text-decoration-none"><?php echo $surname." ".$firstname; ?></span></p>
                                <p class=" text-muted">Phone No: &nbsp; <span class="text-decoration-none"><?php echo $phone_no; ?></span></p>
                                <p class=" text-muted">Address: &nbsp; <span class="text-decoration-none"><?php echo $address; ?></span></p>
                                <p class=" text-muted">Gender: &nbsp; <span class="text-decoration-none"><?php echo $gender; ?></span></p>
                                <p class=" text-muted">Blood Group: &nbsp; <span class="text-decoration-none"><?php echo $blood_group; ?></span></p>
                                <p class=" text-muted">Genotype: &nbsp; <span class="text-decoration-none"><?php echo $genotype; ?></span></p>
                                <p class=" text-muted">Member since: &nbsp;  <span class="badge badge-secondary lm-bold"><?php echo $registered_date; ?></span></p>
                            </div>
                        </div>
                    <?php    } ?>
            </div>
        </div>
    </div>
</div>
<!--footer include -->
<?php include "includes/footer.php"; ?>

