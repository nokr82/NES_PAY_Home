<?php
/***********************************************************************************
 * FILE NAME : index.php
 *
 * AUTHOR  : 홍동우
 * DATE    : 2020.08.18 (KR, UTC+9)
 * FILE Encoding : UTF-8
 *
 * DESCRIPTION : Payment Web Index
 *
 ***********************************************************************************/
define ('BASE_DIR','..');
include_once("./config/config.php");

$class = "";
$method = "";

$class  = $_GET['c'];
$method = $_GET['m'];

/* 결제 PARAMETER */
if(is_null($class))  $class="main";
if(is_null($method)) $method="index";

$GLOBALS['classObj'] = $class;

include_once(CONTROLLER_PATH.'/'.$class.'.php');

$controller = new $class();

try {
    $callCheck = call_user_func_array(array(&$controller, $method), array());
    if(is_bool($callCheck)) {
        echo 'call error';
    }

} catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();
}

?>
