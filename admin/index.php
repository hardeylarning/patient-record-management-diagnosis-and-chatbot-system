<!--header include -->
<?php include "../includes/header.php"; ?>
<?php
if (isset($_SESSION['admin_username']) && !empty($_SESSION['admin_username']) && isset($_SESSION['admin_password']) && !empty($_SESSION['admin_password'])){
    header("Location: dashboard.php");
}
?>
<?php include "../includes/navigation.php";?>


<?php
global $message, $user_name, $user_pass, $admin_id, $name ;
if (isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $username=mysqli_real_escape_string($connection, $username);
    $password=mysqli_real_escape_string($connection, $password);

    $query="SELECT * FROM admin WHERE username='{$username}' AND password='{$password}'";
    $login=mysqli_query($connection, $query);
    while ($row=mysqli_fetch_array($login)){
        $admin_id=$row['admin_id'];
        $admin_username=$row['username'];
        $admin_pass=$row['password'];
        $admin_name=$row['name'];

    }
    if  (($username === $admin_username) && ($password === $admin_pass)){
        $_SESSION['admin_id']=$admin_id;
        $_SESSION['admin_name']=$admin_name;
        $_SESSION['admin_username']=$admin_username;
        $_SESSION['admin_password']=$admin_pass;
        if (!isset($_SESSION['admin_time'])){
            $_SESSION['admin_time']=date("His");
        }

        header("Location: dashboard.php");
    }
    else if ( empty($username) || empty($password) ){
        $message = "Field cannot be empty";
    }
    else if ( ($username !== $user_name) || ($password !== $user_pass) ){
        $message = "Incorrect Username or Password";
    }

    else{
        $message = die("QUERY FAILED". mysqli_error($connection));
    }

}

?>
<div class="container justify-content-center mt-3 p-5" style="margin-bottom: 70px">
    <div class="row">
        <div class="col-md-6 offset-md-3 shadow ">
        <h1 class="display-3 text-center lm-bold blue mt-3 mb-1">SIGN IN</h1>
        <form action="" class="p-5 lm-bold" method="post">
            <div class="form-group mb-4">
                <input type="text" name="username" class="form-control" placeholder="Enter Your Username Here" id="" autocomplete="off">
            </div>
            <div class="form-group mb-4">
                <input type="password" name="password" class="form-control" placeholder="Enter Your Password here" id="" autocomplete="off">
            </div>
            <p class="text-danger bg-dark"><?php echo $message; ?></p>
            <div class="form-group">
                <input type="submit" name="submit" value="Sign in" class="btn bt-blue btn-block rounded-circle">
            </div>
        </form>
        </div>
    </div>
</div>
<?php include "../includes/footer.php"; ?>