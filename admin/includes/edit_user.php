<?php
if (isset($_GET['u_id'])){
    $u_id= $_GET['u_id'];
}

  $query = "SELECT * FROM users WHERE user_id= {$u_id}";
    $select_user = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($select_user)) {
    $user_id = $row['user_id'];
    $firstname = $row['firstname'];
    $surname = $row['surname'];
    $phone_no = $row['phone_no'];
    $gender = $row['gender'];
    $date_of_birth = $row['date_of_birth'];
    $next_of_kin = $row['next_of_kin'];
    $blood_group = $row['blood_group'];
    $genotype = $row['genotype'];
    $user_role = $row['user_role'];
    $picture = $row['picture'];
    $address = $row['address'];

}
//submission validation
if (isset($_POST['update_profile'])){
    $phone_no= $_POST['phone_no'];
    $firstname= $_POST['firstname'];
    $surname= $_POST['surname'];
    $gender= $_POST['gender'];
    $date_of_birth= $_POST['date_of_birth'];
    $next_of_kin= $_POST['next_of_kin'];
    $blood_group= $_POST['blood_group'];
    $genotype=$_POST['genotype'];
    $address= $_POST['address'];
    $picture=$_FILES['picture']['name'];
    $picture_temp=$_FILES['picture']['tmp_name'];
    move_uploaded_file($picture_temp, "../images/$picture");
    if (empty($picture)){
        $query="SELECT * FROM users WHERE user_id= $u_id";
        $select_image = mysqli_query($connection,$query);
        while ($row=mysqli_fetch_assoc($select_image)){
            $picture = $row['picture'];
        }
    }

    $query = "UPDATE users SET phone_no='{$phone_no}', firstname='{$firstname}', ";
    $query.=" surname='{$surname}', gender='{$gender}', date_of_birth='{$date_of_birth}', next_of_kin='{$next_of_kin}',";
    $query.=" blood_group='{$blood_group}', genotype='{$genotype}', picture='{$picture}', address='{$address}'";
    $query.=" WHERE user_id={$u_id} ";
    $update_profile=mysqli_query($connection, $query);
    if ($update_profile){
        $_SESSION['message']="<script>alert('User Profile has been Successfully Updated')</script>";
        header("Location: users.php");
    }
}
?>

<div class="container justify-content-center mt-5 p-5 border">
    <h1 class="text-center mt-0">UPDATE USER'S RECORD</h1>
    <form action="" method="post" enctype="multipart/form-data" class="lm-bold p-3">
        <div class="row justify-content-between">
            <div class="col-md">
                <div class="form-group ">
                    <label for="">First Name</label>
                    <input type="text" name="firstname" value="<?php echo $firstname; ?>" class="form-control" placeholder="First name" required>
                </div>
                <div class="form-group ">
                    <label for="">Surname</label>
                    <input type="text" name="surname" class="form-control"  value="<?php echo $surname; ?>" placeholder="Surname" required>
                </div>
                <div class="form-group ">
                    <label for="">Phone Number</label>
                    <input type="text" name="phone_no"  class="form-control"  value="<?php echo $phone_no; ?>" placeholder="Phone number" required >
                </div>
                <div class="form-group">
                    <label for="">Gender</label>
                    <input type="text" name="gender"  value="<?php echo $gender; ?>"  class="form-control" placeholder="Gender">
                </div>
                <div class="form-group ">
                    <label for="">Blood Group</label>
                    <input type="text" name="blood_group"  value="<?php echo $blood_group; ?>"  class="form-control" placeholder="Blood Group">
                </div>
                <div class="form-group ">
                    <label for="">Genotype</label>
                    <input type="text" name="genotype"  value="<?php echo $genotype; ?>"  class="form-control" placeholder="Genotype">
                </div>
            </div>
            <div class="col-md">
                <div class="form-group ">
                    <label for="">Date of Birth</label>
                    <input type="text" name="date_of_birth"  value="<?php echo $date_of_birth; ?>" class="form-control" placeholder="DOB" id="">
                </div>
                <div class="form-group ">
                    <label for="">Next of Kin</label>
                    <input type="text" name="next_of_kin" class="form-control"  value="<?php echo $next_of_kin; ?>" placeholder="Next of Kin" id="">
                </div>
                <div class="form-group ">
                    <label for="">Contact Address</label>
                    <input type="text" name="address" class="form-control"  value="<?php echo $address; ?>" placeholder="Address" required>
                </div>
                <div class="form-group ">
                    <label for="">Change Passport if you want to</label>
                    <img class='img-fluid ' width="150px" height="150px" src='../images/<?php echo $picture; ?>' alt=''>
                    <input type="file" name="picture" class="form-control" id="">
                </div>
                <div class="form-group justify-content-center mx-5">
                    <input type="submit" value="Update" name="update_profile" class="btn mt-5 bt-blue btn-block">
                </div>
            </div>

        </div>
    </form>
</div>