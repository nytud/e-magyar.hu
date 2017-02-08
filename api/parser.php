<?php
header('Content-type: text/xml');

if (!isset($_GET)) {
	die("error");	
}
if (empty($_GET['modules']) || empty($_GET['text'])) {
	die("error");	
}

$modules = htmlspecialchars($_GET['modules']);
$text = htmlspecialchars($_GET['text']);

$url = "http://localhost:8000/process?run=" . $modules . "&text=" . str_replace("%0D%0A", "%0A", urlencode($text));

$xml = file_get_contents($url);

print_r($xml);