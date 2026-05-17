<?php
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/config/session.php';
require_once __DIR__ . '/controllers/AuthController.php';
require_once __DIR__ . '/controllers/HomeController.php';

auto_login_from_remember_cookie($conn);

$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'home':
        show_home_page($conn);
        break;

    case 'register':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            handle_register($conn);
        } else {
            show_register_page();
        }
        break;

    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            handle_login($conn);
        } else {
            show_login_page();
        }
        break;

    case 'profile':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            handle_profile_update($conn);
        } else {
            show_profile_page($conn);
        }
        break;

    case 'logout':
        handle_logout($conn);
        break;

    default:
        $pageTitle = "404";
        require __DIR__ . '/views/errors/404.php';
        break;
}
?>
