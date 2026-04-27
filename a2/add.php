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
    <title>PetConnect - Add Pet</title>
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
                    <a class="nav-link active" href="add.php">
                        <span class="material-icons nav-icon">add_circle</span>
                        Add Pet
                    </a>
                </li>
            </ul>
        
        </nav>

        <main>
            <div class="container">
            <h1 class="gradient-text">Add a New Pet for Adoption</h1>

            <form method="POST" enctype="multipart/form-data">

                <div class="row">
            
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="name">Pet Name</label>
                        <input class="form-control" id="name" type="text" placeholder="Enter pet name" required>
                    </div>
            
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="species">Species*</label>
                        <select class="form-select" id="species" required>
                            <option value="">Select type</option>
                            <option value="Dog">Dog</option>
                            <option value="Cat">Cat</option>
                            <option value="Bird">Bird</option>
                            <option value="Rabbit">Rabbit</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="breed">Breed</label>
                        <input class="form-control" id="breed" type="text" placeholder="Enter breed" required>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="age_years">Age(Years)</label>
                        <input class="form-control" id="age_years" type="number" placeholder="Years" required>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="age_months">Age(Months)</label>
                        <input class="form-control" id="age_months" type="number" placeholder="Months" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="gender">Gender*</label>
                        <select class="form-select" id="gender" required>
                        <option value="">Select gender</option>
                        <option>Male</option>
                        <option>Female</option>
                        </select>
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="size">Size*</label>
                        <select class="form-select" id="size" required>
                        <option value="">Select size</option>
                        <option>Small</option>
                        <option>Medium</option>
                        <option>Large</option>
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="adoption_fee">Adoption Fee($)*</label>
                        <input class="form-control" id="adoption_fee" type="number" placeholder="Enter fee" required>
                    </div>
            
                </div>
                
                <div class="mb-3">
                    <label class="form-label" for="description">Description*</label>
                    <textarea class="form-control" id="description" rows="4" placeholder="Tell us about the pet" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="health_info">Health Information</label>
                    <textarea class="form-control" id="health_info" rows="4" placeholder="Enter health and vaccination information" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="status">Status*</label>
                    <select class="form-select" id="status" required>
                    <option value="">Select status</option>
                    <option>Available</option>
                    <option>Pending</option>
                    <option>Adopted</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="image">Pet Photo*</label>
                    <input class="form-control" type="file" id="image" required>
                    <div class="mt-3">
                        <img id="imagePreview" src="#" alt="Image preview" class="img-fluid d-none" style="max-height:200px;"> 
                    </div>
                </div>

                <button class="btn btn-primary" type="submit">
                    Add Pet
                </button>

                <button class="btn btn-secondary" type="reset">
                    Cancel
                </button>
            
            </form>

        </div>

        </main>
        
        <footer class="text-center bg-light py-3">
            © 2026 s4166097. Connecting pets with loving homes.
        </footer>

    <script src="assets/js/scripts.js"></script>

</body>

</html>