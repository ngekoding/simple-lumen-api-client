<?php alreadyLoggedIn(); ?>
<div class="row content">
	<div class="col-xs-12">
		<?php include 'login-process.php'; ?>
		<form action="" method="POST" role="form">
			<div class="form-group">
				<input type="email" name="email" class="form-control" placeholder="Email" required>
			</div>
			<div class="form-group">
				<input type="password" name="password" class="form-control" placeholder="Password" required>
			</div>
			<input name="submit" type="submit" class="btn btn-block" value="Login">
		</form> <br>
		<p align="center"><a href="index.php?page=register" class="btn-link">No account yet? Register</a></p>
	</div>
</div>