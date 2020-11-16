<?php
/**
 * Created by PhpStorm.
 * User: Hong_Dong_Woo
 * Date: 2020-09-11
 * Time: 오후 5:11
 * 공통 PHP 코드
 */


if ($_GET['startDate']) {
    $startDate = $_GET['startDate'];
} else {
    $startDate = date('Y-m-d');
}
if ($_GET['endDate']) {
    $endDate = $_GET['endDate'];
} else {
    $endDate = date('Y-m-d');
}



//경고창을 띄우고 페이지 이동
function alert($str, $url = "")
{
    echo "<script>";
    echo "alert( '$str' );";
    if ($url == "") {
        echo "history.back(-1);";
    } else {
        echo "location.replace( '$url' );";
    }
    echo "</script>";
    exit;
}
//리스트페이지 페이징
function doPaging($page, $total, $rpp, $adjacents, $url, $param)
{

    if ($page == '') {
        $page = 1;
    }

    if (($last = ceil($total / $rpp))) {
        if ($last < ($defc = 1 + $adjacents * 2)) {
            $i = 1;
            $cond = $last;
        } elseif ($last >= $defc) {
            if ($page < 2 + $adjacents) {
                $i = 1;
                $cond = 5;
            } elseif ($page >= $last - $defc / 2) {
                $i = $last + 1 - $defc;
                $cond = $last;
            } elseif ($page >= 2 + $adjacents) {
                $i = $page - $adjacents;
                $cond = $page + $adjacents;
            }
        }

        $first_url = "location.href=" . "'" . $url . $param . "'";
        echo '  <div class="box_paging clfix">
                   <span class="btn_prev" onclick="' . $first_url . '">
                            <i class="blind">이전</i>
                        </span>
                         <ul class="paging">';
        for ($i; $i <= $cond; $i++) {
            if ($i == $page) {
                echo '<li class="on"><a href="#">' . $i . '</a></li>';
            } else {
                echo ' <li><a href="' . $url . $param . $i . '">' . $i . '</a></li>';
            }
        }
        $last_url = "location.href=" . "'" . $url . $param . $last . "'";
        echo ' </ul >
                    <span class="btn_next" onclick = "' . $last_url . '" >
                        <i class="blind" > 다음</i >
                        </span >
                </div > ';
    } else {
        return;
    }
}


//trade_stat 검색조건
function search_type()
{

    $s_list = [];
    $arr = array('name' => '전체', 'val' => '');
    $arr1 = array('name' => '거래번호', 'val' => 'a.TRD_NO');
    $arr2 = array('name' => '주문번호', 'val' => 'a.ORD_NO');
    $arr3 = array('name' => '상품명', 'val' => 'a.ITEM_NM');
    $arr4 = array('name' => '구매자명', 'val' => 'a.PURCH_NM_E');
    $arr5 = array('name' => '결제금액', 'val' => 'a.PMT_AMT');
    array_push($s_list, $arr);
    array_push($s_list, $arr1);
    array_push($s_list, $arr2);
    array_push($s_list, $arr3);
    array_push($s_list, $arr4);
    array_push($s_list, $arr5);

    return $s_list;
}


//trade_stat 거래상태
function trade_stat()
{
    global $pdo;

    $sql = "select * from tb_common_cd where COMM_GCD = 'G03' and use_yn = 'Y'";
    $list = $pdo->query($sql);
    $list->setFetchMode(PDO::FETCH_ASSOC);
    $s_list = [];
    while ($row = $list->fetch()) {
        array_push($s_list, $row);
    }
    return $s_list;
}

?>
