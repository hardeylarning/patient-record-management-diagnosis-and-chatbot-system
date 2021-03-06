<div class="col-md-12 mb-5">
    <p class="display-4 lm-bold text-center orange">MENU</p>
    <hr class="bg-secondary font-weight-bold mb-3">
    <div class="container-fluid">
        <?php
        $pager1=basename($_SERVER['PHP_SELF']);
        $dash ="dashboard.php";
        $report = "view_reports.php";
        $message = "patient_message.php";
        $disease = "diseases.php";
        $message_doctor = "message.php";
        $dashs_active="";
        $disease_active="";
        $message_doctor_active="";
        $pro_active="";
        $message_active="";
        if ($pager1 == $dash){
            $dashs_active ="text-muted disabled";
        }
        elseif ($report == $pager1){
            $pro_active ="text-muted disabled";
        }
        elseif ($message == $pager1){
            $message_active ="text-muted disabled";
        }
        elseif ($disease == $pager1){
            $disease_active ="text-muted disabled";
        }
        elseif ($message_doctor == $pager1){
            $message_doctor_active ="text-muted disabled";
        }
        ?>

    </div>
    <p class="lead link blue">
        <a href="dashboard.php" class='text-decoration-none lm-bold <?php echo $dashs_active?>'>Dashboard</a>
    </p>
    <p class="lead link blue">
        <a href="view_reports.php" class='text-decoration-none lm-bold <?php echo $pro_active?>'>View Reports</a>
    </p>
    <p class="lead link blue">
        <a href="diseases.php" class='text-decoration-none lm-bold <?php echo $disease_active?>'>Check Symptoms</a>
    </p>
    <p class="lead link blue">
        <a href="message.php" class='text-decoration-none lm-bold <?php echo $message_doctor_active?>'>Message Doctor</a>
    </p>
    <p class="lead link blue">
        <a href="patient_message.php" class='text-decoration-none lm-bold <?php echo $message_active?>'>Messages</a>
    </p>
    <p class="lead link">
        <a href="includes/logout.php" class='text-decoration-none lm-bold'>Logout</a>
    </p>

</div>
