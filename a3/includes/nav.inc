<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<nav class="navbar navbar-expand-sm navbar-dark px-4">
    <a class="navbar-brand d-flex align-items-center" href="index.php">
        <span class="material-icons me-2">pets</span>
        <span class="fw-bold">PetConnect</span>
    </a>

    <ul class="navbar-nav me-auto ms-3">
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
            <a class="nav-link" href="add.php">
                <span class="material-icons nav-icon">add_circle</span>
                Add Pet
            </a>
        </li>
        
        </ul>

        <ul class="navbar-nav">
        <?php if(isset($_SESSION['user_id'])): ?>

    <li class="nav-item">
        <a class="nav-link" href="owner.php">
            <span class="material-icons nav-icon">person</span>
            <?php echo $_SESSION['username']; ?>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="logout.php">
            <span class="material-icons nav-icon">logout</span>
            Logout
        </a>
    </li>

<?php else: ?>

    <li class="nav-item">
        <a class="nav-link" href="login.php">
            <span class="material-icons nav-icon">login</span>
            Login
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="register.php">
            <span class="material-icons nav-icon">person_add</span>
            Register
        </a>
    </li>

<?php endif; ?>

<li class="nav-item">
    <a class="nav-link" href="search.php">
        <span class="material-icons nav-icon">search</span>
        Search
    </a>
</li>
    </ul>
</nav>