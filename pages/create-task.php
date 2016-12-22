<div class="row content">
	<div class="col-xs-12">
		<?php include 'create-task-process.php'; ?>
		<form action="" method="POST" role="form">
			<div class="form-group">
				<input type="text" name="title" class="form-control" placeholder="Title" required>
			</div>
			<div class="form-group">
				<input type="text" name="description" class="form-control" placeholder="Description" required>
			</div>
			<input type="submit" name="submit" class="btn btn-block" value="Save">
		</form>
	</div>
</div>