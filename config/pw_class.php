<?php
/**
 * Created by PhpStorm.
 * User: Hong_Dong_Woo
 * Date: 2020-09-11
 * Time: 오후 5:11
 * 암호화 모듈
 */


//암호화 파일 읽어오기
$arr = json_decode(file_get_contents("/work.space/project/web/admin/cert.key"), true);

$iv = $arr['IV'];
$r_key = $arr['KEY'];

$GLOBALS['iv'] = $iv;
$GLOBALS['r_key'] = $r_key;

//sha 256 암호화 단방향암호화
function sha($val)
{
    return base64_encode(hash("sha256", $val));
}

//aes256암호화
function decrypt_aes($p_id, $val)
{//암호화번호,검색될값
    global $pdo;
    global $iv;
    global $r_key;

    if ($val == '') {
        return '';
    }
    $sql = "SELECT * FROM pgdb.tb_keymanager where keyno = {$p_id}";
    $key = $pdo->query($sql);
    $key = $key->fetch();

    $str_1 = openssl_decrypt(
        $key['KEYSTR'], "AES-256-CBC", $r_key, 0, $iv
    );

    $str_2 = openssl_decrypt(
        $val, "AES-256-CBC", $str_1, 0, $iv
    );

    return $str_2;

}


//aes256복호화
function encrypt_aes($p_id, $val)
{
    global $pdo;
    global $iv;
    global $r_key;

    if ($val == '') {
        return '';
    }

    $sql = "SELECT * FROM pgdb.tb_keymanager where keyno = {$p_id}";
    $key = $pdo->query($sql);
    $key = $key->fetch();
    $str_1 = openssl_decrypt(
        $key['KEYSTR'], "AES-256-CBC", $r_key, 0, $iv
    );
    $str_2 = openssl_encrypt(
        $val, "AES-256-CBC", $str_1, 0, $iv
    );

    return $str_2;

}




