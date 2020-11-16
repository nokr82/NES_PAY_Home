<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<?php
include_once HEAD;
?>
<body>
  <!-- 신용카드 결제1 -->
  <div class="pay_credit_pop pop_yakwan">
    <div class="pop_head">
      <h1 class="logo">
        <img src="images/nepay_logo_color.png" width="76" alt="능이페이 로고" />
      </h1>
      <h2 class="head_txt">신용카드 결제:<?=$data?></h2>
      <span class="btn_close_pop"><i class="blind">팝업 닫기 버튼</i></span>
    </div>
    <div class="pop_cont">
      <div class="wrap_allchk">
        <label class="custom_checkbox">전체 약관 동의
          <input type="checkbox" name="" id="" class="payterm_allchk" value="" />
          <span class="checkmark"></span>
        </label>
      </div>
      <div class="wrap_singlechk">
        <div class="box_term">
          <label class="custom_checkbox">전자금융거래 이용약관 [ 필수 ]
            <input type="checkbox" name="" id="" class="payterm_chk1" value="" />
            <span class="checkmark"></span>
          </label>
          <span class="btn_allterm">전문보기</span>
        </div>
        <div class="box_term">
          <label class="custom_checkbox">개인정보 수집 및 이용안내 [ 필수 ]
            <input type="checkbox" name="" id="" class="payterm_chk2" value="" />
            <span class="checkmark"></span>
          </label>
          <span class="btn_allterm">전문보기</span>
        </div>
        <div class="box_term">
          <label class="custom_checkbox">개인정보 제공 및 위탁안내 [ 필수 ]        
            <input type="checkbox" name="" id="" class="payterm_chk3" value="" />
            <span class="checkmark"></span>
          </label>
          <span class="btn_allterm">전문보기</span>
        </div>
      </div>
    </div>
    <div class="pop_bottom">
      <div class="wrap_pop_btn">
        <span class="btn_cnxl" id='btn_cancel'>취 소</span>
        <span class="btn_next" id='btn_ok'>확 인</span>
      </div>
      <strong class="cscenter">고객센터 : 1588-1588</strong>
    </div>
  </div>
</body>

</html>

<script type="text/javascript">
    $(document).ready(function() {
        $('.payterm_allchk').click(function () {
            var chk = $(this).is(":checked");
            if(chk) {
                $(".payterm_chk1").prop('checked', true);
                $(".payterm_chk2").prop('checked', true);
                $(".payterm_chk3").prop('checked', true);
            }
            else {
                $(".payterm_chk1").prop('checked', false);
                $(".payterm_chk2").prop('checked', false);
                $(".payterm_chk3").prop('checked', false);
            }
        });

        $('.btn_next').click(function () {
            if(!$('.payterm_chk1').is(":checked")) {
                alert('전자금융거래 이용약관 동의 필요.');
                return;
            }
            else if(!$('.payterm_chk2').is(":checked")) {
                alert('개인정보 수집 및 이용안내 동의 필요.');
                return;
            } else if(!$('.payterm_chk3').is(":checked")) {
                alert('개인정보 제공 및 위탁안내 동의 필요.');
                return;
            }

            location.href='?c=pay';
        });

    });

    /*
    $(document).on('click', '.payterm_chk1', function (event) {
      event.stopPropagation();
      console.log('Test Like2');
    }).on('click', '.btn_allterm', function (event) {
      event.stopPropagation();
      console.log('Test Like')
    });
    */
</script>