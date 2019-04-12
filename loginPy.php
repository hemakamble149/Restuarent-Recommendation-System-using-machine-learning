<?php
$idErr = "";
$id = "";
if(isset($_POST['login']))
	{
		if(empty($_POST['UserID']))
		{
			$idErr = "ID is required<br>";
		}
		else {
				$id = test_input($_POST['UserID']);
				if(!preg_match("/^[0-9]*$/",$id)||($id > 671)) {
					$idErr = "ID is invalid<br>"; 
			}
		}
	}
function test_input($data)
    {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }	
?>
<?php
	echo  $idErr;
?>
<html>
    <head><title>Login Process</title>
          <link rel="stylesheet" type="text/css" href="test.css">      
    </head>
    <body style="  background-image: url(image.jpg); background-repeat: no-repeat;background-size: 100%"></body>
    <body >
       <form action= "toPython.php">
	   <center>
            <div>
            <nav  style="font-size: 30px;">			
			 <table  style="margin-top:2px">
             <tr>
              <h1 style="font-size:40;margin-top: 2%">Login</h1></tr>
                <tr><th>UserID</th><td><input type="text" name="UserID" value ="<?php echo mt_rand(1,671) ?>")></td></tr>
			</table><br>
            <button type="submit" name="login">Login</button>
			</center>
		</form> 
    </body>
</html>