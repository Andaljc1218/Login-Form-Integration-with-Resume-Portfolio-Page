<?php
session_start();

$info = '';
$success = '';

// Handle logout only on GET requests
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['logout']) && $_GET['logout'] === '1') {
	$_SESSION = [];
	if (ini_get('session.use_cookies')) {
		$params = session_get_cookie_params();
		setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
	}
	session_destroy();
	$info = 'You have been logged out.';
}

// If already logged in (and not just logged out), redirect to resume
if ($info === '' && isset($_SESSION['username']) && $_SESSION['username'] !== '') {
	header('Location: resume.php');
	exit();
}

$error = '';
$username = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$username = isset($_POST['username']) ? trim($_POST['username']) : '';
	$password = isset($_POST['password']) ? (string)$_POST['password'] : '';

	if ($username === '' || $password === '') {
		$error = 'All fields are required!';
	} else {
		$validUser = 'student';
		$validPass = '1234';

		if ($username === $validUser && $password === $validPass) {
			// Successful login -> set session and redirect
			session_regenerate_id(true);
			$_SESSION['username'] = $username;
			header('Location: resume.php');
			exit();
		} else {
			$error = 'Invalid Username or Password';
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Activity 3 - Login</title>
	<style>
		html, body { height: 100%; }
		body {
			font-family: Arial, sans-serif;
			background: #f6f7f9; /* light background */
			margin: 0;
			display: flex;
			align-items: center;
			justify-content: center;
		}
		.container {
			width: 360px;
			padding: 24px;
			background: #ffffff;
			border-radius: 12px;
			box-shadow: 0 12px 30px rgba(0,0,0,0.10);
			border: 1px solid #e9eaee;
		}
		h2 { margin: 0 0 10px; }
		label { display: block; margin-top: 12px; color: #222; }
		input[type="text"], input[type="password"] {
			width: 100%; padding: 10px; box-sizing: border-box; margin-top: 6px;
			border: 1px solid #d9d9d9; border-radius: 6px; outline: none;
		}
		input[type="text"]:focus, input[type="password"]:focus { border-color: #2c3e50; }
		button { width: 100%; padding: 12px; margin-top: 18px; background: #2c3e50; color: #fff; border: none; border-radius: 6px; cursor: pointer; font-weight: bold; }
		button:hover { background: #1b2836; }
		.messages { margin-top: 14px; min-height: 22px; }
		.message { font-weight: bold; margin: 0; }
		.error { color: #e74c3c; }
		.info { color: #2c7a3f; }
	</style>
</head>
<body>
	<div class="container">
		<h2>Login</h2>
		<form method="POST" action="login.php">
			<label for="username">Username</label>
			<input id="username" type="text" name="username" value="<?php echo htmlspecialchars($username, ENT_QUOTES, 'UTF-8'); ?>">

			<label for="password">Password</label>
			<input id="password" type="password" name="password">

			<button type="submit">Login</button>
		</form>
		<div class="messages">
			<?php if ($error !== ''): ?>
				<p class="message error"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></p>
			<?php elseif ($info !== ''): ?>
				<p class="message info"><?php echo htmlspecialchars($info, ENT_QUOTES, 'UTF-8'); ?></p>
			<?php else: ?>
				<p class="message" style="visibility:hidden">placeholder</p>
			<?php endif; ?>
		</div>
	</div>
</body>
</html>
