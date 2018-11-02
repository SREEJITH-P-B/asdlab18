<?php
$hello="";
if($_SERVER["REQUEST_METHOD"]=="POST") {
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$dob=$_POST['dob'];
$temp=$name.date("d_m_y");
if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
		// $temp=$name.date("d.m.y"); 
	   //rename($file_name,$name);
         move_uploaded_file($file_tmp,"image/".$temp);
         echo "Success";
      }else{
         //print_r($errors);
      }
   }



$link = mysqli_connect("localhost", "id4998861_root2", "jithu", "id4998861_book");


$sql = "INSERT INTO user(name,email,password,dob,image) VALUES ('$name','$email','$password','$dob','$temp')";

if(mysqli_query($link, $sql)){

    $hello="Records inserted successfully.";

} 
}

//mysqli_close($link);

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
  <h2>Register Form</h2>
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Username" name="name" required>
  </div>

  <div class="input-container">
    <i class="fa fa-envelope icon"></i>
    <input class="input-field" type="email" placeholder="Email" name="email" required>
  </div>
  
  <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="password" placeholder="Password" name="password" required>
  </div>
  <div class="input-container">
    <i class="fa fa-calendar icon"></i>
	  
    <input class="input-field" type="text" onfocus="(this.type='date')"  placeholder="Date of birth" name="dob" required>
  </div>
  <div class="input-container">
    <i class="fa fa-camera icon"></i>
	  
    <input class="input-field" type="text" onfocus="(this.type='file')"  placeholder="Upload profile photo" name="image" accept="image/*" required>
  </div>
  


  <button type="submit" class="btn">Register</button></fielset>
  <div><?php echo '<style="color:red">'.$hello.'</style>';?></div>
</form>

</body>
</html>
