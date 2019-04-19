<?php

$url = $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

$ur = (parse_url($url));
$path = $ur["path"];
//echo $path;
$path = explode('/', $path);
isset($ur['query']) && parse_str($ur['query'], $_GET);
for ($i = 1; $i < (count($path) - 1); $i++) {
    $path[$i] = urldecode($path[$i]);
}

//echo print_r($path);
$api_res='http://www.mocky.io/v2/5c7db5e13100005a00375fda';
$api=json_decode(file_get_contents($api_res),true);
//print_r($api);

$file = file_get_contents('lab_4.json');
$list = json_decode($file, true);
unset($file);

$result=str_replace(' ','_',$api);
//print_r($result);

$list[] = array('url' => $url, 'response' => $result, 'method' => $_SERVER['REQUEST_METHOD']);
file_put_contents('lab_4.json', json_encode($list));
unset($list);
?>

