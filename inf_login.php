
<!doctype html>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>LOGIN</h2>
	</div>

	<form name="log" action="inf_valid.php" method="POST">
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username">
		</div>
		
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" name="submit" class="btn">Submit</button>
		</div>
		<!-- <p>
			Not yet a member? <a href="ospproj.html">Sign up</a>
		</p> -->
	</form>
</body>
</html>
