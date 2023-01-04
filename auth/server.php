<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once 'auth/Database.php';
// header('Content-Type: application/json; charset=utf-8');
$database = new Database();
$result = array();

if (isset($_POST['register'])) {
    $checkExist = $database->queryUser($_POST['email']);
    if (!$checkExist) {
        if ($_POST['password_1'] == $_POST['password_2']) {
            $res = $database->registerUser($_POST['email'], $_POST['password_1']);
            if ($res) {
                // echo "Registration successful!";
                $result = ["code" => 200, "status" => "success", "response" => "Registration successful"];
                echo json_encode($result);
                $_SESSION['username'] = $_POST['email'];
                $_SESSION['success'] = "You are now logged in";
                header('location: page.php');

            } else {
                $result = ["code" => 400, "status" => "fail", "response" => "Registration failed"];
                echo json_encode($result);
            }
        } else {
            // echo "Passwords do not match";
            $result = ["code" => 400, "status" => "fail", "response" => "Passwords do not match"];
            echo json_encode($result);
        }
    } else {
        // echo "User Already exists";
        $result = ["code" => 400, "status" => "fail", "response" => "User Already exists"];
        echo json_encode($result);
    }
} elseif (isset($_POST['login'])) {
    $success = $database->loginUser($_POST['email'], $_POST['password']);
    if ($success) {
        // echo "Login successful!";
        $result = ["code" => 200, "status" => "success", "response" => "Login successful!"];
        echo json_encode($result);
                        
        $_SESSION['username'] = $_POST['email'];
        $_SESSION['success'] = "You are now logged in";
        header('location: page.php');
    } else {
        // echo "Login failed.";
        $result = ["code" => 400, "status" => "fail", "response" => "Login failed: No match"];
        echo json_encode($result);
    }
}

$database->close();
