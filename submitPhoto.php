<?php

var_dump($_FILES);
$url = $_POST['link'];
$header = array('Content-Type: multipart/form-data');
$fields = array('source' => '@' . $_FILES['source']['tmp_name'][0], 
                'message'=> 'Forgive me');

echo $url.'<br/> ';
echo $header;
var_dump( $fields);

$resource = curl_init();
curl_setopt($resource, CURLOPT_URL, $url);
curl_setopt($resource, CURLOPT_HTTPHEADER, $header);
curl_setopt($resource, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($resource, CURLOPT_POST, 1);
curl_setopt($resource, CURLOPT_POSTFIELDS, $fields);
$result = json_decode(curl_exec($resource));
echo $result;
curl_close($resource);
?>
