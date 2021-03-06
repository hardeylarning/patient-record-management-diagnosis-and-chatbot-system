<section id="service">
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 mb-4">
                <div id="slide" class="carousel slide" data-ride="carousel" data-interval="5000">
                    <ol class="carousel-indicators">
                        <li class="active" data-target="#slide" data-slide-to="0"></li>
<?php
$counter=0;
$query="SELECT * FROM wallpapers";
$select=mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc($select)){
    $counter+=1;
   echo "<li data-target='#slide' data-slide-to= '$counter'></li>";

    } ?>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/1.jpg" alt="" class="d-block w-100 slider">
                            <div class="carousel-caption d-none d-md-block">
                                <p class="display-5">Hire chef is the best place to find a competent chef.</p>
                            </div>
                        </div>
<?php
$query="SELECT * FROM wallpapers";
$select=mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc($select)){
    $counter+=1;
    $wall_id = $row['wall_id'];
    $image=$row['image'];
    $description=$row['description'];
    ?>

                        <div class="carousel-item">
                                <img src="wallpapers/<?php echo  $image; ?>" alt="" class="d-block w-100 slider">
                            <div class="carousel-caption d-none d-md-block">
                                <p class="display-5"><?php echo $description; ?></p>
                            </div>
                            </div>
    <?php }
    ?>
                    </div>
                    <a href="#slide" class="carousel-control-prev" data-slide="prev" role="button">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a href="#slide" class="carousel-control-next" data-slide="next" role="button">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
