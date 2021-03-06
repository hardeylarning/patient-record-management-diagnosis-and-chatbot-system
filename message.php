<!--header include -->

<?php include "includes/header.php";
if (!isset($_SESSION['user_id']) && !isset($_SESSION['phone'])){
    header("Location: ./index.php");
}
include "includes/navigation.php"; ?>
<div class="container-fluid shadow">
    <div class="row justify-content-between">
        <div class="col-md-3 ">
            <!--            sidebar-->
            <?php include "includes/sidebar.php"; ?>
        </div>
        <div class="col-md">
            <h3 class="text-center mt-0">DROP MESSAGE</h3>
            <hr class="p-3">
                <?php
                if (isset($_SESSION['message'])){
                    $message= $_SESSION['message'];
                    echo "<p class=\"lead\">$message</p>";
                    $_SESSION['message']=null;
                }
                ?>
                <?php
                if (isset($_POST['send'])) {
                    $sender_name1 = $_POST['sender_name'];
                    $sender_no1 = $_POST['sender_no'];
                    $receiver_name1 = $_POST['receiver_name'];
                    $receiver_no1 = $_POST['receiver_no'];
                    $subject1 = $_POST['subject'];
                    $body1 = $_POST['body'];
                    $date = date("l jS \of F Y h:i:s A");

                    $query = "INSERT INTO messages(sender_name, sender_no, receiver_name, receiver_no, subject, body, message_date)";
                    $query .= " VALUES('$sender_name1', '$sender_no1', '$receiver_name1', '$receiver_no1', '$subject1', '$body1', '$date')";
                    $message = mysqli_query($connection, $query);
                    if ($message) {
                        $_SESSION['message'] = "<script>alert('Message was successfully sent')</script>";
                        header("Location: message.php");
                    } elseif (!isset($message)) {
                        echo "Query Failed" . mysqli_error($connection);
                    }
                }
                ?>
            <form action="" method="post" class="lm-bold p-3">
                <div class="container-fluid">
                    <div class="form-group ">
                        <label for="subject">Subject</label>
                        <input type="text" name="subject" required class="form-control" placeholder="Subject" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Body</label>
                        <textarea placeholder="Body" class="form-control" required name="body" rows="4"></textarea>
                    </div>
                    <input type="hidden" name="sender_name" value="<?php echo $_SESSION['surname'].' '.$_SESSION['name'] ?>">
                    <input type="hidden" name="sender_no" value="<?php echo $_SESSION['phone'] ?>">
                    <input type="hidden" name="receiver_name" value="Dr. Olaosebikan Akande">
                    <input type="hidden" name="receiver_no" value="doctor">
                    <div class="form-group justify-content-center mx-5">
                        <input type="submit" value="SEND" name="send" class="btn mt-5 btn-outline-primary btn-block">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--footer include -->
<?php include "includes/footer.php"; ?>

