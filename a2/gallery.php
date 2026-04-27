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
    <title>PetConnect - Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
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
                    <a class="nav-link" href="pets.php">
                        <span class="material-icons nav-icon">list</span>
                        Browse Pets
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="gallery.php">
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
            <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="gradient-text">Pet Gallery</h1>
            <!-- Status of Pets -->  
            <div class="d-flex gap-2">
                <select id="filter" class="form-select w-auto">
                    <option value="all">All Status</option>
                    <option value="available">Available</option>
                    <option value="pending">Pending</option>
                    <option value="adopted">Adopted</option>
                </select>
            
                <select id="speciesFilter" class="form-select w-auto">
                    <option value="all">All Types</option>
                    <option value="dog">Dog</option>
                    <option value="cat">Cat</option>
                    <option value="bird">Bird</option>
                </select>
            </div>
        </div>

        <div class="row">
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <div class="col-md-3 mb-4 pet-card"
                        data-status="<?php echo strtolower($row['status']); ?>"
                         data-species="<?php echo strtolower($row['species']); ?>">

                     <div class="pet-card">
                           <img src="assets/images/<?php echo $row['image']; ?>"
                               class="img-fluid gallery-img"
                                alt="<?php echo $row['name']; ?>"
                                data-bs-toggle="modal"
                                data-bs-target="#imageModal">

                            <h3><?php echo $row['name']; ?></h3>

                            <span class="tag tag-<?php echo strtolower($row['species']); ?>">
                                <?php echo $row['species']; ?>
                            </span>

                            <span class="tag tag-<?php echo strtolower($row['status']); ?>">
                                <?php echo $row['status']; ?>
                            </span>

                            <p>$<?php echo number_format($row['adoption_fee'], 2); ?></p>
                        </div>

        </div>
    <?php endwhile; ?>
<?php else: ?>
    <p>No pets available.</p>
<?php endif; ?>
</div>
            
        </div>
        </main>
        <!-- Modal -->
        <div class="modal fade" id="imageModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content bg-dark text-white border-0">
        
                    <div class="modal-header border-0">
                        <h3 class="modal-title d-flex align-items-center gap-2">
                            <span class="material-icons">image</span>
                            <span id="modalText"></span>
                        </h3>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
        
                    <div class="modal-body text-center">
                        <img id="modalImage" src="#" alt="Pet image" class="img-fluid rounded">
                    </div>
        
                </div>
            </div>
        </div>
        <footer class="text-center bg-light py-3">
            <div class="footer-copyright text-center py-3">&copy; 
                2026 s4166097. Connection pets with loving homes.
            </div>
        </footer>
    <script src="assets/js/scripts.js"></script>
</body>

</html>