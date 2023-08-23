<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHP Strong Password Generator</title>
            
        <!-- BOOTSTRAP -->

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> 
            
        <!-- CSS -->
            
        <link rel="stylesheet" href="css/style.css">

    </head>
    
    <body>
        
    <div class="container mt-5">
        <h1 class="mb-4">Strong Password Generator</h1>
        <form action="index.php" method="get">
            <div class="mb-3">
                <label for="password_length" class="form-label">Password Length:</label>
                <input type="number" id="password_length" name="password_length" class="form-control" min="1" max="50" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Include:</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="include_lowercase" id="include_lowercase" value="1">
                    <label class="form-check-label" for="include_lowercase">Lowercase Letters</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="include_uppercase" id="include_uppercase" value="1">
                    <label class="form-check-label" for="include_uppercase">Uppercase Letters</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="include_numbers" id="include_numbers" value="1">
                    <label class="form-check-label" for="include_numbers">Numbers</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="include_symbols" id="include_symbols" value="1">
                    <label class="form-check-label" for="include_symbols">Symbols</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Generate Password</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (isset($_GET['password_length']) && is_numeric($_GET['password_length'])) {
                $password_length = intval($_GET['password_length']);
                $include_lowercase = isset($_GET['include_lowercase']);
                $include_uppercase = isset($_GET['include_uppercase']);
                $include_numbers = isset($_GET['include_numbers']);
                $include_symbols = isset($_GET['include_symbols']);

                include 'functions.php';
                $generated_password = generateRandomPassword($password_length, $include_lowercase, $include_uppercase, $include_numbers, $include_symbols);

                session_start();
                $_SESSION['generated_password'] = $generated_password;

                header('Location: show_password.php');
                exit();
            }
        }
        ?>
    </div>
</body>
</html>