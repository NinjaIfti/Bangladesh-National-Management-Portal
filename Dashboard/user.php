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
            flex-direction: column;
            height: 100vh;
        }

        .user-info, .request-service {
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            text-align: center;
            margin-bottom: 1rem;
        }

        .user-info h1, .request-service h2 {
            margin-bottom: 1rem;
            color: #1e6e1e;
        }

        .user-info p {
            margin: 0.5rem 0;
            font-size: 1rem;
            line-height: 1.5;
        }

        .user-info span {
            font-weight: bold;
        }

        .buttons {
            margin-top: 1rem;
            display: flex;
            justify-content: space-around;
        }

        .buttons button {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 5px;
            background-color: #1e6e1e;
            color: #ffffff;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .buttons button:hover {
            background-color: #145014;
        }
    </style>
</head>
<body>
    <!-- User Information Section -->
    <div class="user-info">
        <h1>User Information</h1>
        <p><span>User ID:</span> 1</p>
        <p><span>Full Name:</span> John Doe</p>
        <p><span>Username:</span> john.doe</p>
        <p><span>Email:</span> john.doe@example.com</p>
        <p><span>User Role:</span> Citizen</p>
        <p><span>Notification Preferences:</span> Email, SMS</p>
        <p><span>Registration Date:</span> 2024-11-01</p>
    </div>

    <!-- Request Service Section -->
    <div class="request-service">
        <h2>Request Service</h2>
        <div class="buttons">
            <button onclick="handleService('Passport')">Passport</button>
            <button onclick="handleService('Transport')">Transport</button>
            <button onclick="handleService('Citizenship')">Citizenship</button>
        </div>
    </div>

    <script>
        // Function to handle button clicks
        function handleService(service) {
            alert(`You have selected the ${service} service.`);
            // Redirect or handle service selection here
        }
    </script>
</body>
</html>
