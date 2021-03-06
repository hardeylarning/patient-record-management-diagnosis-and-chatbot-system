<?php
if (isset($_GET['r_id'])){
    $r_id= $_GET['r_id'];
}

  $query = "SELECT * FROM reports WHERE report_id= {$r_id}";
    $report = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($report)) {
    $complaint = $row['complaint'];
    $drug = $row['prescription_of_drug'];
    $diagnosis= $row['diagnosis'];

}
//submission validation
if (isset($_POST['update_report'])){
    $complaint= $_POST['complaint'];
    $drug= $_POST['prescription_of_drug'];
    $diagnosis= $_POST['diagnosis'];
    $date = date("l jS \of F Y h:i:s A");


    $query = "UPDATE reports SET complaint='{$complaint}', prescription_of_drug = '{$drug}', diagnosis = '{$diagnosis}', report_date= '{$date}' WHERE report_id = {$r_id}";
    $update=mysqli_query($connection, $query);
    if ($update){
        $_SESSION['message']="<script>alert('Report has been Successfully Updated')</script>";
        header("Location: reports.php");
    }
    if (!$update){
        die("QUERY FAILED".mysqli_error($connection));
    }
}

?>

<div class="container justify-content-center mt-5 p-5 border">
    <h3 class="text-center mt-0">UPDATE REPORT</h3>
    <form action="" method="post" class="lm-bold p-3">
        <div class="container-fluid">
            <div class="form-group ">
                <label for="">Patient's Complaint</label>
                <textarea placeholder="Complaint" class="form-control" required name="complaint" rows="3"><?php echo $complaint?></textarea>
            </div>
            <div class="form-group ">
                <label for="">Prescription of Drug</label>
                <input type="text" name="prescription_of_drug" class="form-control" value="<?php echo $drug ?>" placeholder="Drug" id="">
            </div>
            <div class="form-group ">
                <label for="">Diagnosis</label>
                <input type="text" name="diagnosis" class="form-control" value="<?php echo $diagnosis ?>" placeholder="Diagnosis" id="">
            </div>
            <div class="form-group justify-content-center mx-5">
                <input type="submit" value="Update Report" name="update_report" class="btn mt-5 btn-outline-success btn-block">
            </div>
        </div>
    </form>
</div>