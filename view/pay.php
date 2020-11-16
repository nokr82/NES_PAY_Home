<?php
include_once HEAD;
?>

<body >
  <!-- 신용카드 결제2 -->
  <div class="pay_credit_pop pop_payment_insert">
    <div class="pop_head">
      <h1 class="logo">
        <img src="images/nepay_logo_color.png" width="76" alt="능이페이 로고" />
      </h1>
      <h2 class="head_txt">신용카드 결제</h2>
      <span class="btn_close_pop"><i class="blind">팝업 닫기 버튼</i></span>
    </div>
    <div class="pop_cont">
      <div class="pop_cont_top">
        <table class="pay_info_chk_tbl">
          <caption>결제 내용 - 상품명, 결제금액, 결제일자</caption>
          <tr class="product_name">
            <th class="cont_top_th" scope="row">상품명</th>
            <td class="prdt_name">삼성 60인치 와이드 4K 컬러 TV SS4KTV60INCH</td>
          </tr>
          <tr class="payment_price">
            <th class="cont_top_th" scope="row">상품명</th>
            <td class="paymt_price">3,400,000 원</td>
          </tr>
          <tr class="payment_date">
            <th class="cont_top_th" scope="row">결제일자</th>
            <td class="paymt_date">2020년 6월 3일</td>
          </tr>
        </table>
      </div>

      <div class="pop_cont_middle">
        <h3 class="pop_cont_tit">카드사 선택</h3>
        <div class="card_company_group">
          <ul class="most_card_list">
            <li><span class="btn_card_type">KB국민</span></li>
            <li class="active"><span class="btn_card_type">신한</span></li>
            <li><span class="btn_card_type">삼성</span></li>
            <li><span class="btn_card_type">현대</span></li>
            <li><span class="btn_card_type">BC</span></li>
            <li><span class="btn_card_type">하나</span></li>
            <li><span class="btn_card_type">롯데</span></li>
            <li><span class="btn_card_type">NH농협</span></li>
          </ul>
          <div class="common_card_list" onclick="$('#card_company').toggleClass('on')">
            <span class="box_tit">기타 카드사</span>
            <div class="cmn_card_area">
              <div id="card_company" class="selected_box">
                <span class="cmpn_name">우리</span>
              </div>
              <div class="select_toggle_box">
                <ul class="cmn_card_list">
                  <li>우리</li>
                  <li>씨티</li>
                  <li>우체국</li>
                  <li>카카오뱅크</li>
                  <li>케이뱅크</li>
                  <li>수협</li>
                  <li>전북</li>
                  <li>제주</li>
                  <li>광주</li>
                  <li>KDB산업</li>
                  <li>새마을금고</li>
                  <li>저축은행</li>
                  <li>신협</li>
                  <li>KB증권</li>
                  <li>신한BC</li>
                  <li>하나BC</li>
                  <li>NH농협BC</li>
                  <li>IBK기업</li>
                  <li>토스</li>
                  <li>한국투자증권</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="installment_range" onclick="$('#pay_instmt_plan').toggleClass('on')">
          <span class="box_tit">할부 기간</span>
          <div class="instmt_range_area">
            <div id="pay_instmt_plan" class="selected_box">
              <span class="paymt_plan">일시불</span>
            </div>
            <div class="select_toggle_box">
              <div class="instmt_range_list">
                <li>일시불</li>
                <li>3개월</li>
                <li>4개월</li>
                <li>5개월</li>
                <li>6개월</li>
                <li>7개월</li>
                <li>8개월</li>
                <li>9개월</li>
                <li>10개월</li>
                <li>11개월</li>
                <li>12개월</li>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="pop_bottom">
      <div class="email_area">
        <label class="custom_checkbox">결제내역 수신 이메일을 입력하여 주십시요. (선택)
          <input type="checkbox" id="emailcheck" name="" class="" value="" />
          <span class="checkmark"></span>
        </label>
        <div class="email_inp_wrap">
          <span class="box_tit" for="">E-mail</span>
          <div class="inp_box">
            <input type="email" id="useremail" name="" />
          </div>
        </div>
      </div>
      <div class="wrap_pop_btn">
        <span class="btn_cnxl">취 소</span>
        <span class="btn_next">확 인</span>
      </div>
      <strong class="cscenter">고객센터 : 1588-1588</strong>
    </div>
  </div>

  <script>
    $('.cmn_card_list').on('click', 'li', function (e) {//기타 카드사 목록
      const text = $(this).text();
      $('#card_company .cmpn_name').text(text);
    });

    $('.instmt_range_list').on('click', 'li', function (e) {//할부 기간 목록
        const text = $(this).text();
        $('#pay_instmt_plan .paymt_plan').text(text);
      });

    $('.most_card_list').on('click', 'li', function (e) {
      $(this).addClass('active').siblings('li').removeClass('active');
    });

    $('.btn_next').click(function () {
      if($('#emailcheck').is(":checked")) {
          if(isEmail($('#useremail').val()) == false) {
            alert('Email 주소가 잘못되었습니다. 다시 입력하여 주십시요.');
            return;
        }
      }

      location.href='?c=auth';
    });
    
    function isEmail(asValue) {
      var regExp = /^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/i;
      return regExp.test(asValue);
    }


  </script>
</body>

</html>