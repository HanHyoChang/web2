<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width" initial-scale="1">
        <title>PHP 게시판</title>
        
        <!-- css폴더내의 bootstrap.css 추가 -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <script src="https://ajax.aspnetcdn.com/ajax/JQuery/jquery-3.5.1.min.js"></script>
        <sciprt src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.3/js/bootstrap.min.js"></script>
        <script src="./js/login.js"></script>

        <script>
            /* 입력 테스트 
                제이쿼리 이용
            */
            function check_input() {
                if(!$("#id").val()) {
                    alert("아이디를 입력하세요!");
                    $("#id").focus();
                    return;
                }

                if(!$("#pass").val()) {
                    alert("비밀번호를 입력하세요!");
                    $("#id").focus();
                    return;
                }

                if(!$("#pass_confirm").val()) {
                    alert("비밀번호확인을 입력하세요!");
                    $("#pass_confirm").focus();
                    return;
                }

                if(!$("#name").val()) {
                    alert("이름을 입력하세요!");
                    $("#name").focus();
                    return;
                }

                if(!$("#phone").val()) {
                    alert("전화번호를 입력하세요!");
                    $("#phone").focus();
                    return;
                }

                if(!$("#email").val()) {
                    alert("이메일을 입력하세요!");
                    $("#email").focus();
                    return;
                }

                if($("pass").val() != $("#pass_confirm").val()) {
                    alert("비밀번호가 일치하지 않습니다. \n 다시 입력해 주세요!");
                    $("#pass").focus();
                    #("#pass").select();
                    return;
                }
                document
            }
            /* 
                바닐라 자바스크립트 이용
                제이쿼리 이용하면 document.join.id.value를
                $("#id").val()처럼 간소화 할 수 있다.
            */
            function reset_form() {
                document.join.id.value = "";
                document.join.pass.value = "";
                document.join.pass_confirm.value = "";
                document.join.name.value = "";
                document.join.gender.value = "";
                document.join.email.value = "";
                document.join.id.focus();
                return;
            }
        </script>
    </head>

        <body>
            <!-- 표준 네비 바 (화면상단, 확대 및 축소) -->
            <nav class="navbar navbar-default">
                <div class="navbar-header">
                    <!-- Collapse : 제목 클릭하면 내용 펼쳐지고 다른내용 접히는 효과 -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-exmaple-navbar-collapse-1" aria-expanded="false">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="main.php">PHP 게시판 웹 사이트</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="main.php">메인</a></li>
                        <li><a href="list.php">게시판</a><li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">접속하기
                                <span class="caret"></span>
                            </a>

                    <ul class="dropdown-menu">
                        <li class="active">
                            <a href="login.php">로그인</a>
                        </li>

                        <li><a href="join.php">회원가입</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <div class="jumbotron" style="padding-top:20px;">
                <form name="join" method="post" action="login_ok.php">
                    <h3 style="text-align:center">회원가입 화면</h3>
                    <div class="col-lg-4"></div>
                    
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="아이디" name="id" id="id" maxlength="15">
                    </div>
                    
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="비밀번호" name="pass" id="pass" maxlength="20">
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" palceholder="비밀번호 확인" name="pass_confirm" id="pass_confirm" maxlengt="20">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" palceholder="이름" name="name" id="name" maxlength="20">
                    </div>

                    <div class="form-group" style="text-align: center">
                        <div class="bn-group" data-toggle="buttons">
                            <label class="btn btn-primary active">
                                <input type="radio" name="gender" id="gender1" autocomplete="off" value="남자" checked>남자
                            </label>

                            <label class="btn btn-primary active">
                                <input type="radio" name="gender" id="gender2" autocomplete="off" value="여자" >여자
                            </label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <input type="tel" class="form-control" palceholder="전화번호" name="phone" id="phone" maxlength="20">
                    </div>

                    <div class="col-lg-4"></div>
                    
                    <div class="form-group">
                        <input type="email" class="form-control" palceholder="이메일" name="email" id="email" maxlength="80">
                    </div>

                    <span class="btn btn-primary form-control" onclick="check_input()">회원가입 </span>&nbsp;
                    <span class="btn btn-primary form-control" onclick="reset_form()">초기화</span>
                    </form>

                    <div class="form-group">
                        <span id="id_check_msg" data-check="0"></span> <!--커스텀 속성 :data_check="0" -->
                    </div>

                    <script>
                        /* 아이디 중복 체크 (비동기 통신) */
                        $(function() { // 문서가 로드되면 function을 실행
                            $("#id").blur(function() { // 아이디가 id인것을 찾아 focus()를 빠져나갈때 발생 이벤트
                                if($(this).val()=="") {
                                    $("#id_check_msg").html("아이디를 입력하세요.").css("color","red").attr("data-check","0"); // 선택자를 .연사자 추가해서 계속사용가능
                                    $(this).focus();
                                } else {
                                    checkIdAjax();
                                }
                            });
                        });
                        // 아이디 중복 체크 (비동기 통신)
                        function checkIdAjax() { // id값을 post 전송해서 서버와 통신 후 중복결과 json형태로 받아오는 함수
                            $.ajax({ // 비동기통신방법, 객체로 보낼때{}로 사용한다. 
                                url : "./ajax/check_id.php", // 데이터 보낼 url
                                type : "post",              // 데이터 전송방식
                                dataType : "json",          // 데이터 타입
                                data : {
                                    "id" : $("#id").val() // 데이터 인자
                                },
                                success : function(data) {  
                                    if(data.check) {    //if(data.check)는 url로 데이터 보내서 data.check 값이 참이면 사용가능 출력하고 1로 바꿔 사용 가능한 아이디임을 확인한다.
                                        $("#id_check_msg").html("아이디를 입력하세요.").css("color","red").attr("data-check","1");
                                    } else {    // data.check 값이 0이라면 중복된 아이디  출력 후 값을 0으로 저장해서 여전히 중복체크가 필요하다고 알려줍니다.
                                        $("#id_check_msg").html("중복된 아이디입니다.").css("color","blue").attr("data-chekc","0"); 
                                        $("#id").focus();
                                    }
                                }
                            });
                        }

                </div>
            </div>
        </div>
    </body>
</html>