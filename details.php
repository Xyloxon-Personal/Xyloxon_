<?php
include("common/navbar.php");


include("common/connection.php");

// Check if `id` is set in the query string
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Secure the input using intval or other sanitization methods
    $sql = "SELECT * FROM creations WHERE id = ?";
    
    // Prepare and execute the query
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a record was found
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Use $row to populate the fields in the movie details page
    } else {
        echo "<p>Movie not found!</p>";
    }

    $stmt->close();
} else {
    echo "<p>No movie selected!</p>";
}
?>


    <!-- ==========Banner-Section========== -->
    <section class="details-banner bg_img" data-background="./assets/images/banner/banner03.jpg">
        <div class="container">
            <div class="details-banner-wrapper">
                <div class="details-banner-thumb">
                    <img src="uploads/<?php echo $row['thumbnail']; ?>" height="350px" alt="movie">
                    <a href="<?php echo $row['youtube_link']; ?>" class="video-popup">
                        <img src="./assets/images/movie/video-button.png" alt="movie">
                    </a>
                </div>
                <div class="details-banner-content offset-lg-3">
                    <h3 class="title"><?php echo $row['title']; ?></h3>
                    <div class="tags">
                    
                    </div>
                    <a href="#0" class="button"><?php echo $row['tags']; ?></a>
                    <div class="social-and-duration">
                        <div class="duration-area">
                            <div class="item">
                                <i class="fas fa-calendar-alt"></i><span><?php echo $row['date_time']; ?></span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ==========Banner-Section========== -->

    <!-- ==========Book-Section========== -->
    <section class="book-section bg-one">
        <div class="container">
            <div class="book-wrapper offset-lg-3">
                <div class="left-side">
                   
             
                    <div class="item">
                        <div class="item-header">
                            <h5 class="title">4.5</h5>
                            <div class="rated">
                                <i class="fas fa-heart"></i>
                                <i class="fas fa-heart"></i>
                                <i class="fas fa-heart"></i>
                                <i class="fas fa-heart"></i>
                                <i class="fas fa-heart"></i>
                            </div>
                        </div>
                        <p>Users Rating</p>
                    </div>
                  
                </div>
                <a href="<?php echo $row['download_link']; ?>" target="_blank" class="custom-button">Download Now</a>
            </div>
        </div>
    </section>
    <!-- ==========Book-Section========== -->

    <!-- ==========Movie-Section========== -->
    <section class="movie-details-section padding-top padding-bottom">
        <div class="container">
            <div class="row justify-content-center flex-wrap-reverse mb--50">
                <div class="col-lg-3 col-sm-10 col-md-6 mb-50">
                    <div class="widget-1 widget-tags">
                        <ul>
                            <li>
                                <a href="#0"><?php echo $row['language1']; ?></a>
                            </li>   
                            <li>
                                <a href="#0"><?php echo $row['language2']; ?></a>
                            </li>
                        </ul>
                    </div>
                    
                </div>
                <div class="col-lg-9 mb-50">
                    <div class="movie-details">
                        <h3 class="title">photos</h3>
                        <div class="details-photos owl-carousel">
                        <div class="thumb">
                                <a href="#" class="img-pop">
                                <img src="uploads/<?php echo $row['cover1']; ?>" alt="Thumbnail" width="350px" height="300px">
                                </a>
                            </div>
                            <div class="thumb">
                            <a href="#" class="img-pop">
                                <img src="uploads/<?php echo $row['cover2']; ?>" alt="Thumbnail" width="350px" height="300px">
                                </a>
                            </div>
                            <div class="thumb">
                            <a href="#" class="img-pop">
                                <img src="uploads/<?php echo $row['cover3']; ?>" alt="Thumbnail" width="350px" height="300px">
                                </a>
                            </div>
                           
                           
                        </div>
                        <div class="tab summery-review">
                            <ul class="tab-menu">
                                <li  class="active">
                                    summary
                                </li>
                               
                            </ul>
                            <div class="tab-area">
                                <div class="tab-item active">
                                    <div class="item">
                                        <h5 class="sub-title">Description</h5>
                                        <p><?php echo $row['description']; ?></p>
                                    </div>
                                    <div class="item">
                                        <div class="header">
                                            <h5 class="sub-title">Created By</h5>
                                        </div>
                                        <div class="">
                                            <div class="cast-item">
                                                <div class="cast-thumb">
                                                    <a href="#0">
                                                        <img src="./assets/images/about/photo.jpg" alt="cast">
                                                    </a>
                                                </div>
                                                <div class="cast-content">
                                                    <h6 class="cast-title"><a href="#0">Mohammed Ahmed</a></h6>
                                                    <span class="cate">Owner</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Movie-Section========== -->

    <?php
include("common/footer.php");
?>