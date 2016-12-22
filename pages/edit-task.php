<?php
loginChecker();
include 'edit-task-process.php';
$id = $_GET['id'];
$response = $client->get('tasks/detail/'.$id, [
	'query' => [
		'api_token' => $_SESSION['api_token']
	] ]);

$body = $response->getBody()->getContents();
$body = json_decode($body);

$task = $body->result;
?>
<div class="row content">
	<div class="col-xs-12">
		<form action="" method="POST" role="form">
			<input type="hidden" name="id" value="<?= $task->id ?>">
			<div class="form-group">
				<input type="text" name="title" class="form-control" placeholder="Title" value="<?= $task->title ?>" required>
			</div>
			<div class="form-group">
				<input type="text" name="description" class="form-control" placeholder="Description" value="<?= $task->description ?>" required>
			</div>
			<div class="form-group">
				<select name="status" class="form-control">
					<option value="todo" <?= statusSelected('todo', $task->status)?>>TODO</option>
					<option value="doing" <?= statusSelected('doing', $task->status)?>>DOING</option>
					<option value="done" <?= statusSelected('done', $task->status)?>>DONE</option>
				</select>
			</div>
			<input type="submit" name="submit" class="btn btn-block" value="Update">
		</form> <br>
		<p align="center"><a href="index.php?page=delete-task&id=<?= $task->id?>" class="btn-link">Delete this task</a></p>
	</div>
</div>