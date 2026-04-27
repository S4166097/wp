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
    <title>PetConnect - Home</title>
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
                    <a class="nav-link active" href="index.php">
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
        <div class="carousel-wrapper">
            <div class="rounded overflow-hidden position-relative mb-5">
                <div id="petCarousel" class="carousel slide" data-bs-ride="carousel">
                
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#petCarousel" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#petCarousel" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#petCarousel" data-bs-slide-to="2"></button>
                    <button type="button" data-bs-target="#petCarousel" data-bs-slide-to="3"></button>
                </div>
                
                <button class="carousel-control-prev" type="button" data-bs-target="#petCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
        
                <button class="carousel-control-next" type="button" data-bs-target="#petCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
                
                <div class="carousel-inner">
        
                    <div class="carousel-item active">
                        <img src="assets/images/pets/5.jpg" class="d-block w-100" style="height: 400px; object-fit: cover;" alt="Charlie">
                        <div class="carousel-caption">
                            <h3>Charlie</h3>
                        </div>
                    </div>
        
                    <div class="carousel-item">
                        <img src="assets/images/pets/1.jpg" class="d-block w-100" style="height: 400px; object-fit: cover;" alt="Buddy">
        
                        <div class="carousel-caption">
                            <h3>Buddy</h3>
                        </div>
                    </div>
        
                    <div class="carousel-item">
                        <img src="assets/images/pets/2.jpg" class="d-block w-100" style="height: 400px; object-fit: cover;" alt="Whiskers">
        
                        <div class="carousel-caption">
                            <h3>Whiskers</h3>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img src="assets/images/pets/4.jpg" class="d-block w-100" style="height: 400px; object-fit: cover;" alt="Luna">
        
                        <div class="carousel-caption">
                            <h3>Luna</h3>
                        </div>
                        
                    
                    </div>
                    </div>           
                </div>
            
            </div>
            </div>
        <div class="container">
            <h2 class="mb-4 d-flex align-items-center gap-2">
                <span class="material-icons heart-icon">favorite</span>
                Recently Added Pets
            </h2>
        
            <div class="row">
        
                <div class="col-md-3 mb-4">
                    <div class="pet-card">
                        <img src="assets/images/pets/1.jpg" class="img-fluid" alt="Buddy">
                        <h3>Buddy</h3>
                    <p>$250.00</p>
                    </div>
                </div>
        
                <div class="col-md-3 mb-4">
                    <div class="pet-card">
                        <img src="assets/images/pets/2.jpg" class="img-fluid" alt="Whiskers">
                        <h3>Whiskers</h3>
                    <p>$150.00</p>
                    </div>
                </div>
                

                <div class="col-md-3 mb-4">
                    <div class="pet-card">
                        <img src="assets/images/pets/3.jpg" class="img-fluid" alt="Max">
                        <h3>Max</h3>
                    <p>$200.00</p>
                    </div>
                </div>
        
                <div class="col-md-3 mb-4">
                    <div class="pet-card">
                        <img src="assets/images/pets/5.jpg" class="img-fluid" alt="Charlie">
                        <h3>Charlie</h3>
                    <p>$120.00</p>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                    <div class="pet-card">
                        <img src="assets/images/pets/6.jpg" class="img-fluid" alt="Bella">
                        <h3>Bella</h3>
                    <p>$220.00</p>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                    <div class="pet-card">
                        <img src="assets/images/pets/7.jpg" class="img-fluid" alt="Oliver">
                        <h3>Oliver</h3>
                    <p>$200.00</p>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                    <div class="pet-card">
                        <img src="assets/images/pets/8.jpg" class="img-fluid" alt="Rocky">
                        <h3>Rocky</h3>
                    <p>$180.00</p>
                    </div>
                </div>
            </div>
            </div>
        
        </main>
       
        <footer class="text-center bg-light py-3">
            <div class="footer-copyright text-center py-3">&copy; 
                2026 s4166097. Connecting pets with loving homes.
            </div>
        </footer>
    <script src="assets/js/scripts.js"></script>
</body>

</html>