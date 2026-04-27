<?php
include 'includes/db_connect.inc';
include 'includes/header.inc';
include 'includes/nav.inc';
$sql = "SELECT * FROM pets";
$result = $conn->query($sql);
?>

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
        
    <?php include 'includes/footer.inc'; ?>