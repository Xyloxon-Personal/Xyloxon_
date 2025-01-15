<?php
include("common/navbar.php");
?>
    <!-- ==========Banner-Section========== -->
    <section class="banner-section">
        <div class="banner-bg bg_img bg-fixed" data-background="./assets/images/banner/banner01.jpg"></div>
        <div class="container">
            <div class="banner-content">
                <h1 class="title  cd-headline clip"><span class="d-block">Xyloxon</span>Driving 
                    <span class="color-theme cd-words-wrapper p-0 m-0">
                        <b class="is-visible">Digital</b>
                        <b>Success</b>
                    </span>
                </h1>
                <p>Xyloxon: Empowering Digital Innovation Excellence.</p>
            </div>
        </div>
    </section>
    <!-- ==========Banner-Section========== -->

        <!-- ==========Search========== -->
          
        <!-- ==========Search========== -->

  <!-- ==========Website========== -->
  <section class="event-section padding-top padding-bottom bg-four">
        <div class="container">
        <div class="tab">
                <div class="section-header-2">
                    <div class="left">
                        <h2 class="title">Websites</h2>
                        <p>Be sure not to miss these Sites today.</p>
                    </div>
                    <ul class="tab-menu">
                        <li class="active">
                           trending
                        </li>
                    </ul>
                </div>
                <div class="tab-area mb-30-none">
                    <div class="tab-item active">
                        <div class="owl-carousel owl-theme tab-slider">

                             <!-- STARTING PHP FOR WEBSITE FETCHING -->
            <?php
            include("common/connection.php");
            // Fetch data with the tag "Web Development"
            $sql = "SELECT * FROM creations WHERE tags LIKE '%Web Development%'";
            $result = $conn->query($sql);
            ?>
            <!-- ENDING PHP FOR WEBSITE FETCHING -->
                 <?php if ($result->num_rows > 0): ?>
                            <?php while($row = $result->fetch_assoc()): ?>
                            <div class="item">
                                <div class="movie-grid">
                                    <div class="movie-thumb c-thumb">
                                       <a href="details.php?id=<?php echo $row['id']; ?>">
                                        <img src="uploads/<?php echo $row['thumbnail']; ?>" alt="Thumbnail" width="300px" height="300px">
                                        </a>
                                    </div>
                                    <div class="movie-content bg-one">
                                        

<h5 class="title m-0">
    <a href="details.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a>
</h5>
                                        <ul class="movie-rating-percent">
                                            <li>
                                                <div class="thumb">
                                                ♘
                                                </div>
                                                <span class="content"><?php echo $row['language1']; ?></span>
                                            </li>
                                            <li>
                                                <div class="thumb">
                                                ♘
                                                </div>
                                                <span class="content"><?php echo $row['language2']; ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div> 
                            </div>
                            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="11">No data found.</td>
            </tr>
        <?php endif; ?>
                        </div>
                                </div> 
                            </div>
                        </div>
                    </div>
        
                </div>
            </div>
        </div>
    </section>
<!-- ==========Website========== -->


    <!-- ==========Web designs========== -->
    <section class="event-section padding-top padding-bottom bg-four">
        <div class="container">
        <div class="tab">
                <div class="section-header-2">
                    <div class="left">
                        <h2 class="title">Web designs</h2>
                        <p>Be sure not to miss these designs today.</p>
                    </div>
                    <ul class="tab-menu">
                        <li class="active">
                           trending
                        </li>
                    </ul>
                </div>
                <div class="tab-area mb-30-none">
                    <div class="tab-item active">
                        <div class="owl-carousel owl-theme tab-slider">
                             <!-- STARTING PHP FOR WEBSITE FETCHING -->
            <?php
            include("common/connection.php");

            // Fetch data with the tag "Web Development"
            $sql = "SELECT * FROM creations WHERE tags LIKE '%Web Design%'";
            $result = $conn->query($sql);
            ?>
            <!-- ENDING PHP FOR WEBSITE FETCHING -->
                 <?php if ($result->num_rows > 0): ?>
                            <?php while($row = $result->fetch_assoc()): ?>
                            <div class="item">
                                <div class="movie-grid">
                                    <div class="movie-thumb c-thumb">
                                       <a href="details.php?id=<?php echo $row['id']; ?>">
                                        <img src="uploads/<?php echo $row['thumbnail']; ?>" alt="Thumbnail" width="300px" height="300px">
                                        </a>
                                    </div>
                                    <div class="movie-content bg-one">
                                        <h5 class="title m-0">
    <a href="details.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a>
</h5>
                                        <ul class="movie-rating-percent">
                                            <li>
                                                <div class="thumb">
                                                ♘
                                                </div>
                                                <span class="content"><?php echo $row['language1']; ?></span>
                                            </li>
                                            <li>
                                                <div class="thumb">
                                                ♘
                                                </div>
                                                <span class="content"><?php echo $row['language2']; ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div> 
                            </div>
                            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="11">No data found.</td>
            </tr>
        <?php endif; ?>
                        </div>
                                </div> 
                            </div>
                        </div>
                    </div>
        
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Web designs========== -->

     <!-- ==========Mobile Applications========== -->
     <section class="event-section padding-top padding-bottom bg-four">
        <div class="container">
        <div class="tab">
                <div class="section-header-2">
                    <div class="left">
                        <h2 class="title">Mobile Applications</h2>
                        <p>Be sure not to miss these apps today.</p>
                    </div>
                    <ul class="tab-menu">
                        <li class="active">
                           trending
                        </li>
                    </ul>
                </div>
                <div class="tab-area mb-30-none">
                    <div class="tab-item active">
                        <div class="owl-carousel owl-theme tab-slider">
                             <!-- STARTING PHP FOR WEBSITE FETCHING -->
            <?php
            include("common/connection.php");

            // Fetch data with the tag "Web Development"
            $sql = "SELECT * FROM creations WHERE tags LIKE '%Mobile Applications%'";
            $result = $conn->query($sql);
            ?>
            <!-- ENDING PHP FOR WEBSITE FETCHING -->
                 <?php if ($result->num_rows > 0): ?>
                            <?php while($row = $result->fetch_assoc()): ?>
                            <div class="item">
                                <div class="movie-grid">
                                    <div class="movie-thumb c-thumb">
                                       <a href="details.php?id=<?php echo $row['id']; ?>">
                                        <img src="uploads/<?php echo $row['thumbnail']; ?>" alt="Thumbnail" width="300px" height="300px">
                                        </a>
                                    </div>
                                    <div class="movie-content bg-one">
                                    <h5 class="title m-0">
    <a href="details.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a>
