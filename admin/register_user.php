<?php include "includes/header.php"; ?>
<?php

global $success,$phone, $message, $user_number;
if (isset($_POST['register'])){
    $phone_no= $_POST['phone_no'];
    $firstname= $_POST['firstname'];
    $surname= $_POST['surname'];
    $gender= $_POST['gender'];
    $date_of_birth= $_POST['date_of_birth'];
    $next_of_kin= $_POST['next_of_kin'];
    $blood_group= $_POST['blood_group'];
    $genotype=$_POST['genotype'];
    $address= $_POST['address'];
    $user_role='patient';
    //
    $phone_no=mysqli_real_escape_string($connection, $phone_no);
    $firstname=mysqli_real_escape_string($connection, $firstname);
    $surname=mysqli_real_escape_string($connection, $surname);
    $gender=mysqli_real_escape_string($connection, $gender);
    $next_of_kin=mysqli_real_escape_string($connection, $next_of_kin);
    $date_of_birth=mysqli_real_escape_string($connection, $date_of_birth);
    $address=mysqli_real_escape_string($connection, $address);
    $genotype=mysqli_real_escape_string($connection, $genotype);
    $blood_group=mysqli_real_escape_string($connection, $blood_group);
    $picture=$_FILES['picture']['name'];
    $picture_temp=$_FILES['picture']['tmp_name'];
    $registered_date=date('Y-m-d');

    $phone_query="SELECT * FROM users ";
    $result = mysqli_query($connection,$phone_query);
    while ($user=mysqli_fetch_assoc($result)){
        $user_number=$user['phone_no'];
    }

    if ($user_number==$phone_no){
        $message="Phone Number is already exists";
    }

    else{
        move_uploaded_file($picture_temp, "../images/$picture");
        $query= "INSERT INTO users(phone_no,firstname,surname,gender,date_of_birth,next_of_kin,blood_group,genotype,";
        $query.=" user_role,picture,address,registered_date)";
        $query.=" VALUES('{$phone_no}', '{$firstname}','{$surname}', '{$gender}', '{$date_of_birth}', '{$next_of_kin}',";
        $query.="'{$blood_group}', '{$genotype}', '{$user_role}', '{$picture}', '{$address}', '{$registered_date}')";
        $register_user=mysqli_query($connection, $query);
        //
        if ($register_user){
            $success = "New Patient has been registered successfully";
        }
        else {
            die("CONNECTION FAILED". mysqli_error($connection));
        }
    }
}

?>
<div class="container shadow" style=" margin-top: 30px; margin-bottom: 30px;">
    <h1 class=" text-center mb-1 large-font blue">Registration form</h1>
    <?php if (isset($success)){ echo "<p class=' text-success text-center'> $success</p>";} ?>
    <form action="" method="post" enctype="multipart/form-data" class="lm-bold p-3" >
        <div class="row justify-content-between">
                <div class="col-md">
                    <div class="form-group ">
                        <label for="">First Name</label>
                        <input type="text" name="firstname" class="form-control" placeholder="first name" id="" required>
                    </div>
                    <div class="form-group ">
                        <label for="">Surname</label>
                        <input type="text" name="surname" class="form-control" placeholder="surname" id="" required>
                    </div>
                    <div class="form-group ">
                        <label for="">Phone Number</label>
                        <input type="text" name="phone_no"  class="form-control" placeholder="phone number" id="" required >
                        <?php if (isset($message)){ echo "<p class=' text-danger'> $message</p>";} ?>
                    </div>
                    <div class="form-group ">
                        <label for="">Gender</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-group ">
                        <label for="">Blood Group</label>
                        <select name="blood_group" id="blood" class="form-control" required>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                        </select>
                    </div>

                </div>
                <div class="col-md">
                    <div class="form-group ">
                        <label for="">Genotype</label>
                        <select name="genotype" id="genotype" class="form-control" required>
                            <option value="AA">AA</option>
                            <option value="AS">AS</option>
                            <option value="AC">AC</option>
                            <option value="SS">SS</option>
                            <option value="SC">SC</option>
                            <option value="CC">CC</option>
                        </select>
                    </div>
                    <div class="form-group ">
                        <label for="">Date of Birth</label>
                        <input type="text" name="date_of_birth" class="form-control" placeholder="DOB" id="">
                    </div>
                    <div class="form-group ">
                        <label for="">Next of Kin</label>
                        <input type="text" name="next_of_kin" class="form-control" placeholder="Next of Kin" id="">
                    </div>
                    <div class="form-group ">
                        <label for="">Contact Address</label>
                        <input type="text" name="address" class="form-control" placeholder="Address" required>
                    </div>
                    <div class="form-group ">
                        <label for="">Upload your Passport</label>
                        <input type="file" name="picture" class="form-control" id="">
                    </div>
                </div>
                <div class="form-group justify-content-center mx-5 container ">
                    <input type="submit" value="Register" name="register" class="btn mt-5 bt-blue btn-block">
                </div> </div>
        </div>
    </form>
</div>
<?php include "includes/footer.php"; ?>