<?php include "includes/header.php";
if (!isset($_SESSION['user_id']) && !isset($_SESSION['phone'])){
    header("Location: ./index.php");
}
if (isset($_SESSION['phone'])){
    $phone_no= $_SESSION['phone'];
}
 ?>
<?php include "includes/navigation.php"; ?>
<div class="container-fluid shadow">
    <div class="row justify-content-between">
        <div class="col-md-3 ">
            <!--            sidebar-->
            <?php include "includes/sidebar.php"; ?>
        </div>
        <div class="col-md">
            <h3 class="text-center mt-0">REPORT(S)</h3>
            <hr class="p-3">
            <div class="row justify-content-between">
                    <?php
                    $query1 = "SELECT * FROM reports WHERE phone_no= '{$phone_no}' ORDER BY report_id DESC";
                    $report_query = mysqli_query($connection, $query1);
                    while ($row = mysqli_fetch_assoc($report_query)){
                        $report_id = $row['report_id'];
                        $complaint = $row['complaint'];
                        $diagnosis= $row['diagnosis'];
                        $drug = $row['prescription_of_drug'];
                        $report_date = $row['report_date'];
                        ?>
                <div class="col-md-6">
                    <div class="card">
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
                </div>
                    <?php }
                    if (!isset($complaint)){
                        echo "<h3 class='text-center ml-5 mt-5'> No Report Found</h3>";
                    }
                    ?>

            </div>
        </div>
    </div>
</div>
<?php include "includes/footer.php"; ?>