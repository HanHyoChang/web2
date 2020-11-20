<!-- 전송할 url에 있어야 할 코드 -->
<?php
    !empty($_POST['id'] ? $id=$_POST['id'] : $id=""; // post 값으로 id값을 받아와 공백 여부를 파악하고 참, 거짓 값 설정
    $ret['check'] = false;
    if($id != "") {
            $con = mysqli_connect("localhost","root","","TestBoard");   // DB를 연동
            // post 값에서 받아온 id와 DB의 id가 일치하는 레코드 있는지 확인
            $sql = "select  
                        id 
                    from
                        user
                    where
                        id = '{$id}'        
                    ";

            $result = mysqli_query($con, $sql); 
            $num = mysqli_num_rows($result); // 조건만족하는 레코드가 있으면 $num변수에 1이 저장 (false이므로 중복을 표현)

            if($num==0) {   // 조건만족하는 값이 존재하지 않으면 $num이 0이라면 사용가능한 아이디를 뜻하고 true로 값을 바꿔 json 값으로 출력
                $ret['check'] = true;
            }
        }
        echo json_encode($ret);
?>