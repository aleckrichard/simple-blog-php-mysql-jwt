<?php
include_once("../vendor/autoload.php");
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

function validateToken($token) {
    $jwtConfig = include('../config/jwt.php');
    try {
        $decoded = JWT::decode($token, new Key($jwtConfig['secret_key'], 'HS256'));
        return (array) $decoded->data;
    } catch (Exception $e) {
        return false;
    }
}
