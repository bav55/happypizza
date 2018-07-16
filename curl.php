<?
$ch = curl_init("https://just-woman.ru");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_HEADER, 1);
$response = curl_exec($ch);
var_dump($response);
?>