<?php
$url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];


function prop()
{
    $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $ur = (parse_url($url));
    $path = $ur["path"];
    $path = explode('/', $path);
    for ($i = 1; $i < (count($path) - 1); $i++) {
        $path[$i] = urldecode($path[$i]);
    }
    $n = $path[3];
    $nf = new NumberFormatter("ru", NumberFormatter::SPELLOUT);
    $result = $nf->format($n);
    $var = '{"prop":' . $result . '}';
    return $var;
}

function ur()
{
    $var = 0;
    $a = $_GET["a"];
    $b = $_GET["b"];
    $c = $_GET["c"];
    $D = pow($b, 2) - 4 * $a * $c;
    if ($D == 0) {
        $x1 = (-$b + sqrt($D)) / 2 * $a;
        $var = '{"x1":' . $x1 . '}';
    }
    if ($D < 0) {
        $var = '{Корней нет}';
    }
    if ($D > 0) {
        $x1 = (-$b + sqrt($D)) / 2 * $a;
        $x2 = (-$b - sqrt($D)) / 2 * $a;
        $var = '{"x1":' . $x1 . ',"x2":' . $x2 . '}';
    }
    return $var;
}

function data()
{
    $date = $_GET["date"];
    $date = str_replace('.', '-', $date);
    $var = '{"Den nedeli":' . strftime("%a", strtotime($date)) . '}';
    return $var;
}

function fib()
{
    $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $ur = (parse_url($url));
    $path = $ur["path"];
    $path = explode('/', $path);
    for ($i = 1; $i < (count($path) - 1); $i++) {
        $path[$i] = urldecode($path[$i]);
    }
    $n = $path[3];
    $sq5 = sqrt(5);
    $a = (1 + $sq5) / 2;
    $b = (1 - $sq5) / 2;
    $var = (pow($a, $n) - pow($b, $n)) / $sq5;
    $var1 = '{"fib":' . $var . '}';
    return $var1;
}


function obl()
{
    $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $ur = (parse_url($url));
    $path = $ur["path"];
    $path = explode('/', $path);
    for ($i = 1; $i < (count($path) - 1); $i++) {
        $path[$i] = urldecode($path[$i]);
    }
    $file = file_get_contents('region.txt');
    $file = explode("\n", $file);
    $var = 0;
    foreach ($file as $item) {
        $reg = explode(',', $item);
        if ($reg[1] == $path[3]) {
            $var = '{"obl":' . $reg[2] . '}';
            break;
        }
    }
    unset($file);
    return $var;
}


$ur = (parse_url($url));
$path = $ur["path"];
$path = explode('/', $path);
isset($ur['query']) && parse_str($ur['query'], $_GET);
for ($i = 1; $i < (count($path) - 1); $i++) {
    $path[$i] = urldecode($path[$i]);
}

$possible_url = array("ur", "date");

$value = "An error has occurred";

$file = file_get_contents('lab_1.json');

$list = json_decode($file, true);

unset($file);

if (in_array($path[2], $possible_url)) {
    switch ($path[2]) {
        case "ur":
            if (isset($_GET["a"]) && isset($_GET["b"]) && isset($_GET["c"])) {
                $value = ur();
                echo $value;
                $list[] = array('url' => $url, 'response' => $value, 'method' => $_SERVER['REQUEST_METHOD']);
                file_put_contents('lab_1.json', json_encode($list));
                unset($list);
            } else
                $value = "Missing argument";
            break;

        case "date":
            if (isset($_GET["date"])) {
                $value = data();
                echo $value;
                $list[] = array('url' => $url, 'response' => $value, 'method' => $_SERVER['REQUEST_METHOD']);
                file_put_contents('lab_1.json', json_encode($list));
                unset($list);
            } else
                $value = "Missing argument";
            break;

    }
}

$possible_url1 = array("prop", "fib", "obl");
$ur = (parse_url($url));
$path = $ur["path"];
$path = explode('/', $path);
for ($i = 1; $i < (count($path) - 1); $i++) {
    $path[$i] = urldecode($path[$i]);
}

if (in_array($path[2], $possible_url1)) {
    switch ($path[2]) {
        case "prop":
            if ($path[3]) {
                $value = prop();
                $list[] = array('url' => $url, 'response' => $value, 'method' => $_SERVER['REQUEST_METHOD']);
                file_put_contents('lab_1.json', json_encode($list));
                unset($list);
            } else
                $value = "Missing argument";
            break;
        case "fib":
            if ($path[3]) {
                $value = fib();
                echo $value;
                $list[] = array('url' => $url, 'response' => $value, 'method' => $_SERVER['REQUEST_METHOD']);
                file_put_contents('lab_1.json', json_encode($list));
                unset($list);
            } else {
                $value = "Missing argument";
            }
            break;
        case "obl":
            if ($path[3]) {
                $value = obl();
                echo $value;
                $list[] = array('url' => $url, 'response' => $value, 'method' => $_SERVER['REQUEST_METHOD']);
                file_put_contents('lab_1.json', json_encode($list));
                unset($list);
            } else
                $value = "Missing argument";
            break;
    }

}

(json_encode($value));


//
?>