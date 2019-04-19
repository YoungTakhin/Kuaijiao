<?php
    login();
    
    function login() {
        //登录
        if(!isset($_POST['ologin'])) {
            exit('非法访问!');
        }
        $id = $_POST['id'];
        $password = $_POST['password'];
        //包含数据库连接文件
        $conn = conn();
        //检测用户名及密码是否正确
        $check_query = mysqli_query($conn, "select * from users where id like '" . $id . "' and password like '" . $password . "' and user_type like 'o' limit 1");
        //var_dump($check_query);
        //var_dump(mysqli_fetch_array($check_query));
        if($result = mysqli_fetch_array($check_query)) {
            //var_dump($result);
            //登录成功
            $id = $result['id'];
            $username = $result['username'];
            $user_type = $result['user_type'];
            session_start();
            $_SESSION['id'] = $id;
            $_SESSION['username'] = $username;
            $_SESSION['$user_type'] = $user_type;
            echo $username . ',欢迎你！<a href="operation">进入主页</a><br />';
            exit;
        }
        else {
            var_dump($result);
            exit('登录失败！点击此处 <a href="javascript:history.back(-1);">返回</a> 重试');
        }
    }

    function conn() {
        $conn = mysqli_connect("localhost", "root", "ydx970516", "kj");
        mysqli_select_db($conn, "kj") or die("数据库访问错误" . mysql_error());
        mysqli_query($conn, "set names UTF8");
        return $conn;
    }
