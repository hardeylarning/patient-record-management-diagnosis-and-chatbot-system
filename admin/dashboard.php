<?php include "includes/header.php"; ?>
    <div class="container-fluid mt-3 bg-blue" style="height: 800px">
        <div class="row d-flex flex-fill">
            <div class="col-md mb-3">
                <p class="lead mt-2 display-2 text-center xl-font lm-bold orange mb-4">
                    Welcome to admin <small class="lm-bold-italic large-font text-white">
                        <?php echo $_SESSION['admin_name']; ?></small> </p>
                <div class="row p-5 lm-bold justify-content-center" style="margin-top: 80px">
                    <div class="col-lg-4 col-md-4 mb-3">
                        <?php
                        $query="SELECT * FROM users ";
                        $all_users=mysqli_query($connection, $query);
                        $users_count=mysqli_num_rows($all_users);
                        ?>
                        <li class="list-group-item list-group-item-action blue d-flex justify-content-between">Users
                            <span class="badge badge-secondary" style="font-size: large;"><?php echo $users_count; ?></span> </li>
                        <a href="users.php" class="d-flex justify-content-between bg-secondary nav-link text-white">
                            View Details <i class="fa fa-arrow-right orange"></i></a>
                    </div>
                    <div class="col-lg-4 col-md-4 mb-3">
                        <?php
                        $query="SELECT * FROM reports ";
                        $reports=mysqli_query($connection, $query);
                        $reports_count=mysqli_num_rows($reports);
                        ?>
                        <li class="list-group-item list-group-item-action list-group-item-danger text-dark d-flex justify-content-between">
                            Reports<span class="badge badge-danger" style="font-size: large;"><?php echo $reports_count; ?></span> </li>
                        <a href="reports.php" class="d-flex justify-content-between bg-danger nav-link text-white">
                            View Details <i class="fa fa-arrow-right"></i></a>
                    </div>
                    <div class="col-lg-4 col-md-4 mt-2 mb-3">
                        <?php
                        $query="SELECT * FROM contacts";
                        $contacts=mysqli_query($connection, $query);
                        $contacts_count=mysqli_num_rows($contacts);
                        ?>
                        <li class="list-group-item list-group-item-action list-group-item-dark text-dark d-flex justify-content-between">
                            Contact us Messages<span class="badge badge-dark" style="font-size: large;"><?php echo $contacts_count; ?></span> </li>
                        <a href="contacts.php" class="d-flex justify-content-between bg-dark nav-link text-white lm-bold">
                            View Details <i class="fa fa-arrow-right"></i></a>
                    </div>

                    <div class="col-lg-4 col-md-4 mt-2 mb-3">
                        <li class="list-group-item list-group-item-action list-group-item-success d-flex justify-content-between">
                            Register New User<span class="badge badge-success" style="font-size: large;"></span> </li>
                        <a href="register_user.php" class="d-flex justify-content-between bg-success nav-link text-white lm-bold">
                            Click here<i class="fa fa-arrow-right"></i></a>
                    </div>
                    <div class="col-lg-4 col-md-4 mt-2 mb-3">
                        <li class="list-group-item list-group-item-action list-group-item-primary d-flex justify-content-between">
                            Check for user's report(s)<span class="badge badge-primary" style="font-size: large;"></span> </li>
                        <a href="check_report.php" class="d-flex justify-content-between bg-primary nav-link text-white lm-bold">
                            Click here <i class="fa fa-arrow-right"></i></a>
                    </div>

                </div>
            </div>
        </div>
    </div>

<section id="footer" class="bg-blue" style="margin-top: 0px;">
    <ul class="nav text-center justify-content-center">
        <li class="nav-item"><a href="" class="nav-link text-decoration-none orange md1-font" >copyright &copy; 2020 PRMS </a></li>
    </ul>
    <hr class="bt-blue p-2 mt-0">
</section>

<script src="b4.3.1/jquery.js"></script>
<script src="b4.3.1/popper.js/dist/umd/popper.min.js"></script>
<script src="b4.3.1/js/bootstrap.js"></script>
</body>
</html>