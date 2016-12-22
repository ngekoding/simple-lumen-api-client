<?php 
if (!empty($_GET['id'])) {
	$id = $_GET['id'];

	// Restful client
	$response = $client->delete('tasks/'.$id, [
	'query' => [
		'api_token' => $_SESSION['api_token']
	] ]);

	$result = $response->getBody()->getContents();
	$result = json_decode($result);

	if (!$result->success) {
		echo "<script>showAndroidToast('Sorry, something went wrong!')</script>";
	} else {
		echo "<script>showAndroidToast('Task deleted'); location.href='index.php'</script>";
	}
}