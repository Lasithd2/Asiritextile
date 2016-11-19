<?php

//importing db.php in the includes folder
require("includes/db.php");


$fname=$_POST["firstname"];
$lname=$_POST["lastname"];

$address=$_POST["address"];
$contact=$_POST["contactno"];
$email=$_POST["emailaddress"];

$password=$_POST["password"];
$cpassword=$_POST["cpassword"];

$epassword =password_hash($password,PASSWORD_DEFAULT);
$ecpassword =password_hash($cpassword,PASSWORD_DEFAULT);

$sql="INSERT INTO `signup`  VALUES ('$fname','$lname','$address','$contact','$email','$epassword','$ecpassword')";



$result=mysqli_query($db,$sql);

if(!$result){
      
    echo '<script>
    
alert("Unsuccessful Login please tryy again")

</script> ';
}
else{

     
    echo '<script>
    
alert("Thank you for registering! Welcome to Asiri Textile")
window.location.href="index.php";
</script> ';
   
     
 }


   
     
 





?>