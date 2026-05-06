<?php
include 'includes/db_connect.inc';
include 'includes/header.inc';
include 'includes/nav.inc';

$sql = "SELECT * FROM pets";
$result = $conn->query($sql);
?>
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
                           <img src="assets/images/pets/<?php echo $row['image']; ?>"
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
        <?php include 'includes/footer.inc'; ?>