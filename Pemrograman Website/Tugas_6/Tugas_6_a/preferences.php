<?php
// Set cookies if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the submitted form values
    $username = $_POST['username'];
    $theme = $_POST['theme'];
    $language = $_POST['language'];

    // Set cookies for 7 days
    setcookie('username', $username, time() + (7 * 24 * 60 * 60), "/");
    setcookie('theme', $theme, time() + (7 * 24 * 60 * 60), "/");
    setcookie('language', $language, time() + (7 * 24 * 60 * 60), "/");

    // Redirect to refresh the page with the new preferences
    header("Location: preferences.php");
    exit;
}

// Get saved cookie values
$username = isset($_COOKIE['username']) ? $_COOKIE['username'] : '';
$theme = isset($_COOKIE['theme']) ? $_COOKIE['theme'] : 'light';
$language = isset($_COOKIE['language']) ? $_COOKIE['language'] : 'en';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personalize Your Preferences</title>
    <style>
        /* Basic reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f5;
            transition: background-color 0.3s ease;
            padding: 20px;
        }

        body.light-mode {
            background-color: #ffffff;
            color: #333;
        }

        body.dark-mode {
            background-color: #2c2c2c;
            color: #f0f0f0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .form-section {
            margin-bottom: 20px;
        }

        .form-section label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #555;
        }

        .form-section input[type="text"], 
        .form-section select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 16px;
            outline: none;
        }

        .form-section input[type="text"]:focus, 
        .form-section select:focus {
            border-color: #4CAF50;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            font-size: 18px;
            color: white;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        .welcome-message {
            text-align: center;
            margin-bottom: 20px;
            font-size: 18px;
            color: #777;
        }

        /* Responsive */
        @media (max-width: 600px) {
            .container {
                margin: 20px;
                padding: 15px;
            }

            h2 {
                font-size: 20px;
            }

            button[type="submit"] {
                font-size: 16px;
            }
        }
    </style>
</head>
<body class="<?php echo $theme . '-mode'; ?>">

    <div class="container">
        <h2>Personalize Your Preferences</h2>
        
        <div id="greeting">
            <?php if ($username): ?>
                <p class="welcome-message">Welcome back, <?php echo htmlspecialchars($username); ?>!</p>
            <?php else: ?>
                <p class="welcome-message">Please enter your preferences below.</p>
            <?php endif; ?>
        </div>

        <form method="POST" action="">
            <div class="form-section">
                <label for="username">Enter Your Name:</label>
                <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>" required>
            </div>

            <div class="form-section">
                <label for="theme">Choose Theme:</label>
                <select id="theme" name="theme">
                    <option value="light" <?php if ($theme == 'light') echo 'selected'; ?>>Light Mode</option>
                    <option value="dark" <?php if ($theme == 'dark') echo 'selected'; ?>>Dark Mode</option>
                </select>
            </div>

            <div class="form-section">
                <label for="language">Choose Language:</label>
                <select id="language" name="language">
                    <option value="en" <?php if ($language == 'en') echo 'selected'; ?>>English</option>
                    <option value="id" <?php if ($language == 'id') echo 'selected'; ?>>Bahasa Indonesia</option>
                </select>
            </div>

            <button type="submit">Save Preferences</button>
        </form>
    </div>

</body>
</html>
