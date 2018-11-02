

<?php
session_start();
?>
<?php
$error="";
if($_SERVER["REQUEST_METHOD"]=="POST") { 
if($_POST['password']==$_POST['password1'])
{
$link = mysqli_connect("localhost", "root", "jithu", "book");

$update=" update user SET password='".$_POST['password']."' where email='".$_SESSION["email"]."' ";
if(mysqli_query($link,$update))
{
	$error="Your password updated successfully";
}
}
else
{
$error="passwords are not same";
}
}
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    width: 100%;
    opacity: 0.9;
}

.btn:hover {
    opacity: 1;
}



.field {
    width:50% ;
	float:right;
}
input:hover {
    background-color: #F3951A;
}


</style>

</head>
<body>
<fieldset width="50%" class="field">


<form action=""<?php echo $_SERVER["PHP_SELF"];?>"" method="POST" style="max-width:500px;margin:auto" enctype="multipart/form-data">
  <h2>Login Form</h2>
 

  <div class="input-container">
    <i class="fa fa-lock icon"></i>
    <input class="input-field" type="password" placeholder="password" name="password" required>
  </div>
  
  <div class="input-container">
    <i class="fa fa-key icon"></i>
	  
    <input class="input-field" type="password"  placeholder="confirm password" name="password1" required>
  </div>
  <div class="input-container">

  <button type="submit" class="btn">Change Password</button></div>
  <div><?php echo '<style="color:red">'.$error.'</style>';?></div></fielset>
</form>

</body>
</html>
