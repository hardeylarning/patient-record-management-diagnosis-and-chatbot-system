<!--header include -->
<?php include "includes/header.php";
if (!isset($_SESSION['doctor_id']) && !isset($_SESSION['doctor_username'])){
    header("Location: ./index.php");
}
?>
<!--Navigation include -->
<?php include "includes/navigation.php"; ?>
<div class="container mt-4 " style="margin-bottom: 300px">
    <p class="lead mt-2 display-4 large-font lm-bold orange mb-4">
        Welcome back <small class="text-muted">
            <?php if (isset($_SESSION['doctor_name'])){echo $_SESSION['doctor_name']; }?>
        </small>
    </p>
    <h3 class="text-center large-font mt-2 mb-4">Message(s)</h3>
    <div class="row justify-content-center">
        <?php
        if (isset($_SESSION['message'])){
            $message= $_SESSION['message'];
            echo "<p class=\"lead\">$message</p>";
            $_SESSION['message']=null;
        }
        ?>
        <?php
        global $subject, $sender_name, $sender_no, $receiver_name, $receiver_no;
        if (isset($_SESSION['doctor_username'])) {
            $doctor_username = $_SESSION['doctor_username'];
        }
        if (isset($_POST['send'])) {
            $sender_name1 = $_POST['sender_name'];
            $sender_no1 = $_POST['sender_no'];
            $receiver_name1 = $_POST['receiver_name'];
            $receiver_no1 = $_POST['receiver_no'];
            $subject1 = $_POST['subject'];
            $body1 = $_POST['body'];
            $date = date("l jS \of F Y h:i:s A");

            $query = "INSERT INTO messages(sender_name, sender_no, receiver_name, receiver_no, subject, body, message_date)";
            $query .= " VALUES('$receiver_name1', '$receiver_no1', '$sender_name1', '$sender_no1', '$subject1', '$body1', '$date')";
            $message = mysqli_query($connection, $query);
            if ($message) {
                $_SESSION['message'] = "<script>alert('Message was successfully sent')</script>";
                header("Location: doctor.php");
            } elseif (!isset($message)) {
                echo "Query Failed" . mysqli_error($connection);
            }
        }

        $query1 = "SELECT * FROM messages WHERE receiver_no = '{$doctor_username}' ORDER BY msg_id DESC";
            $select_message = mysqli_query($connection, $query1);
            if (!$select_message){
                echo "Query Failed".mysqli_error($connection);
            }
                while($row = mysqli_fetch_assoc($select_message))  {
                    $msg_id = $row['msg_id'];
                    $sender_name = $row['sender_name'];
                    $sender_no = $row['sender_no'];
                    $receiver_name = $row['receiver_name'];
                    $receiver_no = $row['receiver_no'];
                    $subject = $row['subject'];
                    $body = $row['body'];
                    $message_date = $row['message_date'];
                    ?>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                from: <?php echo $sender_name ?>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-muted border-bottom">Subject: &nbsp;&nbsp; <?php echo $subject ?></h5>
                                <p class="card-text">
                                    <?php echo $body ?>
                                </p>
                                <a href="#reply<?php echo $msg_id?>" data-toggle="modal" class="btn btn-outline-success">REPLY</a>
                                <a href="doctor.php?delete=<?php echo $msg_id?>"
                                   onclick=" return confirm('Are you sure you want to delete this message?')"
                                   class="btn justify-content-end btn-outline-danger">DELETE</a>
                            </div>
                            <div class="card-footer text-muted">Date: &nbsp;&nbsp;
                                <span class="badge badge-info lm-bold mr-auto"><?php echo $message_date; ?></span></div>
                        </div>
                        <div class="modal" id="reply<?php echo $msg_id?>" tabindex="-1" role="dialog" aria-labelledby="replyLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="reply<?php echo $msg_id?>">Reply: &nbsp;&nbsp; <?php echo $subject?></h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true" class="text-danger">&times;</span>
                                        </button>
                                    </div>
                                    <form action="doctor.php?d_id=<?php echo $_SESSION['doctor_id']?>" method="post" enctype="multipart/form-data" class="lm-bold p-3">
                                        <div class="modal-body">
                                            <div class="container-fluid">
                                                <p class="card-text">
                                                    <?php echo $body ?>
                                                </p>
                                                <div class="form-group">
                                                    <textarea placeholder="Reply message" class="form-control" required name="body" rows="3"></textarea>
                                                </div>
                                                <div class="card-header">
                                                    Sender: <?php echo $sender_name ?>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="subject" value="<?php echo $subject ?>">
                                        <input type="hidden" name="sender_name" value="<?php echo $sender_name ?>">
                                        <input type="hidden" name="sender_no" value="<?php echo $sender_no ?>">
                                        <input type="hidden" name="receiver_name" value="<?php echo $receiver_name ?>">
                                        <input type="hidden" name="receiver_no" value="<?php echo $receiver_no ?>">
                                        <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-primary" name="send" value="Send">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                <?php }

        if (!isset($sender_no)) {
            echo "<h3 class='text-center mt-5'> No message(s) is available</h3>";
        }
            ?>
    </div>
</div>
<?php
if (isset($_GET['delete'])){
    $delete_id=$_GET['delete'];
    $query =" DELETE FROM messages WHERE msg_id={$delete_id}";
    $delete_message=mysqli_query($connection, $query);
    header("Location: doctor.php");
}
?>
<!--footer include -->
<?php include "includes/footer.php"; ?>

