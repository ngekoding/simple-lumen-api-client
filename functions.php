<?php
function taskSelected($param, $value)
{
	if ($param == $value) {
		return "class='active'";
	}
}

function statusSelected($param, $value)
{
	if ($param == $value) {
		return "selected";
	}
}

function loginChecker()
{
	if (empty($_SESSION['logged_in'])) {
		header("location: index.php?page=login");
	}
}

function isLoggedIn()
{
	return !empty($_SESSION['logged_in']);
}

function alreadyLoggedIn()
{
	if (!empty($_SESSION['logged_in'])) {
		header("location: index.php");
	}
}