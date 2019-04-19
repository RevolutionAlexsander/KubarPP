<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<!--<form action="index.php" method="get">-->
<fieldset style="float: left; ">
    <legend>Клиенты</legend>
    <form action="index.php" method="get">
        <fieldset>
            <input type="submit" value="Клиенты" name="Clients">
        </fieldset>
    </form>
    <form action="index.php" method="get">
        <fieldset>
            <input type="submit" value="Клиент" name="Client">
            <label>ID клиента</label><input type="text" name="id">
        </fieldset>
    </form>
    <form action="index.php" method="get">
        <fieldset>
            <input type="submit" value="Добавить" name="InsClient">
            <label>Имя</label><input type="text" name="name">
        </fieldset>
    </form>
    <form action="index.php" method="get">
        <fieldset>
            <input type="submit" value="Удалить" name="DelClient">
            <label>ID клиента</label><input type="text" name="id">
        </fieldset>
    </form>
    <form action="index.php" method="get">
        <fieldset>
            <input type="submit" value="Обновить" name="UpdClient">
            <label>ID клиента</label><input type="text" name="id">
            <label>Имя</label><input type="text" name="name">
        </fieldset>
    </form>
</fieldset>


<fieldset style="float: left; ">
    <legend>Заявки</legend>
    <form action="index.php" method="get">
        <fieldset>
            <input type="submit" value="Заявки" name="Zayavki">
        </fieldset>
    </form>
    <form action="index.php" method="get">
        <fieldset>
            <input type="submit" value="Заявка" name="Zayavka">
            <label>ID заявки</label><input type="text" name="id">
        </fieldset>
    </form>
    <form action="index.php" method="get">
        <fieldset>
            <input type="submit" value="Добавить" name="InsZayavka">
            <label>ID клиента</label><input type="text" name="id">
        </fieldset>
    </form>
    <form action="index.php" method="get">
        <fieldset>
            <input type="submit" value="Удалить" name="DelZayavka">
            <label>ID заявки</label><input type="text" name="id">
        </fieldset>
    </form>
    <form action="index.php" method="get">
        <fieldset>
            <input type="submit" value="Обновить" name="UpdZayavka">
            <label>ID заявки</label><input type="text" name="id_z">
            <label>ID клиента</label><input type="text" name="id_k">
        </fieldset>
    </form>
</fieldset>


<fieldset style="float: left; ">
    <legend>Услуги</legend>
    <form action="index.php" method="get">
        <fieldset>
            <input type="submit" value="Услуги" name="Uslugi">
        </fieldset>
    </form>
    <form action="index.php" method="get">
        <fieldset>
            <input type="submit" value="Услуга" name="Usluga">
            <label>ID услуги</label><input type="text" name="id">
        </fieldset>
    </form>
    <form action="index.php" method="get">
        <fieldset>
            <input type="submit" value="Добавить" name="InsUsluga">
            <label>Название</label><input type="text" name="name">
            <label>Цена</label><input type="text" name="tsena">
        </fieldset>
    </form>
    <form action="index.php" method="get">
        <fieldset>
            <input type="submit" value="Удалить" name="DelUsluga">
            <label>ID услуги</label><input type="text" name="id">
        </fieldset>
    </form>
    <form action="index.php" method="get">
        <fieldset>
            <input type="submit" value="Обновить" name="UpdUsluga">
            <label>ID услуги</label><input type="text" name="id">
            <label>Название</label><input type="text" name="name">
            <label>Цена</label><input type="text" name="tsena">
        </fieldset>
    </form>
</fieldset>

<!--</form>-->
<?php
$url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

$link = mysqli_connect("localhost", "root", "", "lb2_PP");

//$possible_url = array("delete", "put", "get", "post");

$file = file_get_contents('lab_5.json');

$list = json_decode($file, true);

if (isset($_GET["Clients"])) {
    if ($_GET["Clients"] == "Клиенты") {
        $api = 'http://lb5pp/api.php?Clients=Клиенты';
        $ur = file_get_contents($api);
        $list[] = array('url' => $url, 'response' => json_decode($ur), 'method' => $_SERVER['REQUEST_METHOD']);
//        print_r($list);
        file_put_contents('lab_5.json', json_encode($list));
        unset($list);
    }
}
if (isset($_GET["Client"])) {
    if ($_GET["Client"] == "Клиент") {
        $api = 'http://lb5pp/api.php?Client=Клиент&id=' . $_GET["id"];
        $ur = file_get_contents($api);
        $list[] = array('url' => $url, 'response' => json_decode($ur), 'method' => $_SERVER['REQUEST_METHOD']);
//        print_r($list);
        file_put_contents('lab_5.json', json_encode($list));
        unset($list);
    }
}
if (isset($_GET["InsClient"])) {
    if ($_GET["InsClient"] == "Добавить") {
        $api = 'http://lb5pp/api.php?InsClient=Добавить&name=' . $_GET["name"];
        $ur = file_get_contents($api);
        $list[] = array('url' => $url, 'response' => json_decode($ur), 'method' => $_SERVER['REQUEST_METHOD']);
        file_put_contents('lab_5.json', json_encode($list));
        unset($list);
    }
}
if (isset($_GET["UpdClient"])) {
    if ($_GET["UpdClient"] == "Обновить") {
        $api = 'http://lb5pp/api.php?UpdClient=Обновить&id='.$_GET["id"].'&name=' . $_GET["name"];
//        echo $api;
        $ur = file_get_contents($api);
        $list[] = array('url' => $url, 'response' => json_decode($ur), 'method' => $_SERVER['REQUEST_METHOD']);
//        print_r($list);
        file_put_contents('lab_5.json', json_encode($list));
        unset($list);
    }
}
if (isset($_GET["DelClient"])) {
    if ($_GET["DelClient"] == "Удалить") {
        $api = 'http://lb5pp/api.php?DelClient=Удалить&name=' . $_GET["id"];
        $ur = file_get_contents($api);
        $list[] = array('url' => $url, 'response' => json_decode($ur), 'method' => $_SERVER['REQUEST_METHOD']);
        file_put_contents('lab_5.json', json_encode($list));
        unset($list);
    }
}



