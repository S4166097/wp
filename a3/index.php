<?php
include 'includes/db_connect.inc';
include 'includes/header.inc';
include 'includes/nav.inc';
$sql = "SELECT * FROM pets ORDER BY id DESC LIMIT 4";
$result = $conn->query($sql);
?>

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
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
        
                    <div class="col-md-3 mb-4">
                    <div class="pet-card">
                <img src="assets/images/pets/<?php echo $row['image']; ?>" class="img-fluid" alt="<?php echo $row['name']; ?>">
                
                <h3><?php echo $row['name']; ?></h3>
                
                <p>$<?php echo number_format($row['adoption_fee'], 2); ?></p>
                    </div>
                </div>

            <?php endwhile; ?>
        <?php else: ?>
            <p>No pets found.</p>
        <?php endif; ?>

        </div>         
        </div>
    </main>
       
        <?php include 'includes/footer.inc'; ?>