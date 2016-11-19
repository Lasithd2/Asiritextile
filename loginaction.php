<?php
require("includes/db.php");

$email=$_POST["emailaddress"];
$password=$_POST["password"];

//dealing with scripting attacks(unwanted html)
$email = htmlspecialchars($email);
$password = htmlspecialchars($password);


//deal with sql injection attacks
//$email = quote_smart($email, $db);
//$password = quote_smart($password, $db);

$sql="SELECT * FROM signup where email='$email' ";

$result = $db->query($sql);
$row=$result->fetch_assoc();

    $hashpwd= $row['Password'];
    $hash=password_verify($password,$hashpwd);
    
    if($hash==0){
       echo '<script>
    
alert("Wrong email or password! Please enter again")
window.location.href="login.php";
</script> ';
    }else{

$sql="SELECT * FROM signup where Email='$email'  AND Password='$hashpwd'";
       
if(mysqli_num_rows($result)==1){ //Each entry is unique so the number of rows returned from the db table should be 1
    session_start();          //starting a session if login is successful
    $_SESSION['login']='1'; //creating a session variable
    header('location:registered.php');
    
    
}

else{
        echo '<script>
    
alert("Wrong email or password! Please enter again")
window.location.href="login.php";
</script> ';
    
}

    }
?>