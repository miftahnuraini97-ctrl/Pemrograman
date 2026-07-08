<?php
session_start();
require_once 'config/db.php';

if (isset($_SESSION['user_id'])) {
    if ($_SESSION['role'] === 'admin') {
        header("Location: admin/dashboard.php");
    } else {
        header("Location: user/dashboard.php");
    }
    exit;
} else {
    header("Location: auth/login.php");
    exit;
}
