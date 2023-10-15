<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form by PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Sign up form</h1>
<div>
<?php
    $usernameErr = $firstnameErr =$lastnameErr =$dobErr=$passwordErr = "";
    $user = $fname = $lastname = $year = $password = "";
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $conn=mysqli_connect("localhost","root","","firstdb");
        if (empty($_POST["username"])) {
            $usernameErr = "Username is required";
        } else {
            $user = test_input($_POST["username"]);
        }    
        if (empty($_POST["firstname"])) {
            $firstnameErr = "firstname is required";
        } else {
            $fname = test_input($_POST["firstname"]);
        }    
        if (empty($_POST["lastname"])) {
            $lastnameErr = "lastname is required";
        } else {
            $lastname = test_input($_POST["lastname"]);
        }    
        if (empty($_POST["dob"])) {
            $dobErr = "DOB is required";
        } else {
            $year = test_input($_POST["dob"]);
        }    
        if (empty($_POST["password"])) {
            $passwordErr = "password is required";
        } else {
            $password = test_input($_POST["password"]);
        }    
        $usernaame=test_input($_POST["username"]);
        $fname=test_input($_POST["firstname"]);
        $lastname=test_input($_POST["lastname"]);
        $year=test_input($_POST["dob"]);
        $password=test_input($_POST["password"]);
        if($user && $fname && $lastname && $year && $password){
            $sql="INSERT INTO `data` VALUES('$user','$fname','$lastname','$year','$password')";
            $result=mysqli_query($conn,$sql);
            $user = $fname = $lastname = $year = $password = "";
        }
        
    }
    function test_input($data){
        $data=trim($data);
        $data=stripcslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    } 
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
<label for="user" >Enter username</label><br>
<input type="text" id="user" name="username" value="<?php echo "$user"; ?>"><span style="color:red;" ><?php echo "$usernameErr" ?></span>
<br>
<label for="fname">Enter your first name</label><br>
<input type="text" id="fname" name="firstname" value="<?php echo "$fname"; ?>" ><span style="color:red;" ><?php echo "$firstnameErr"; ?></span>
<br>
<label for="lname">Enter your last name</label><br>
<input type="text" id="lname" name="lastname" value="<?php echo "$lastname"; ?>"><span style="color:red;" ><?php echo "$lastnameErr"; ?></span>
<br>
<label for="d">Enter your DOB</label><br>
<input type="date" id="d" name="dob" value="<?php echo "$year"; ?>"><span style="color:red;" ><?php echo "$dobErr"; ?></span>
<br>
<label for="pass">Enter paassword</label><br>
<input type="password" id="pass" name="password" value="<?php echo "$password"; ?>"><span style="color:red;" ><?php echo "$passwordErr"; ?></span>
<br>
<button type="submit">Submit</button>
</div>
</form>

</body>
</html>