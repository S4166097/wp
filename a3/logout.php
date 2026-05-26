<?php

session_start();

session_destroy();

// Redirect user back to homepage
header("Location: index.php");

exit();

?>