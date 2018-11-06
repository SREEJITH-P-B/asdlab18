<?php

/* Attempt MySQL server connection. Assuming you are running MySQL

server with default setting (user 'root' with no password) */

$link = mysqli_connect("localhost", "root", "sabna", "book");

 

// Check connection

if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}

 

// Attempt create table query execution

$sql = "create table rating(
	bookid		INT NOT NULL,

   	rate 		INT NOT NULL,
	comment 	VARCHAR(20) NOT NULL,
	email		VARCHAR(40) NOT NULL,
	
	
	
	
	FOREIGN KEY(bookid)  REFERENCES book (bookid),
	FOREIGN KEY(email)  REFERENCES user (email)
	


    

)";

if(mysqli_query($link, $sql)){

    echo "Table created successfully.";

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

}
/*$result = "INSERT INTO persons (first_name, last_name, email) VALUES ('Peter', 'Parker', 'peterparker@mail.com')";

if(mysqli_query($link, $result))
{

   echo "Records inserted successfully.";

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);*/

 
// Close connection

mysqli_close($link);
?>
