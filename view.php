<?php
// Password for accessing the messages
define("PASSWORD", "1234");
$authenticated = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $enteredPassword = $_POST["password"];
    if ($enteredPassword === PASSWORD) {
        $authenticated = true;
    } else {
        $errorMessage = "Incorrect password! Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Messages</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Noto Sans', sans-serif; }
        body { background-color: white; display: flex; align-items: center; justify-content: center; min-height: 100vh; flex-direction: column; width: 100%; }

        .container {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 800px;
            text-align: center;
        }

        h2 { color: black; font-weight: 700; margin-bottom: 25px; font-size: 24px; }

        label, p { color: black; font-size: 16px; font-weight: bold; }

        input {
            width: 100%; padding: 12px; margin-bottom: 15px;
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 8px; font-size: 16px;
            background: rgba(255, 255, 255, 0.5); color: black;
        }

        button {
            background: black; color: white; font-weight: bold;
            padding: 14px; border: none; border-radius: 8px; cursor: pointer;
            width: 100%; margin-top: 20px; font-size: 16px;
        }

        .table-container {
            margin-top: 20px;
            width: 100%;
            max-width: 1200px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid rgba(0, 0, 0, 0.2);
            background: rgba(255, 255, 255, 0.4);
            color: black;
            word-wrap: break-word;
        }

        th {
            background: rgba(0, 0, 0, 0.1);
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Submitted Messages</h2>

        <?php if (!$authenticated): ?>
        <form method="POST">
            <input type="password" name="password" required placeholder="Enter your password">
            <button type="submit">Unlock Messages</button>
        </form>
        <?php if (isset($errorMessage)) echo "<p style='color: red; margin-top: 20px;'>$errorMessage</p>"; ?>
        <?php else: ?>
        <div class='table-container'>
            <table>
                <thead><tr><th>Name</th><th>Email</th><th>Message</th></tr></thead>
                <tbody>
                    <?php
                    if (file_exists("msg.php")) {
                        include("msg.php");
                    } else {
                        echo "<tr><td colspan='3'>No messages have been submitted yet.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>
