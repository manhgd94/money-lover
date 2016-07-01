<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
   <head>
       <title>Verify account Money lover</title>
   </head>
   <body>   
        <?php 
        	echo "<p>Chào bạn ".$name." (".$email.")</p>";
			echo "<p>Bạn đã đăng ký thành công tài khoản trên Money lover.</p>";
			echo "<p>Đây là thông tin tài khoản của bạn.</p>";
			echo "<p>Name : ".$name."</p>";
			echo "<p>Username : ".$username."</p>";
			echo "<p>Email : ".$email."</p>";
			echo "<p>Xin hãy click vào link dưới đây để xác nhận tài khoản email của bạn.</p>";
			echo "<a href='".$message."'>Click here to vefify account</a>"
        ?>
    </body>
</html>