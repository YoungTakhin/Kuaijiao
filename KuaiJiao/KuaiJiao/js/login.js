$(function () {
//教师登录页面js代码
$(".tealogin").submit(function () {
        var yn = true;
        $(this).find(":text,:password").each(function () {
            if ($.trim($(this).val()) === "") {
                alert("请输入用户名和密码");
                yn = false;
                return yn;
            }
        });
        if (yn) {
            $.ajax({
                type: "GET",
                //感觉有问题
                url: "/KuaiJiao/tealogin",
                data: {"teachername": $.trim($("#inputTID").val()), "password": $.trim($("#inputPassword").val())},
                dataType: "json",
                success: function (data) {
                    $("#teacher").val("登 录");
                    if (data.success) {
                        location.href = "/teacher.html";
                    } else {
                        alert("用户名和密码错误");
                    }
                },
                error: function () {
                    $("#teacher").val("登 录");
                    alert("服务器异常，请刷新页面再试！");
                },
                beforeSend: function () {
                    $("#teacher").val("正在登录...");
                }
               
            });
        }
        return false;
    });

//学生登录页面js代码
$(".stulogin").submit(function () {
        var yn = true;
        $(this).find(":text,:password").each(function () {
            if ($.trim($(this).val()) === "") {
                alert("请输入用户名和密码");
                yn = false;
                return yn;
            }
        });
        if (yn) {
            $.ajax({
                type: "GET",
                //感觉有问题
                url: "/KuaiJiao/tealogin",
                data: {"studentname": $.trim($("#inputSID").val()), "password": $.trim($("#inputPassword").val())},
                dataType: "json",
                success: function (data) {
                    $("#student").val("登 录");
                    if (data.success) {
                        location.href = "/student.html";
                    } else {
                        alert("用户名和密码错误");
                    }
                },
                error: function () {
                    $("#student").val("登 录");
                    alert("服务器异常，请刷新页面再试！");
                },
                beforeSend: function () {
                    $("#student").val("正在登录...");
                }
               
            });
        }
        return false;
    });
    
 //运维端登录页面js代码
$(".worlogin").submit(function () {
        var yn = true;
        $(this).find(":text,:password").each(function () {
            if ($.trim($(this).val()) === "") {
                alert("请输入用户名和密码");
                yn = false;
                return yn;
            }
        });
        if (yn) {
            $.ajax({
                type: "GET",
                //感觉有问题
                url: "/KuaiJiao/tealogin",
                data: {"operationername": $.trim($("#inputOID").val()), "password": $.trim($("#inputPassword").val())},
                dataType: "json",
                success: function (data) {
                    $("#operation").val("登 录");
                    if (data.success) {
                        location.href = "/operation.html";
                    } else { 
                        alert("用户名和密码错误");
                    }
                },
                error: function () {
                    $("#operation").val("登 录");
                    alert("服务器异常，请刷新页面再试！");
                },
                beforeSend: function () {
                    $("#operation").val("正在登录...");
                }
               
            });
        }
        return false;
    });
   });