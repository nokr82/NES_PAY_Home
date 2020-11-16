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
            <div class="wrap_content qa clfix">
                <div class="qa_info">
                    <h2>문의 안내</h2>
                    <dl>
                        <dt>대표번호</dt>
                        <dd>070 - 4138 - 8899</dd>
                        <dt>팩스</dt>
                        <dd>0505 - 009 -9587</dd>
                        <dt>이메일</dt>
                        <dd>2jeonghyen@naver.com</dd>
                    </dl>
                </div>
                <form name="theForm" id="theForm" method="post" >
                    <div class="qaform">
                        <div class="inp_box inp_name">
                            <label for="qa_name">문의자 이름</label>
                            <input type="text" id="qa_name" name="qa_name" class="qa_name" />                        
                        </div>
                        <div class="inp_box inp_email">
                            <label for="qa_email">받을 이메일</label>
                            <input type="text" id="qa_email" name="qa_email" class="qa_email" />
                        </div>
                        <div class="inp_box inp_cont">
                            <label for="qa_cont">문의 내용</label>                      
                        </div>
                        <textarea id="qa_cont" class="qa_cont"  placeholder="문의하실 내용을 작성해 주세요." ></textarea>
                        <div class="btn_submit"><input id="btnSubmit" onclick="in_qa()" type="button"value="보내기"></div>
                    </div>
                </form>
            </div>

        </div>
        <?php
        include_once FOOTER;
        ?>
    </div>
</body>
</html>

<script>
    
    function in_qa() {

        var qa_name = $('#qa_name').val();
        var qa_email = $('#qa_email').val();
        var qa_cont = $('#qa_cont').val();

        if (qa_name == ''){
            alert('이름을 입력해주세요.');
            return;
        }

        if (qa_email == ''){
            alert('이메일을 입력해주세요.');
            return;
        }

        if (qa_cont == ''){
            alert('내욜을 입력해주세요.');
            return;
        }

        $.ajax({
            type: 'post',
            url: '/ajax/in_qa.php',
            data: {'qa_name': qa_name,'qa_email': qa_email,'qa_cont': qa_cont},
            dataType: 'json',
            error: function (xhr, status, error) {
                alert(error+xhr+status);
            },
            success: function (data) {
                console.log(data);
                if (data.success == 'ok') {
                    $("#theForm")[0].reset();
                    alert('접수되었습니다.')
                }

            },
        });
    }
    
    
    
</script>

