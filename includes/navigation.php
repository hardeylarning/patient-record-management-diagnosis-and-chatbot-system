
<div class="jumbotron-fluid bg-dark sticky-top ">
        <nav class="navbar navbar-expand-lg text-decoration-none font-weight-bold navbar-light" style="background: white; font-size: 35px; font-family: 'Times New Roman'; ">
<!--            <a href="" class="navbar-brand ">-->
<!--            </a>-->
            <button class="navbar-toggler " data-toggle="collapse" data-target="#main"  style=" border: solid #F96F00 2px; border-radius: 3px; ">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-center" id="main" role="navigation">
                <ul class="navbar-nav  text-decoration-none" style="color: #153878; ">
                    <?php
                    $pager=basename($_SERVER['PHP_SELF']);
                    $home="index.php";
                    $login="login.php";
                    $contact="contact.php";
                    $about="about.php";
                    $admin2="admin/dashboard.php";
                    $dashboard ="dashboard.php";
                    $doctor = "doctor.php";
                    $report = "view_reports.php";
                    $message = "patient_message.php";
                    $disease = "diseases.php";
                    $message_doctor = "message.php";
                    $disease_active="";
                    $message_doctor_active="";
                    $home_active="";
                    $admin_active2="";
                    $contact_active="";
                    $pro_active="";
                    $message_active="";
                    $about_active="";
                    $dash_active="";
                    $doctor_active ="";
                    $login_active="";
                    if (isset($_SESSION['user_id'])) {
                        $user_id = $_SESSION['user_id'];
                    }
                    if ($pager==$home){
                        $home_active="b-bottom text-muted disabled";
                    }
                    elseif ($pager==$contact){
                        $contact_active="b-bottom text-muted disabled";
                    }
                    elseif ($pager==$about){
                        $about_active="b-bottom text-muted disabled";
                    }
                    elseif ($pager==$login){
                        $login_active="b-bottom text-muted disabled";
                    }
                    elseif ($pager==$admin2){
                        $admin_active2="b-bottom text-muted disabled";
                    }
                    elseif ($pager==$dashboard){
                        $dash_active="b-bottom text-muted disabled";
                    }
                    elseif ($report == $pager){
                        $pro_active ="text-muted disabled";
                    }
                    elseif ($message == $pager){
                        $message_active ="text-muted disabled";
                    }
                    elseif ($disease == $pager){
                        $disease_active ="text-muted disabled";
                    }
                    elseif ($message_doctor == $pager){
                        $message_doctor_active ="text-muted disabled";
                    }
                    elseif ($pager == $doctor){
                        $doctor_active="b-bottom text-muted disabled";
                    }
                    ?>
                    <li class='mr-4  '><a href="index.php" class='text-decoration-none large-font blue <?php echo $home_active; ?>' >Home</a></li>
                    <li class="mr-4"><a href="about.php" class="text-decoration-none large-font blue <?php echo $about_active; ?>">About</a></li>
                    <li class="mr-3"><a href="contact.php" class="text-decoration-none large-font blue <?php echo $contact_active; ?>">Contact</a></li>

                    <?php  if (isset($_SESSION['user_id'])){
                        $user_id=$_SESSION['user_id'];
                        if (isset($_SESSION['user_role']) && $_SESSION['user_role']=='patient'){
                            $dashboard="dashboard.php?f_id=$user_id";
                            ?>
                            <li class="mr-4 dropdown btn-group">
                                <a href="dashboard.php" class="text-decoration-none large-font orange <?php echo $dash_active; ?>"><?php echo $_SESSION['name']; ?></a>
                                <a class="dropdown-toggle dropdown-toggle-split text-decoration-none mt-2 orange" data-toggle="dropdown"></a>
                                <div class="dropdown-menu dropdown-menu-left">
                                    <a href='dashboard.php' class='dropdown-item link <?php echo $dash_active; ?>'>Dashboard</a>
                                    <a href="view_reports.php" class='dropdown-item link <?php echo $pro_active?>'>View Reports</a>
                                    <a href="patient_message.php" class='dropdown-item link <?php echo $message_active?>'>Messages</a>
                                        <a href="diseases.php" class='dropdown-item link <?php echo $disease_active?>'>Check Symptoms</a>
                                        <a href="message.php" class='dropdown-item link <?php echo $message_doctor_active?>'>Message Doctor</a>
                                    <a href='includes/logout.php' class='dropdown-item link'>Logout</a>
                                </div>
                            </li>
                            <?php

                        }
                    }
                    elseif (isset($_SESSION['doctor_id'])){
                        $doctor_id=$_SESSION['doctor_id'];
                            ?>
                            <li class="mr-4 dropdown btn-group">
                                <a href="doctor.php" class="text-decoration-none large-font orange <?php echo $doctor_active; ?>"><?php echo $_SESSION['doctor_username']; ?></a>
                                <a class="dropdown-toggle dropdown-toggle-split text-decoration-none mt-2 orange" data-toggle="dropdown"></a>
                                <div class="dropdown-menu dropdown-menu-left">
                                    <a href='doctor.php' class='dropdown-item link <?php echo $doctor_active; ?>'>Dashboard</a>
                                    <a href='includes/logout.php' class='dropdown-item link'>Logout</a>
                                </div>
                            </li>
                            <?php
                    }
                    elseif (isset($_SESSION['admin_id']) && !empty($_SESSION['admin_id']) && ($_SESSION['admin_username']) && !empty($_SESSION['admin_username'])  ) {
                        ?>
                        <li class="mr-4 dropdown btn-group">
                            <a href="admin/dashboard.php" class="text-decoration-none large-font blue <?php echo $admin_active2; ?>">Admin</a>
                            <a class="dropdown-toggle dropdown-toggle-split text-decoration-none blue mt-2" data-toggle="dropdown"></a>
                            <div class="dropdown-menu dropdown-menu-left">
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
                                <a href="admin/dashboard.php" class="dropdown-item link <?php echo $admin_active2 ?>" >Dashboard</a>
                                <a href="admin/register_user.php" class="dropdown-item link <?php echo $add_user_active ?>" >Register User</a>
                                <a href="admin/users.php" class="dropdown-item link <?php echo $users_active ?>">Users</a>
                                <a href="admin/reports.php" class="dropdown-item link <?php echo $reports_status ?>">Reports</a>
                                <a href="admin/check_report.php" class="dropdown-item link <?php echo $check_report_status ?>">View Report</a>
                                <a href="admin/contacts.php" class="dropdown-item link <?php echo $contacts_active ?>">Contact</a>
                                <a href="includes/logout.php" class="dropdown-item link">Log Out</a>
                            </div>
                        </li>
                    <?php   }
                    else{
                        echo "<li class='mr-5'><a href='login.php' class='text-decoration-none large-font blue $login_active'>Login</a></li>";
                    }
                    ?>
                </ul>
            </div>

        </nav>
    </div>

