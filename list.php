<?php
include("common/navbar.php");
include("common/connection.php");

// Pagination logic
$limit = 4;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Fetch total number of sites
$sql_total = "SELECT COUNT(*) AS total FROM creations";
$result_total = $conn->query($sql_total);
$total_sites = $result_total->fetch_assoc()['total'];

// Fetch filtered or paginated data
$filter = isset($_GET['category']) ? $_GET['category'] : '';
$sql = "SELECT * FROM creations";
if (!empty($filter)) {
    $sql .= " WHERE tags LIKE '%" . $conn->real_escape_string($filter) . "%'";
}
$sql .= " LIMIT $limit OFFSET $offset";
$result = $conn->query($sql);

// Fetch unique categories (removing duplicates)
$sql_categories = "SELECT DISTINCT tags FROM creations";
$result_categories = $conn->query($sql_categories);
$unique_tags = [];
while ($category = $result_categories->fetch_assoc()) {
    $tags = explode(',', $category['tags']); // Split tags if multiple exist in one row
    foreach ($tags as $tag) {
        $tag = trim($tag);
        if (!in_array($tag, $unique_tags)) {
            $unique_tags[] = $tag; // Add only unique tags
        }
    }
}
?>

<br><br><br><br><br><br>

<!-- ==========Movie-Section========== -->
<section class="movie-section padding-top padding-bottom">
    <div class="container">
        <div class="row flex-wrap-reverse justify-content-center">
            <div class="col-sm-10 col-md-8 col-lg-3">
                <div class="widget-1 widget-check">
                    <div class="widget-header">
                        <h5 class="m-title">Filter By</h5>
                        <a href="?" class="clear-check">Clear All</a>
                    </div>
                    <div class="widget-1-body">
                        <h6 class="subtitle">Category</h6>
                        <form method="GET">
                            <div class="check-area">
                                <?php foreach ($unique_tags as $tag): ?>
                                    <div class="form-group">
                                        <input type="radio" name="category" id="cat<?php echo $tag; ?>" value="<?php echo $tag; ?>" <?php echo ($filter === $tag) ? 'checked' : ''; ?>>
                                        <label for="cat<?php echo $tag; ?>"> <?php echo $tag; ?> </label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 mb-50 mb-lg-0">
                <div class="filter-tab tab">
                    <div class="tab-area">
                        <div class="tab-item active">
                        <h5 class="m-title">Welcome</h5>
                        <br><br>       
                            <div class="movie-area mb-10">
                                <?php if ($result->num_rows > 0): ?>
                                    <?php while ($row = $result->fetch_assoc()): ?>
                                        <div class="movie-list">
                                            <div class="movie-thumb c-thumb">
                                                <a href="details.php?id=<?php echo $row['id']; ?>" class="w-100 bg_img" style="height: 300px;">
                                                    <img src="uploads/<?php echo $row['thumbnail']; ?>" alt="<?php echo $row['title']; ?>" style="height: 100%; object-fit: cover;">
                                                </a>
                                            </div>
                                            <div class="movie-content bg-one">
                                                <h5 class="title">
                                                <a href="details.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a>
                                                </h5>
                                                <div class="movie-tags">
                                                    <a href="#0"> <?php echo $row['tags']; ?> </a>
                                                </div>
                                                <div class="release">
                                                    <span>Release Date: </span>
                                                    <a href="#0"> <?php echo $row['date_time']; ?> </a>
                                                </div>
                                                <ul class="movie-rating-percent">
                                                    <li>
                                                        <div class="thumb">♘</div>
                                                        <span class="content"> <?php echo $row['language1']; ?> </span>
                                                    </li>
                                                    <li>
                                                        <div class="thumb">♘</div>
                                                        <span class="content"> <?php echo $row['language2']; ?> </span>
                                                    </li>
                                                </ul>
                                                <div class="book-area">
                                                    <div class="book-ticket">
                                                        <div class="react-item mr-auto">
                                                            <a href="details.php?id=<?php echo $row['id']; ?>">
                                                                <div class="thumb">
                                                                    <i class="fas fa-download"></i>
                                                                </div>
                                                                <span>Download</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <p>No items found.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="pagination-area text-center">
                        <?php
                        $total_pages = ceil($total_sites / $limit);
                        for ($i = 1; $i <= $total_pages; $i++): ?>
                            <a href="?page=<?php echo $i; ?><?php echo $filter ? '&category=' . urlencode($filter) : ''; ?>" class="<?php echo ($page === $i) ? 'active' : ''; ?>">
                                <?php echo $i; ?>
                            </a>
                        <?php endfor; ?>
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
