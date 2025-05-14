<?php
// ==== Password protection ====
$password = "1234"; // Set your password here
session_start();

if (isset($_POST['login_password'])) {
    if ($_POST['login_password'] === $password) {
        $_SESSION['logged_in'] = true;
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } else {
        $error = "Incorrect password.";
    }
}

if (isset($_GET['logout'])) {
    unset($_SESSION['logged_in']);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

if (!isset($_SESSION['logged_in'])) {
    ?>
    <form method="POST" style="text-align:center; margin-top: 100px;">
        <h2>Enter Password</h2>
        <input type="password" name="login_password" required>
        <button type="submit">Login</button>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    </form>
    <?php
    exit;
}
?>

<!-- Protected Content -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Messages</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: sans-serif;
            padding: 20px;
            background-color: #f9f9f9;
        }
        a.logout {
            float: right;
            text-decoration: none;
            color: #007aff;
            font-weight: bold;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border: 1px solid #ddd;
            border-collapse: collapse;
            text-align: center;
        }
        tr, td, th {
            border: 1px solid #ddd;
            padding: 10px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<a class="logout" href="?logout=1">Logout</a>
<h2>Submitted Messages</h2>

<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Message</th>
    </tr>
    <tr>
        <td>vasu</td>
        <td>vsuin@duck.com</td>
        <td>Hi</td>
    </tr>
