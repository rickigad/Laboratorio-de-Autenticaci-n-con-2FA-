<?php

class Sanitizer {

    public static function string($str) {
        $str = trim($str);
        $str = strip_tags($str);
        return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
    }

    public static function email($email) {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        return filter_var($email, FILTER_VALIDATE_EMAIL) ? $email : false;
    }

    public static function usuario($user) {
        return preg_replace('/[^a-zA-Z0-9_]/', '', $user);
    }

}
?>
