<?php
function generateRandomPassword($length, $include_lowercase, $include_uppercase, $include_numbers, $include_symbols) {
    $character_sets = '';
    if ($include_lowercase) {
        $character_sets .= 'abcdefghijklmnopqrstuvwxyz';
    }
    if ($include_uppercase) {
        $character_sets .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    }
    if ($include_numbers) {
        $character_sets .= '0123456789';
    }
    if ($include_symbols) {
        $character_sets .= '!@#$%^&*()-_=+[]{}|;:,.<>?';
    }

    if (empty($character_sets)) {
        return 'No character sets selected';
    }

    $password = '';
    $character_set_length = strlen($character_sets);
    for ($i = 0; $i < $length; $i++) {
        $random_index = mt_rand(0, $character_set_length - 1);
        $password .= $character_sets[$random_index];
    }

    return $password;
}
?>