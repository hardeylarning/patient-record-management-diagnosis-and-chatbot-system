<?php
if (isset($_POST['testify'])){
    $title=$_POST['title'];
    $author_name=$_POST['author_name'];
    $content=$_POST['content'];
    $query="INSERT INTO testimonials(title, author_name, content, testified_date)";
    $query.=" VALUES('{$title}', '{$author_name}', '{$content}', now())";
    $testimony=mysqli_query($connection, $query);
    if (!$testimony){
        echo "<script> alert('Connection Failed') </script>";

    }
    else{
        header('Location: index.php');
    }

}
?>
<form action="" class="p-5" method="post">
    <h4 class="text-center blue lm-bold">Give your testimony here</h4>
    <div class="form-group">
        <label for="" class="lm-bold">Title</label>
        <input type="text" name="title" class="form-control lm-bold" placeholder="e.g Mr. Prof. Dr. Chief" id="">
    </div>
    <div class="form-group">
        <label for="" class="lm-bold">Your FullName</label>
        <input type="text" name="author_name" class="form-control lm-bold" placeholder="Enter Your Name here" id="" required>
    </div>
    <div class="form-group">
        <label for="" class="lm-bold">Testimony</label>
        <textarea name="content" id="" rows="3" required class="form-control mb-0 lm-bold" placeholder="Give your testimony here your testimony means a lot to us."></textarea>
    </div>
    <div class="form-group">
        <input type="submit" value="Testify" name="testify" class="btn bt-blue lm-bold btn-block">
    </div>
</form>
