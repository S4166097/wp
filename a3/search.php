<?php
include 'includes/db_connect.inc';
include 'includes/header.inc';
include 'includes/nav.inc';

$search = "";

if (isset($_GET['search'])) {
    $search = trim($_GET['search']);

    $stmt = $conn->prepare("SELECT * FROM pets WHERE name LIKE ?");
    $like = "%" . $search . "%";
    $stmt->bind_param("s", $like);
    $stmt->execute();

    $result = $stmt->get_result();
}
?>

<main>
    <div class="container">

        <h1 class="gradient-text mb-4">Search Pets</h1>

        <form method="GET" action="search.php" class="mb-4">

            <input type="text"
                   name="search"
                   class="form-control"
                   placeholder="Search pets..."
                   value="<?php echo $search; ?>">

        </form>

        <div class="row">

        <?php
        if (isset($result)):

            while($pet = $result->fetch_assoc()):
        ?>

            <div class="col-md-4 mb-4">

                <div class="card p-3 shadow">

                    <img src="assets/images/pets/<?php echo $pet['image']; ?>"
                         class="img-fluid rounded mb-3">

                    <h3><?php echo $pet['name']; ?></h3>

                    <a href="details.php?id=<?php echo $pet['id']; ?>"
                       class="btn btn-primary">
                       View Details
                    </a>

                </div>

            </div>

        <?php
            endwhile;
        endif;
        ?>

        </div>

    </div>
</main>

<?php include 'includes/footer.inc'; ?>