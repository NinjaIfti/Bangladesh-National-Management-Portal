<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
    <style>
        /* General styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f4f4;
            color: #333;
            padding: 2rem;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .user-info {
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }

        .user-info h1 {
            margin-bottom: 1rem;
            color: #1e6e1e;
            text-align: center;
        }

        .user-info p {
            margin: 0.5rem 0;
            font-size: 1rem;
            line-height: 1.5;
        }

        .user-info span {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="user-info">
        <h1>User Information</h1>
        <p><span>User ID:</span> 1</p>
        <p><span>Full Name:</span> John Doe</p>
        <p><span>Username:</span> john.doe</p>
        <p><span>Email:</span> john.doe@example.com</p>
        <p><span>User Role:</span> Admin</p>
        <p><span>Notification Preferences:</span> Email, SMS</p>
        <p><span>Registration Date:</span> 2024-11-01</p>
    </div>
</body>
</html>
