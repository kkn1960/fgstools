<?php
// redirect to homepage
$url = "http://".$_SERVER['HTTP_HOST'];
header("Location: $url");
