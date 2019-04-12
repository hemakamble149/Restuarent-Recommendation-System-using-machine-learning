<?php
$name = $password = $email = "";
$nameErr = $passErr = $emailErr = "";
if(isset($_POST['register']))
	{
		if(empty($_POST["Username"]))
		{
			$nameErr = "Username is required<br>";
		}
		else {
				$name = test_input($_POST["Username"]);
				if(!preg_match("/^[a-zA-Z ]*$/",$name)) {
					$nameErr = "Only letters and white space allowed in Firstname<br>"; 
			}
		}
		if(empty($_POST["password"]))
		{
			$passErr = "Password is required<br>";
		}
		else 
		{
				$password = test_input($_POST["password"]);
		}
		if(empty($_POST["Email"]))
		{
			$emailErr = "Email is required<br>";
		}
		else 
		{
				$email = test_input($_POST["Email"]);
		}
		
	}
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>
<?php
	echo  $nameErr. $passErr. $emailErr;
?>
<html>
    <head><title>Registration</title>
          <link rel="stylesheet" type="text/css" href="test.css">      
    </head>
    <body style="  background-image: url(bb.jfif); background-repeat: no-repeat;background-size: 100%"></body>
    <body >
       <form  method="post" action= "loginPy.php">
	   <center>
            <div>
            <nav  style="font-size: 30px;">		
			 <table  style="margin-top:2px">
             <tr>
              <h1 style="font-size:40;margin-top: 2%">Registration</h1></tr>
                <tr><th>Username</th><td><input type="text" name="Username" ></td></tr>
                <tr><th>Email</th><td><input type="email" name="Email" ></td></tr>
                <tr><th>Password</th><td><input type="Password" name="Password" ></td></tr>
			</table><br>
            <button type="submit" name="register">Register</button>
			</center>
		</form>   
    </body>
</html>