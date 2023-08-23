<?php
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
