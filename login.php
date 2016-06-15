<?php
include('varseo_includes/autoloader.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
</head>
<body>
	<h3>Login</h3>
	<div class="row">
		<?php
		if (!empty($_SESSION['user']['username'])) {
			echo '<div class="alert alert-danger" role="alert"><strong>Oh snap!</strong> Security token does not match. <br> <a href="logout.php">Click me to continue...</a></div>';
		}
		?>
		<?php if (!empty($_SESSION['fail'])) {
			if ($_SESSION['fail'] == true) {
				echo '<div class="alert alert-danger" role="alert">
					<strong>Oh snap!</strong> Change a few things up and try submitting again.
				</div>';
			}
		} ?>
		<form method="post">
			<div class="full-width">
				<input type="text" class="form-control" placeholder="Username" name="username" required>
			</div>
			<div class="full-width">
				<input type="password" class="form-control" placeholder="Password" name="password" required>
			</div>
			<div class="full-width">
				<input type="submit" name="signIn" class="button gold medium full" value="Login">
			</div>
		</form>
	</div>				
</body>
</html>