<?php
include_once HEAD;
?>
<body>
<div id="skipnavigation">
    <ul>
        <li><a href="#contents">본문 바로가기</a></li>
        <li><a href="#gnb">대 메뉴 바로가기</a></li>
    </ul>
</div>
<div id="wrap_sub">
    <?php
    include_once HEADER;
    ?>
    <div id="contents" class="container_service">
        <div class="service_desc">
            <h2><strong>전자결제서비스란?</strong></h2>
            <p>고객이 신용카드를 이용하여 온라인상에서<br>
                안전하게 결제할 수 있도록 지원하는 서비스입니다.</p>
        </div>
        <div class="box_content">
            <h2 class="tit_sty1">결제서비스 프로세스</h2>
            <div class="wrap_process_service">
                <dl class="group">
                    <dt><img src="/images/icon_service_customer.png" class="icon_customer"/></dt>
                    <dd>고객</dd>
                </dl>
                <div class="process_memo">
                    <div class="arrow_right arw_v1"><span class="blind">1</span></div>
                    <div class="process_txt">주문 / 결제하기</div>
                    <div class="arrow_left arw_v1"><span class="blind">6</span></div>
                    <div class="process_txt txt_bottom">상품 및 서비스 제공</div>
                </div>
                <dl class="group">
                    <dt><img src="/images/icon_service_affiliate.png" class="icon_affiliate"/></dt>
                    <dd>가맹점</dd>
                </dl>
                <div class="process_memo">
                    <div class="arrow_right arw_v2"><span class="blind">2</span></div>
                    <div class="process_txt">결제 요청</div>
                    <div class="arrow_left arw_v2"><span class="blind">5</span><span class="blind">8</span></div>
                    <div class="process_txt txt_bottom">5. 결제 승인 응답</div>
                    <div class="process_txt txt_bottom_v2">8. 판매대금 입금</div>
                </div>
                <dl class="group">
                    <dt><img src="/images/logo_nespay_color1.png" class="icon_nepay"/></dt>
                    <dd>NESPAY</dd>
                </dl>
                <div class="process_memo">
                    <div class="arrow_right arw_v3"><span class="blind">3</span></div>
                    <div class="process_txt">결제 요청</div>
                    <div class="arrow_left arw_v3"><span class="blind">4</span><span class="blind">7</span></div>
                    <div class="process_txt txt_bottom">4. 결제 승인 응답</div>
                    <div class="process_txt txt_bottom_v2">7. 정산대금 입금</div>
                </div>
                <dl class="group">
                    <dt><img src="/images/icon_service_ven.png" class="icon_ven"/></dt>
                    <dd>카드사, 은행, 이동통신사</dd>
                </dl>
            </div>
        </div>
    </div>
    <?php
    include_once FOOTER;
    ?>
</div>
</body>

</html>