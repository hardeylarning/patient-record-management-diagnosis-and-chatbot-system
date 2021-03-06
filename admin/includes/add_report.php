<?php
if (isset($_GET['u_id'])){
    $u_id= $_GET['u_id'];
}

  $query = "SELECT * FROM users WHERE user_id= {$u_id}";
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

}
//submission validation
if (isset($_POST['add_report'])){
    $complaint= $_POST['complaint'];
    $drug= $_POST['prescription_of_drug'];
    $diagnosis= $_POST['diagnosis'];
    $date = date("l jS \of F Y h:i:s A");


    $query = "INSERT INTO reports(phone_no, complaint, prescription_of_drug, diagnosis, report_date) ";
    $query .="VALUES('{$phone_no}', '{$complaint}', '{$drug}', '{$diagnosis}', '{$date}')";
    $update_profile=mysqli_query($connection, $query);
    if ($update_profile){
        $_SESSION['message']="<script>alert('New Report has been Added')</script>";
        header("Location: users.php");
    }
}
?>

<div class="container-fluid mt-5 p-5 border">
    <div class="row">
        <div class="col-md-5">
            <h3 class="text-center mt-0">PATIENT'S DETAILS</h3>
            <div class="row justify-content-between mt-5">
                <div class="col-md-4 mt-5">
                    <img src="../images/<?php echo  $picture; ?>" alt="" class="card-img img-fluid" style="height: 128px; width: 128px;">
                </div>
                <div class="col-md-8">
                    <p class=" text-muted">Full Name: &nbsp; <span class="text-decoration-none"><?php echo $surname." ".$firstname; ?></span></p>
                    <p class=" text-muted">Phone No: &nbsp; <span class="text-decoration-none"><?php echo $phone_no; ?></span></p>
                    <p class=" text-muted">Address: &nbsp; <span class="text-decoration-none"><?php echo $address; ?></span></p>
                    <p class=" text-muted">Gender: &nbsp; <span class="text-decoration-none"><?php echo $gender; ?></span></p>
                    <p class=" text-muted">Blood Group: &nbsp; <span class="text-decoration-none"><?php echo $blood_group; ?></span></p>
                    <p class=" text-muted">Genotype: &nbsp; <span class="text-decoration-none"><?php echo $genotype; ?></span></p>
                    <p class=" text-muted">Member since: &nbsp;  <span class="badge badge-secondary lm-bold"><?php echo $registered_date; ?></span></p>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <h3 class="text-center mt-0">ADD NEW REPORT</h3>
            <form action="" method="post" enctype="multipart/form-data" class="lm-bold p-3">
                <div class="container-fluid">
                    <div class="form-group ">
                        <label for="">Patient's Complain</label>
                        <textarea placeholder="Complaint" class="form-control" required name="complaint" rows="3"></textarea>
                    </div>
                    <div class="form-group ">
                        <label for="">Prescription of Drug</label>
                        <input type="text" name="prescription_of_drug" required class="form-control" placeholder="Drug" id="">
                    </div>
                    <div class="form-group ">
                        <label for="">Diagnosis</label>
                        <input type="text" name="diagnosis" class="form-control" placeholder="Diagnosis" id="">
                    </div>
                    <div class="form-group justify-content-center mx-5">
                        <input type="submit" value="Add Report" name="add_report" class="btn mt-5 btn-outline-primary btn-block">
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>