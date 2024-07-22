<?php
header('Content-Type: application/json');

include_once ('../includes/functions.php');
include_once ('login_user.php');
include_once ('validate_token.php');

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$method = $_SERVER['REQUEST_METHOD'];
switch ($action) {
    case 'getPosts':
        if (getPosts()) {
            echo json_encode(getPosts());
        } else {
            sendBadRequest("No data");
        }
        break;

    case 'getPostById':
        if ($id > 0) {
            echo json_encode(getPostById($id));
        } else {
            sendBadRequest("Invalid ID");
        }
        break;

    case 'getComments':
        if ($id > 0 && getComments($id)) {
            echo json_encode(getComments($id));
        } else {
            sendBadRequest("Invalid ID");
        }
        break;

    case 'registerUser':
        if ($method === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);

            // validations
            if (!isset($data['username'], $data['email'], $data['password'])) {
                sendBadRequest('Missing required parameters');
            }

            // Try to register
            if (registerUser($data['username'], $data['email'], $data['password'])) {
                echo json_encode(['message' => 'User registered successfully']);
            } else {
                sendBadRequest('Error registering user');
            }
        } else {
            sendBadRequest('Invalid request method');
        }
        break;

    case 'loginUserJWT':
        if ($method === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);

            // Validar los datos
            if (!isset($data['username'], $data['password'])) {
                sendBadRequest('Missing required parameters');
            }

            // Intentar iniciar sesión
            $user = loginUserJWT($data['username'], $data['password']);
            if ($user) {
                echo json_encode($user); // Devolver el JWT en formato JSON
            } else {
                http_response_code(401);
                echo json_encode(['message' => 'Invalid credentials']);
            }
        } else {
            sendBadRequest('Invalid request method');
        }
        break;

    default:
        http_response_code(404);
        echo json_encode(['message' => 'Endpoint not found']);
        break;
}

function sendBadRequest($message)
{
    http_response_code(400);
    echo json_encode(array("message" => $message));
    exit();
}

