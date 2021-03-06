<?php include "includes/header.php"; ?>
<div class="container-fluid mt-3 text-center bold-sm" style="margin-bottom: 500px;">
    <table class="table table-bordered table-hover">
        <thead>
        <tr class="lm-bold blue">
            <th>ID</th>
            <th>Sender Name</th>
            <th>Sender No.</th>
            <th>Sender Email</th>
            <th>Message Received</th>
            <th>Message Date</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $query= "SELECT * FROM contacts ORDER BY contact_id DESC ";
        $select_messages=mysqli_query($connection, $query);
        while ($row=mysqli_fetch_assoc($select_messages)){
            echo " <tr >";
            $contact_id = $row['contact_id'];
            $full_name = $row['author_name'];
            $sender_no = $row['author_no'];
            $sender_email=$row['author_email'];
            $message = $row['message'];
            $message_date = $row['message_date'];
            echo "<td>{$contact_id}</td>";
            echo "<td>{$full_name}</td>";
            echo "<td>{$sender_no}</td>";
            echo "<td>{$sender_email}</td>";
            echo "<td>{$message}</td>";
            echo "<td>{$message_date}</td>";
            echo "<td><a class='btn btn-outline-danger btn-sm' onclick=\" return confirm('Are you sure you want to delete message?')\" href='contacts.php?delete={$contact_id}'>Delete</a></td>";
            echo " </tr>";
        }

        ?>

        </tbody>
    </table>
</div>

<?php
if (isset($_GET['delete'])){
    $delete_id=$_GET['delete'];
    $query =" DELETE FROM contact WHERE contact_id={$delete_id}";
    $delete=mysqli_query($connection, $query);
    header("Location: contacts.php");
}
?>

<?php include "includes/footer.php"; ?>