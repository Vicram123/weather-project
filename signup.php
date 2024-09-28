<?php
session_start();
include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isset($_POST['user_name']) && isset($_POST['password'])) {
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
			if (create_user($con, $user_name, $password)) {
				echo "User created successfully!";
			} else {
				echo "<div class='error-message'>Please enter valid username and password!</div>";

			}
		} else {
			echo "<div class='error-message'>Please enter valid username and password!</div>";
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Signup</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f0f2f5;
			margin: 0;
			padding: 0;
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
		}

		#box {
			background-color: white;
			border-radius: 8px;
			box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
			padding: 30px;
			width: 300px;
		}

		h2 {
			text-align: center;
			color: #333;
			margin-bottom: 20px;
		}

		input[type="text"],
		input[type="password"] {
			height: 40px;
			border-radius: 5px;
			padding: 10px;
			border: 1px solid #ccc;
			width: 100%;
			margin-bottom: 15px;
			box-sizing: border-box;
		}

		button {
			cursor: pointer;
			padding: 10px;
			width: 100%;
			color: white;
			background-color: #007bff;
			/* Bootstrap primary color */
			border: none;
			border-radius: 5px;
			transition: background-color 0.3s;
		}

		button:hover {
			background-color: #0056b3;
			/* Darker shade on hover */
		}

		p {
			text-align: center;
			margin-top: 15px;
		}

		a {
			color: #007bff;
			text-decoration: none;
		}

		a:hover {
			text-decoration: underline;
		}

		.error-message {
			background-color: #f8d7da;
			/* Light red background */
			color: #721c24;
			/* Dark red text */
			border: 1px solid #f5c6cb;
			/* Border color */
			padding: 10px;
			/* Padding around the message */
			margin: 10px 0;
			/* Margin above and below */
			border-radius: 5px;
			/* Rounded corners */
			font-family: Arial, sans-serif;
			/* Font style */
			font-size: 14px;
			/* Font size */
		}
	</style>
</head>

<body>
	<div id="box">
		<h2>Signup</h2>
		<form method="POST">
			<input type="text" name="user_name" placeholder="Username" required>
			<input type="password" name="password" placeholder="Password" required>
			<button type="submit">Create Account</button>
		</form>
		<p>Already have an account? <a href="login.php">Login here</a></p>
	</div>
</body>

</html>