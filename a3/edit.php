<?php
session_start();
include 'includes/db_connect.inc';

// Only logged-in users can access this page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Check if ID exists
if (!isset($_GET['id'])) {
    echo "No pet selected.";
    exit();
}

$id = $_GET['id'];
$user_id = $_SESSION['user_id'];

// Get only the logged-in user's pet
$stmt = $conn->prepare("SELECT * FROM pets WHERE id = ? AND user_id = ?");
$stmt->bind_param("ii", $id, $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "Pet not found or access denied.";
    exit();
}

$pet = $result->fetch_assoc();

// Update pet when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $species = $_POST['species'];
    $breed = $_POST['breed'];
    $age_years = $_POST['age_years'];
    $age_months = $_POST['age_months'];
    $gender = $_POST['gender'];
    $size = $_POST['size'];
    $adoption_fee = $_POST['adoption_fee'];
    $description = $_POST['description'];
    $health_info = $_POST['health_info'];
    $status = $_POST['status'];

    $updateStmt = $conn->prepare("UPDATE pets 
        SET name = ?, species = ?, breed = ?, age_years = ?, age_months = ?, gender = ?, size = ?, adoption_fee = ?, description = ?, health_info = ?, status = ?
        WHERE id = ? AND user_id = ?");

    $updateStmt->bind_param(
        "sssiiisssssii",
        $name,
        $species,
        $breed,
        $age_years,
        $age_months,
        $gender,
        $size,
        $adoption_fee,
        $description,
        $health_info,
        $status,
        $id,
        $user_id
    );

    if ($updateStmt->execute()) {
        header("Location: owner.php?user_id=" . $user_id);
        exit();
    } else {
        echo "Error updating pet: " . $updateStmt->error;
    }
}

include 'includes/header.inc';
include 'includes/nav.inc';
?>

<main>
    <div class="container" style="max-width: 800px;">
        <h1 class="gradient-text mb-4">Edit Pet</h1>

        <form method="POST">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Pet Name</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $pet['name']; ?>" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Species</label>
                    <input type="text" name="species" class="form-control" value="<?php echo $pet['species']; ?>" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Breed</label>
                    <input type="text" name="breed" class="form-control" value="<?php echo $pet['breed']; ?>" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label">Age (Years)</label>
                    <input type="number" name="age_years" class="form-control" value="<?php echo $pet['age_years']; ?>" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label">Age (Months)</label>
                    <input type="number" name="age_months" class="form-control" value="<?php echo $pet['age_months']; ?>" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Gender</label>
                    <input type="text" name="gender" class="form-control" value="<?php echo $pet['gender']; ?>" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Size</label>
                    <input type="text" name="size" class="form-control" value="<?php echo $pet['size']; ?>" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Adoption Fee</label>
                    <input type="number" step="0.01" name="adoption_fee" class="form-control" value="<?php echo $pet['adoption_fee']; ?>" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="4" required><?php echo $pet['description']; ?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Health Information</label>
                <textarea name="health_info" class="form-control" rows="4" required><?php echo $pet['health_info']; ?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <input type="text" name="status" class="form-control" value="<?php echo $pet['status']; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="owner.php?user_id=<?php echo $user_id; ?>" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</main>

<?php include 'includes/footer.inc'; ?>