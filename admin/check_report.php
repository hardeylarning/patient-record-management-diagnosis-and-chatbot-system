<?php include "includes/header.php"; ?>
<div class="container mt-3" style="margin-bottom: 400px">
    <h5 class="text-center large-font">Search for patient's reports</h5>
    <div class="row p-5 justify-content-center">

        <div class="col-md-6">
            <form action="check_report.php" method="post">
                <div class="input-group"  style=" border: solid #F96F00 2px; border-radius: 10px; color: #F96F00; " >
                    <input type="search" name="search" id="" placeholder="PHONE NUMBER" class="form-control lm">
                    <div class="input-group-append">
                        <button type="submit" name="submit" value="search" class="btn" >
                            <i class="fas fa-search" style="color:#F96F00; "></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
    if (isset($_POST['search']) && isset($_POST['submit'])) {
        $search =  $_POST['search'];
        $submit = $_POST['submit'];
    ?>
    <div class="row">
        <div class="col-md-6">
            <h3 class="text-center mt-0">PATIENT'S DETAILS</h3>
            <hr class="p-3">
            <?php
                $query = "SELECT * FROM users WHERE phone_no= {$search}";
                $select_user = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($select_user)) {
                    $user_id = $row['user_id'];
                    $firstname = $row['firstname'];
                    $surname = $row['surname'];
                    $phone_no = $row['phone_no'];
                    $gender = $row['gender'];
                    $date_of_birth = $row['date_of_birth'];
                    $next_of_kin = $row['next_of_kin'];
                    $blood_group = $row['blood_group'];
                    $genotype = $row['genotype'];
                    $user_role = $row['user_role'];
                    $picture = $row['picture'];
                    $address = $row['address'];
                    $registered_date = $row['registered_date'];
                ?>
            <div class="row justify-content-between mt-3">
                <div class="col-md-4 mt-5">
                    <img src="../images/<?php echo  $picture; ?>" alt="" class="card-img img-fluid" style="height: 128px; width: 128px;">
                </div>
                <div class="col-md-8 border-right border-secondary">
                    <p class=" text-muted">Full Name: &nbsp; <span class="text-decoration-none"><?php echo $surname." ".$firstname; ?></span></p>
                    <p class=" text-muted">Phone No: &nbsp; <span class="text-decoration-none"><?php echo $phone_no; ?></span></p>
                    <p class=" text-muted">Address: &nbsp; <span class="text-decoration-none"><?php echo $address; ?></span></p>
                    <p class=" text-muted">Gender: &nbsp; <span class="text-decoration-none"><?php echo $gender; ?></span></p>
                    <p class=" text-muted">Blood Group: &nbsp; <span class="text-decoration-none"><?php echo $blood_group; ?></span></p>
                    <p class=" text-muted">Genotype: &nbsp; <span class="text-decoration-none"><?php echo $genotype; ?></span></p>
                    <p class=" text-muted">Member since: &nbsp;  <span class="badge badge-success lm-bold"><?php echo $registered_date; ?></span></p>
                </div>
            </div>
                <?php
                }
            if (!isset($firstname)){
                echo "<h3 class='text-center'>No Patient's Record Found</h3>";
            }
            ?>
        </div>
        <div class="col-md-6 container-fluid shadow">
            <h3 class="text-center mt-0">REPORT(S)</h3>
            <hr class="p-3">
            <?php
            $query1 = "SELECT * FROM reports WHERE phone_no= '{$search}' ORDER BY report_id DESC";
            $report_query = mysqli_query($connection, $query1);
            while ($row = mysqli_fetch_assoc($report_query)){
                $report_id = $row['report_id'];
                $complaint = $row['complaint'];
                $drug = $row['prescription_of_drug'];
                $diagnosis= $row['diagnosis'];
                $report_date = $row['report_date'];
                ?>
                <div class="card mb-4">
                    <div class="card-body">
                        <p class="card-text">
                            <span class="card-title text-muted">Complaint: &nbsp;&nbsp;</span>
                            <?php echo $complaint ?>
                        </p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><span class="text-muted">Prescription of Drug:</span> &nbsp;&nbsp;<?php echo $drug; ?></li>
                        <li class="list-group-item"><span class="text-muted">Diagnosis:</span> &nbsp;&nbsp;<?php echo $diagnosis; ?></li>
                    </ul>
                    <div class="card-footer text-muted">Date: &nbsp;&nbsp;<span class="badge badge-info lm-bold mr-auto"><?php echo $report_date; ?></span></div>
                </div>
            <?php }
            if (!isset($complaint)){
                echo "<h3 class='text-center'>No Report Found</h3>";
            }
            ?>
        </div>
    </div>
    <?php }?>
</div>
<?php  include "includes/footer.php"; ?>