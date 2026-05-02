<?php
include 'includes/db_connect.inc';
include 'includes/header.inc';
include 'includes/nav.inc';
?>

        <main>
            <div class="container">
            <h1 class="gradient-text">Add a New Pet for Adoption</h1>

            <form action="process_add.php" method="POST" enctype="multipart/form-data">

                <div class="row">
            
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="name">Pet Name</label>
                        <input class="form-control" id="name" name="name" type="text" placeholder="Enter pet name" required>
                    </div>
            
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="species">Species*</label>
                        <select class="form-select" id="species" name="species" required>
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
                        <input class="form-control" id="breed" name="breed" type="text" placeholder="Enter breed" required>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="age_years">Age(Years)</label>
                        <input class="form-control" id="age_years" name="age_years" type="number" placeholder="Years" required>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="age_months">Age(Months)</label>
                        <input class="form-control" id="age_months" name="age_months" type="number" placeholder="Months" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="gender">Gender*</label>
                        <select class="form-select" id="gender" name="gender" required>
                        <option value="">Select gender</option>
                        <option>Male</option>
                        <option>Female</option>
                        </select>
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="size">Size*</label>
                        <select class="form-select" id="size" name="size" required>
                        <option value="">Select size</option>
                        <option>Small</option>
                        <option>Medium</option>
                        <option>Large</option>
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="adoption_fee">Adoption Fee($)*</label>
                        <input class="form-control" id="adoption_fee" name="adoption_fee" type="number" placeholder="Enter fee" required>
                    </div>
            
                </div>
                
                <div class="mb-3">
                    <label class="form-label" for="description">Description*</label>
                    <textarea class="form-control" id="description" name="description" rows="4" placeholder="Tell us about the pet" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="health_info">Health Information</label>
                    <textarea class="form-control" id="health_info" name="health_info" rows="4" placeholder="Enter health and vaccination information" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="status">Status*</label>
                    <select class="form-select" id="status" name="status" required>
                    <option value="">Select status</option>
                    <option>Available</option>
                    <option>Pending</option>
                    <option>Adopted</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="image">Pet Photo*</label>
                    <input class="form-control" type="file" id="image" name="image" required>
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
        
        <?php include 'includes/footer.inc'; ?>