<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/include_common/common.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/config/config.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/config/pw_class.php");
include_once HEAD;
session_start();
include_once($_SERVER['DOCUMENT_ROOT'] . "/simple_captcha/simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();

if ($_GET['startDate'] == '') {
    $_GET['startDate'] = date('Y-m-d');
}
if ($_GET['endDate'] == '') {
    $_GET['endDate'] = date('Y-m-d');
}

?>
<body class="maskqa">
<div id="skipnavigation">
    <ul>
        <li><a href="#contents">본문 바로가기</a></li>
        f
        <li><a href="#gnb">대 메뉴 바로가기</a></li>
    </ul>
</div>
<div id="wrap_sub">
    <?php
    include_once HEADER;
    ?>
    <div id="contents" class="container_full">
        <div class="wrap_payment_history">
            <div class="inner_wrap">
                <h2 class="tit_sty1">신용카드 결제내역 검색</h2>
                <form onsubmit="return ck_submit()">
                    <input type="hidden" name="c" value="main">
                    <input type="hidden" name="m" value="payment_history">

                    <ul class="list">
                        <li>
                            <dl>
                                <dt>카드 종류 선택</dt>
                                <dd>
                                    <label class="custom_radiobox radio_contain">인터넷 안전결제(ISP)
                                        <input type="radio" name="isp" class="isp" value="isp" checked="">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="custom_radiobox radio_contain">안심클릭: ISP 제외카드
                                        <input type="radio" name="isp" class="notisp" value="isp" checked="">
                                        <span class="checkmark"></span>
                                    </label>
                                </dd>
                            </dl>
                        </li>
                        <li>
                            <dl>
                                <dt>결제 정보 선택</dt>
                                <dd>
                                    <label class="custom_radiobox radio_contain">이메일 확인
                                        <input type="radio" name="search_type" class="isp"
                                               value="email" <?php if ($_GET['search_type'] == 'email' || $_GET['search_type'] == '') echo 'checked'; ?>>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="custom_radiobox radio_contain">승인번호 확인
                                        <input type="radio" name="search_type" class="notisp"
                                               value="number" <?php if ($_GET['search_type'] == 'number') echo 'checked' ?>>
                                        <span class="checkmark"></span>
                                    </label>
                                </dd>
                            </dl>
                        </li>
                        <li>
                            <dl>
                                <dt>결제 정보 선택</dt>
                                <dd>
                                    <input type="text" name="data" id="data" class="confirm_num"
                                           value="<?= $_GET['data'] ?>"
                                           placeholder="이메일을 입력해 주세요."/>
                                </dd>
                            </dl>
                        </li>
                        <li>
                            <dl>
                                <dt>결제 일자</dt>
                                <dd>
                                    <span class="wrap_calendar"><input autocomplete="off" type="text" class="date"
                                                                       name="startDate"
                                                                       value="<?= $_GET['startDate'] ?>"/></span>
                                    <span class="inp_line"> - </span>
                                    <span class="wrap_calendar"><input autocomplete="off" type="text" class="date"
                                                                       name="endDate"
                                                                       value="<?= $_GET['endDate'] ?>"/></span>
                                </dd>
                            </dl>
                        </li>
                        <li>
                            <!--                            <dl>-->
                            <!--                                <dt>기타 정보 (E-mail)</dt>-->
                            <!--                                <dd>-->
                            <!--                                    <input type="email" name="confirm_email" class="confirm_email" value="" placeholder="이메일을 입력해 주세요." />-->
                            <!--                                </dd>-->
                            <!--                            </dl>-->
                            <p class="notice_isp">* ISP 카드거래의 경우, 개인정보보호 강화를 위해 결제내역을 받은 E-mail 주소를 추가 기입하셔야 조회할 수
                                있습니다.</p>
                        </li>
                        <li>
                            <dl>
                                <dt class="tit_captcah">보안 문자</dt>
                                <dd class="wrap_captcah clfix">
                                    <div class="box_captcha">
                                        <img src="<?=$_SESSION['captcha']['image_src']?>" style="width:211px;height:50px;"/>
                                    </div>
                                    <div class="write_captcah">
                                        <span class="notice">이미지를 보이는대로 입력해주세요.</span>
                                        <span class="inp_box">
                                            <input type="text" class="inp" name="inp_captcha"/>
                                        </span>
                                    </div>
                                </dd>
                            </dl>
                        </li>
                    </ul>
                    <button type="submit" class="btn_lookup">조회</button>
                </form>

            </div>
        </div>
        <div class="wrap_transaction_history">
            <div class="inner_wrap">
                <h2 class="tit_sty1">신용카드 거래내역 검색</h2>
                <table class="tbl">
                    <caption>신용카드 거래내역조회 - 승인번호, 거래일자, 결제방법, 가맹점 명, 전화번호, 금액, 부가세, 봉사료, 합계</caption>
                    <colgroup>
                        <col style="width:95px"/>
                        <col style="width:222px"/>
                        <col style="width:111px"/>
                        <col style="width:243px"/>
                        <col style="width:221px"/>
                        <col style="width:113px"/>
                        <col style="width:auto"/>
                        <col style="width:124px"/>
                    </colgroup>
                    <thead>
                    <tr>
                        <th scope="col">승인 번호</th>
                        <th scope="col">거래 일자</th>
                        <th scope="col">결제 방법</th>
                        <th scope="col">가맹점 명</th>
                        <th scope="col">전화번호</th>
                        <th scope="col">금액</th>
                        <th scope="col">부가세</th>
                        <th scope="col">봉사료</th>
                        <th scope="col" class="last">합계</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if ($_GET['data'] != '') {
                        while ($row = $vars['list']->fetch()) {
                            $amt = number_format($row['amt']);
                            $row['MERT_TEL'] = decrypt_aes($row['ENKEY'], $row['MERT_TEL']);

                            echo "   <tr>
                        <td>{$row['APRV_NO']}</td>
                        <td>{$row['ORD_DT']}</td>
                        <td>{$row['SVC_CD']}</td>
                        <td>{$row['MERT_NM']}</td>
                        <td>{$row['MERT_TEL']}</td>
                        <td>{$row['SUPPLY_AMT']}원</td>
                        <td>{$row['PMT_VAT']}원</td>
                        <td>0원</td>
                        <td>{$amt}원</td>
                    </tr>";
                        }
                    }
                    ?>

                    </tbody>
                </table>
                <?php
                if ($_GET['data'] != '') {
                    doPaging($vars['page'], $vars['total'], 10, 2, $_SERVER['SCRIPT_NAME'] . '?c=main&m=payment_history&isp=isp&search_type=' . $_GET['search_type'] . '&data=' . $_GET['data'] . '&startDate=' . $_GET['startDate'] . '&endDate=' . $_GET['endDate'] . '&inp_captcha=', '&page=');
                }
                ?>
            </div>
        </div>

    </div>
    <?php
    include_once FOOTER;
    ?>
</div>
</body>

<script>

    function ck_submit(){
        if ('<?=$_SESSION['captcha']['code']?>' == $('input[name=inp_captcha]').val()){
            return true;
        } else {
            alert('보안문자가 틀립니다.');
            return false;
        }
    }


    $(function () {


        $('input[name=search_type]').change(function () {
            var radioVal = $('input[name=search_type]:checked').val();
            if (radioVal == 'email') {
                $('#data').attr('placeholder', '이메일을 입력해주세요.');
            } else {
                $('#data').attr('placeholder', '승인번호를 입력해주세요.');
            }
        })
    })


</script>


</html>
