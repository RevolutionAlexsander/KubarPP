<?php
$link = mysqli_connect("localhost", "root", "", "lb2_PP");
$url = $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

$ur = (parse_url($url));
$path = $ur["path"];
//echo $path;
$path = explode('/', $path);
isset($ur['query']) && parse_str($ur['query'], $_GET);
for ($i = 1; $i < (count($path) - 1); $i++) {
    $path[$i] = urldecode($path[$i]);
}

$possible_url = array("delete", "put", "get", "post");

$file = file_get_contents('lab_2.json');

$list = json_decode($file, true);

unset($file);
$result='';
if ($path[2] == "clients") {
    if (isset($_GET["action"]) && in_array($_GET["action"], $possible_url)) {
        switch ($_GET["action"]) {

            case "delete":
                if (isset($_GET["id"])) {
                    $id = $_GET["id"];
//                    echo $id;
                    $result = mysqli_query($link, "CALL DelKlient($id)");
                    $list[] = array('url' => $url, 'response' => $result, 'method' => $_SERVER['REQUEST_METHOD']);
                    file_put_contents('lab_2.json', json_encode($list));
                    unset($list);

                }
                break;

            case "put":
                if (isset($_GET["name"]) && isset($_GET["id"])) {
                    $name = $_GET["name"];
                    $id = $_GET["id"];
                    (mysqli_query($link, "CALL UpdKlient('$name',$id)"));
                    $list[] = array('url' => $url, 'response' => $result, 'method' => $_SERVER['REQUEST_METHOD']);
                    file_put_contents('lab_2.json', json_encode($list));
                    unset($list);
                }
                break;

            case "post":
                if ($name = $_GET["name"]) {
                    (mysqli_query($link, "CALL InsKlient('$name')"));
                    $list[] = array('url' => $url, 'response' => $result, 'method' => $_SERVER['REQUEST_METHOD']);
                    file_put_contents('lab_2.json', json_encode($list));
                    unset($list);
                }
                break;

            case "get":
                if ($id = $_GET["id"]) {
                    $result = mysqli_fetch_all(mysqli_query($link, "CALL SelKient($id)"), MYSQLI_ASSOC);
                    $list[] = array('url' => $url, 'response' => $result, 'method' => $_SERVER['REQUEST_METHOD']);
                    file_put_contents('lab_2.json', json_encode($list));
                    unset($list);
//                    var_dump($result);
                } else {
                    $result = mysqli_fetch_all(mysqli_query($link, "CALL SelKlients"), MYSQLI_ASSOC);
                    $list[] = array('url' => $url, 'response' => $result, 'method' => $_SERVER['REQUEST_METHOD']);
                    file_put_contents('lab_2.json', json_encode($list));
                    unset($list);
//                    var_dump($result);
                }
                break;
        }
    }
}

if ($path[2] == "zayavka") {
    if (isset($_GET["action"]) && in_array($_GET["action"], $possible_url)) {
        switch ($_GET["action"]) {

            case "delete":
                if (isset($_GET["id"])) {
                    $id = $_GET["id"];
//                    echo $id;
                    mysqli_query($link, "CALL DelZayavku($id)");
                    $list[] = array('url' => $url, 'response' => $result, 'method' => $_SERVER['REQUEST_METHOD']);
                    file_put_contents('lab_2.json', json_encode($list));
                    unset($list);
                }
                break;

            case "put":
                if (isset($_GET["k"]) && isset($_GET["z"])) {
                    $k = $_GET["k"];
                    $z = $_GET["z"];
                    $result = (mysqli_query($link, "CALL UpdZayavku($k,$z)"));
                    $list[] = array('url' => $url, 'response' => $result, 'method' => $_SERVER['REQUEST_METHOD']);
                    file_put_contents('lab_2.json', json_encode($list));
                    unset($list);
                }
                break;

            case "post":
                if ($id = $_GET["id"]) {
                    $result = (mysqli_query($link, "CALL InsZayavku($id)"));
                    $list[] = array('url' => $url, 'response' => $result, 'method' => $_SERVER['REQUEST_METHOD']);
                    file_put_contents('lab_2.json', json_encode($list));
                    unset($list);
                }
                break;

            case "get":
                if ($id = $_GET["id"]) {
                    $result = mysqli_fetch_all(mysqli_query($link, "CALL SelZayavku($id)"), MYSQLI_ASSOC);
                    $list[] = array('url' => $url, 'response' => $result, 'method' => $_SERVER['REQUEST_METHOD']);
                    file_put_contents('lab_2.json', json_encode($list));
                    unset($list);
//                    var_dump($result);
                } else {
                    $result = mysqli_fetch_all(mysqli_query($link, "CALL SelZayavki"), MYSQLI_ASSOC);
                    $list[] = array('url' => $url, 'response' => $result, 'method' => $_SERVER['REQUEST_METHOD']);
                    file_put_contents('lab_2.json', json_encode($list));
                    unset($list);
//                    var_dump($result);
                }
                break;
        }
    }
}

if ($path[2] == "usluga") {
    if (isset($_GET["action"]) && in_array($_GET["action"], $possible_url)) {
        switch ($_GET["action"]) {

            case "delete":
                if (isset($_GET["id"])) {
                    $id = $_GET["id"];
                    echo $id;
                    $result = mysqli_query($link, "CALL DelUsluga($id)");
                    $list[] = array('url' => $url, 'response' => $result, 'method' => $_SERVER['REQUEST_METHOD']);
                    file_put_contents('lab_2.json', json_encode($list));
                    unset($list);
                }
                break;

            case "put":
                if (isset($_GET["id"]) && isset($_GET["name"]) && isset($_GET["price"])) {
                    $name = $_GET["name"];
                    $id = $_GET["id"];
                    $price = $_GET["price"];
                    $result = (mysqli_query($link, "CALL UpdKlient($id,'$name',$price)"));
                    $list[] = array('url' => $url, 'response' => $result, 'method' => $_SERVER['REQUEST_METHOD']);
                    file_put_contents('lab_2.json', json_encode($list));
                    unset($list);
                }
                break;

            case "post":
                if (isset($_GET["name"]) && isset($_GET["price"])) {
                    $price = $_GET["price"];
                    $name = $_GET["name"];
                    $result = (mysqli_query($link, "CALL InsUsluga('$name',$price)"));
                    $list[] = array('url' => $url, 'response' => $result, 'method' => $_SERVER['REQUEST_METHOD']);
                    file_put_contents('lab_2.json', json_encode($list));
                    unset($list);
                }
                break;

            case "get":
                if ($id = $_GET["id"]) {
                    $result = mysqli_fetch_all(mysqli_query($link, "CALL SelUsluga($id)"), MYSQLI_ASSOC);
                    $list[] = array('url' => $url, 'response' => $result, 'method' => $_SERVER['REQUEST_METHOD']);
                    file_put_contents('lab_2.json', json_encode($list));
                    unset($list);
//                    var_dump($result);
                } else {
                    $result = mysqli_fetch_all(mysqli_query($link, "CALL SelUslugi"), MYSQLI_ASSOC);
                    $list[] = array('url' => $url, 'response' => $result, 'method' => $_SERVER['REQUEST_METHOD']);
                    file_put_contents('lab_2.json', json_encode($list));
                    unset($list);
//                    var_dump($result);
                }
                break;
        }
    }
}

?>
