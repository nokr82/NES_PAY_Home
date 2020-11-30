<?php
include_once HEAD;
?>
<body class="maskqa">
<div id="skipnavigation">
    <ul>
        <li><a href="#container">본문 바로가기</a></li>
        <li><a href="#gnb">대 메뉴 바로가기</a></li>
    </ul>
</div>
<div id="wrap_sub">
    <?php
    include_once HEADER;
    ?>
    <div id="container">
        <div class="wrap_content wrap_yakwan clfix">
            <h2>신용카드 결제데모</h2>
            <form name='payment' method='post'>
                <div class="wrap_demo">
                    <p class="notice"><span class="txt">결제 데모에서는 카드사로 실결제를 하지 않습니다.</span></p>
                    <ul class="list_info">
                        <input type="hidden" id="svcid" name="svcid" size="50" value='SVC20200626002'>
                        <input type="hidden" id="orderno" name="orderno" size="50">
                        <input type="hidden" id="orderdt" name="orderdt" size="50">
                        <input type="hidden" id="itemcd" name="itemcd" size="30" value="itemcode_123456">
                        <input type="hidden" id="userid" name="userid" size="50" value="tester">
                        <input type="hidden" id="useremail" name="useremail" size="50" value="tester@google.com">
                        <input type="hidden" id="usertel" name="usertel" size="50" value="010-1234-1234">
                        <input type="hidden" id="hashkey" name="hashkey" size="50" value="vmpkey">
                        <input type="hidden" id="hashdata" name="hashdata" size="50" value="">
                        <input type="hidden" id="installmentYN" name="installmentYN" size="50" value="Y">
                        <li>
                            <dl class="item">
                                <dt class="tit">가맹점 정보</dt>
                                <dd class="cont">
                                    <ul class="">
                                        <li>(주)능이소프트</li>
                                        <li>(주)능이소프트</li>
                                    </ul>
                                </dd>
                            </dl>
                        </li>
                        <li>
                            <dl class="item">
                                <dt class="tit">상품 정보</dt>
                                <dd class="cont">
                                    <ul class="">
                                        <li>상품명
                                            <input type="text" id="itemnm" name="itemnm" class="demo_product"/>
                                        </li>
                                        <li>결제금액
                                            <div class="paydemo_box">
                                                <input type="text" id="amount" name="amount" class="demo_payment"/>
                                                <span class="txt_demo_payment">원</span>
                                            </div>
                                        </li>
                                    </ul>
                                </dd>
                            </dl>
                        </li>                        
                    </ul>
                    <span class="btn_payment_demo">결제 데모</span>


                </div>
            </form>
        </div>

    </div>
    <?php
    include_once FOOTER;
    ?>
</div>
</body>
<script src="/js/sha256.js"></script>
<script type="text/javascript">

    $(document).ready(function () {
        $('#orderno').val('ORDER_' + getOderNO());
        $('#orderdt').val(getOderDT());


        $('.btn_payment_demo').click(function () {
            var left = (screen.width - 460) / 2;
            var top = (screen.height - 692) / 4;
            $('#hashdata').val(getSHA256());
            var title = 'test palyment';
            var status = "toolbar=no,directories=no,scrollbars=no,resizable=no,status=no,menubar=no,width=460px, height=692px top=" + top + ", left=" + left;
            var popwin = window.open('', title, status);
            var frm = document.payment;
            frm.action = 'http://192.168.0.251:8443';
            frm.target = title;
            frm.submit();
        });

    });

    function getOderNO() {
        var d = new Date();
        return d.getFullYear() + leftpadding((1 + d.getMonth()), "2") + leftpadding(d.getDate(), "2") + d.getHours() + d.getMinutes() + d.getSeconds() + d.getMilliseconds();
    }

    function getOderDT() {
        var d = new Date();
        return d.getFullYear() + leftpadding((1 + d.getMonth()), "2") + leftpadding(d.getDate(), "2") + leftpadding(d.getHours(), "2") + leftpadding(d.getMinutes(), "2") + leftpadding(d.getSeconds(), "2");
    }

    function leftpadding(n, width) {
        n = n + '';
        return n.length >= width ? n : new Array(width - n.length + 1).join('0') + n;
    }

    function getSHA256() {
        var plaintext = $('#hashkey').val() + $('#orderno').val() + $('#amount').val() + $('#orderdt').val();
        return (SHA256(plaintext));
    }
</script>


</html>
