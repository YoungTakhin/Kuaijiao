<script>
            function closeOpen()
		    {
		       window.returnValue=false;
		       window.close();
		    }
		    
		    function check1()
		    {
		        if(document.form1.xuehao.value=="")
		        {
		            alert("请输入学号");
		            return false;
		        }
		        if(document.form1.name1.value=="")
		        {
		            alert("请输入姓名");
		            return false;
		        }
		        if(document.form1.loginname.value=="")
		        {
		            alert("请输入用户名");
		            return false;
		        }
		        if(document.form1.loginpw.value=="")
		        {
		            alert("请输入密码");
		            return false;
		        }
		       
		        document.form1.submit();
		    }
		    
        </script>