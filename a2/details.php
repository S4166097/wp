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
    <div class="container" style="max-width: 1100px;">
        <div class="row">

            <!-- photo of pet -->
            <div class="col-md-6 mb-4">
                <img src="assets/images/pets/<?php echo $pet['image']; ?>" 
                     class="img-fluid rounded shadow">
            </div>

            <!-- wording stuff -->
            <div class="col-md-6">

                <h1 class="gradient-text mb-2"><?php echo $pet['name']; ?></h1>

                <!-- Tags -->
                <div class="mb-3">
                    <span class="tag tag-<?php echo strtolower($pet['species']); ?>">  <!-- 'strtolower' is to make the tags lowercase, ensuring the that css works*  -->
                        <?php echo $pet['species']; ?>
                    </span>

                    <span class="tag tag-<?php echo strtolower($pet['status']); ?>">
                        <?php echo $pet['status']; ?>
                    </span>
                </div>

                <!-- white table thingy -->
                <div class="card shadow-sm p-3 mb-4">

                    <div class="row border-bottom py-2">
                        <div class="col-6 fw-bold">Breed:</div>
                        <div class="col-6 text-end"><?php echo $pet['breed']; ?></div>
                    </div>

                    <div class="row border-bottom py-2">
                        <div class="col-6 fw-bold">Age:</div>
                        <div class="col-6 text-end">
                            <?php echo $pet['age_years']; ?> years, <?php echo $pet['age_months']; ?> months
                        </div>
                    </div>

                    <div class="row border-bottom py-2">
                        <div class="col-6 fw-bold">Gender:</div>
                        <div class="col-6 text-end"><?php echo $pet['gender']; ?></div>
                    </div>

                    <div class="row border-bottom py-2">
                        <div class="col-6 fw-bold">Size:</div>
                        <div class="col-6 text-end"><?php echo $pet['size']; ?></div>
                    </div>

                    <div class="row py-2">
                        <div class="col-6 fw-bold">Adoption Fee:</div>
                        <div class="col-6 text-end">
                            <strong>$<?php echo number_format($pet['adoption_fee'], 2); ?></strong> 
                        </div>
                    </div>

                </div>

                <!-- description-->
                <h5 class="fw-bold">
                    <span class="material-icons me-1" style="color:#7c6cf0;">description</span>                   
                    Description
                </h5>
                <p class="mb-4"><?php echo $pet['description']; ?></p>

                <!-- health -->
                <h5 class="fw-bold">
                    <span class="material-icons me-1 text-success">health_and_safety</span>
                    Health Information
                </h5>
                <p><?php echo $pet['health_info']; ?></p>

            </div>

        </div>
    </div>
</main>

<?php include 'includes/footer.inc'; ?>