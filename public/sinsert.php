<?php
    insertStudent();

    function insertStudent() {
        if(!isset($_POST['insertStudent'])) {
            exit('非法访问!');
        }
        $id = NULL;
        $username = NULL;
        $password = NULL;
        $email = 'NULL';
        $major = NULL;

        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $major = $_POST['major'];
        //包含数据库连接文件
        $conn = mysqli_connect("localhost", "root", "ydx970516", "kj");
        mysqli_select_db($conn, "kj") or die("数据库访问错误" . mysql_error());
        mysqli_query($conn, "set names UTF8");
        $sql = "insert into students values (" . $id . ", '" . $username . "', '" . $major . "', " . $email . ", '" . $password . "', NULL)";
        //var_dump($sql);
        $result = mysqli_query($conn, $sql);
        //var_dump($result);
        //var_dump($check_query);
        //var_dump(mysqli_fetch_array($check_query));
        if($result) {
            //var_dump($result);
            //登录成功
            echo "<script>alert('新增成功！');location.href='insertStudent';</script>";
        }
        else {
            //var_dump($result);
            echo "<script>alert('新增失败！');location.href='insertStudent';</script>";
        }
    }