<?php
include_once("../config/db.php");
include_once("../vendor/autoload.php");
use Firebase\JWT\JWT;

function loginUserJWT($username, $password) {
    global $pdo;

    // Preparar y ejecutar la consulta para buscar al usuario por nombre de usuario
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar si el usuario existe y si la contraseña es correcta
    if ($user && password_verify($password, $user['password'])) {
        // Configuración del JWT
        $jwtConfig = include('../config/jwt.php');

        // Definir los datos del token
        $token = [
            'iss' => $jwtConfig['issuer'], 
            'aud' => $jwtConfig['audience'],
            'iat' => $jwtConfig['issued_at'],
            'exp' => $jwtConfig['expiration_time'],
            'data' => [
                'id' => $user['id'],
                'username' => $user['username'],
                'email' => $user['email']
            ]
        ];

        try {
            $jwt = JWT::encode($token, $jwtConfig['secret_key'], 'HS256');
            return ['token' => $jwt];
        } catch (Exception $e) {
            return false;
        }
    }

    return false;
}