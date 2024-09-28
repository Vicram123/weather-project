<?php
session_start();
include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isset($_POST['user_name']) && isset($_POST['password'])) {
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if (!empty($user_name) && !empty($password)) {
			$user = login_user($con, $user_name, $password);
			if ($user) {
				$_SESSION['user_id'] = $user['id'];
				header("Location: index.php");
				die;
			} else {
				$error_message = "Invalid username or password!";
			}
		} else {
			$error_message = "Please enter valid username and password!";
		}
	}
}
?>

<!DOCTYPE html>
<html lang="fi">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<style type="text/css">
		body {
			font-family: Arial, sans-serif;
			background-color: #f0f2f5;
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
			margin: 0;
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

		#text {
			height: 40px;
			border-radius: 5px;
			padding: 10px;
			border: 1px solid #ccc;
			width: 100%;
			margin-bottom: 15px;
			box-sizing: border-box;
		}

		#button {
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

		#button:hover {
			background-color: #0056b3;
			/* Darker shade on hover */
		}

		.btn-container {
			display: flex;
			justify-content: space-between;
			margin-top: 15px;
		}

		.btn {
			color: #007bff;
			text-decoration: none;
			padding: 10px;
			border: 1px solid #007bff;
			border-radius: 5px;
			text-align: center;
			flex: 1;
			margin: 0 5px;
			transition: background-color 0.3s, color 0.3s;
		}

		.btn:hover {
			background-color: #007bff;
			color: white;
		}

		.message-container {
			width: 100%;
			padding: 15px;
			border: 1px solid #f44336;
			background-color: #ffebee;
			border-radius: 5px;
			text-align: center;
			margin-bottom: 15px;
			display: none;
			/* Initially hidden */
		}

		.error-message {
			color: #f44336;
			font-size: 16px;
			font-weight: bold;
		}

		/* Show message container if there's an error */
		.message-container.show {
			display: block;
		}
	</style>
</head>

<body>

	<div id="box">
		<h2>Login</h2>

		<?php if (!empty($error_message)): ?>
			<div class="message-container show">
				<div class="error-message"><?php echo $error_message; ?></div>
			</div>
		<?php endif; ?>

		<form method="post">
			<input id="text" type="text" name="user_name" placeholder="Username" required>
			<input id="text" type="password" name="password" placeholder="Password" required>
			<input id="button" type="submit" value="Login">
		</form>

		<div class="btn-container">
			<a class="btn" href="signup.php">Signup</a>
			<a class="btn" href="home.php">Home</a>
		</div>
	</div>

</body>

</html>