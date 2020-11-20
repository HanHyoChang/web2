<?php
    include_once "./db/db_con.php";

    $id = $_POST['id'];
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT); // 입력받은 패스워드를 해쉬 암호화
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    mq("INSERT INTO user(id,pass,name,gender,phone,eamil) values('".$id."','".$pass."','".$name."','".$gender."','".$phone."','".$email."'
    
    echo "
        <script>
            alert('회원가입이 완료 되었습니다.');
            location.href='index.php';
        </script>
        ";
?>