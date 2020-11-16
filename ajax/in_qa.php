<?php
/************************************************************************************
 ********************************만든이 : 홍동우 ****************************************
 *******************************만든시기 : 2020/02/04 **********************************
 ******************************내용: 문의하기     **********************************
 ************************************************************************************/
include_once($_SERVER['DOCUMENT_ROOT'] . '/config/config.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/lib/mailer.lib.php');
// 컨텐츠 타입을 json으로 지정합니다.
header("Content-Type: application/json");


$sql = "INSERT INTO `pgdb`.`ne_qna` (`qa_mail`, `qa_name`, `qa_note`) VALUES ('{$_POST['qa_email']}', '{$_POST['qa_name']}', '{$_POST['qa_cont']}');";
$qa = $pdo->query($sql);

$send = mailer($_POST['qa_email'],'nokr82@naver.com','nokr82@naver.com','NEpay 문의_'.$_POST['qa_name'],$_POST['qa_cont'],1);

if ($qa && $send) {
    $result['success'] = 'ok';
} else {
    $result['success'] = $sql;
}

echo json_encode($result);

?>




