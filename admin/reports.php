<?php include "includes/header.php"; ?>
    <div class="container-fluid mt-5" style="margin-bottom: 200px">
                <?php
                    if (isset($_SESSION['message'])){
                        $message= $_SESSION['message'];
                        echo "<p class=\"lead\">$message</p>";
                        $_SESSION['message']=null;
                    }
                    ?>
                <?php
                if (isset($_GET['report'])){
                    $report =$_GET['report'];
                }
                else {
                    $report = '';
                }
                switch ($report){

                    case 'edit_report':
                        include "includes/edit_report.php";
                        break;
                    case 'add_report':
                        include "includes/add_report.php";
                        break;
                    case 'view_report':
                        include "includes/view_report.php";
                        break;
                    default:
                        include "includes/view_all_reports.php";
                        break;
                }

                ?>

    </div>
<?php include "includes/footer.php"; ?>