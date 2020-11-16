<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>Test Payment</title>
    <style>
    body {
      font-size: 80.0%; /* font-size 1em = 10px 브라우저의 기본 설정 */
      }
      table {
        width: 70%;
      }
      table, th, td {
        border: 1px solid #bcbcbc;
      }
    </style>

  <script src="/js/jquery-3.3.1.min.js"></script>
  <script src="/js/sha256.js"></script>

  <script type="text/javascript">
    function getOderNO() {
        var d = new Date();
        return d.getFullYear() + leftpadding((1 + d.getMonth()), "2") + leftpadding(d.getDate(), "2") + d.getHours() + d.getMinutes() + d.getSeconds() + d.getMilliseconds();
    }

    function getOderDT() {
        var d = new Date();
        return d.getFullYear() + leftpadding((1 + d.getMonth()), "2") + leftpadding(d.getDate(), "2") + leftpadding(d.getHours(),"2") + leftpadding(d.getMinutes(),"2") + leftpadding(d.getSeconds(),"2");
    }

    function leftpadding(n, width) {
        n = n + '';
        return n.length >= width ? n : new Array(width - n.length + 1).join('0') + n;
    }

    function getSHA256() {
       var plaintext = $('#hashkey').val()+$('#orderno').val()+$('#amount').val()+$('#orderdt').val();
       return (SHA256(plaintext));
    }

    $(document).ready(function() {    
      $('#auto_orderno').click(function () {
        $('#orderno').val('ORDER_'+getOderNO());        
      });

      $('#auto_orderdt').click(function () {
        $('#orderdt').val(getOderDT());        
      });

      $('#auto_sha256').click(function() {
        $('#hashdata').val(getSHA256());
      });
      
      $('#auto_payment').click(function () {
        var left = (screen.width-460) / 2;
        var top = (screen.height-692) / 4;

         var title = 'test palyment';
         var status = "toolbar=no,directories=no,scrollbars=no,resizable=no,status=no,menubar=no,width=460px, height=692px top="+top +", left="+left;
         var popwin = window.open('',title, status);
         var frm = document.payment;
         frm.action = 'http://192.168.0.251:8443';
         frm.target = title;
         frm.submit();
      });

    });
  </script>

  </head>
  <body>
    <table>
      <caption>Order Information</caption>
      <thead>
        <tr>
          <th width=200px>항목</th>
          <th width=500px>값</th>
        </tr>
      </thead>
      <form name='payment' method='post'>
      <tbody>
        <tr>
          <th>가맹점 SVC ID</th>
          <td><input type="text" id="svcid" name="svcid" size="50" value='SVC20200626002'></td>
        </tr>

        <tr>
          <th>주문번호</th>
          <td><input type="text" id="orderno" name="orderno" size="50">&nbsp;&nbsp;<button class="favorite styled" id="auto_orderno" type="button"> 자동생성</button></td>
        </tr>
        <tr>
          <th>주문일시</th>
          <td><input type="text" id="orderdt" name="orderdt" size="50">&nbsp;&nbsp;<button class="favorite styled" id="auto_orderdt" type="button"> 자동생성</button></td>
        </tr>
        <tr>
          <th>결제금액</th>
          <td><input type="text" id="amount" name="amount" size="10" value="100000"></td>
        </tr>        
        <tr>
          <th>상품명</th>
          <td><input type="text" id="itemnm" name="itemnm" size="80" value="김치냉장고 180L"></td>
        </tr>                
        <tr>
          <th>상품코드</th>
          <td><input type="text" id="itemcd" name="itemcd" size="30" value="itemcode_123456"></td>
        </tr>                        
        <tr>
          <th>구매자명</th>
          <td><input type="text" id="username" name="username" size="50" value="홍길동"></td>
        </tr>                
        <tr>
          <th>구매자ID</th>
          <td><input type="text" id="userid" name="userid" size="50" value="tester"></td>
        </tr>                        
        <tr>
          <th>구매자 Email</th>
          <td><input type="text" id="useremail" name="useremail" size="50" value="tester@google.com"></td>
        </tr>                        
        <tr>
          <th>구매자 연락처</th>
          <td><input type="text" id="usertel" name="usertel" size="50" value="010-1234-1234"></td>
        </tr>               
        <!-- 구메자 IP는 내부에서 처리
        <tr>
          <th>구매자 IP</th>
          <td><input type="text" id="usereip" name="usereip" size="16" value="192.168.0.1"></td>
        </tr>
        -->
        <tr>
          <th>무이자 여부 (가맹점 부담)</th>
          <td><select name="installmentYN">
              <option value="N" default>유이자</option>
              <option value="Y">무이자</option>              
              </select>
          </td>
        </tr>        

        <!-- 보안영역 -->
        <tr>
          <th>Hash Key</th>
          <td><input type="text" id="hashkey" name="hashkey" size="50" value="vmpkey"></td>
        </tr>                                                      
        <tr>
          <th>Hash 정보</th>
          <td><input type="text" id="hashdata" name="hashdata" size="50" value="">&nbsp;&nbsp;<button class="favorite styled" id="auto_sha256" type="button"> 자동생성</button></td>
        </tr>                                              
      </tbody>
      </form>
      <tr>
          <th>결제호출</th>
          <td><button class="favorite styled" id="auto_payment" type="button">호출</button></td>
        </tr>                                        
    </table>
  </body>
</html>
