<?php
$error = '';
$success = '';
$username = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$username = isset($_POST['username']) ? trim($_POST['username']) : '';
	$password = isset($_POST['password']) ? (string)$_POST['password'] : '';

	if ($username === '' || $password === '') {
		$error = 'All fields are required!';
	} else {
		if ($username === 'admin' && $password === '1234') {
			$success = 'Login Successful';
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
	<title>Activity 2 - PHP Login</title>
	<style>
		/* Page layout */
		html, body { height: 100%; }
		body {
			font-family: Arial, sans-serif;
			background: #f6f7f9; /* light background to match Activity 3 */
			margin: 0;
			display: flex;
			align-items: center;   /* vertical center */
			justify-content: center; /* horizontal center */
		}

		/* Card */
		.container {
			width: 360px;
			padding: 24px;
			background: #ffffff;
			border-radius: 12px;
			box-shadow: 0 12px 30px rgba(0,0,0,0.10);
			border: 1px solid #e9eaee;
		}

		/* Form elements */
		h2 { margin: 0 0 10px; }
		label { display: block; margin-top: 12px; color: #222; }
		input[type="text"], input[type="password"] {
			width: 100%;
			padding: 10px;
			box-sizing: border-box;
			margin-top: 6px;
			border: 1px solid #d9d9d9;
			border-radius: 6px;
			outline: none;
		}
		input[type="text"]:focus, input[type="password"]:focus { border-color: #2c3e50; }

		button {
			width: 100%;
			padding: 12px;
			margin-top: 18px;
			background: #2c3e50;
			color: #fff;
			border: none;
			border-radius: 6px;
			cursor: pointer;
			font-weight: bold;
		}
		button:hover { background: #1b2836; }

		/* Messages */
		.messages { margin-top: 14px; min-height: 22px; }
		.message { font-weight: bold; margin: 0; }
		.error { color: #e74c3c; }
		.success { color: #2ecc71; }
		.placeholder { visibility: hidden; }
	</style>
</head>
<body>
	<div class="container">
		<h2>Login</h2>
		<form method="POST" action="">
			<label for="username">Username</label>
			<input id="username" type="text" name="username" value="<?php echo htmlspecialchars($username, ENT_QUOTES, 'UTF-8'); ?>">

			<label for="password">Password</label>
			<input id="password" type="password" name="password">

			<button type="submit">Login</button>
		</form>
		<div class="messages">
			<?php if ($error !== ''): ?>
				<p class="message error"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></p>
			<?php elseif ($success !== ''): ?>
				<p class="message success"><?php echo htmlspecialchars($success, ENT_QUOTES, 'UTF-8'); ?></p>
			<?php else: ?>
				<p class="message placeholder">placeholder</p>
			<?php endif; ?>
		</div>
	</div>
</body>
</html>
