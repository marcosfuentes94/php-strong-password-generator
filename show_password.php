<?php
session_start();

if (isset($_SESSION['generated_password'])) {
    $generated_password = $_SESSION['generated_password'];
} else {
    $generated_password = 'Password not available';
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Generated Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container mt-5">
        <div class="password-box">
            <h1 class="password-title">Generated Password</h1>
            <p class="password-text">Your generated password is:</p>
            <div class="password-display">
                <?php
                session_start();
                if (isset($_SESSION['generated_password'])) {
                    $generated_password = $_SESSION['generated_password'];
                    echo $generated_password;
                } else {
                    echo 'Password not available';
                }
                ?>
            </div>
        </div>
    </div>

</body>
</html>
