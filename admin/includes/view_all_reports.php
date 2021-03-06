<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>S/N</th>
        <th>FIRSTNAME</th>
        <th>LASTNAME</th>
        <th>PHONE NO</th>
        <th>GENDER</th>
        <th>COMPLAINT</th>
        <th>DRUG</th>
        <th>DIAGNOSIS</th>
        <th>DATE</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $i =1;
    $query= "SELECT * FROM reports ORDER BY report_id DESC ";
    $all_reports=mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($all_reports)) {
        $report_id = $row['report_id'];
        $phone_no = $row['phone_no'];
        $complaint = $row['complaint'];
        $drug = $row['prescription_of_drug'];
        $diagnosis= $row['diagnosis'];
        $report_date = $row['report_date'];

    $query = "SELECT * FROM users WHERE phone_no= '{$phone_no}'";
    $select_user = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($select_user)) {
        $firstname = $row['firstname'];
        $surname = $row['surname'];
        $gender = $row['gender'];
    }
        echo " <tr>";
        echo "<td>$i</td>";
        echo "<td>$firstname</td>";
        echo "<td>$surname</td>";
        echo "<td>$phone_no</td>";
        echo "<td>$gender</td>";
        echo "<td>$complaint</td>";
        echo "<td>$drug</td>";
        echo "<td>$diagnosis</td>";
        echo "<td>$report_date</td>";
        echo "<td><a href='reports.php?report=edit_report&r_id=$report_id' class='btn btn-sm btn-outline-primary'>Edit</td>";
        echo "<td><a onclick=\" return confirm('Are you sure you want to delete a user?')\" href='reports.php?delete=$report_id' class='btn btn-sm btn-outline-danger' >Delete</a></td>";
        echo " </tr>";
        $i++;
    }
    ?>
    </tbody>
</table>
<?php

if (isset($_GET['delete'])){
    $delete_id=$_GET['delete'];
    $query =" DELETE FROM reports WHERE report_id={$delete_id}";
    $delete_report=mysqli_query($connection, $query);
    header("Location: reports.php");
}
?>
