
<?php
include_once HEAD;
?>

<body>
  <!-- 신용카드 결제 실패 -->
  <div class="pay_credit_pop pop_pay_result_fail">
    <div class="pop_head">
      <h1 class="logo">
        <img src="images/nepay_logo_color.png" width="76" alt="능이페이 로고" />
      </h1>
      <h2 class="head_txt">신용카드 결제</h2>
      <span class="btn_close_pop"><i class="blind">팝업 닫기 버튼</i></span>
    </div>
    <div class="pop_cont">
      <div class="pop_cont_top">
        <p class="pop_result_tit">결제가 실패 되었습니다.</p>
        <div class="pay_info_chk_tbl_wrap">
          <table class="pay_info_chk_tbl">
            <caption>결제 내용 - 상품명, 가맹점</caption>
            <tr class="product_name">
              <th class="cont_top_th" scope="row">상품명</th>
              <td class="prdt_name">삼성 60인치 와이드 4K 컬러 TV SS4KTV60INCH</td>
            </tr>
            <tr class="affiliate_name">
              <th class="cont_top_th" scope="row">가맹점</th>
              <td class="afflt_name">(주)삼성전자</td>
            </tr>
          </table>
        </div>
      </div>
      <div class="pop_cont_middle">
        <table class="card_result_info_tbl">
          <caption>결제 실패 내용 - 주문번호, 실패사유, 실패코드</caption>
          <tr class="order_number">
            <th class="cont_middle_th">주문번호</th>
            <td class="order_nbr">ORDER-202030001</td>
          </tr>
          <tr class="fail_why">
            <th class="cont_middle_th">실패사유</th>
            <td class="fl_why">분실신고 카드</td>
          </tr>
          <tr class="fail_code">
            <th class="cont_middle_th">실패코드</th>
            <td class="fl_code">9999</td>
          </tr>
        </table>
      </div>
    </div>
    <div class="pop_bottom">
      <div class="fail_notice">
        결제관련 문의는<br>
        능이페이 고객센터 이메일 <span class="email_txt">center@xxx.com</span><br>
        또는 1588-1234 연락주시기 바랍니다.
      </div>
      <div class="wrap_pop_btn">
        <span class="btn_next">확 인</span>
      </div>
      <strong class="cscenter">고객센터 : 1588-1588</strong>
    </div>
  </div>
</body>

</html>