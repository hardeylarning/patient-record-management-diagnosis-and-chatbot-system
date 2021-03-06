<!--header include -->
<?php include "includes/header.php";
if (isset($_SESSION['admin_username']) && isset($_SESSION['admin_password'])){
    header("Location: admin/dashboard.php");
}
?>
<?php include "includes/navigation.php";?>
<?php
global $message, $user_no, $user_pass, $user_id, $user_role, $name, $admin_id, $admin_username, $admin_pass, $admin_name;
global $doctor_id, $doctor_username, $doctor_pass, $doctor_name;
if (isset($_POST['submit'])){
    $phone=$_POST['phone_no'];
    $password=$_POST['password'];
    $phone=mysqli_real_escape_string($connection, $phone);
    $password=mysqli_real_escape_string($connection, $password);

    $query="SELECT * FROM users WHERE phone_no='{$phone}' AND surname='{$password}'";
    $login=mysqli_query($connection, $query);
    while ($row=mysqli_fetch_assoc($login)){
        $user_id=$row['user_id'];
        $user_no=$row['phone_no'];
        $user_pass=$row['surname'];
        $user_role=$row['user_role'];
        $name=$row['firstname'];

    }
    //
    $query="SELECT * FROM admin WHERE username='{$phone}' AND password='{$password}'";
    $login=mysqli_query($connection, $query);
    while ($row=mysqli_fetch_array($login)){
        $admin_id=$row['admin_id'];
        $admin_username=$row['username'];
        $admin_pass=$row['password'];
        $admin_name=$row['name'];

    }
    //doctor
    $query2="SELECT * FROM doctor WHERE username='{$phone}' AND password='{$password}'";
    $login2=mysqli_query($connection, $query2);
    while ($row=mysqli_fetch_assoc($login2)){
        $doctor_id=$row['doctor_id'];
        $doctor_username=$row['username'];
        $doctor_pass=$row['password'];
        $doctor_name=$row['name'];
    }

    if ( empty($phone) || empty($password) ){
        $message = "Field cannot be empty";
    }
    else if (($phone === $user_no) && ($password == $user_pass) &&($user_role==='patient')){
        $_SESSION['user_id']=$user_id;
        $_SESSION['user_role']=$user_role;
        $_SESSION['phone']=$user_no;
        $_SESSION['surname']=$user_pass;
        $_SESSION['name']=$name;

        header("Location: dashboard.php");
    }
    else if (($phone === $admin_username) && ($password === $admin_pass)){
        $_SESSION['admin_id']=$admin_id;
        $_SESSION['admin_name']=$admin_name;
        $_SESSION['admin_username']=$admin_username;
        header("Location: admin/dashboard.php");
    }
    else if (($phone === $doctor_username) && ($password === $doctor_pass)){
        $_SESSION['doctor_id']=$doctor_id;
        $_SESSION['doctor_name']=$doctor_name;
        $_SESSION['doctor_username']=$doctor_username;
        header("Location: doctor.php");
    }

    else if ( ($phone !== $user_no) || ($password !== $user_pass) ){
        $message = "Incorrect Username or Password";
    }

    else{
        $message = die("CONNECTION FAILED check your network". mysqli_error($connection));
    }

}

?>
<div class="container " style="margin-bottom: 150px; margin-top: 150px;">
    <div class="row">
        <div class="col-md-6 offset-md-3 shadow ">
            <h1 class=" text-center mt-3 mb-1 large-font blue">SIGN IN</h1>
            <form action="" class="p-5 lm-bold" method="post">
                <div class="form-group mb-4">
                    <input type="text" name="phone_no" class="form-control" placeholder="User Id" id="" required>
                </div>
                <div class="form-group mb-4">
                    <input type="password" name="password" class="form-control" placeholder="Password" id="" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Sign in" class="btn bt-blue btn-block">
                </div>
            </form>
        </div>
    </div>
</div>
<?php include "includes/footer.php"; ?>