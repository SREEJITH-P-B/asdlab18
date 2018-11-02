<?php

$error=$succ=$empty="";
if($_SERVER["REQUEST_METHOD"]=="POST") {
$email=$_POST['email'];
$password=$_POST['password'];
$_SESSION["email"] =$email;

$sql=mysqli_connect("localhost","root","jithu","book");
if(!$sql)
{die ("connection failed");}
else{
$n="select name,password from user where email='$email'";
$result=mysqli_query($sql,$n);

	
		$row = mysqli_fetch_array($result);
		
		if($row['password']==$password)
		{
			$error="Hii ".$row['name']." you are successfully logged in!";
		//if(isset($_POST['submit'])) {
				 //header('Location:hello.php');
			 }
			
			/* if(isset($_POST['update'])) {
				 header('Location:work.php');
			 }*/
			
			}
		else{
			
			
		$error= "incorrect username or password";
		}

}
}
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

.input-container {
    display: -ms-flexbox; /* IE10 */
    display: flex;
    width: 75%;
    margin-bottom: 15px;
}

.icon {
    padding: 10px;
    background: black;
    color: white;
    min-width: 50px;
    text-align: center;
}

.input-field {
    width: 100%;
	border: 1px solid black;
    padding: 10px;
    outline: none;
}

.input-field:focus {
    border: 2px solid black;
}

/* Set a style for the submit button */
.btn {
    background-color: black;
    color: white;
    padding: 15px 20px;
    border: none;
    cursor: pointer;
    width: 75%;
    opacity: 0.9;
}

.btn:hover {
    opacity: 1;
}



.field {
    width:50% ;
	float:right;
}


</style>

</head>
<body>
<fieldset width="50%" class="field">


<form action=""<?php echo $_SERVER["PHP_SELF"];?>"" method="POST" style="max-width:500px;margin:auto" enctype="multipart/form-data">
  <h2>Login Form</h2>
 

  <div class="input-container">
    <i class="fa fa-envelope icon"></i>
    <input class="input-field" type="email" placeholder="Email" name="email" required>
  </div>
  
  <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="password" placeholder="Password" name="password" required>
  </div>
  

  <button type="submit" class="btn">Register</button>>
  <div><?php echo '<style="color:red">'.$hello.'</style>';?></div> 
  <div><a href="forgot.php" class="w3-button w3-black">forgot password</a>
  <a href="signup.php" class="w3-button w3-black">signup</a></div>
  </fieldset>
</form>

</body>
</html>
