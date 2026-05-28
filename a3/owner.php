<?php
session_start();
include 'includes/db_connect.inc';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT * FROM pets WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();

$result = $stmt->get_result();

include 'includes/header.inc';
include 'includes/nav.inc';
?>

<main>
    <div class="container">
        <h1 class="gradient-text">My Pets</h1>
        <div class="row">
        <?php if($result->num_rows > 0): ?>
        <?php while($pet = $result->fetch_assoc()): ?>
            <div class="col-md-4 mb-4">
                <div class="card p-3 shadow">
                    <img src="assets/images/pets/<?php echo $pet['image']; ?>" 

                        class="img-fluid rounded mb-3">

                <h3><?php echo $pet['name']; ?></h3>

                <p><?php echo $pet['species']; ?></p>

                <a href="edit.php?id=<?php echo $pet['id']; ?>" 
                    class="btn btn-primary">
                    Edit
                </a>
            </div>
        </div>
    <?php endwhile; ?>
    
    <?php else: ?>

        <p>You have not added any pets yet.</p>

    <?php endif; ?>
    </div>
</div>
</main>

<?php include 'includes/footer.inc'; ?>