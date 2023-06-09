<?php


session_start();

require "../app/core/init.php";

$app = new Route();


 use App\Core\Errorhandler;
$er = new Errorhandler();

set_error_handler([$er, 'handleError']);
set_exception_handler([$er, 'handleException']);

