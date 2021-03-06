<?php include "../includes/db.php";?>
<div class="jumbotron-fluid bg-dark sticky-top">

    <nav class="navbar navbar-expand-lg justify-content-between text-decoration-none font-weight-bold navbar-light" style="background: white; font-size: 35px; font-family: 'Times New Roman'; ">
        <a href="" class="navbar-brand ">
            <p class="mb-0 mr-5"><img src="../images/edited.png" alt="" style="height: 60px"></p>
        </a>
        <button class="navbar-toggler " data-toggle="collapse" data-target="#main"  style=" border: solid #F96F00 2px; border-radius: 3px; ">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main">
            <ul class="navbar-nav ml-5 justify-content-between text-decoration-none" style="color: #153878;">
                <?php
                $pager=basename($_SERVER['PHP_SELF']);

                $home="index.php";
                $hire="hires.php";
                $login="login.php";
                $contact="contact.php";
                $about="about.php";
                $home_active="";
                $hire_active="";
                $contact_active="";
                $about_active="";
                $dash_active="";
                $login_active="";

                if ($pager==$home){
                    $home_active="b-bottom text-muted";
                }
                elseif ($pager==$hire){
                    $hire_active="b-bottom text-muted";
                }
                elseif ($pager==$contact){
                    $contact_active="b-bottom text-muted";
                }
                elseif ($pager==$about){
                    $about_active="b-bottom text-muted";
                }
                elseif ($pager==$login){
                    $login_active="b-bottom text-muted";
                }


                ?>
                    <li class='mr-4  '><a href="../index.php" class='text-decoration-none large-font blue <?php echo $home_active; ?>' >Home</a></li>
                    <li class="mr-4"><a href="../about.php" class="text-decoration-none large-font blue <?php echo $about_active; ?>">About</a></li>
                    <li class="mr-4 dropdown btn-group">
                        <a href="..hires.php" class="text-decoration-none large-font orange <?php echo $hire_active; ?>">Hire</a>
                        <a class="dropdown-toggle dropdown-toggle-split text-decoration-none mt-2" data-toggle="dropdown" style="color:#F96F00; "></a>
                        <div class="dropdown-menu dropdown-menu-left">
                            <?php
                            $query= "SELECT * FROM categories";
                            $select_categories=mysqli_query($connection, $query);
                            while ($row=mysqli_fetch_assoc($select_categories)){
                                $cat_title= $row['cat_title'];
                                $cat_id= $row['cat_id'];
                                echo "<a href='../categories.php?cat={$cat_id}' class='dropdown-item link'>{$cat_title}</a>";

                            }
                            ?>
                        </div>
                    </li>
                <li class="mr-3"><a href="../contact.php" class="text-decoration-none large-font blue <?php echo $contact_active; ?>">Contact us</a></li>
                </ul>
                <a href="#searcher" class="navbar-toggler ml-5 btn btn-dark bg-dark btn-lg" data-toggle="collapse">
                    <span class=""><i class="fas fa-search"></i></span>
                </a>
                <div class="collapse navbar-collapse" id="searcher">
                    <ul class="navbar-nav ml-auto">
                        <li class="mt-2">
                            <form action="../search.php" method="post">
                                <div class="input-group"  style=" border: solid #F96F00 2px; border-radius: 10px; color: #F96F00; " >
                                    <input type="search" name="search" id="" placeholder="SEARCH" class="form-control lm">
                                    <div class="input-group-append">
                                        <button type="submit" name="submit" value="search" class="btn" >
                                            <i class="fas fa-search" style="color:#F96F00;"></i>
                                        </button>

                                    </div>
                                </div>

                            </form>
                        </li>
                    </ul>
                </div>

            </div>

        </nav>
    </div>