</h5>
                                        <ul class="movie-rating-percent">
                                            <li>
                                                <div class="thumb">
                                                ♘
                                                </div>
                                                <span class="content"><?php echo $row['language1']; ?></span>
                                            </li>
                                            <li>
                                                <div class="thumb">
                                                ♘
                                                </div>
                                                <span class="content"><?php echo $row['language2']; ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div> 
                            </div>
                            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="11">No data found.</td>
            </tr>
        <?php endif; ?>
                        </div>
                                </div> 
                            </div>
                        </div>
                    </div>
        
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Mobile Applications========== -->

     <!-- ==========Shopify themes========== -->
     <section class="event-section padding-top padding-bottom bg-four">
        <div class="container">
        <div class="tab">
                <div class="section-header-2">
                    <div class="left">
                        <h2 class="title">Shopify themes</h2>
                        <p>Be sure not to miss these Themes today.</p>
                    </div>
                    <ul class="tab-menu">
                        <li class="active">
                           trending
                        </li>
                    </ul>
                </div>
                <div class="tab-area mb-30-none">
                    <div class="tab-item active">
                        <div class="owl-carousel owl-theme tab-slider">
                             <!-- STARTING PHP FOR WEBSITE FETCHING -->
            <?php
            include("common/connection.php");

            // Fetch data with the tag "Web Development"
            $sql = "SELECT * FROM creations WHERE tags LIKE '%Shopify Themes%'";
            $result = $conn->query($sql);
            ?>
            <!-- ENDING PHP FOR WEBSITE FETCHING -->
                 <?php if ($result->num_rows > 0): ?>
                            <?php while($row = $result->fetch_assoc()): ?>
                            <div class="item">
                                <div class="movie-grid">
                                    <div class="movie-thumb c-thumb">
                                       <a href="details.php?id=<?php echo $row['id']; ?>">
                                        <img src="uploads/<?php echo $row['thumbnail']; ?>" alt="Thumbnail" width="300px" height="300px">
                                        </a>
                                    </div>
                                    <div class="movie-content bg-one">
                                        <h5 class="title m-0">
    <a href="details.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a>
</h5>
                                        <ul class="movie-rating-percent">
                                            <li>
                                                <div class="thumb">
                                                ♘
                                                </div>
                                                <span class="content"><?php echo $row['language1']; ?></span>
                                            </li>
                                            <li>
                                                <div class="thumb">
                                                ♘
                                                </div>
                                                <span class="content"><?php echo $row['language2']; ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div> 
                            </div>
                            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="11">No data found.</td>
            </tr>
        <?php endif; ?>
                        </div>
                                </div> 
                            </div>
                        </div>
                    </div>
        
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Shopify themes========== -->

     <!-- ==========Css Mini Projects========== -->
     <section class="event-section padding-top padding-bottom bg-four">
        <div class="container">
        <div class="tab">
                <div class="section-header-2">
                    <div class="left">
                        <h2 class="title">Mini Projects</h2>
                        <p>Be sure not to miss these Mini Projects today.</p>
                    </div>
                    <ul class="tab-menu">
                        <li class="active">
                           trending
                        </li>
                    </ul>
                </div>
                <div class="tab-area mb-30-none">
                    <div class="tab-item active">
                        <div class="owl-carousel owl-theme tab-slider">
                             <!-- STARTING PHP FOR WEBSITE FETCHING -->
            <?php
            include("common/connection.php");

            // Fetch data with the tag "Web Development"
            $sql = "SELECT * FROM creations WHERE tags LIKE '%Mini Projects%'";
            $result = $conn->query($sql);
            ?>
            <!-- ENDING PHP FOR WEBSITE FETCHING -->
                 <?php if ($result->num_rows > 0): ?>
                            <?php while($row = $result->fetch_assoc()): ?>
                            <div class="item">
                                <div class="movie-grid">
                                    <div class="movie-thumb c-thumb">
                                       <a href="details.php?id=<?php echo $row['id']; ?>">
                                        <img src="uploads/<?php echo $row['thumbnail']; ?>" alt="Thumbnail" width="300px" height="300px">
                                        </a>
                                    </div>
                                    <div class="movie-content bg-one">
                                        <h5 class="title m-0">
    <a href="details.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a>
</h5>
                                        <ul class="movie-rating-percent">
                                            <li>
                                                <div class="thumb">
                                                ♘
                                                </div>
                                                <span class="content"><?php echo $row['language1']; ?></span>
                                            </li>
                                            <li>
                                                <div class="thumb">
                                                ♘
                                                </div>
                                                <span class="content"><?php echo $row['language2']; ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div> 
                            </div>
                            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="11">No data found.</td>
            </tr>
        <?php endif; ?>
                        </div>
                                </div> 
                            </div>
                        </div>
                    </div>
        
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Mini Projects========== -->
    

    <?php
include("common/footer.php");
?>