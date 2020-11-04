<?php
    $id = $_POST['id'];
    $pass = $_POST['pass'];

    $con = mysqli_connect("localhost","user1","12345","TestBoard");
    $sql = "SELECT * FROM user WHERE id=$'id'";

    $result = mysqli_query($con, $sql);

    $num_match = mysql_num_rows($result);

    if(!$num_match) {
        echo ("
            <script>
                window.alert('등록되지 않은 아이디입니다')
                history.go(-1)
            </script>
        ");
    } else {
        $row = mysqli_fetch_array($result);
        $db_pass = $row['pass'];

        // 수정된 부분 : $db -> $con
        mysqli_close($con);
        
        // 로그인 화면에서 전송된 $pass와 DB의 $db_pass의 해쉬값 비교
        if(!password_verify($pass,$db_pass)) {
            ehco("
                <script>
                    window.alert('비밀번호가 틀립니다.')
                    history.go(-1)
                </script>
            ");
            exit;
        } else {
            session_start();
            $_SESSION["userid"] = $row["id"];
            $_SESSION["username"] = $row["name"];
            echo("
                <script>
                    location.href = 'list.php';
                </script>
            ");
        }
    }
?>