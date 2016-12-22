<?php alreadyLoggedIn(); ?>
<div class="row content">
	<div class="col-xs-12">
		<?php include 'register-process.php'; ?>
		<form action="" method="POST" role="form">
			<div class="form-group">
				<input type="text" name="username" class="form-control" placeholder="Username" required>
			</div>
			<div class="form-group">
				<input type="email" name="email" class="form-control" placeholder="Email" required>
			</div>
			<div class="form-group">
				<input type="password" name="password" class="form-control" placeholder="Password" required>
			</div>
			<input type="submit" name="submit" class="btn btn-block" value="Register">
		</form> <br>
		<p align="center"><a href="index.php?page=login" class="btn-link">Already a member? Login</a></p>
	</div>
</div>