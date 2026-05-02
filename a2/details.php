<?php
include 'includes/db_connect.inc';
include 'includes/header.inc';
include 'includes/nav.inc';

// Check if ID exists
if (!isset($_GET['id'])) {
    echo "No pet selected.";
    exit();
}

$id = $_GET['id'];

// Prepared statement
$stmt = $conn->prepare("SELECT * FROM pets WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

// Check if pet exists
if ($result->num_rows === 0) {
    echo "Pet not found.";
    exit();
}

$pet = $result->fetch_assoc();
?>

<main>
    <div class="container">

        <h1 class="gradient-text"><?php echo $pet['name']; ?></h1>

        <div class="row">
            <div class="col-md-6">
                <img src="assets/images/pets/<?php echo $pet['image']; ?>" 
                     class="img-fluid rounded">
            </div>

            <div class="col-md-6">

                <p><strong>Species:</strong> <?php echo $pet['species']; ?></p>
                <p><strong>Breed:</strong> <?php echo $pet['breed']; ?></p>
                <p><strong>Age:</strong> <?php echo $pet['age_years']; ?> years, <?php echo $pet['age_months']; ?> months</p>
                <p><strong>Gender:</strong> <?php echo $pet['gender']; ?></p>
                <p><strong>Size:</strong> <?php echo $pet['size']; ?></p>
                <p><strong>Status:</strong> <?php echo $pet['status']; ?></p>
                <p><strong>Adoption Fee:</strong> $<?php echo number_format($pet['adoption_fee'], 2); ?></p>

                <p><strong>Description:</strong><br>
                <?php echo $pet['description']; ?></p>

                <p><strong>Health Info:</strong><br>
                <?php echo $pet['health_info']; ?></p>

            </div>

        </div>

    </div>
</main>

<?php include 'includes/footer.inc'; ?>