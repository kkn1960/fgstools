<?php
require('system.inc');
$timer->mark('components_created');
$template="access_denied.php";
require "template/{$template}";
