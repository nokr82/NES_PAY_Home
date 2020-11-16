<?php
/**
 * Created by PhpStorm.
 * User: 능이소프트
 * Date: 2020-08-18
 * Time: 오후 1:41
 */

include_once(CONTROLLER_PHP);
include_once($_SERVER['DOCUMENT_ROOT'] . "/config/pw_class.php");
class main extends controllerImpl
{

    function index()
    {
        $vars['title'] = '능이페이 : PG가 필요하세요? NEPAY를 만나보세요!';
        $vars['data'] = 'test';
        $this->display($vars);
    }

    function service()
    {
        $vars['title'] = '서비스';
        $vars['data'] = 'test';
        $this->display($vars, 'service');
    }

    function payment_history()
    {
        $vars['title'] = '결제내역조회';
        $vars['data'] = 'test';

        global $pdo;


        $epage = 10;

        if ($_GET['page'] == '') {
            $_GET['page'] = 1;
        }
        $spage = ($_GET['page'] - 1) * 10;

        $where = '';

        if ($_GET['startDate']) {
            $where .= "where TRD_DT >= '" . $_GET['startDate'] . "'";
        } else {
            $where .= "where TRD_DT >= '" . date('Y-m-d') . "'";
        }

        if ($_GET['endDate']) {
            $where .= " and TRD_DT <= '" . $_GET['endDate'] . " 23:59:59" . "'";
        } else {
            $where .= " and TRD_DT <= '" . date('Y-m-d') . " 23:59:59" . "'";
        }
        if ($_GET['search_type'] && $_GET['data']) {

            if ($_GET['search_type'] == 'email') {
                $type = 'PURCH_EMAIL';
                $data = sha($_GET['data']);
            } else {
                $type = 'b.APRV_NO';
                $data = $_GET['data'];
            }

            $where .= " and {$type} like '{$data}%'";

            $sql = "SELECT *,sum(b.PMT_AMT) as amt
,(select pgdb.F_GET_COMMON_CD('G03', a.STATUS_CD)) as stat
,(select pgdb.F_GET_COMMON_CD('G02', APRV_CD)) as APRV_CD
,(select pgdb.F_GET_COMMON_CD('G02', PURCH_CD)) as PURCH_CD
,(select pgdb.F_GET_COMMON_CD('G01', a.SVC_CD)) as SVC_CD
,FORMAT(CEIL(b.PMT_AMT/1.1), 0) as SUPPLY_AMT
,FORMAT(b.PMT_AMT-CEIL(b.PMT_AMT/1.1), 0) as  PMT_VAT
FROM tb_credit_tx as a inner join tb_credit_txdet as b on a.trd_no = b.trd_no
 inner join tb_merchant as c on a.MERT_NO = c.MERT_NO
 {$where}
 group by a.TRD_NO order by TRD_DT desc limit {$spage},{$epage}";
            $list = $pdo->query($sql);


            $list->setFetchMode(PDO::FETCH_ASSOC);

            $sql = "SELECT 
    COUNT(*) AS cnt
FROM
    (SELECT COUNT(*) AS cnt FROM tb_credit_tx as a inner join tb_credit_txdet as b on a.trd_no = b.trd_no 
  {$where} GROUP BY b.TRD_NO) AS c;";
            $cnt = $pdo->query($sql);
            $cnt = $cnt->fetch(PDO::FETCH_ASSOC);

            $vars['page'] = $_GET['page'];
            $vars['total'] = $cnt['cnt'];//total
            $vars['list'] = $list;//가맹점리스트

        }



        $this->display($vars, 'payment_history');
    }

    function qa()
    {
        $vars['title'] = '문의안내';
        $vars['data'] = 'test';
        $this->display($vars, 'qa');
    }

    function demo()
    {
        $vars['title'] = '결제데모';
        $vars['data'] = 'test';
        $this->display($vars, 'demo');
    }

}

