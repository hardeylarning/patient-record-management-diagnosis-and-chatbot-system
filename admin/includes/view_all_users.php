<table class="table table-responsive table-bordered table-hover">
    <thead>
    <tr class="text-lowercase">
        <th>ID</th>
        <th>FIRSTNAME</th>
        <th>LASTNAME</th>
        <th>PHONE NO</th>
        <th>IMAGE</th>
        <th>GENDER</th>
        <th>DOB</th>
        <th>NOK</th>
        <th>BG</th>
        <th>GENOTYPE</th>
        <th>ADDRESS</th>
        <th>DATE</th>
        <th>Edit</th>
        <th>Delete</th>
        <th>ADD</th>
        <th>VIEW</th>

    </tr>
    </thead>
    <tbody>
    <?php
    $query= "SELECT * FROM users";
    $select_users=mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($select_users)) {
        $user_id = $row['user_id'];
        $firstname = $row['firstname'];
        $surname = $row['surname'];
        $phone_no = $row['phone_no'];
        $gender = $row['gender'];
        $date_of_birth = $row['date_of_birth'];
        $next_of_kin = $row['next_of_kin'];
        $blood_group = $row['blood_group'];
        $genotype = $row['genotype'];
        $picture = $row['picture'];
        $address = $row['address'];
        $registered_date = $row['registered_date'];
        echo " <tr>";
        echo "<td>$user_id</td>";
        echo "<td>$firstname</td>";
        echo "<td>$surname</td>";
        echo "<td>$phone_no</td>";
        echo "<td><img class='img-fluid' src='../images/$picture' alt='' style='width: 128px; height: 128px'></td>";
        echo "<td>$gender</td>";
        echo "<td>$date_of_birth</td>";
        echo "<td>$next_of_kin</td>";
        echo "<td>$blood_group</td>";
        echo "<td>$genotype</td>";
        echo "<td>$address</td>";
        echo "<td>$registered_date</td>";
        echo "<td><a href='users.php?source=edit_user&u_id=$user_id' class='btn btn-sm btn-success'>Edit</td>";
        echo "<td><a onclick=\" return confirm('Are you sure you want to delete a user?')\" href='users.php?delete=$user_id' class='btn btn-sm btn-danger' >Delete</a></td>";
        echo "<td ><a href='users.php?source=add_report&u_id=$user_id' style='font-size: 13px;' class='btn btn-sm btn-outline-primary'>Add report</td>";
        echo "<td><a href='users.php?source=view_report&u_id=$user_id' style='font-size: 13px;' class='btn btn-sm btn-outline-success'>View reports</td>";
        echo " </tr>";
    }
    ?>
    </tbody>
</table>

<?php

if (isset($_GET['delete'])){
    $delete_id=$_GET['delete'];
    $query =" DELETE FROM users WHERE user_id={$delete_id}";
    $delete_user=mysqli_query($connection, $query);
    header("Location: users.php");
}
?>
