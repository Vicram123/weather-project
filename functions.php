<?php
function create_user($con, $user_name, $password)
{
	// Check if the username already exists
	$query = $con->prepare("SELECT * FROM users WHERE name = ? LIMIT 1");
	$query->bind_param("s", $user_name);
	$query->execute();
	$result = $query->get_result();

	if ($result && $result->num_rows > 0) {
		// Username already exists
		return false;
	}

	// Hash the password before storing it
	$hashed_password = password_hash($password, PASSWORD_DEFAULT);

	// Prepare an SQL statement to insert the new user
	$insert_query = $con->prepare("INSERT INTO users (name, role, password, created_at) VALUES (?, 'user', ?, NOW())");
	$insert_query->bind_param("ss", $user_name, $hashed_password);

	// Execute and check if the user was created successfully
	if ($insert_query->execute()) {
		return true; // User created successfully
	} else {
		return false; // Failed to create user
	}
}

function login_user($con, $user_name, $password)
{
	$query = $con->prepare("SELECT * FROM users WHERE name = ? LIMIT 1");
	$query->bind_param("s", $user_name);
	$query->execute();
	$result = $query->get_result();

	if ($result && $result->num_rows > 0) {
		$user = $result->fetch_assoc();
		// Verify the password
		if (password_verify($password, $user['password'])) {
			return $user; // Successful login
		}
	}
	return false; // Failed login
}

function check_login($con)
{
	// Ensure the session is started
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}

	if (isset($_SESSION['user_id'])) {
		$id = $_SESSION['user_id'];

		// Use prepared statements to prevent SQL injection
		$query = $con->prepare("SELECT * FROM users WHERE id = ? LIMIT 1");
		$query->bind_param("i", $id);
		$query->execute();
		$result = $query->get_result();

		if ($result && $result->num_rows > 0) {
			return $result->fetch_assoc();
		}
	}

	// Redirect to login if user is not found or not logged in
	header("Location: login.php"); // Change to your login page
	die;
}

?>