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
	<div class="col-xs-3 current_page_item"><a href="#all" data-toggle="tab">All</a></div>
	<div class="col-xs-3"><a href="#todo" data-toggle="tab">Todo</a></div>
	<div class="col-xs-3"><a href="#doing" data-toggle="tab">Doing</a></div>
	<div class="col-xs-3"><a href="#done" data-toggle="tab">Done</a></div>
</div>
<div class="row task-content">
	<div class="col-xs-12 tab-content" style="padding: 0">
		<div class="tab-pane active" id="all">
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
		<div class="tab-pane" id="todo">
			<?php
			if (!is_string($body->result)) {
				echo "<ul class='task-list'>";
				foreach ($body->result as $task) {
					if ($task->status == 'todo') {
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
				}
				echo "</ul>";
			}
			?>
		</div>
		<div class="tab-pane" id="doing">
			<?php
			if (!is_string($body->result)) {
				echo "<ul class='task-list'>";
				foreach ($body->result as $task) {
					if ($task->status == 'doing') {
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
				}
				echo "</ul>";
			}
			?>
		</div>
		<div class="tab-pane" id="done">
			<?php
			if (!is_string($body->result)) {
				echo "<ul class='task-list'>";
				foreach ($body->result as $task) {
					if ($task->status == 'done') {
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
				}
				echo "</ul>";
			}
			?>
		</div>
	</div>
</div>