<?php
$item[0]["type"]="menu";
$item[0]["name"]="Пользователи";
$item[0]["child_nodes"]=array(1,2);
$item[1]["type"]="item";
$item[1]["name"]="Роли";
$item[1]["url"]="adsedit.php?crud=roles";
$item[1]["pid"]="14400";
$item[2]["type"]="item";
$item[2]["name"]="Редактирование";
$item[2]["url"]="adsedit.php?crud=usersAdmin";
$item[2]["pid"]="14400";
$item[3]["type"]="menu";
$item[3]["name"]="Контент";
$item[3]["child_nodes"]=array(4);
$item[4]["type"]="item";
$item[4]["name"]="Новости";
$item[4]["url"]="news.php?master=news";
$item[4]["pid"]="14430";
?>