if (isset($_GET["Zayavki"])) {
    if ($_GET["Zayavki"] == "Заявки") {
        $api = 'http://lb5pp/api.php?Zayavki=Заявки';
        $ur = file_get_contents($api);
        $list[] = array('url' => $url, 'response' => json_decode($ur), 'method' => $_SERVER['REQUEST_METHOD']);
//        print_r($list);
        file_put_contents('lab_5.json', json_encode($list));
        unset($list);
    }
}
if (isset($_GET["Zayavka"])) {
    if ($_GET["Zayavka"] == "Заявка") {
        $api = 'http://lb5pp/api.php?Zayavka=Заявка&id=' . $_GET["id"];
        $ur = file_get_contents($api);
        $list[] = array('url' => $url, 'response' => json_decode($ur), 'method' => $_SERVER['REQUEST_METHOD']);
//        print_r($list);
        file_put_contents('lab_5.json', json_encode($list));
        unset($list);
    }
}
if (isset($_GET["InsZayavka"])) {
    if ($_GET["InsZayavka"] == "Добавить") {
        $api = 'http://lb5pp/api.php?InsZayavka=Добавить&id=' . $_GET["id"];
        $ur = file_get_contents($api);
        $list[] = array('url' => $url, 'response' => json_decode($ur), 'method' => $_SERVER['REQUEST_METHOD']);
        file_put_contents('lab_5.json', json_encode($list));
        unset($list);
    }
}
if (isset($_GET["UpdZayavka"])) {
    if ($_GET["UpdZayavka"] == "Обновить") {
        $api = 'http://lb5pp/api.php?UpdZayavka=Обновить&id_z'.$_GET["id_z"].'=&id_k='.$_GET["id_k"];
//        echo $api;
        $ur = file_get_contents($api);
        $list[] = array('url' => $url, 'response' => json_decode($ur), 'method' => $_SERVER['REQUEST_METHOD']);
//        print_r($list);
        file_put_contents('lab_5.json', json_encode($list));
        unset($list);
    }
}
if (isset($_GET["DelZayavka"])) {
    if ($_GET["DelZayavka"] == "Удалить") {
        $api = 'http://lb5pp/api.php?DelZayavka=Удалить&id=' . $_GET["id"];
        $ur = file_get_contents($api);
        $list[] = array('url' => $url, 'response' => json_decode($ur), 'method' => $_SERVER['REQUEST_METHOD']);
        file_put_contents('lab_5.json', json_encode($list));
        unset($list);
    }
}


if (isset($_GET["Uslugi"])) {
    if ($_GET["Uslugi"] == "Услуги") {
        $api = 'http://lb5pp/api.php?Uslugi=Услуги';
        $ur = file_get_contents($api);
        $list[] = array('url' => $url, 'response' => json_decode($ur), 'method' => $_SERVER['REQUEST_METHOD']);
//        print_r($list);
        file_put_contents('lab_5.json', json_encode($list));
        unset($list);
    }
}
if (isset($_GET["Usluga"])) {
    if ($_GET["Usluga"] == "Услуга") {
        $api = 'http://lb5pp/api.php?Usluga=Услуга&id=' . $_GET["id"];
        $ur = file_get_contents($api);
        $list[] = array('url' => $url, 'response' => json_decode($ur), 'method' => $_SERVER['REQUEST_METHOD']);
//        print_r($list);
        file_put_contents('lab_5.json', json_encode($list));
        unset($list);
    }
}
if (isset($_GET["InsUsluga"])) {
    if ($_GET["InsUsluga"] == "Добавить") {
        $api = 'http://lb5pp/api.php?InsUsluga=Добавить&name='. $_GET["name"].'&tsena='.$_GET["tsena"] ;
        $ur = file_get_contents($api);
        $list[] = array('url' => $url, 'response' => json_decode($ur), 'method' => $_SERVER['REQUEST_METHOD']);
        file_put_contents('lab_5.json', json_encode($list));
        unset($list);
    }
}
if (isset($_GET["UpdUsluga"])) {
    if ($_GET["UpdUsluga"] == "Обновить") {
        $api = 'http://lb5pp/api.php?UpdUsluga=Обновить&id='.$_GET["id"].'&name='. $_GET["name"].'&tsena='.$_GET["tsena"];
//        echo $api;
        $ur = file_get_contents($api);
        $list[] = array('url' => $url, 'response' => json_decode($ur), 'method' => $_SERVER['REQUEST_METHOD']);
//        print_r($list);
        file_put_contents('lab_5.json', json_encode($list));
        unset($list);
    }
}
if (isset($_GET["DelUsluga"])) {
    if ($_GET["DelUsluga"] == "Удалить") {
        $api = 'http://lb5pp/api.php?DelUsluga=Удалить&id=' . $_GET["id"];
        $ur = file_get_contents($api);
        $list[] = array('url' => $url, 'response' => json_decode($ur), 'method' => $_SERVER['REQUEST_METHOD']);
        file_put_contents('lab_5.json', json_encode($list));
        unset($list);
    }
}


?>
</body>
</html>