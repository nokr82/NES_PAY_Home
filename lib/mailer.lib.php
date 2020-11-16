<?php
/**
 * Created by PhpStorm.
 * User: 능이소프트
 * Date: 2020-08-18
 * Time: 오후 5:00
 */

include_once($_SERVER["DOCUMENT_ROOT"].'/PHPMailer/PHPMailerAutoload.php');

// 네이버 메일 전송
// 메일 -> 환경설정 -> POP3/IMAP 설정 -> POP3/SMTP & IMAP/SMTP 중에 IMAP/SMTP 사용

// 메일 보내기 (파일 여러개 첨부 가능)
// mailer("보내는 사람 이름", "nokr82@naver.com", "nokr82@naver.com", "제목", "내용");
// type : text=0, html=1, text+html=2


function mailer($fname, $fmail, $to, $subject, $content, $type=0,  $cc="", $bcc="")
{
    if ($type != 1)
        $content = nl2br($content);

    $mail = new PHPMailer(); // defaults to using php "mail()"

    $mail->IsSMTP();
//	$mail->SMTPDebug = 2;
    $mail->SMTPSecure = "ssl";
    $mail->SMTPAuth = true;

    $mail->Host = "smtp.naver.com";
    $mail->Port = 465;
    $mail->Username = "nokr82";
    $mail->Password = "zx1411510";

    $mail->CharSet = 'UTF-8';
    $mail->From = $fmail;
    $mail->FromName = $fname;
    $mail->Subject = $subject;
    $mail->AltBody = ""; // optional, comment out and test
    $mail->msgHTML(" <a href=\"mailto:{$fname}\">답장하기:$fname</a>"."<br>".$content);
    $mail->addAddress($to);
    if ($cc)
        $mail->addCC($cc);
    if ($bcc)
        $mail->addBCC($bcc);

    // if ($file != "") {
    //     foreach ($file as $f) {
    //         $mail->addAttachment($f['path'], $f['name']);
    //     }
    // }
    return $mail->send();
}

// 파일을 첨부함
function attach_file($filename, $tmp_name)
{
    // 서버에 업로드 되는 파일은 확장자를 주지 않는다. (보안 취약점)
    $dest_file = 'tmp/'.str_replace('/', '_', $tmp_name);
    move_uploaded_file($tmp_name, $dest_file);
    $tmpfile = array("name" => $filename, "path" => $dest_file);
    return $tmpfile;
}