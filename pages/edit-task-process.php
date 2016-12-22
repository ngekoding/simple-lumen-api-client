<?php 
if (!empty($_POST['submit'])) {
	$id = $_POST['id'];
	$title = $_POST['title'];
	$description = $_POST['description'];
	$status = $_POST['status'];

	// Restful client
	$update = $client->put('tasks/'.$id, [
	'form_params' => [
		'title' => $title,
		'description' => $description,
		'status' => $status,
		'api_token' => $_SESSION['api_token']
	] ]);

	$result = $update->getBody()->getContents();
	$result = json_decode($result);

	if (!$result->success) {
		echo "<script>showAndroidToast('Sorry, something went wrong!')</script>";
	} else {
		echo "<script>showAndroidToast('Task updated')</script>";
	}
}