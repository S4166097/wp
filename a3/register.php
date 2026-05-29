<?php
session_start();
include 'includes/db_connect.inc';

// Run the registration logic before any HTML is output
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($password !== $confirmPassword) {
        $error = "Passwords do not match.";     
    } else {

        // Check if username already exists
        $checkStmt = $conn->prepare("SELECT id FROM users WHERE username = ?");

        if (!$checkStmt) {
            die("SQL Error: " . $conn->error);
        }
        $checkStmt->bind_param("s", $username);
        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            $error = "Username already exists.";
        } else {
            // Hash password before storing it
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert new user
            $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $username, $hashedPassword);

            if ($stmt->execute()) {
                // auto-login after registration
                $_SESSION['user_id'] = $conn->insert_id;
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "Registration successful!";
                header("Location: index.php");
                exit();
            } else {
                $error = "Registration failed.";
            }
        }
    }
}

include 'includes/header.inc';
include 'includes/nav.inc';
?>

<main>
    <div class="container" style="max-width: 500px;">
        <h1 class="gradient-text mb-4">Register for PetConnect</h1>

        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <form action="register.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</main>

<?php include 'includes/footer.inc'; ?>