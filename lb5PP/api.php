<?php
$link = mysqli_connect("localhost", "root", "", "lb2_PP");
$result='';
if(isset($_GET["Clients"]))
{
    if($_GET["Clients"]=="Клиенты"){
        $result = mysqli_fetch_all(mysqli_query($link, "CALL SelKlients"), MYSQLI_ASSOC);
        echo (json_encode($result));
    }
}
if(isset($_GET["Client"]))
{
    if($_GET["Client"]=="Клиент"){
        $id=$_GET["id"];
        $result = mysqli_fetch_all(mysqli_query($link, "CALL SelKient($id)"), MYSQLI_ASSOC);
        echo (json_encode($result));
    }
}
if(isset($_GET["InsClient"]))
{
    if($_GET["InsClient"]=="Добавить"){
        $id=$_GET["name"];
        (mysqli_query($link, "CALL InsKlient('$id')"));
        echo (json_encode($result));
    }
}
if(isset($_GET["DelClient"]))
{
    if($_GET["DelClient"]=="Удалить"){
        $id=$_GET["id"];
        mysqli_query($link, "CALL DelKlient($id)");
        echo (json_encode($result));
    }
}
if(isset($_GET["UpdClient"]))
{
    if($_GET["UpdClient"]=="Обновить"){
        $id=$_GET["id"];
        $name=$_GET["name"];
        (mysqli_query($link, "CALL UpdKlient('$name',$id)"));
        echo (json_encode($result));
    }
}



if(isset($_GET["Zayavki"]))
{
    if($_GET["Zayavki"]=="Заявки"){
        $result = mysqli_fetch_all(mysqli_query($link, "CALL SelZayavki"), MYSQLI_ASSOC);
        echo (json_encode($result));
    }
}
if(isset($_GET["Zayavka"]))
{
    if($_GET["Zayavka"]=="Заявка"){
        $id=$_GET["id"];
        $result = mysqli_fetch_all(mysqli_query($link, "CALL SelZayavku($id)"), MYSQLI_ASSOC);
        echo (json_encode($result));
    }
}
if(isset($_GET["InsZayavka"]))
{
    if($_GET["InsZayavka"]=="Добавить"){
        $id=$_GET["id"];
        (mysqli_query($link, "CALL InsZayavku($id)"));
        echo (json_encode($result));
    }
}
if(isset($_GET["DelZayavka"]))
{
    if($_GET["DelZayavka"]=="Удалить"){
        $id=$_GET["id"];
        mysqli_query($link, "CALL DelZayavku($id)");
        echo (json_encode($result));
    }
}
if(isset($_GET["UpdZayavka"]))
{
    if($_GET["UpdZayavka"]=="Обновить"){
        $k = $_GET["id_k"];
        $z = $_GET["id_z"];
        $result = (mysqli_query($link, "CALL UpdZayavku($k,$z)"));
        echo (json_encode($result));
    }
}

if(isset($_GET["Uslugi"]))
{
    if($_GET["Uslugi"]=="Услуги"){
        $result = mysqli_fetch_all(mysqli_query($link, "CALL SelUslugi"), MYSQLI_ASSOC);
        echo (json_encode($result));
    }
}
if(isset($_GET["Usluga"]))
{
    if($_GET["Usluga"]=="Услуга"){
        $id=$_GET["id"];
        $result = mysqli_fetch_all(mysqli_query($link, "CALL SelUsluga($id)"), MYSQLI_ASSOC);
        echo (json_encode($result));
    }
}
if(isset($_GET["InsUsluga"]))
{
    if($_GET["InsUsluga"]=="Добавить"){
        $price = $_GET["tsena"];
        $name = $_GET["name"];
        $result = (mysqli_query($link, "CALL InsUsluga('$name',$price)"));
        echo (json_encode($result));
    }
}
if(isset($_GET["DelUsluga"]))
{
    if($_GET["DelUsluga"]=="Удалить"){
        $id=$_GET["id"];
        mysqli_query($link, "CALL DelUsluga($id)");
        echo (json_encode($result));
    }
}
if(isset($_GET["UpdUsluga"]))
{
    if($_GET["UpdUsluga"]=="Обновить"){
        $name = $_GET["name"];
        $id = $_GET["id"];
        $price = $_GET["tsena"];
        $result = (mysqli_query($link, "CALL UpdUsluga($id,'$name',$price)"));
        echo (json_encode($result));
    }
}
