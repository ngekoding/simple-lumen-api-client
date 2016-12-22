<?php
loginChecker();
$id = $_GET['id'];
$response = $client->get('tasks/detail/'.$id, [
	'query' => [
		'api_token' => $_SESSION['api_token']
	] ]);

$body = $response->getBody()->getContents();
$body = json_decode($body);

$task = $body->result;
?>
<a href="index.php?page=edit-task&id=<?= $task->id ?>" class="btn-add"><i class="fa fa-edit fa-lg"></i></a>

<div class="row content">
	<div class="col-xs-12">
		<div class="task-detail">
			<h4><?= $task->title ?></h4>
			<span><?= $task->description ?></span>
			<span class='status'><?= $task->status ?></span>
		</div>
	</div>
</div>