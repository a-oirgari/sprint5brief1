<?php



function base_url($path = '')
{
    $basePath = dirname($_SERVER['SCRIPT_NAME']);
    $basePath = rtrim($basePath, '/');
    
    return $basePath . $path;
}
function escape($string)
{
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

function redirect($url)
{
    $basePath = dirname($_SERVER['SCRIPT_NAME']);
    $basePath = rtrim($basePath, '/');
    
    if (strpos($url, $basePath) !== 0) {
        $url = $basePath . $url;
    }
    
    header("Location: {$url}");
    exit;
}

function flash($key)
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_SESSION[$key])) {
        $value = $_SESSION[$key];
        unset($_SESSION[$key]);
        return $value;
    }

    return null;
}

function setFlash($key, $value)
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $_SESSION[$key] = $value;
}

function auth()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_SESSION['user_id'])) {
        return User::findById($_SESSION['user_id']);
    }

    return null;
}

function validateEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function validatePassword($password)
{
    return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,}$/', $password) === 1;
}

function sanitize($input)
{
    return trim(strip_tags($input));
}

