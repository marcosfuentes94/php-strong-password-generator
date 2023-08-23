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
            <button type="submit" class="btn btn-primary">Generate Password</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (isset($_GET['password_length']) && is_numeric($_GET['password_length'])) {
                $password_length = intval($_GET['password_length']);
                $generated_password = generateRandomPassword($password_length);
                echo '<p class="mt-3">Generated Password: ' . $generated_password . '</p>';
            }
        }

        function generateRandomPassword($length) {
            $lowercase_letters = 'abcdefghijklmnopqrstuvwxyz';
            $uppercase_letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $numbers = '0123456789';
            $symbols = '!@#$%^&*()-_=+[]{}|;:,.<>?';
            $all_characters = $lowercase_letters . $uppercase_letters . $numbers . $symbols;
            
            $password = '';
            for ($i = 0; $i < $length; $i++) {
                $random_index = mt_rand(0, strlen($all_characters) - 1);
                $password .= $all_characters[$random_index];
            }
            
            return $password;
        }
        ?>
    </div>

</body>
</html>