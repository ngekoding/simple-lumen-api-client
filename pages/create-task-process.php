<?php 
if (!empty($_POST['submit'])) {
	$title = $_POST['title'];
	$description = $_POST['description'];

	// Restful client
	$response = $client->post('tasks', [
	'form_params' => [
		'title' => $title,
		'description' => $description,
		'api_token' => $_SESSION['api_token']
	] ]);

	$code = $response->getStatusCode();
	$body = $response->getBody()->getContents();
	$body = json_decode($body);

	if (!$body->success) {
		echo "<script>showAndroidToast('Sorry, something went wrong!')</script>";
	} else {
		echo "<script>showAndroidToast('New task created')</script>";
	}
}