<?php
/***********************************************************************************
 * FILE NAME : controllerImpl.php                                DESIGN REF : FMCM00
 *
 * AUTHOR  : CHEOLJOO MOON
 * DATE    : 2020.07.31 (KR, UTC+9)
 * CHANGES :
 *     REF NO  VERSION     DATE        WHO        DETAIL
 *        1    0.0.1       2020.07.31  CJMOON     Init
 *
 * FILE Encoding : UTF-8
 *
 * DESCRIPTION : Controller Model
 *
 ***********************************************************************************/
include_once(CONFIG_PHP);

abstract class controllerImpl {

    static $conn;
    static $class;

    function __construct() {
        $this->conn  = $GLOBALS['conn'];
        $this->class = $GLOBALS['classObj'];
    }

    function __destruct() {
    }

    //화면정의 class  = 곧보여지는 뷰다
    protected function display($vars=array(), $view='') {

        if(empty($view)) $view = $this->class;

        if( substr($view, 0, 1) != '/' )
            $view = realpath(VIEW_PATH.'/'.$view.FILE_EXT);

            controllerImpl::output($view, $vars);
    }

    protected function output($path='', $vars=array()) {
        if( isset($vars) && is_array($vars) )       extract($vars);
        if( isset($path) && file_exists($path) )    require $path;
    }

    /* ================================================================== */
    /* SQL Injection Check */
    protected function IS_SQLInjection($v) {
        $UserInput = preg_replace("/[\r\n\s\t\’\;\”\=\-\-\#\/*]+/","", $v);
        if(preg_match('/(union|select|from|where|update|delete|or)/i', $UserInput)) {
           return TRUE;
        }

        return FALSE;
    }
}

?>
