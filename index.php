<?php
// File path where messages will be stored
$file = "msg.php";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Prepare the content to be appended to the file
    $content = "
    <tr>
        <td>$name</td>
        <td>$email</td>
        <td>$message</td>
    </tr>";

    // Ensure msg.php exists & has write permissions
    if (!file_exists($file)) {
        file_put_contents($file, "<table border='1' cellpadding='10' cellspacing='0' width='100%'><tr><th>Name</th><th>Email</th><th>Message</th></tr></table>");
    }

    // Append content to msg.php
    file_put_contents($file, $content, FILE_APPEND);

    echo "<script>alert('Your message has been submitted successfully!');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Noto Sans', sans-serif; }

        body { background-color: white; display: flex; align-items: center; justify-content: center; height: 100vh; }

        .form-container {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(15px); /* Glassy effect */
            -webkit-backdrop-filter: blur(15px); 
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            width: 90%; max-width: 400px;
            text-align: center;
        }

        h2 { color: black; font-weight: 700; margin-bottom: 25px; font-size: 24px; }

        label { color: black; font-size: 16px; display: block; text-align: left; margin-bottom: 12px; font-weight: bold; }

        input, textarea {
            width: 100%; padding: 14px; margin-bottom: 20px;
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 8px; font-size: 16px;
            background: rgba(255, 255, 255, 0.5); color: black;
        }

        ::placeholder { color: rgba(0, 0, 0, 0.5); font-size: 14px; }

        button {
            background: black; color: white; font-weight: bold;
            padding: 14px; border: none; border-radius: 8px; cursor: pointer;
            width: 100%; margin-top: 25px; font-size: 16px;
        }

        button:hover { background: rgba(0, 0, 0, 0.8); }

        @media (max-width: 600px) {
            .form-container { width: 90%; padding: 30px; }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Contact Us</h2>
        <form method="POST">
            <label for="name">Name:</label>
            <input type="text" name="name" placeholder="Enter your name" required>
            
            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="Enter your email" required>

            <label for="message">Message:</label>
            <textarea name="message" placeholder="Enter your message" required></textarea>

            <button type="submit">Send Message</button>
        </form>
    </div>
</body>
</html>
