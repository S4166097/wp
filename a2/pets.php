<?php
$conn = new mysqli("localhost", "root", "", "petconnect", 3307);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM pets";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetConnect - Browse Pets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark px-4">
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <span class="material-icons me-2">pets</span>
                <span class="fw-bold">PetConnect</span>
            </a>
        
            <ul class="navbar-nav ms-3">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">
                        <span class="material-icons nav-icon">home</span>
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="pets.php">
                        <span class="material-icons nav-icon">list</span>
                        Browse Pets
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gallery.php">
                        <span class="material-icons nav-icon">photo_library</span>
                        Gallery
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="add.php">
                        <span class="material-icons nav-icon">add_circle</span>
                        Add Pet
                    </a>
                </li>
            </ul>
        
        </nav>
        <main>
            <div class="container">
            <h1 class="gradient-text">All Available Pets</h1>
            <?php if(isset($_GET['success'])): ?>
                <div class="alert alert-success">
                    Pet added successfully!
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <img src="assets/images/pets_banner.jpg" class="img-fluid rounded" alt="Dogs Banner">
                </div>

                <div class="col-md-7">

                    <table class="table table-striped table-hover">

                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Species</th>
                            <th>Breed</th>
                            <th>Size</th>
                            <th>Fee ($)</th>
                            <th>Image</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['species']; ?></td>
                                <td><?php echo $row['breed']; ?></td>
                                <td><?php echo $row['size']; ?></td>
                                <td>$<?php echo number_format($row['adoption_fee'], 2); ?></td>
                                <td>
                                    <img src="assets/images/<?php echo $row['image']; ?>" width="80">
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6">No pets available.</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
        
        <footer class="text-center bg-light py-3">
            © 2026 s4166097. Connecting pets with loving homes.
        </footer>

    <script src="assets/js/scripts.js"></script>
</body>
</html>