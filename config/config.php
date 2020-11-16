<?php
/***********************************************************************************
 * FILE NAME : config.php                                        DESIGN REF : FMCM00
 *
 * AUTHOR  : CHEOLJOO MOON
 * DATE    : 2020.07.30 (KR, UTC+9)
 * CHANGES :
 *     REF NO  VERSION     DATE        WHO        DETAIL
 *        1    0.0.1       2020.07.30  CJMOON     Init
 *
 * FILE Encoding : UTF-8
 *
 * DESCRIPTION : System Configuration File.
 *
 ***********************************************************************************/

header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);

/* WEB의 개발버전 또는 운영버전 인지 구분자  DEV, PRD */
define('RUNTYPE',  'DEV');
//define('RUNTYPE',  'PRD');

/* 경로설정 */
define('BASE_PATH', '.');
define('CONFIG_PHP', BASE_PATH.'/config/config.php');
define('CONTROLLER_PHP', BASE_PATH.'/model/controllerImpl.php');
define('CONTROLLER_PATH',BASE_PATH.'/controller');
define('VIEW_PATH', BASE_PATH.'/view');



//헤드
define('HEAD', $_SERVER['DOCUMENT_ROOT'].'/include_common/head.php');

//헤더
define('HEADER', $_SERVER['DOCUMENT_ROOT'].'/include_common/header.php');


//푸터
define('FOOTER', $_SERVER['DOCUMENT_ROOT'].'/include_common/footer.php');



define('CSS_URL', '/css');
define('IMAGE_URL', '/images');
define('JS_URL', '/js');
define('FONT_URL', '/fonts');

define('FILE_EXT', '.php');

/* DEBUG MODE */
if(strcmp(RUNTYPE, 'DEV') == 0) {
    @error_reporting( E_ALL );
    @ini_set( 'log_errors', true );
} else if(strcmp(RUNTYPE, 'PRD') == 0) {
    @ini_set( 'log_errors', false );
    @ini_set( 'display_errors', 0 );
}

/* Database 설정 */
$dbHost = "127.0.0.1";      // Host Address (localhost, 120.0.0.1)
$dbPort = "3306";           // Host Port
$dbName = "pgdb";           // 데이타 베이스(DataBase) 이름
$dbUser = "pgsys";          // DB ID
$dbPass = "pgsys";          // DB Password
//$dbHost = "localhost";      // Host Address (localhost, 120.0.0.1)
//$dbPort = "3306";           // Host Port
//$dbName = "pgdb";           // 데이타 베이스(DataBase) 이름
//$dbUser = "root";          // DB ID
//$dbPass = "1234";          // DB Password

try {
    $pdo = new PDO ("mysql:host={$dbHost};port={$dbPort};dbname={$dbName};charset=utf8", $dbUser, $dbPass);
    $pdo->query("set session character_set_connection=utf8mb4") or die("ERROR");
    $pdo->query("set session character_set_results=utf8mb4") or die("ERROR");
    $pdo->query("set session character_set_client=utf8mb4") or die("ERROR");
} catch (PDOException $e) {
    die("database 연결오류: " . $e->getMessage());
}

$GLOBALS['pdo'] = $pdo;

?>
