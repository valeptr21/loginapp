<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
</head>
<body>
	<form action="<?= base_url() ?>index.php/auth/login" method="post">
		<label>Username</label>
		<input type="text" name="username" placeholder="Username">
		<br><br>
		<label>Password</label>
		<input type="password" name="password" placeholder="Password">
		<br><br>
		<button type="submit">Submit</button>
	</form>
</body>
</html>