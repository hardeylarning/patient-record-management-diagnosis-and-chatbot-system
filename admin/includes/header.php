<?php ob_start(); ?>
<?php session_start(); ?>
<?php include "../includes/db.php";?>
<?php
if (!isset($_SESSION['admin_username']) && !isset($_SESSION['admin_password'])){
    header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/pms/b4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="b4.3.1/style.css">
    <title>Patient Record Management System</title>
</head>
<body>
<div class="jumbotron-fluid sticky-top mb-5">
    <nav class="navbar navbar-expand-lg text-decoration-none navbar-light" style="background: white; font-size: 25px; font-family: 'Times New Roman'; ">
        <button class="navbar-toggler" data-toggle="collapse" data-target="#main">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-center" id="main">
            <ul class="navbar-nav md-font">
                <?php
                global $admin_active,$pager,$admin;
                $pager=basename($_SERVER['PHP_SELF']);

                $home="../index.php";
                $login="../login.php";
                $contact="../contact.php";
                $about="../about.php";
                $admin="dashboard.php";
                $home_active="";
                $hire_active="";
                $contact_active="";
                $about_active="";
                if ($pager==$home){
                    $home_active="b-bottom text-muted";
                }
                elseif ($pager==$contact){
                    $contact_active="b-bottom text-muted";
                }
                elseif ($pager==$about){
                    $about_active="b-bottom text-muted";
                }
                elseif ($pager==$admin){
                    $admin_active="b-bottom text-muted";
                }

                ?>
                <li class='mr-4  '><a href="../index.php" class='text-decoration-none large-font blue <?php echo $home_active; ?>' >Home</a></li>
                <li class="mr-4"><a href="../about.php" class="text-decoration-none large-font blue <?php echo $about_active; ?>">About</a></li>
                <li class="mr-5"><a href="../contact.php" class="text-decoration-none large-font blue <?php echo $contact_active; ?>">Contact us</a></li>
                <li class="mr-4 dropdown btn-group">
                    <?php
                    $pager1=basename($_SERVER['PHP_SELF']);
                    $admin2="dashboard.php";
                    $users="users.php";
                    $contacts="contacts.php";
                    $add_user ="register_user.php";
                    $check_report = "check_report.php";
                    $reports = "reports.php";
                    $admin_active2="";
                    $users_active="";
                    $add_user_active = "";
                    $contacts_active="";
                    $check_report_status= "";
                    $reports_status= "";

                    if ($pager1==$admin2){
//                        $admin_active="b-bottom text-muted";
                        $admin_active2="b-bottom text-muted";
                    }
                    else if ($pager1==$users){
                        $users_active="b-bottom text-muted";
                        $admin_active="b-bottom text-muted";
                    }
                    else if ($pager1==$contacts){
                        $contacts_active="b-bottom text-muted";
                        $admin_active="b-bottom text-muted";
                    }
                    else if ($pager1==$add_user){
                        $add_user_active="b-bottom text-muted";
                        $admin_active="b-bottom text-muted";
                    }
                    else if ($pager1==$check_report){
                        $check_report_status="b-bottom text-muted";
                        $admin_active="b-bottom text-muted";
                    }
                    else if ($pager1==$reports){
                        $reports_status="b-bottom text-muted";
                        $admin_active="b-bottom text-muted";
                    }

                    ?>
                    <a href="dashboard.php" class="text-decoration-none large-font blue <?php echo $admin_active; ?>">Admin</a>
                    <a class="dropdown-toggle dropdown-toggle-split text-decoration-none mt-2" data-toggle="dropdown" style="color:#153878; "></a>
                    <div class="dropdown-menu dropdown-menu-left">
                        <a href="dashboard.php" class="dropdown-item link <?php echo $admin_active2 ?>" >Dashboard</a>
                        <a href="register_user.php" class="dropdown-item link <?php echo $add_user_active ?>" >Register User</a>
                       <a href="users.php" class="dropdown-item link <?php echo $users_active ?>">Users</a>
                        <a href="reports.php" class="dropdown-item link <?php echo $reports_status ?>">Reports</a>
                        <a href="check_report.php" class="dropdown-item link <?php echo $check_report_status ?>">View Report</a>
                    <a href="contacts.php" class="dropdown-item link <?php echo $contacts_active ?>">Contact</a>
                       </div>
                </li>
            </ul>
                <nav class="ml-auto dropdown "><a href="" class="text-decoration-none lm-bold-italic orange"data-toggle="dropdown">
                        <i class="fa fa-user"><?php echo $_SESSION['admin_name']; ?></i>
                    </a>
                    <a class="dropdown-toggle dropdown-toggle-split text-decoration-none mt-2" data-toggle="dropdown" style="color:#153878; "></a>
                    <div class="dropdown-menu">
                        <a href="../includes/logout.php" class="dropdown-item text-decoration-none lm-bold blue"><i class="fa fa-sign-out"></i>Log Out</a>
                    </div>
                </nav>

        </div>
    </nav>
</div>