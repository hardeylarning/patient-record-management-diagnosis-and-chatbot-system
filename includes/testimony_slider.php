<section id="service">
    <div class="container mt-5">
        <div class="row">
                <div class="col-lg-12">
                    <h1 class="text-center blue lm-bold">Testimonials</h1>
                    <h1 class="text-center"> <i class="fas fa-quote-left fa-2x blue"></i></h1>
                </div>
                    <div class="col-lg-12">
                <div id="slide1" class="carousel slide" data-ride="carousel" data-interval="5000">
                    <ol class="carousel-indicators">
                        <li class="active bg-dark" data-target="#slide1" data-slide-to="0"></li>
                        <?php
                        $count=0;
                        $test_query="SELECT * FROM testimonials";
                        $select_count=mysqli_query($connection,$test_query);
                        while($row = mysqli_fetch_assoc($select_count)){
                            $count+=1;
                            echo "<li data-target='#slide1' class='bg-dark' data-slide-to= '$count'></li>";

                        } ?>
                    </ol>
                    <div class="carousel-inner justify-content-center" style=" height: 200px;">
                        <div class="carousel-item active">
                            <span class="lead text-center d-block slider orange lm-bold-italic" style="">Finding good hospital has <br>
                                    always been a difficult task for me until I came across Patient's Choice
                                <span class="lead text-center d-block mt-5 blue lm-bold-italic">Dr. Bright</span>
                            </span>

                        </div>
                                <?php
                                $test_query="SELECT * FROM testimonials";
                                $select_count=mysqli_query($connection,$test_query);
                                while($row = mysqli_fetch_assoc($select_count)){
                                    $count+=1;
                                    $t_id = $row['testimony_id'];
                                    $title=$row['title'];
                                    $author_name=$row['author_name'];
                                    $content=$row['content'];
                                    ?>

                        <div class="carousel-item">
                                <p class="lead text-center d-block w-100 slider orange lm-bold-italic" ><?php echo $content ?>
                                    <span class="lead text-center d-block mt-5 blue lm-bold-italic"><?php echo $title.' '.$author_name ?></span>
                                </p>

                        </div>
                                <?php }
                                ?>
                        <a href="#slide1" class="carousel-control-prev" data-slide="prev" role="button">
                            <span class="blue display-2 font-weight-bold">&lsaquo;</span>
                        </a>
                        <a href="#slide1" class="carousel-control-next " data-slide="next" role="button">
                            <span class="blue display-2 font-weight-bold">&rsaquo;</span>
                        </a>
                    </div>

                    </div>
                </div>
            </div>
        </div>
</section>
