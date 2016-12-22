<?php
loginChecker();
$status = !empty($_GET['status']) ? $_GET['status'] : '';
$response = $client->get('tasks/'.$status, [
	'query' => [
		'api_token' => $_SESSION['api_token']
	] ]);

$body = $response->getBody()->getContents();
$body = json_decode($body);
?>

<a href="index.php?page=create-task" class="btn-add"><i class="fa fa-plus fa-lg"></i></a>

<div class="row tab-menu">
	<div class="col-xs-3"><a href="index.php?page=task-list" <?= taskSelected($status, '') ?>>All</a></div>
	<div class="col-xs-3"><a href="index.php?page=task-list&status=todo" <?= taskSelected($status, 'todo') ?>>Todo</a></div>
	<div class="col-xs-3"><a href="index.php?page=task-list&status=doing" <?= taskSelected($status, 'doing') ?>>Doing</a></div>
	<div class="col-xs-3"><a href="index.php?page=task-list&status=done" <?= taskSelected($status, 'done') ?>>Done</a></div>
</div>
<div class="row task-content">
	<div class="col-xs-12">
		<?php
		if (!is_string($body->result)) {
			echo "<ul class='task-list'>";
			foreach ($body->result as $task) {
				$id = $task->id;
				$description = strlen($task->description) > 50 ? substr($task->description, 0, 50).'...' : $task->description;
				echo "<li>
						<a href='index.php?page=task-detail&id=$id'>
						<h4>".$task->title."</h4>
						<span>".$description."</span>
					</a>
					<span class='status'>".$task->status."</span>
				</li>";
			}
			echo "</ul>";
		}
		?>
	</div>
</div>