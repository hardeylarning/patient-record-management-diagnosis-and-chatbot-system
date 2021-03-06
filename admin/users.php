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
                if (isset($_GET['source'])){
                    $source =$_GET['source'];
                }
                else {
                    $source = '';
                }
                switch ($source){

                    case 'edit_user':
                        include "includes/edit_user.php";
                        break;
                    case 'add_report':
                        include "includes/add_report.php";
                        break;
                    case 'view_report':
                        include "includes/view_report.php";
                        break;
                    default:
                        include "includes/view_all_users.php";
                        break;
                }

                ?>

    </div>
<?php include "includes/footer.php"; ?>