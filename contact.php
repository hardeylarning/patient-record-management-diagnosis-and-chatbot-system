<!--header include -->
<?php include "includes/header.php"; ?>
<!--Navigation include -->
<?php include "includes/navigation.php"; ?>
<?php
if (isset($_POST['submit'])){

    $name=$_POST['author_name'];
    $number=$_POST['author_no'];
    $author_email=$_POST['author_email'];
    $content=$_POST['message'];


        $contact_query="INSERT INTO contacts(author_name, author_no, author_email, message, message_date)";
        $contact_query .=" VALUES('{$name}', '{$number}', '{$author_email}', '{$content}', now())";
        $contact=mysqli_query($connection, $contact_query);
        if ($contact){
            echo "<p class='bg-dark text-center'><script> alert('Your message has been successfully sent') </script></p>";
        }
}
?>
<div class="container" style="margin-bottom: 200px; margin-top: 100px">
    <div class="row justify-content-between">
        <div class="col-md-6">
            <h2 class="lm-bold blue">Address</h2>

            <p class="lead orange lm-bold">11, Osun State University road, Osogbo, Osun State.</p>
            <h2 class="lm-bold blue">Phone:</h2>
            <p class="lead orange lm-bold">+234(0) 706 513 4560</p>
            <h2 class="lm-bold blue">Email:</h2>

            <p class="lead orange lm-bold">hardeylarning@gmail.com</p>
        </div>
        <div class="col-md-6">
            <form action="" method="post">
                <h2 class="blue lm-bold">Leave a message</h2>
                <div class="">
                    <input type="text" name="author_name" class="form-control lm-bold bg-blue " placeholder="Name" id="" required>
                </div>
                <div class="">
                    <input type="text" name="author_email" class="form-control lm-bold bg-blue " placeholder="Email" id="" required>
                </div>
                <div class="mb-2">
                    <input type="text" name="author_no" class="form-control lm-bold bg-blue " placeholder="Mobile" id="" required>
                </div>
                <div class="form-group">
                    <textarea name="message" id="" rows="3" required class="form-control mb-0 lm-bold bg-blue" placeholder="Message"></textarea>
                    <div class="mt-0" style="float: right;">
                        <input type="submit" value="Submit" name="submit" class="btn1 text-muted lm-bold">
                    </div>
                </div>

            </form>
        </div>
    </div>
    <div class="container justify-content-center mt-5">
        <h5 class="text-center">SOCIAL LINKS</h5>
        <nav class="d-flex flex-fill">
            <a class="mr-2" href=""><i class="fa fa-facebook-official" style="font-size: 50px;"></i></a>
            <a href=""><i class="fa fa-instagram" style="font-size: 50px;"></i></a>
            <a href=""><i class="fa fa-twitter" style="font-size: 50px;"></i></a>
        </nav>
    </div>
</div>


<!--footer include -->
<?php include "includes/footer.php"; ?>
